<?php

namespace App\Http\Controllers;

use App\Builders\PaginationBuilder;
use App\Support\ChooseReturn;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	protected $repository;
	protected $resource;

	public function pagination()
	{
		$pagination = new PaginationBuilder();
		$this->getPagination($pagination);
		return $pagination->build();
	}

	protected function getPagination($pagination)
	{
		$pagination->repository($this->repository)
			->resource($this->resource);
	}

	public function chooseReturn($type, $message, $routeToRedirect = null, $id = null)
	{
		return ChooseReturn::choose($type, $message, $routeToRedirect, $id);
	}
}
