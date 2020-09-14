<?php

namespace App\Http\Controllers\Admin;

use App\Builders\PaginationBuilder;
use App\Enums\UserRolesEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use App\Http\Resources\Admin\UserResource;
use App\Models\Hotel;
use App\Models\User;
use App\Repositories\Criterias\User\UserRole;
use App\Repositories\UserRepository;

class AdminController extends Controller
{
    protected $repository;
    protected $resource;

    public function __construct()
    {
        $this->repository = new UserRepository();
        $this->resource = UserResource::class;
    }

    public function index()
    {
        return view('admin.users.admins.index');
    }

    public function create()
    {
        return view('admin.users.admins.create');
    }

    public function store(AdminRequest $request)
    {
        $data = $request->validated();
        $admin = $this->repository->create($data);
        $admin->assignRole(UserRolesEnum::ADMIN);

        $message = _m('common.success.create');
        return $this->chooseReturn('success', $message, 'admin.admins.index');
    }

    public function edit(User $admin)
    {
        return view('admin.users.admins.edit', compact('admin'));
    }

    public function update(AdminRequest $request, User $admin)
    {
        $data = $request->validated();
        $admin = $this->repository->update($admin->id, $data);

        $message = _m('common.success.update');
        return $this->chooseReturn('success', $message, 'admin.admins.edit', $admin);
    }

    public function show(User $admin)
    {
        return view('admin.users.admins.show', compact('admin'));
    }

    public function destroy(User $admin)
    {
        try {
            $admin->delete();
            return $this->chooseReturn('success', _m('common.success.destroy'));
        } catch (\Exception $e) {
            return $this->chooseReturn('error', _m('common.error.destroy'));
        }
    }

    public function pagination()
    {
        $pagination = new PaginationBuilder();
        return $pagination->repository($this->repository)
            ->criterias(new UserRole(UserRolesEnum::ADMIN))
            ->defaultOrderBy('created_at', 'DESC')
            ->resource($this->resource);
    }
}
