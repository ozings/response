<?php
namespace ozings;

class Response
{
	/**
     * 通用化API接口数据输出
	 * @param int $status 业务状态码
	 * @param string $message 信息提示
	 * @param [] $data  数据
	 * @param int $httpCode http状态码
	 * @return array
     */
    public function json($status, $message, $data=[], $httpCode=200)
	{
		$data = [
			'status' => $status,
			'msg' => $message,
			'data' => $data,
		];
		return json($data, $httpCode);
	}
}
