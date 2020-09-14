<?php

namespace App\Http\Controllers\Admin;

use App\Builders\PaginationBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HotelRequest;
use App\Http\Resources\Admin\RoomResource;
use App\Models\Hotel;
use App\Repositories\RoomRepository;

class RoomController extends Controller
{
    protected $repository;
    protected $resource;

    public function __construct()
    {
        $this->repository = new RoomRepository();
        $this->resource = RoomResource::class;
    }

    public function index()
    {
        return view('admin.rooms.index');
    }

    public function create()
    {
        return view('admin.rooms.create');
    }

    public function store(HotelRequest $request)
    {
        $data = $request->validated();
        $this->repository->create($data);

        $message = _m('common.success.create');
        return $this->chooseReturn('success', $message, 'admin.rooms.index');
    }

    public function edit(Hotel $hotel)
    {
        return view('admin.rooms.edit', compact('hotel'));
    }

    public function update(HotelRequest $request, Hotel $hotel)
    {
        $data = $request->validated();
        $hotel->update($data);

        $message = _m('common.success.update');
        return $this->chooseReturn('success', $message, 'admin.rooms.index');
    }

    public function show(Hotel $hotel)
    {
        return view('admin.rooms.show', compact('hotel'));
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
