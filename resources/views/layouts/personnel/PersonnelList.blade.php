@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">انتخاب فرد</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-app" data-toggle="modal" data-target="#searchModal">
                    <i class="fa fa-search text-info"></i>جستجو
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row mt-3">
                <table id="grid" class="table table-striped" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="th-sm">ردیف</th>
                        <th class="th-sm">نام</th>
                        <th class="th-sm">نام خانوادگی</th>
                        <th class="th-sm">کد ملی</th>
                        <th class="th-sm">وضعیت</th>
                        <th class="th-sm text-left">عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($personnel as $person)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$person->firstName}}</td>
                            <td>{{$person->lastName}}</td>
                            <td>{{$person->code}}</td>
                            <td>{{$person->isActive}}</td>
                            <td align="left">
                                <!-- Basic dropdown -->
                                <a class="btn btn-md btn-info " type="button"
                                href="@if(\Illuminate\Support\Facades\Route::has(app('request')->input('base').'.'.app('request')->input('func'))) {{route(app('request')->input('base').'.'.app('request')->input('func'), ['person'=>$person->id])}} @endif">
                                    انتخاب</a>

                            {{--<div class="dropdown-menu">
                                <a class="dropdown-item" href=""><i class="  text-danger"></i>ویرایش</a>
                                <form method="POST" action="{{route('role.destroy', $person->id)}}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input type="submit" class="dropdown-item deleteEntity" onsubmit="return confirmDelete()" value="حذف">
                                </form>
                            </div>--}}
                            <!-- Basic dropdown -->
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
            {{$personnel->links()}}
        </div>
    </div>
@endsection
@section('searchBox')
    <section>
        <!-- Modal: modalPoll -->
        <div class="modal fade left" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true" data-backdrop="true" style="z-index: 99999 ">
            <form action="{{route('personnel.list')}}" method="GET">
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
                                    {{-- <div class="input-group-prepend">
                                         <span class="input-group-text md-addon" id="inputGroupMaterial-sizing-sm">نام</span>
                                     </div>--}}
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
    </section>
@endsection
