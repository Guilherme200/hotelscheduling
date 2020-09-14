<nav class="nav nav-pills">
  <a class="nav-link {{ is_active('admin.admins.index', 'active', true) }}"
     href="{{ route('admin.admins.index') }}">
    <i class="fas fa-user-shield fa-fw mr-2"></i>
    @lang('headings.common.admins')
  </a>
  
  <a class="nav-link {{ is_active('admin.clients.index', 'active', true) }}"
     href="{{ route('admin.clients.index') }}">
    <i class="fas fa-user fa-fw mr-2"></i>
    @lang('headings.common.users')
  </a>
</nav>
