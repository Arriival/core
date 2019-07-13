@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">پرسنل</h3>
            <div class="card-tools">
                <a class="btn btn-app" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fa fa-search text-info"></i>جستجو
                </a>
                <a class="btn btn-app" href="{{route('personnel.create')}}">
                    <i class="fa fa-plus text-success"></i>ثبت
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{url('personnel')}}" method="GET">
                <div class="row searchBox collapse" id="collapseExample">
                    <div class="form-group form-group-sm col-sm-3">
                        <input id="firstName" name="firstName" type="text" class="form-control" placeholder="نام" value="{{ $request->firstName}}">
                    </div>
                    <div class="form-group form-group-sm col-sm-3">
                        <input id="firstName" name="lastName" type="text" class="form-control" placeholder="نام خانوادگی" value="">
                    </div>
                    <div class="form-group form-group-sm col-sm-3">
                        <input id="firstName" name="code" type="text" class="form-control" placeholder="کد ملی" value="">
                    </div>
                    <div class="form-group form-group-sm col-sm-3">
                        <input id="firstName" name="fatherName" type="text" class="form-control" placeholder="نام پدر" value="">
                    </div>
                    <div class="form-group form-group-sm col-sm-3"></div>
                    <div class="form-group form-group-sm col-sm-3"></div>
                    <div class="form-group form-group-sm col-sm-3"></div>
                    <div class="form-group form-group-sm col-sm-3">
                        <input type="submit" class="btn btn-block btn-outline-primary " value="جستجو">
                    </div>
                </div>
            </form>
            <div class="row mt-3">
                @foreach ($personnel as $person)
                    <div class="col-sm-3 col-xl-3 ">
                        <div class="card  card-primary card-outline grid-shadow">
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
                                </ul>
                                <div class="btn-group btn-block text-center">
                                    <a href="{{route('personnel.edit', [$person->id])}}" class="btn btn-primary btn-block"><b>جزئیات</b></a>
                                    <a href="" class="btn btn-danger " onclick="deleteUser('{{url('/personnel', [$person->id])}}')"><b>حذف</b></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            {{$personnel->links()}}

        </div>
    </div>


    <script type="text/javascript">

        function deleteUser(url) {
            $.ajax({
                url: url,
                type: 'DELETE',
                contentType: 'application/json; charset=utf-8',
                success: function () {
                }
            });
            /*$.confirm({
                title: 'تایید حذف',
                content: 'آیا از حذف اطلاعات اطمینان دارید؟',
                type: 'orange',
                typeAnimated: true,
                buttons: {
                    confirm: {
                        text: 'تایید',
                        btnClass: 'btn-red',
                        action: function () {
                            $.ajax({
                                url: url,
                                type: 'DELETE',
                                contentType: 'application/json; charset=utf-8',
                                success: function () {
                                }
                            });
                        }
                    },
                    cancel: {
                        text: 'انصراف',
                        action: function () {
                        }
                    }
                }
            });*/


        }


    </script>

@endsection