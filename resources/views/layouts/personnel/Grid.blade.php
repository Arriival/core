@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">پرسنل</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-app" data-toggle="modal" data-target="#searchModal">
                    <i class="fa fa-search text-info"></i>جستجو
                </button>
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
                                    <img class="img-fluid z-depth-1 rounded-circle @if($person->isActive) active @else deActive @endif " src="{{asset(Storage::url($person->image))}}" style="height: 150px ; width: 150px">
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
@section('searchBox')
    <section>
        <!-- Modal: modalPoll -->
        <div class="modal fade left" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true" data-backdrop="true" style="z-index: 99999 ">
            <form action="{{url('personnel')}}" method="GET">
                <div class="modal-dialog modal-fluid modal-full-height modal-left modal-notify modal-info" role="document">
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="white-text"><i class="fa fa-times text-white"></i></span>
                            </button>
                            <p class="heading lead">جستجو</p>
                        </div>

                        <!--Body-->
                        <div class="modal-body">

                            <div class="row">
                                <div class="md-form input-group input-group-sm mb-3 col-sm-6">
                                    <input id="firstName" name="firstName" type="text" class="form-control" placeholder="نام" value="{{ $request->firstName}}" aria-label="Sizing example input" aria-describedby="inputGroupMaterial-sizing-sm">
                                </div>
                                <div class="md-form input-group input-group-sm mb-3 col-sm-6">
                                    <input id="lastName" name="lastName" type="text" class="form-control" placeholder="نام خانوادگی" value="{{ $request->lastName}}" aria-label="Sizing example input" aria-describedby="inputGroupMaterial-sizing-sm">
                                </div>
                                <div class="md-form input-group input-group-sm mb-3  col-sm-6">
                                    <input type="text" class="form-control" placeholder="نام پدر" aria-label="Sizing example input" aria-describedby="inputGroupMaterial-sizing-sm">
                                </div>
                                <div class="md-form input-group input-group-sm mb-3  col-sm-6">
                                    <input id="code" name="code" type="text" class="form-control" placeholder="کد ملی" value="{{ $request->code}}" aria-label="Sizing example input" aria-describedby="inputGroupMaterial-sizing-sm">
                                </div>
                            </div>
                        </div>

                        <!--Footer-->
                        <div class="modal-footer justify-content-center">
                            <input type="submit" class="btn btn-primary waves-effect waves-light" value="اعمال فیلتر">
                            <a type="button" class="btn btn-outline-primary waves-effect">پاک کردن</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Modal: modalPoll -->
    </section>
    <!-- Modal: modalPoll -->
@endsection

@section('javaScript')

@endsection