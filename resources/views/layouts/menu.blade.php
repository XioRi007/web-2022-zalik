<li class="nav-item {{ Request::is('people*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('people.index') }}">
        <i class="nav-icon icon-cursor"></i>
        <span>People</span>
    </a>
</li>
