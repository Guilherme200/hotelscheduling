@extends('layouts.app')

@section('page-header')
  <h1>
    <i class="fas fa-user-shield fa-fw mr-2 text-muted"></i>
    @lang('headings.client.edit')
  </h1>
  <breadcrumb>
    <breadcrumb-item href="{{ route('admin.clients.index') }}">
      @lang('headings.client.index')
    </breadcrumb-item>
    
    <breadcrumb-item active>
      @lang('headings.client.edit')
    </breadcrumb-item>
  </breadcrumb>
@endsection

@section('content')
  <div class="card card-secondary">
    <form class="form-horizontal" method="POST" action="{{ route('admin.clients.update', $client) }}">
      @method('PUT')
      <div class="card-body pb-0">
        @include('admin.users.clients._partials.form')
      </div>
      <div class="card-footer">
        @include('shared.create_buttons', ['urlBack' => route('admin.clients.index')])
      </div>
    </form>
  </div>
@endsection