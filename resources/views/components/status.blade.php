<ul class="nav nav-tabs my-3">
    <li class="nav-item">
        <a class="nav-link {{ Request::is('task') ? 'active' : '' }}" href="">All Task</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('open-task') ? 'active' : '' }}" href="">Open</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('inprogress-task') ? 'active' : '' }}" href="">In-progress</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('done-task') ? 'active' : '' }}" href="">Done</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::is('canceled-task') ? 'active' : '' }}" href="">Canceled</a>
    </li>
</ul>
