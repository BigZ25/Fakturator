<?php

namespace App\Http;

use App\Enum\OlxApi\AdvertOlxStatusesEnum;
use App\Models\AccessToken;
use App\Models\Code;
use Exception;
use Illuminate\Support\Facades\Http;

const scope = 'read write v2';

class APIClient
{
    public static function codeUrl()
    {
        return 'https://www.olx.pl/oauth/authorize/?client_id=' . env('OLX_API_CLIENT_ID') . '&response_type=code&scope=' . scope;
    }

    /**
     * @throws Exception
     */
    private static function accessToken()
    {
        $currentAccessToken = AccessToken::current();

        if ($currentAccessToken === null) {
            return self::getAccessToken();
        }

        if ($currentAccessToken->need_refresh === true) {
            if ($currentAccessToken->refresh_token_expired === false) {
                return self::refreshAccessToken($currentAccessToken);
            } else {
                return self::getAccessToken();
            }
        }

        return $currentAccessToken;
    }

    private static function getAccessToken()
    {
        if (Code::all()->count() === 0) {
            throw new Exception("Brak kodu dostępu do OLX.");
        }

        $code = Code::current();

        $data = [
            'grant_type' => 'authorization_code',
            'scope' => scope,
            'client_id' => env('OLX_API_CLIENT_ID'),
            'client_secret' => env('OLX_API_CLIENT_SECRET'),
            'code' => $code->code,
        ];

        $response = Http::post(env('OLX_BASE_URL') . 'api/open/oauth/token', $data);
        if ($response->failed()) {
            throw new Exception($response->json('error_human_title'));
        } else {
            $data = $response->json();

            AccessToken::query()->delete();

            $accessToken = AccessToken::create([
                'access_token' => $data['access_token'],
                'refresh_token' => $data['refresh_token'],
                'expires_in' => $data['expires_in'],
                'timestamp' => time(),
            ]);

            return $accessToken;
        }
    }

    private static function refreshAccessToken($accessToken)
    {
        if ($accessToken !== null) {
            $data = [
                'grant_type' => 'refresh_token',
                'client_id' => env('OLX_API_CLIENT_ID'),
                'client_secret' => env('OLX_API_CLIENT_SECRET'),
                'refresh_token' => $accessToken->refresh_token,
            ];

            $response = Http::withHeaders([

            ])->post(env('OLX_BASE_URL') . 'api/open/oauth/token', $data);

            if ($response->failed()) {
                return $response->throw();
            } else {
                $data = $response->json();

                $accessToken->update([
                    'access_token' => $data['access_token'],
                    'refresh_token' => $data['refresh_token'],
                    'expires_in' => $data['expires_in'],
                    'timestamp' => time(),
                ]);
            }

            return $accessToken;
        }

        return null;
    }

    public static function addAdvert($data)
    {
        try {
            $accessToken = self::accessToken();

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken->access_token,
                'Version' => '2.0',
                'Content-Type' => 'application/json',
            ])->post(env('OLX_BASE_URL') . 'api/partner/adverts', $data);

            if ($response->ok()) {
                return response()->json(['data' => $response->json('data')], 200);
            } else {
                if ($response->json() !== null) {
                    return response()->json($response->json('error_human_title') ?? $response->json('error')['validation'][0]['field'] . ": " . $response->json('error')['validation'][0]['title'], $response->status());
                }

                return response()->json($response->reason(), $response->status());
            }
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public static function removeAdvert($advertOlxId)
    {
        $response = self::getAdvert($advertOlxId);

        if ($response->isOk() === true) {
            $data = $response->getOriginalContent()['data'];

            $status = $data['status'];

            if ($status === AdvertOlxStatusesEnum::ACTIVE) {
                try {
                    $accessToken = self::accessToken();

                    $data = [
                        "command" => "deactivate",
                        "is_success" => false,
                    ];

                    $response = Http::withHeaders([
                        'Authorization' => 'Bearer ' . $accessToken->access_token,
                        'Version' => '2.0',
                        'Content-Type' => 'application/json',
                    ])->post(env('OLX_BASE_URL') . 'api/partner/adverts/' . $advertOlxId . '/commands', $data);

                    if ($response->status() === 204) {
                        return response()->json("OK", 200);
                    } else {
                        return response()->json($response->json('error_human_title'), $response->status());
                    }
                } catch (Exception $e) {
                    return response()->json($e->getMessage(), 500);
                }
            } elseif ($status === AdvertOlxStatusesEnum::REMOVED_BY_USER) {
                return response()->json("OK", 200);
            } else {
                return response()->json("Nie można usunąć ogłoszenia z OLX. Proszę spróbować później", 500);
            }
        } elseif ($response->getStatusCode() === 404) {
            return response()->json("Not exists", 200);
        } else {
            return $response;
        }
    }

    public static function getAdvert($advertOlxId)
    {
        try {
            $accessToken = self::accessToken();

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $accessToken->access_token,
                'Version' => '2.0',
                'Content-Type' => 'application/json',
            ])->get(env('OLX_BASE_URL') . 'api/partner/adverts/' . $advertOlxId);
            if ($response->ok()) {
                return response()->json(['data' => $response->json('data')], 200);
            } else {
                if ($response->json() !== null) {
                    return response()->json($response->json('error_human_title'), $response->status());
                }

                return response()->json($response->reason(), $response->status());
            }
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }
    }

    public static function sendPushoverNotification($message, $title = null)
    {
        $data = [
            'token' => env('PUSHOVER_API_TOKEN'),
            'user' => env('PUSHOVER_USER_KEY'),
            'title' => $title,
            'message' => $message,
            'html' => 1,
            'sound' => 'bike',
        ];

        $response = Http::withHeaders(['Host' => 'api.pushover.net'])
            ->post(env('PUSHOVER_BASE_URL'), $data);

        if ($response->failed()) {
            return false;
        } else {
            return true;
        }
    }
}
