<?php

namespace App\Http\Controllers\Client;

use App\Builders\PaginationBuilder;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\ReservationRequest;
use App\Http\Resources\Client\ReservationResource;
use App\Models\Reservation;
use App\Repositories\Criterias\Common\Where;
use App\Repositories\Criterias\Common\WhereHas;
use App\Repositories\HotelRepository;
use App\Repositories\ReservationRepository;
use App\Repositories\RoomRepository;

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
        return view('client.reservations.index');
    }

    public function create()
    {
        $rooms = (new RoomRepository())->all();
        $hotels = (new HotelRepository())->all();

        return view('client.reservations.create', compact('rooms', 'hotels'));
    }

    public function store(ReservationRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = current_user()->id;
        $this->repository->create($data);

        $message = _m('common.success.create');
        return $this->chooseReturn('success', $message, 'client.reservations.index');
    }

    public function destroy(Reservation $reservation)
    {
        try {
            $reservation->delete();
            return $this->chooseReturn('success', _m('common.success.destroy'));
        } catch (\Exception $e) {
            return $this->chooseReturn('error', _m('common.error.destroy'));
        }
    }

    public function pagination()
    {
        $pagination = new PaginationBuilder();
        return $pagination->repository($this->repository)
            ->criterias(new Where('user_id', current_user()->id))
            ->defaultOrderBy('created_at', 'DESC')
            ->resource($this->resource);
    }
}
