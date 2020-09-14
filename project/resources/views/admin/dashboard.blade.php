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
    </div>
  </div>
@endsection
