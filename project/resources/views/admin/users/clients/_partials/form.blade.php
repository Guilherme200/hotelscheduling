@csrf
<div class="form-group">
  <label for="name">@lang('labels.common.name')</label>
  <input
    id="name"
    type="text"
    class="form-control"
    name="name"
    tabindex="1"
    required
    value="{{ old('name', $client->name ?? '') }}"
    autofocus>
  <div class="is-invalid text-danger">{{ $errors->first('name') }}</div>
</div>

<div class="form-group">
  <label for="email">@lang('labels.common.email')</label>
  <input
    id="email"
    type="email"
    class="form-control"
    name="email"
    tabindex="1"
    value="{{ old('email', $client->email ?? '') }}"
    required
    autofocus>
  <div class="is-invalid text-danger">{{ $errors->first('email') }}</div>
</div>

<div class="form-group">
  <label for="email">@lang('labels.common.password')</label>
  <input id="password" type="password" class="form-control" name="password" tabindex="2">
  <div class="is-invalid text-danger">{{ $errors->first('password') }}</div>
</div>

<div class="form-group">
  <label for="email">@lang('labels.common.password_confirmation')</label>
  <input
    id="password_confirmation"
    type="password"
    class="form-control"
    name="password_confirmation"
    tabindex="2">
  <div class="is-invalid text-danger">{{ $errors->first('password_confirmation') }}</div>
</div>