@csrf
<div class="form-row">
  <div class="form-group col-6">
    <label for="email">@lang('labels.common.hotel')</label>
    <select class="custom-select" id="hotel" name="hotel_id">
      <option selected value="">@lang('placeholders.rooms.hotel')</option>
      @foreach($hotels as $hotel)
        <option value="{{ $hotel->id }}">
          {{ $hotel->name }}
        </option>
      @endforeach
    </select>
    <div class="is-invalid text-danger">{{ $errors->first('hotel_id') }}</div>
  </div>
  
  <div class="form-group col-6">
    <label for="email">@lang('labels.common.room')</label>
    <select class="custom-select" id="hotel" name="room_id">
      <option selected value="">@lang('placeholders.reservations.room')</option>
      @foreach($rooms as $room)
        <option value="{{ $room->id }}">
          {{ $room->number }} - {{ $room->description }}
        </option>
      @endforeach
    </select>
    <div class="is-invalid text-danger">{{ $errors->first('room_id') }}</div>
  </div>
</div>