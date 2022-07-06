<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\UnauthorizedException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
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
            if ($e instanceof QueryException) {
                return redirect()->back()->withErrors([
                    'error' => 'Erro de banco de dados.'
                ]);
            }

            // caso alguém não autorizado tente acessar rotas das quais não possui permissão.
            if ($e instanceof UnauthorizedException) {
                return response([
                    'msg' => 'Você não tem autorização!',
                ], 403);
            }

            // caso sejá requesitado um ID que não se encontra no banco.
            if ($e instanceof ModelNotFoundException) {
                return response([
                    "msg" => "Recurso não encontrado"
                ], 404);
            }


        });
    }

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Exception
     */
    // public function render($request, Throwable $e)
    // {
    //     ds($e->getMessage());

    // }
}
