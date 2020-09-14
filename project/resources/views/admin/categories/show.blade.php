@extends('layouts.app')

@section('page-header')
  <h1>
    <i class="fas fa-hotel fa-fw mr-2 text-muted"></i>
    @lang('headings.categories.show')
  </h1>
  <breadcrumb>
    <breadcrumb-item href="{{ route('admin.categories.index') }}">
      @lang('headings.categories.index')
    </breadcrumb-item>
    
    <breadcrumb-item active>
      @lang('headings.categories.show')
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
            <input type="text" class="form-control" value="{{ $category->name ?? '' }}" disabled>
          </div>
        </div>
        
        <div class="form-group col-sm-6">
          <label>@lang('labels.common.description')</label>
          <div class="input-group">
            <input type="text" class="form-control" value="{{ $category->email ?? '' }}" disabled>
          </div>
        </div>
      </div>
      
      <div class="form-row">
        <div class="form-group col-sm-6">
          <label>@lang('labels.common.created_at')</label>
          <div class="input-group">
            <input type="text" class="form-control" value="{{ $category->created_at ?? '' }}" disabled>
          </div>
        </div>
        
        <div class="form-group col-sm-6">
          <label>@lang('labels.common.updated_at')</label>
          <div class="input-group">
            <input type="text" class="form-control" value="{{ $category->updated_at ?? '' }}" disabled>
          </div>
        </div>
      </div>
      
      <div class="card-footer">
        @include('shared.show_buttons', [
        'urlBack' => route('admin.categories.index'),
        'urlEdit' => route('admin.categories.edit', $category->id)
        ])
      </div>
    </div>
  </div>
@endsection