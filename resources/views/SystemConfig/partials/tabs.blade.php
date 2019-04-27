<ul class="nav nav-tabs md-tabs tabs-left b-none" role="tablist">
  <li class="nav-item">
    <a class="nav-link {{ $active == 'exitPermission' ? 'active' : '' }}" href="{{ route('admin.SystemConfig.subPage', 'exitPermission') }}" role="tab"><i class="fas fa-sign-out-alt"></i> Bon de sortie</a>
    <div class="slide"></div>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ $active == 'administrations' ? 'active' : '' }}" href="{{ route('admin.SystemConfig.subPage', 'administrations') }}" role="tab"><i class="fas fa-building"></i> Administrations</a>
    <div class="slide"></div>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ $active == 'lifebase' ? 'active' : '' }}" href="{{ route('admin.SystemConfig.subPage', 'lifebase') }}" role="tab"><i class="fas fa-bed"></i> Bases de vie</a>
    <div class="slide"></div>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ $active == 'notations' ? 'active' : '' }}" href="{{ route('admin.SystemConfig.subPage', 'notations') }}" role="tab"><i class="fas fa-star"></i> Notations</a>
    <div class="slide"></div>
  </li>
</ul>
