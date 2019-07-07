<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">خانه</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="card-body">
            @yield('bodyContent')
        </div>
        {{-- <div class="card-footer">
             @yield('cardFooter')
         </div>--}}
    </div>

</section>