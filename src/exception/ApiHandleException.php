<?php
namespace ozings\exception;

use think\exception\Handle;
use ozings\facade\Response;

class ApiHandleException extends  Handle {

    /**
     * http 状态码
     * @var int
     */
    public $httpCode = 500;
	public $code = 0;

    public function render(\Exception $e)
	{
        if(config('app.app_debug') == true) {
            return parent::render($e);
        }
        if ($e instanceof ApiException) {
            $this->httpCode = $e->httpCode;
			$this->code = $e->code;
        }
        return Response::json($this->code, $e->getMessage(), [], $this->httpCode);
    }
}
