<?php

namespace App\Repositories\Criterias;

use App\Repositories\Repository;

abstract class Criteria
{
	abstract public function apply($model, Repository $repository);
}
