<ul class="sidebar-menu">
  <li class="active">
    <a class="nav-link"
       href="{{ route('home') }}"
       data-toggle="tooltip"
       data-placement="right"
       title="@lang('links.common.home')">
      <i class="fas fa-tachometer-alt"></i>
      <span>@lang('links.common.home')</span>
    </a>
  </li>
  
  <li class="active">
    <a class="nav-link"
       href="{{ route('admin.admins.index') }}"
       data-toggle="tooltip"
       data-placement="right"
       title="@lang('links.common.users')">
      <i class="fas fa-users"></i>
      <span>@lang('links.common.users')</span>
    </a>
  </li>
  
  <li class="active">
    <a class="nav-link"
       href="{{ route('admin.hotels.index') }}"
       data-toggle="tooltip"
       data-placement="right"
       title="@lang('links.common.hotels')">
      <i class="fas fa-hotel"></i>
      <span>@lang('links.common.hotels')</span>
    </a>
  </li>
  
  <li class="active">
    <a class="nav-link"
       href="{{ route('admin.categories.index') }}"
       data-toggle="tooltip"
       data-placement="right"
       title="@lang('links.common.categories')">
      <i class="fas fa-th"></i>
      <span>@lang('links.common.categories')</span>
    </a>
  </li>
  
  <li class="active">
    <a class="nav-link"
       href="{{ route('admin.rooms.index') }}"
       data-toggle="tooltip"
       data-placement="right"
       title="@lang('links.common.rooms')">
      <i class="fas fa-bed"></i>
      <span>@lang('links.common.rooms')</span>
    </a>
  </li>
</ul>
