<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">پرسنل</h3>

        <div class="card-tools">
            <a class="btn btn-app" href="{{route('personnel.create')}}">
                <i class="fa fa-plus text-success"></i>ثبت
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="row mt-3">
            @foreach ($personnel as $person)
                <div class="col-sm-3 col-xl-4">
                    <!-- Profile Image -->
                    <div class="card  card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                {{----}}
                                <img class="img-fluid profile-user-img @if($person->isActive) active @else deActive @endif img-circle" src="../../dist/img/user8-128x128.jpg">
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

                            <a href="#" class="btn btn-primary btn-block"><b>جزئیات</b></a>
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
