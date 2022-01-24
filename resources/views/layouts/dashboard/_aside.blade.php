<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user">
    <div>
      <p class="app-sidebar__user-name">{{auth()->user()->name}}</p>
      <p class="app-sidebar__user-designation">{{auth()->user()->email}}</p>
    </div>
  </div>
  <ul class="app-menu">

  <li><a class="app-menu__item  {{\Request::route()->getName() == 'student.index' ? 'active' : ''}}" href="{{ route('student.index') }}"><i class="app-menu__icon fa fa-list-alt"></i><span class="app-menu__label">Students</span></a></li>
  <li><a class="app-menu__item  {{\Request::route()->getName() == 'student_result.index' ? 'active' : ''}}" href="{{ route('student_result.index') }}"><i class="app-menu__icon fa fa-list-alt"></i><span class="app-menu__label">Students Results</span></a></li>


  </ul>
</aside>
