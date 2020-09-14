<?php

namespace App\Http\Controllers\Admin;

use App\Builders\PaginationBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HotelRequest;
use App\Http\Resources\Admin\HotelResource;
use App\Models\Hotel;
use App\Repositories\HotelRepository;

class HotelController extends Controller
{
    protected $repository;
    protected $resource;

    public function __construct()
    {
        $this->repository = new HotelRepository();
        $this->resource = HotelResource::class;
    }

    public function index()
    {
        return view('admin.hotels.index');
    }

    public function create()
    {
        return view('admin.hotels.create');
    }

    public function store(HotelRequest $request)
    {
        $data = $request->validated();
        $this->repository->create($data);

        $message = _m('common.success.create');
        return $this->chooseReturn('success', $message, 'admin.hotels.index');
    }

    public function edit(Hotel $hotel)
    {
        return view('admin.hotels.edit', compact('hotel'));
    }

    public function update(HotelRequest $request, Hotel $hotel)
    {
        $data = $request->validated();
        $hotel = $hotel->update($data);

        $message = _m('common.success.update');
        return $this->chooseReturn('success', $message, 'admin.hotels.edit', $hotel);
    }

    public function show(Hotel $hotel)
    {
        return view('admin.hotels.show', compact('hotel'));
    }

    public function destroy(Hotel $hotel)
    {
        try {
            $hotel->delete();
            return $this->chooseReturn('success', _m('common.success.destroy'));
        } catch (\Exception $e) {
            return $this->chooseReturn('error', _m('common.error.destroy'));
        }
    }

    public function pagination()
    {
        $pagination = new PaginationBuilder();
        return $pagination->repository($this->repository)
            ->defaultOrderBy('created_at', 'DESC')
            ->resource($this->resource);
    }
}
