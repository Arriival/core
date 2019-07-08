<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    @foreach (App\Action::all() as $action)
        <li class="nav-item">
            <a href="<?php echo url("$action->route") ?>" class="nav-link @if( url("$action->route") == \Illuminate\Support\Facades\Request::url()) active @endif">
                <i class="nav-icon {{ $action->icon }} "></i>
                <p>
                    {{ $action->title }}
                </p>
            </a>
        </li>
    @endforeach
</ul>