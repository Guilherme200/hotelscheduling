<?php

namespace App\Http\Controllers\Admin;

use App\Builders\PaginationBuilder;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ReservationResource;
use App\Repositories\ReservationRepository;

class ReservationController extends Controller
{
    protected $repository;
    protected $resource;

    public function __construct()
    {
        $this->repository = new ReservationRepository();
        $this->resource = ReservationResource::class;
    }

    public function index()
    {
        return view('admin.reservations.index');
    }

    public function pagination()
    {
        $pagination = new PaginationBuilder();
        return $pagination->repository($this->repository)
            ->defaultOrderBy('created_at', 'DESC')
            ->resource($this->resource);
    }
}
