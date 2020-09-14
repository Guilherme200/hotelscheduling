@extends('layouts.app')

@section('page-header')
  <h1>
    <i class="fas fa-hotel fa-fw mr-2 text-muted"></i>
    @lang('headings.hotels.show')
  </h1>
  <breadcrumb>
    <breadcrumb-item href="{{ route('admin.hotels.index') }}">
      @lang('headings.hotels.index')
    </breadcrumb-item>
    
    <breadcrumb-item active>
      @lang('headings.hotels.show')
    </breadcrumb-item>
  </breadcrumb>
@endsection

@section('content')
  <div class="card card-secondary">
    <div class="card-body pb-0">
      <div class="form-row">
        <div class="form-group col-sm-6">
          <label>@lang('labels.common.name')</label>
          <div class="input-group">
            <input type="text" class="form-control" value="{{ $hotel->name ?? '' }}" disabled>
          </div>
        </div>
        
        <div class="form-group col-sm-6">
          <label>@lang('labels.common.phone')</label>
          <div class="input-group">
            <input type="text" class="form-control" value="{{ $hotel->phone ?? '' }}" disabled>
          </div>
        </div>
      </div>
      
      <div class="form-row">
        <div class="form-group col-sm-6">
          <label>@lang('labels.common.city')</label>
          <div class="input-group">
            <input type="text" class="form-control" value="{{ $hotel->city ?? '' }}" disabled>
          </div>
        </div>
        
        <div class="form-group col-sm-6">
          <label>@lang('labels.common.complement')</label>
          <div class="input-group">
            <input type="text" class="form-control" value="{{ $hotel->complement ?? '' }}" disabled>
          </div>
        </div>
      </div>
      
      <div class="card-footer">
        @include('shared.show_buttons', [
        'urlBack' => route('admin.hotels.index'),
        'urlEdit' => route('admin.hotels.edit', $hotel->id)
        ])
      </div>
    </div>
  </div>
@endsection