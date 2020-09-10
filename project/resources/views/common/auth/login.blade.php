@extends('layouts.auth')

@section('content')
    <div class="card">
        <h2 class="text-center mt-5 text-primary">@lang('headings.auth.login')</h2>

        <div class="card-body">
            <form method="POST" action="#" class="needs-validation" novalidate="">
                <div class="form-group">
                    <label for="email">@lang('labels.common.email')</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">@lang('phrases.auth.not_email')</div>
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">@lang('labels.common.password')</label>
                        <div class="float-right">
                            <a href="#" class="text-small">
                                @lang('links.auth.forgot_your_password')
                            </a>
                        </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">@lang('phrases.auth.not_password')</div>
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
