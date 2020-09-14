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
      placeholder="@lang('placeholders.categories.name')"
      value="{{ old('name', $category->name ?? '') }}"
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
      placeholder="@lang('placeholders.categories.description')"
      value="{{ old('description', $category->description ?? '') }}"
      required
      autofocus>
    <div class="is-invalid text-danger">{{ $errors->first('description') }}</div>
  </div>
</div>