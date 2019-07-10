<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    @foreach ($actions as $action)
        <li class="nav-item">
            <a href="<?php echo url("$action->route") ?>" class="nav-link @if( strpos(\Illuminate\Support\Facades\Request::url(), url("$action->route"))  !== false ) active @endif">
                <i class="nav-icon {{ $action->icon }} "></i>
                <p>
                    {{ $action->title }}
                </p>
            </a>
        </li>
    @endforeach
</ul>