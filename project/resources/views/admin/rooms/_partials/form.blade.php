@csrf
<div class="form-row">
  <div class="form-group col-6">
    <label for="name">@lang('labels.common.name')</label>
    <input
      id="name"
      type="text"
      class="form-control"
      name="name"
      tabindex="1"
      required
      placeholder="@lang('placeholders.rooms.name')"
      value="{{ old('name', $room->name ?? '') }}"
      autofocus>
    <div class="is-invalid text-danger">{{ $errors->first('name') }}</div>
  </div>
  
  <div class="form-group col-6">
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
</div>