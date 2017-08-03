<?php namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler {

	protected $dontReport = [
		'Symfony\Component\HttpKernel\Exception\HttpException'
	];


	public function report(Exception $e)
	{
		return parent::report($e);
	}

	public function render($request, Exception $e)
	{
        if($this->isHttpException($e))
        {
            switch ($e->getStatusCode())
            {
                // not found
                case 404:
                    return redirect()->guest('/');
                    break;

                // internal error
                case '500':
                    return redirect()->guest('/');
                    break;

                default:
                    header("X-Content-Type-Options: nosniff");
                    return $this->renderHttpException($e);
                    break;
            }
        }
        else
        {
            header("X-Content-Type-Options: nosniff");
            return parent::render($request, $e);
        }
	}

}
