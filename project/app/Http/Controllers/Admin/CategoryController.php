<?php

namespace App\Http\Controllers\Admin;

use App\Builders\PaginationBuilder;
use App\Enums\UserRolesEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Resources\Admin\CategoryResource;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Repositories\Criterias\User\UserRole;

class CategoryController extends Controller
{
    protected $repository;
    protected $resource;

    public function __construct()
    {
        $this->repository = new CategoryRepository();
        $this->resource = CategoryResource::class;
    }

    public function index()
    {
        return view('admin.categories.index');
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $this->repository->create($data);

        $message = _m('common.success.create');
        return $this->chooseReturn('success', $message, 'admin.categories.index');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);

        $message = _m('common.success.update');
        return $this->chooseReturn('success', $message, 'admin.categories.index', $category);
    }

    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    public function destroy(Category $category)
    {
        try {
            $category->delete();
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
