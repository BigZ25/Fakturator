<?php

namespace App\Exceptions;

use Facade\Ignition\Exceptions\ViewException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;
use PDOException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e)
    {
        // is this request asks for json?
        if ($request->hasHeader('Content-Type') && $request->header('Content-Type') == 'application/json') {
            /*  is this exception? */
            if (!empty($e)) {
                // set default error message
                $response = [
                    'error' => 'Sorry, can not execute your request.'
                ];

                // If debug mode is enabled
                if (config('app.debug')) {
                    // Add the exception class name, message and stack trace to response
                    $response['exception'] = get_class($e); // Reflection might be better here
                    $response['message'] = $e->getMessage();
                    $response['trace'] = $e->getTrace();
                }

                $status = 400;

                // get correct status code

                // is this validation exception
                if ($e instanceof ValidationException) {

                    return $this->convertValidationExceptionToResponse($e, $request);

                    // is it authentication exception
                } else {
                    if ($e instanceof AuthenticationException) {

                        $status = 401;

                        $response['error'] = 'Can not finish authentication!';

                        //is it DB exception
                    } else {
                        if ($e instanceof PDOException) {

                            $status = 500;

                            $response['error'] = 'Can not finish your query request!';

                            // is it http exception (this can give us status code)
                        } else {
                            if ($this->isHttpException($e)) {
                                $status = $e->getStatusCode();
                                $response['error'] = 'Request error!';

                                //CSRF token mismatch
                            } elseif ($e instanceof TokenMismatchException) {
                                $status = 400;
                                $response['message'] = 'Sesja wygasła. Zaloguj się ponownie.';
                            } elseif ($e instanceof AuthorizationException) {
                                $status = 403;
                                $response['message'] = 'Operacja niedozwolona.';
                            } else {

                                // for all others check do we have method getStatusCode and try to get it
                                // otherwise, set the status to 400
                                $status = method_exists($e, 'getStatusCode') ? $e->getStatusCode() : 400;
                            }
                        }
                    }
                }

                return response()->json($response, $status);
            }
        } else {
            if ($e instanceof AuthorizationException) {
//                throw new HttpResponseException(response()->json(['message' => "Operacja niedozwolona"], 403));
                return response()->view('errors.403', ['exception' => $e, 403],403);
            } elseif ($e instanceof TokenMismatchException) {
                throw new HttpResponseException(response()->json(['message' => "Sesja wygasła. Zaloguj się ponownie."], 403));
            }
        }

        return parent::render($request, $e);
    }
}
