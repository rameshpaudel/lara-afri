<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;

class ApiController extends BaseController
{
	/**
	 * @var int
	 */
	protected $statusCode = 200;

	/**
	 * @return mixed
	 */
	public function getStatusCode()
	{
		return $this->statusCode;
	}

	/**
	 * @param mixed $statusCode
	 * @return $this
	 */
	public function setStatusCode($statusCode)
	{
		$this->statusCode = $statusCode;
		return $this;
	}

	/**
	 * @param string $message
	 * @return \Illuminate\Http\JsonResponse
     */
	public function respondNotFound($message = 'Not found')
	{
		return $this->setStatusCode(404)->respondWithError($message);
	}

	/**
	 * @param string $message
	 * @return \Illuminate\Http\JsonResponse
     */
	public function respondInternalError($message = 'Internal Error')
	{
		return $this->setStatusCode(500)->respondWithError($message);
	}
	/**
	 * @param $data
	 * @param array $headers
	 * @return \Illuminate\Http\JsonResponse
     */
	public function respond($data, $headers = [])
	{
		return  response()->json($data , $this->getStatusCode(), $headers);
	}

	/**
	 * @param $message
	 * @return \Illuminate\Http\JsonResponse
     */
	public function respondWithError($message)
	{
		return $this->respond([
			'error' => [
				'message' => $message,
				'status_code' => $this->getStatusCode()
			]
		]);
	}
}