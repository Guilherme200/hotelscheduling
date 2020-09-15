<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserRolesEnum;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\Criterias\User\UserRole;
use App\Repositories\HotelRepository;
use App\Repositories\ReservationRepository;
use App\Repositories\RoomRepository;
use App\Repositories\UserRepository;

class DashboardController extends Controller
{
    public function index()
    {
        $roomsCount = (new RoomRepository())->count();
        $hotelsCount = (new HotelRepository())->count();
        $categoriesCount = (new CategoryRepository())->count();
        $reservationsCount = (new ReservationRepository())->count();
        $adminsCount = (new UserRepository())->pushCriteria(new UserRole(UserRolesEnum::ADMIN))->count();
        $clientsCount = (new UserRepository())->pushCriteria(new UserRole(UserRolesEnum::CLIENT))->count();

        return view('admin.dashboard', compact(
            'adminsCount',
            'clientsCount',
            'hotelsCount',
            'categoriesCount',
            'roomsCount',
            'reservationsCount'
        ));
    }
}
