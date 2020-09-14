@extends('layouts.app')

@section('page-header')
  <h1>
    <i class="fas fa-user-shield fa-fw mr-2 text-muted"></i>
    @lang('headings.admin.edit')
  </h1>
  <breadcrumb>
    <breadcrumb-item href="{{ route('admin.admins.index') }}">
      @lang('headings.admin.index')
    </breadcrumb-item>
    
    <breadcrumb-item active>
      @lang('headings.admin.edit')
    </breadcrumb-item>
  </breadcrumb>
@endsection

@section('content')
  <div class="card card-secondary">
    <form class="form-horizontal" method="POST" action="{{ route('admin.admins.update', $admin) }}">
      @method('PUT')
      <div class="card-body pb-0">
        @include('admin.users.admins._partials.form')
      </div>
      <div class="card-footer">
        @include('shared.create_buttons', ['urlBack' => route('admin.admins.index')])
      </div>
    </form>
  </div>
@endsection