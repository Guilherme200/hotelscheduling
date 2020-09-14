<?php

namespace App\Http\Controllers\Admin;

use App\Builders\PaginationBuilder;
use App\Enums\UserRolesEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminRequest;
use App\Http\Resources\Admin\UserResource;
use App\Models\User;
use App\Repositories\Criterias\User\UserRole;
use App\Repositories\UserRepository;

class ClientController extends Controller
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
        return view('admin.users.clients.index');
    }

    public function create()
    {
        return view('admin.users.clients.create');
    }

    public function store(AdminRequest $request)
    {
        $data = $request->validated();
        $admin = $this->repository->create($data);
        $admin->assignRole(UserRolesEnum::CLIENT);

        $message = _m('common.success.create');
        return $this->chooseReturn('success', $message, 'admin.clients.index');
    }

    public function edit(User $client)
    {
        return view('admin.users.clients.edit', compact('client'));
    }

    public function update(AdminRequest $request, User $client)
    {
        $data = $request->validated();
        $client = $this->repository->update($client->id, $data);

        $message = _m('common.success.update');
        return $this->chooseReturn('success', $message, 'admin.clients.edit', $client);
    }

    public function show(User $client)
    {
        return view('admin.users.clients.show', compact('client'));
    }

    public function destroy(User $client)
    {
        try {
            $client->delete();
            return $this->chooseReturn('success', _m('common.success.destroy'));
        } catch (\Exception $e) {
            return $this->chooseReturn('error', _m('common.error.destroy'));
        }
    }

    public function pagination()
    {
        $pagination = new PaginationBuilder();
        return $pagination->repository($this->repository)
            ->criterias(new UserRole(UserRolesEnum::CLIENT))
            ->defaultOrderBy('created_at', 'DESC')
            ->resource($this->resource);
    }
}
