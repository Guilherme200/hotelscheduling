@extends('layouts.auth')

@section('content')
  <div class="card">
    <h2 class="text-center mt-5 text-primary">@lang('headings.auth.login')</h2>
    
    <div class="card-body">
      <form method="POST" action="{{ route('login') }}" class="needs-validation">
        @csrf
        <div class="form-group">
          <label for="email">@lang('labels.common.email')</label>
          <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
          <div class="is-invalid text-danger">{{ $errors->first('email') }}</div>
        </div>
        
        <div class="form-group">
          <label for="email">@lang('labels.common.password')</label>
          <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
          <div class="is-invalid text-danger">{{ $errors->first('password') }}</div>
        </div>
        
        <div class="form-group mt-4">
          <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
            @lang('buttons.common.login')
          </button>
        </div>
      </form>
      
      <div class="text-center mt-5 mb-3">
        <div class="mt-3 text-muted text-center">
          @lang('phrases.auth.not_account') <a href="#">@lang('links.auth.register')</a>
        </div>
      </div>
    </div>
  </div>
@endsection
