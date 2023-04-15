<?php

namespace App\Http;

use Campo\UserAgent;
use DOMDocument;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ObservationsAPIClient
{
    /**
     * @throws Exception
     */
    public static function checkAdverts($link)
    {
        $userAgent = UserAgent::random([
            'device_type' => ['Desktop'],
            'agent_type' => ['Browser'],
            'agent_name' => ['Firefox', 'Chrome', 'Opera'],
            'os_type' => ['Windows', 'Linux', 'OS X'],
            'os_name' => ['Windows 7', 'Linux', 'OS X', 'Windows 8', 'Windows NT', 'Ubuntu']
        ]);
        $inputLink = $link->input_link;
        $response = Http::timeout(45)
            ->withHeaders([
//                'User-Agent' => $userAgent//TODO
            ])->get($inputLink);

        if ($response->ok()) {
            $html = $response->body();

            $dom = new DOMDocument();
            $dom->loadHTML($html, LIBXML_NOERROR);
            $div = $dom->getElementById("olx-init-config");

            //4 = __PRERENDERED_STATE__
            $content = explode("\n", $div->firstChild->textContent)[4];

            $string = str_replace("\\\"", "\"", str_replace(["        window.__PRERENDERED_STATE__= \"", "\";", "\\\\\\\""], "", $content));

            $totalElements = json_decode($string)?->listing?->listing?->totalElements;

            if ($totalElements > 0) {
                $ads = json_decode($string)?->listing?->listing?->ads;

                if ($ads) {
                    return response()->json(['data' => $ads]);
                } else {
                    throw new Exception("Błąd JSON (" . $link->observation->id . ')' . $inputLink);
                }
            } else {
                return response()->json(['message' => 'No adverts'], 404);
            }
        } elseif ($response->status() !== 200) {
            Log::channel('http')->info($response->toPsrResponse()->getStatusCode() . " - " . $response->toPsrResponse()->getReasonPhrase() . "(" . $link->observation->id . ") " . $inputLink);
            return response()->json(['message' => $response->toPsrResponse()->getReasonPhrase()], $response->toPsrResponse()->getStatusCode());
        } else {
            Log::channel('commands')->info(json_encode($response));
            throw new Exception("Błąd linku (" . $link->observation->id . ') ' . $inputLink . " " . $response->toPsrResponse()->getReasonPhrase() . " " . $response->toPsrResponse()->getStatusCode());
        }
    }
}
