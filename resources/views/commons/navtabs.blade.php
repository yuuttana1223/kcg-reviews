<ul class="nav nav-tabs">
    
    <li class="nav-item">
        <a href="{{ route('reviews.index', []) }}" class="nav-link {{ Request::routeIs('reviews.index') ? 'active' : '' }}">
            授業評価
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('messages.index', []) }}" class="nav-link {{ Request::routeIs('messages.index') ? 'active' : '' }}">
            掲示板
        </a>
    </li>
</ul>