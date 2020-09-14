<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
  <ul class="navbar-nav">
    <li>
      <a href="#"
         data-toggle="sidebar"
         class="nav-link nav-link-lg">
        <i class="fas fa-bars"></i>
      </a>
    </li>
  </ul>
  <div class="navbar-brand mr-auto">
    <span class="d-sm-inline-block">{{ config('app.name') }}</span>
  </div>
  <ul class="navbar-nav navbar-right">
    <li class="dropdown">
      <a href="#"
         data-toggle="dropdown"
         class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="avatar" src="{{ asset('assets/img/avatar.png') }}" class="rounded-circle mr-1">
        <div class="d-sm-none ">Admin</div>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-title">Ações</div>
        <a href="#" class="dropdown-item has-icon">
          <i class="far fa-user"></i>
          Perfil
        </a>
        <div class="dropdown-divider"></div>
        <a href="#!" class="dropdown-item has-icon text-danger"
           onclick="event.preventDefault(); document.getElementById('logout-navbar').submit();">
          <i class="fas fa-sign-out-alt"></i>
          @lang('links.common.logout')
        </a>
        <form id="logout-navbar" action="{{route('logout')}}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
    </li>
  </ul>
</nav>
