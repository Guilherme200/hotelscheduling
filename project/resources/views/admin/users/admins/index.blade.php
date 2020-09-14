@extends('layouts.app')

@section('page-header')
  <h1>
    <i class="fas fa-user-shield fa-fw mr-2 text-muted"></i>
    @lang('headings.admin.label')
  </h1>
  
  <breadcrumb>
    <breadcrumb-item active>
      @lang('headings.admin.label')
    </breadcrumb-item>
  </breadcrumb>
@endsection

@section('content')
  <data-list
    data-source="{{ route('pagination.admin.admins') }}"
    url-create="{{ route('admin.admins.create') }}"
    label-create="@lang('links.common.create')">
  </data-list>
  
  <template id="data-list" slot-scope="modelScope">
    <div>
      <div class="card">
        <div class="card-header p-2">
          @include('admin.users.tabs')
        </div>
        <div class="card-header">
          <input
            type="text"
            v-model="query"
            class="form-control col-md-4 mb-2 mb-md-0"
            placeholder="@lang('placeholders.common.search')">
          
          @can('admin create')
            <div class="col-md-4 offset-md-4 text-right">
              <a v-if="urlCreate" class="btn btn-success" :href="urlCreate" data-toggle="tooltip"
                 :title="labelCreate">
                <i class="fas fa-plus fa-fw"></i>
                @{{ labelCreate }}
              </a>
            </div>
          @endcan
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-striped table-md table-vcenter mb-0">
              <thead>
              @include('admin.users.admins._partials.head')
              </thead>
              <tbody>
              <tr v-if="emptyResult">
                @include('shared.empty_table')
              </tr>
              <template v-else>
                <tr v-for="(item, index) in items" :key="index">
                  @include('admin.users.admins._partials.body')
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