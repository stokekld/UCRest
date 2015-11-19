<?php

namespace UCRest\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use UCRest\Models\Logs\SystemLog;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class,
        ModelNotFoundException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        
        $sysLog = SystemLog::getInstance();

        if ( $sysLog -> debugging() )
        {
            try {

                $log = SystemLog::getInstance() -> getLog();
                $log -> addError("Exception", ["message" => $e->getMessage()]);
                
            } catch (Exception $exception) {

                return response()->json(["error" => true, "type" => get_class($e), "message" => $exception->getMessage()], 500);
                
            }
        }

        // if ( $e instanceof \PDOException )
        // {
        //     return response()->json(['error' => true, 'httpCode' => 500, 'type' => 'PDOException', 'message' => $message ], 409);
        // }

        // if ($e instanceof ModelNotFoundException) {
        //     $e = new NotFoundHttpException($e->getMessage(), $e);
        // }
        return response()->json(["error" => true, "type" => get_class($e), "message" => "Error desconocido"], 500);
        // return parent::render($request, $e);
    }
}
