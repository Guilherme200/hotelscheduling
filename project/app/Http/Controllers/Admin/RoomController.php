<?php

namespace App\Http\Controllers\Admin;

use App\Builders\PaginationBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HotelRequest;
use App\Http\Requests\Admin\RoomRequest;
use App\Http\Resources\Admin\RoomResource;
use App\Models\Category;
use App\Models\Hotel;
use App\Models\Room;
use App\Repositories\CategoryRepository;
use App\Repositories\HotelRepository;
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
        $hotels = (new HotelRepository())->all();
        $categories = (new CategoryRepository())->all();

        return view('admin.rooms.create', compact('hotels', 'categories'));
    }

    public function store(RoomRequest $request)
    {
        $data = $request->validated();
        $this->repository->create($data);

        $message = _m('common.success.create');
        return $this->chooseReturn('success', $message, 'admin.rooms.index');
    }

    public function edit(Room $room)
    {
        $hotels = (new HotelRepository())->all();
        $categories = (new CategoryRepository())->all();

        return view('admin.rooms.edit', compact('room', 'hotels', 'categories'));
    }

    public function update(RoomRequest $request, Room $room)
    {
        $data = $request->validated();
        $room->update($data);

        $message = _m('common.success.update');
        return $this->chooseReturn('success', $message, 'admin.rooms.index');
    }

    public function show(Room $room)
    {
        $hotels = (new HotelRepository())->all();
        $categories = (new CategoryRepository())->all();

        return view('admin.rooms.show', compact('room', 'hotels', 'categories'));
    }

    public function destroy(Room $room)
    {
        try {
            $room->delete();
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
