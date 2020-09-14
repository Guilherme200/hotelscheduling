@csrf
@csrf

<div class="form-row">
  <div class="form-group col-sm-6">
    <label for="name">@lang('labels.common.name')<span class="text-danger ml-1">*</span>
    </label>
    <div class="input-group {{ has_error_class('name') }}">
      <input
        type="text"
        maxlength="50"
        name="name"
        class="form-control {{ has_error_class('name') }}"
        placeholder="@lang('placeholders.hotels.name')"
        value="{{ old('name', $hotel->name ?? '') }}"
        autofocus>
    </div>
    @if ($errors->has('name'))
      <div class="is-invalid text-danger">{{ $errors->first('name') }}</div>
    @endif
  </div>
  
  <div class="form-group col-sm-6">
    <label for="name">@lang('labels.common.phone')<span class="text-danger ml-1">*</span>
    </label>
    <div class="input-group {{ has_error_class('phone') }}">
      <input
        type="text"
        name="phone"
        class="form-control mask-phone {{ has_error_class('phone') }}"
        placeholder="@lang('placeholders.hotels.phone')"
        value="{{ old('phone', $hotel->phone ?? '') }}"
        autofocus>
    </div>
    @if ($errors->has('name'))
      <div class="is-invalid text-danger">{{ $errors->first('phone') }}</div>
    @endif
  </div>
</div>

<div class="form-row">
  <div class="form-group col-sm-6">
    <label for="name">@lang('labels.common.city')<span class="text-danger ml-1">*</span>
    </label>
    <div class="input-group {{ has_error_class('city') }}">
      <input
        type="text"
        name="city"
        class="form-control {{ has_error_class('city') }}"
        placeholder="@lang('placeholders.hotels.city')"
        value="{{ old('city', $hotel->city ?? '') }}"
        autofocus>
    </div>
    @if ($errors->has('name'))
      <div class="is-invalid text-danger">{{ $errors->first('city') }}</div>
    @endif
  </div>
  
  <div class="form-group col-sm-6">
    <label for="name">@lang('labels.common.complement')
    </label>
    <div class="input-group {{ has_error_class('complement') }}">
      <input
        type="text"
        name="complement"
        class="form-control {{ has_error_class('complement') }}"
        placeholder="@lang('placeholders.hotels.complement')"
        value="{{ old('complement', $hotel->complement ?? '') }}"
        autofocus>
    </div>
    @if ($errors->has('name'))
      <div class="is-invalid text-danger">{{ $errors->first('complement') }}</div>
    @endif
  </div>
</div>