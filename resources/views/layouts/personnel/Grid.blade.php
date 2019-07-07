<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">پرسنل</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach ($personnel as $person)
                <div class="col-sm-3">
                    <!-- Profile Image -->
                    <div class="card  @if($person->isActive) card-success @else card-danger @endif card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user8-128x128.jpg" >
                            </div>
                            <h3 class="profile-username text-center">{{$person->firstName . " " . $person->lastName}}</h3>
                            <p class="text-muted text-center">مهندس نرم افزار</p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item text-center">
                                    {{$person->code}}
                                </li>
                                <li class="list-group-item text-center">
                                    {{$person->email}}
                                </li>
                            </ul>

                            <a href="#" class="btn btn-primary btn-block"><b>دنبال کردن</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <!-- /.card -->
                </div>
            @endforeach
        </div>


    </div>
    <!-- /.card-body -->
{{-- <div class="card-footer">
 </div>--}}
<!-- /.card-footer-->
</div>
<!-- /.card -->
