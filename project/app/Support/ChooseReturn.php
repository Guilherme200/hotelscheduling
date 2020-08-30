<?php

namespace App\Support;

use Illuminate\Contracts\Support\Responsable;

class ChooseReturn implements Responsable
{
	private $type;
	private $data;
	private $route;
	private $message;

	public static function choose($type, $message, $route = null, $routeArguments = null)
	{
		$chooseReturnInstance = new self();

		$chooseReturnInstance->setType($type)
			->setMessage($message);

		if ($route) {
			$chooseReturnInstance->setRoute($route, $routeArguments);
		}

		return $chooseReturnInstance;
	}

	public function setType($type)
	{
		if (!in_array($type, ['success', 'error', 'info', 'warning'])) {
			throw new \InvalidArgumentException("Invalid response type [{$type}]", 500);
		}

		$this->type = $type;
		return $this;
	}

	public function setRoute($route, $routeArguments = null)
	{
		$this->route = is_valid_url($route)
			? $route
			: route($route, $routeArguments);

		return $this;
	}

	public function setMessage($message)
	{
		$this->message = $message;
		return $this;
	}

	public function setData($data)
	{
		$this->data = $data;
		return $this;
	}

	public function build()
	{
		if (\Request::ajax()) {
			return $this->ajaxResponse();
		}

		if ($this->route) {
			return $this->redirectResponse();
		}

		throw new \BadMethodCallException('Redirect without route.', 500);
	}

	public function toResponse($request)
	{
		return $this->build();
	}

	private function ajaxResponse()
	{
		$response = [
			'type' => $this->type,
			'message' => $this->message ?? null,
		];

		if ($this->data) {
			$response['data'] = $this->data;
		}
		$code = ($this->type === 'error') ? 202 : 200;

		return response(json_encode($response), $code);
	}

	private function redirectResponse()
	{
		flash()->create($this->type, $this->message);
		return redirect()->to($this->route);
	}
}
