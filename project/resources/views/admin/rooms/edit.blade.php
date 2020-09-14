@extends('layouts.app')

@section('page-header')
  <h1>
    <i class="fas fa-user-shield fa-fw mr-2 text-muted"></i>
    @lang('headings.rooms.edit')
  </h1>
  <breadcrumb>
    <breadcrumb-item href="{{ route('admin.rooms.index') }}">
      @lang('headings.rooms.index')
    </breadcrumb-item>
    
    <breadcrumb-item active>
      @lang('headings.rooms.edit')
    </breadcrumb-item>
  </breadcrumb>
@endsection

@section('content')
  <div class="card card-secondary">
    <form class="form-horizontal" method="POST" action="{{ route('admin.rooms.update', $room) }}">
      @method('PUT')
      <div class="card-body pb-0">
        @include('admin.rooms._partials.form')
      </div>
      <div class="card-footer">
        @include('shared.create_buttons', ['urlBack' => route('admin.rooms.index')])
      </div>
    </form>
  </div>
@endsection