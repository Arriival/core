@extends('layouts.master')
@section('content')
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
        }


    </script>

@endsection