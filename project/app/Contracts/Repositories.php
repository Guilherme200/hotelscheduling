<?php

namespace App\Contracts\Repositories;

use App\Repositories\Criterias\Criteria;

interface CriteriaContract
{
	public function skipCriteria($status = true);

	public function getCriteria();

	public function getByCriteria(Criteria $criteria);

	public function pushCriteria($criteria);

	public function applyCriteria();
}
