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

        @include('layouts.sidebar._partials.admin')
    </aside>
</div>
