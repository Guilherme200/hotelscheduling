@extends('layouts.app')

@section('page-header')
  <h1>
    <i class="fas fa-hotel fa-fw mr-2 text-muted"></i>
    @lang('headings.rooms.show')
  </h1>
  <breadcrumb>
    <breadcrumb-item href="{{ route('admin.rooms.index') }}">
      @lang('headings.rooms.index')
    </breadcrumb-item>
    
    <breadcrumb-item active>
      @lang('headings.rooms.show')
    </breadcrumb-item>
  </breadcrumb>
@endsection

@section('content')
  <div class="card card-secondary">
    <div class="card-body pb-0">
      <div class="form-row">
        <div class="form-group col-6">
          <label for="email">@lang('labels.common.hotel')</label>
          <select class="custom-select" id="hotel" name="hotel_id" disabled>
            <option selected value="">@lang('placeholders.rooms.hotel')</option>
            @foreach($hotels as $item)
              <option
                value="{{ $item->id }}"
                {{ form_item_selected($item->id, old('hotel_id',$room->hotel_id ?? ''))  }}>
                {{ $item->name }}
              </option>
            @endforeach
          </select>
        </div>
        
        <div class="form-group col-6">
          <label for="email">@lang('labels.common.category')</label>
          <select class="custom-select" id="category" name="category_id" disabled>
            <option selected value="">@lang('placeholders.rooms.category')</option>
            @foreach($categories as $item)
              <option
                value="{{ $item->id }}"
                {{ form_item_selected($item->id, old('category_id',$room->category_id ?? ''))  }}>
                {{ $item->name }}
              </option>
            @endforeach
          </select>
        </div>
      </div>
      
      <div class="form-row">
        <div class="form-group col-4">
          <label for="name">@lang('labels.common.number')</label>
          <input
            id="number"
            type="number"
            class="form-control"
            name="number"
            tabindex="1"
            disabled
            required
            placeholder="@lang('placeholders.rooms.number')"
            value="{{ old('number', $room->number ?? '') }}"
            autofocus>
          <div class="is-invalid text-danger">{{ $errors->first('number') }}</div>
        </div>
        
        <div class="form-group col-4">
          <label for="email">@lang('labels.common.description')</label>
          <input
            id="description"
            type="text"
            class="form-control"
            name="description"
            disabled
            tabindex="1"
            placeholder="@lang('placeholders.rooms.description')"
            value="{{ old('email', $room->description ?? '') }}"
            required
            autofocus>
          <div class="is-invalid text-danger">{{ $errors->first('email') }}</div>
        </div>
        
        <div class="form-group col-4">
          <label for="email">@lang('labels.common.capacity')</label>
          <input
            id="description"
            type="number"
            disabled
            class="form-control"
            name="capacity"
            tabindex="1"
            placeholder="@lang('placeholders.rooms.capacity')"
            value="{{ old('email', $room->capacity ?? '') }}"
            required
            autofocus>
          <div class="is-invalid text-danger">{{ $errors->first('capacity') }}</div>
        </div>
      </div>
      
      <div class="card-footer">
        @include('shared.show_buttons', [
        'urlBack' => route('admin.rooms.index'),
        'urlEdit' => route('admin.rooms.edit', $room->id)
        ])
      </div>
    </div>
  </div>
@endsection