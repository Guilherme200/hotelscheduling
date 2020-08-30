<?php

namespace App\Builders;

use App\Repositories\BaseRepository;
use App\Repositories\Criterias\Common\OrderResolvedByUrlCriteria;
use App\Repositories\Criterias\Common\SearchResolvedByUrlCriteria;
use App\Repositories\Repository;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class PaginationBuilder implements Responsable
{
	private $perPage;
	private $resource;
	private $criterias;
	private $collection;
	private $repository;
	private $defaultOrderBy;

	public function __construct()
	{
		$this->perPage = config('pagination.per_page_default');
		$this->resource = null;
		$this->criterias = collect();
		$this->repository = null;
	}

	public function repository($repository)
	{
		if (!($repository instanceof BaseRepository || $repository instanceof Repository)) {
			$repository = new $repository();
		}

		$this->collection = null;
		$this->repository = $repository;

		return $this;
	}

	public function collection(Collection $collection)
	{
		$this->repository = null;
		$this->collection = $collection;

		return $this;
	}

	public function resource($resource)
	{
		$this->resource = $resource;

		return $this;
	}

	public function criterias($criterias)
	{
		if ($criterias instanceof Collection) {
			$this->criterias = $this->criterias->merge($criterias);
		} else {
			$this->criterias->push($criterias);
		}

		return $this;
	}

	public function cleanCriterias()
	{
		$this->criterias = collect();
		return $this;
	}

	public function perPage(int $perPage)
	{
		$this->perPage = $perPage;
		return $this;
	}

	public function defaultOrderBy($field, $order = 'desc')
	{
		$this->defaultOrderBy = [
			'field' => $field,
			'order' => strtolower($order),
		];

		return $this;
	}

	public function build()
	{
		if ($this->repository != null) {
			$paginated = $this->buildForRepository();
		} else {
			$paginated = $this->buildForCollection();
		}

		if ($this->resource) {
			return $this->resource::collection($paginated);
		}

		return JsonResource::collection($paginated);
	}

	public function toResponse($request)
	{
		return $this->build()->response();
	}

	private function getDefaultCriterias()
	{
		$defaultCriterias[] = new OrderResolvedByUrlCriteria($this->defaultOrderBy ?? []);
		$defaultCriterias[] = new SearchResolvedByUrlCriteria();

		return $defaultCriterias;
	}

	private function buildForRepository()
	{
		$defaultCriterias = collect($this->getDefaultCriterias());
		$criterias = $this->criterias
			->merge($defaultCriterias);

		$this->repository->pushCriteria($criterias);

		return $this->repository->paginate($this->perPage);
	}

	private function buildForCollection()
	{
		if (!$this->collection) {
			$this->collection = collect();
		}

		if (!$this->collection instanceof Collection) {
			$this->collection = collect($this->collection);
		}

		if ($this->defaultOrderBy) {
			$order = data_get($this->defaultOrderBy, 'order');
			$field = data_get($this->defaultOrderBy, 'field');
			if ($order == 'desc') {
				$this->collection = $this->collection->sortByDesc($field);
			} else {
				$this->collection = $this->collection->sortBy($field);
			}
		}

		return $this->collection->paginate($this->perPage);
	}
}
