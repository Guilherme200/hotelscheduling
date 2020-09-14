<div class="main-sidebar">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{ route('home') }}">
        @lang('labels.common.menu')
      </a>
    </div>
    
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{ route('home') }}">@lang('labels.common.menu')</a>
    </div>
    
    @if (current_user()->hasRole(\App\Enums\UserRolesEnum::ADMIN))
      @include('layouts.sidebar._partials.admin')
    @else
      @include('layouts.sidebar._partials.client')
    @endif
  </aside>
</div>
