@extends('layouts.app')

@section('page-header')
  <h1>
    <i class="fas fa-tachometer-alt fa-fw mr-2 text-muted"></i>
    @lang('headings.common.home')
  </h1>
  
  <breadcrumb>
    <breadcrumb-item active>
      @lang('headings.common.home')
    </breadcrumb-item>
  </breadcrumb>
@endsection

@section('content')
  <div class="row">
    <div class="card card-body">
      <div class="row">
        <div class="col-lg-4 col-md-8 col-sm-8 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="fas fa-user-shield"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>@lang('headings.common.admins')</h4>
              </div>
              <div class="card-body">
                {{ $adminsCount }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-8 col-sm-8 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>@lang('headings.common.clients')</h4>
              </div>
              <div class="card-body">
                {{ $clientsCount }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-8 col-sm-8 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="fas fa-hotel"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>@lang('headings.hotels.label')</h4>
              </div>
              <div class="card-body">
                {{ $hotelsCount }}
              </div>
            </div>
          </div>
        </div>
  
        <div class="col-lg-4 col-md-8 col-sm-8 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-success">
              <i class="fas fa-th"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>@lang('headings.categories.label')</h4>
              </div>
              <div class="card-body">
                {{ $categoriesCount }}
              </div>
            </div>
          </div>
        </div>
  
        <div class="col-lg-4 col-md-8 col-sm-8 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-dark">
              <i class="fas fa-bed"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>@lang('headings.rooms.label')</h4>
              </div>
              <div class="card-body">
                {{ $roomsCount }}
              </div>
            </div>
          </div>
        </div>
  
        <div class="col-lg-4 col-md-8 col-sm-8 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-info">
              <i class="fas fa-bed"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>@lang('headings.reservations.label')</h4>
              </div>
              <div class="card-body">
                {{ $roomsCount }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
