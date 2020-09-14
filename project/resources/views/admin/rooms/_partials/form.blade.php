@csrf
<div class="form-row">
  <div class="form-group col-6">
    <label for="email">@lang('labels.common.hotel')</label>
    <select class="custom-select" id="hotel" name="hotel_id">
      <option selected value="">@lang('placeholders.rooms.hotel')</option>
      @foreach($hotels as $item)
        <option
          value="{{ $item->id }}"
          {{ form_item_selected($item->id, old('hotel_id',$room->hotel_id ?? ''))  }}>
          {{ $item->name }}
        </option>
      @endforeach
    </select>
    <div class="is-invalid text-danger">{{ $errors->first('hotel_id') }}</div>
  </div>
  
  <div class="form-group col-6">
    <label for="email">@lang('labels.common.category')</label>
    <select class="custom-select" id="category" name="category_id">
      <option selected value="">@lang('placeholders.rooms.category')</option>
      @foreach($categories as $item)
        <option
          value="{{ $item->id }}"
          {{ form_item_selected($item->id, old('category_id',$room->category_id ?? ''))  }}>
          {{ $item->name }}
        </option>
      @endforeach
    </select>
    <div class="is-invalid text-danger">{{ $errors->first('category_id') }}</div>
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