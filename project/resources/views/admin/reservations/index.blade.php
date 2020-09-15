@extends('layouts.app')

@section('page-header')
  <h1>
    <i class="far fa-calendar-check fa-fw mr-2 text-muted"></i>
    @lang('headings.reservations.label')
  </h1>
  
  <breadcrumb>
    <breadcrumb-item active>
      @lang('headings.reservations.label')
    </breadcrumb-item>
  </breadcrumb>
@endsection

@section('content')
  <data-list data-source="{{ route('pagination.admin.reservations') }}"></data-list>
  
  <template id="data-list" slot-scope="modelScope">
    <div>
      <div class="card">
        <div class="card-header">
          <input
            type="text"
            v-model="query"
            class="form-control col-md-12 mb-2 mb-md-0"
            placeholder="@lang('placeholders.common.search')">
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-striped table-md table-vcenter mb-0">
              <thead>
              @include('admin.reservations._partials.head')
              </thead>
              <tbody>
              <tr v-if="emptyResult">
                @include('shared.empty_table')
              </tr>
              <template v-else>
                <tr v-for="(item, index) in items" :key="index" class="text-center">
                  @include('admin.reservations._partials.body')
                </tr>
              </template>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </template>
@endsection