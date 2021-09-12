<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
  <div class="app-sidebar__user">
    <div>
      <p class="app-sidebar__user-name">{{auth()->user()->name}}</p>
      <p class="app-sidebar__user-designation">{{auth()->user()->email}}</p>
    </div>
  </div>
  <ul class="app-menu">

  <li><a class="app-menu__item  {{\Request::route()->getName() == 'setting.show' ? 'active' : ''}}" href="{{ route('setting.show') }}"><i class="app-menu__icon fa fa-cogs"></i><span class="app-menu__label">Settings</span></a></li>

  <li><a class="app-menu__item  {{\Request::route()->getName() == 'category.index' ? 'active' : ''}}" href="{{ route('category.index') }}"><i class="app-menu__icon fa fa-list-alt"></i><span class="app-menu__label">Categories</span></a></li>

  <li><a class="app-menu__item  {{\Request::route()->getName() == 'tag.index' ? 'active' : ''}}" href="{{ route('tag.index') }}"><i class="app-menu__icon fa fa-tag"></i><span class="app-menu__label">tags</span></a></li>

  <li><a class="app-menu__item  {{\Request::route()->getName() == 'author.index' ? 'active' : ''}}" href="{{ route('author.index') }}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Authors</span></a></li>

  <li><a class="app-menu__item  {{\Request::route()->getName() == 'article.index' ? 'active' : ''}}" href="{{ route('article.index') }}"><i class="app-menu__icon fa fa-newspaper-o"></i><span class="app-menu__label">Articles</span></a></li>

  <li><a class="app-menu__item  {{\Request::route()->getName() == 'comment.index' ? 'active' : ''}}" href="{{ route('comment.index') }}"><i class="app-menu__icon fa fa-comments"></i><span class="app-menu__label">Comments</span></a></li>

  </ul>
</aside>
