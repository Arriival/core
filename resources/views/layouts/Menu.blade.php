<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <?php
    function createTree($action)
    {
        $is_sub = count($action['sub_menu']) > 0;
        $is_select = strpos(\Illuminate\Support\Facades\Request::url(), url($action['route']));
        $menu = '<li class="nav-item ' . ($is_sub ? ' has-treeview ' : '').'">';
        $menu .= '<a href="' . url($action['route']) . '" class="nav-link ' . ($is_select !== false ? 'active' : '') . '">';
        $menu .= '<i class="nav-icon ' . $action['icon'] . '"></i>';
        $menu .= '<p>';
        $menu .= $action['title'];
        $menu .= ($is_sub ? '<i class="fa fa-angle-left right"></i>' : '');
        $menu .= '</p>';
        $menu .= '</a>';
        if ($is_sub) {
            $menu .= '<ul class="nav nav-treeview" style="display: none;">';
            foreach ($action['sub_menu'] as $sub) {
                $menu .= createTree($sub);
            }
            $menu .= '</ul>';
        }
        $menu .= '</li>';
        return $menu;
    }
    $menuEcho = '';

    foreach ($actions as $action) {
        $menuEcho .= createTree($action);
    }
    echo $menuEcho;
    ?>
</ul>
