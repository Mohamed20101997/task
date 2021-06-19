<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user">
    <div>
      <p class="app-sidebar__user-name">{{auth()->user()->name}}</p>
      <p class="app-sidebar__user-designation">{{auth()->user()->email}}</p>
    </div>
  </div>
  <ul class="app-menu">
  <li><a class="app-menu__item  {{\Request::route()->getName() == 'company.index' ? 'active' : ''}}" href="{{ route('company.index') }}"><i class="app-menu__icon fa fa-building"></i><span class="app-menu__label">Companies</span></a></li>
  <li><a class="app-menu__item  {{\Request::route()->getName() == 'employee.index' ? 'active' : ''}}" href="{{ route('employee.index') }}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Employees</span></a></li>

  </ul>
</aside>
