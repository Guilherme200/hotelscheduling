@extends('layouts.app')

@section('page-header')
  <h1>
    <i class="fas fa-user fa-fw mr-2 text-muted"></i>
    @lang('headings.categories.create')
  </h1>
  <breadcrumb>
    <breadcrumb-item href="{{ route('admin.categories.index') }}">
      @lang('headings.categories.index')
    </breadcrumb-item>
    
    <breadcrumb-item active>
      @lang('headings.categories.create')
    </breadcrumb-item>
  </breadcrumb>
@endsection

@section('content')
  <div class="card card-secondary">
    <form class="form-horizontal" method="POST" action="{{ route('admin.categories.store') }}">
      <div class="card-body pb-0">
        @include('admin.categories._partials.form')
      </div>
      <div class="card-footer">
        @include('shared.create_buttons', ['urlBack' => route('admin.categories.index')])
      </div>
    </form>
  </div>
@endsection