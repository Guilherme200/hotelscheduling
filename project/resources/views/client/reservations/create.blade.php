@extends('layouts.app')

@section('page-header')
  <h1>
    <i class="fas fa-user fa-fw mr-2 text-muted"></i>
    @lang('headings.reservations.create')
  </h1>
  <breadcrumb>
    <breadcrumb-item href="{{ route('client.reservations.index') }}">
      @lang('headings.reservations.my')
    </breadcrumb-item>
    
    <breadcrumb-item active>
      @lang('headings.reservations.create')
    </breadcrumb-item>
  </breadcrumb>
@endsection

@section('content')
  <div class="card card-secondary">
    <form class="form-horizontal" method="POST" action="{{ route('client.reservations.store') }}">
      <div class="card-body pb-0">
        @include('client.reservations._partials.form')
      </div>
      <div class="card-footer">
        @include('shared.create_buttons', ['urlBack' => route('client.reservations.index')])
      </div>
    </form>
  </div>
@endsection