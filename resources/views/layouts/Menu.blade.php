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
    {{--<li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fa fa-edit"></i>
            <p>
                فرم‌ها
                <i class="fa fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview" style="display: none;">
            <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                    <i class="fa fa-circle-o nav-icon"></i>
                    <p>اجزا عمومی</p>
                </a>
            </li>
        </ul>
    </li>--}}
</ul>


