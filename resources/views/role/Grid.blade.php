@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">گروه های کاربری</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-app" data-toggle="modal" data-target="#searchModal">
                    <i class="fa fa-search text-info"></i>جستجو
                </button>
                <button type="button" class="btn btn-app" data-toggle="modal" data-target="#editModal">
                    <i class="fa fa-plus text-success"></i>ثبت
                </button>
                {{--<a class="btn btn-app" href="{{route('role.create')}}">
                    <i class="fa fa-plus text-success"></i>ثبت
                </a>--}}
            </div>
        </div>
        <div class="card-body">
            <div class="row mt-3">
                <table id="grid" class="table table-striped" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="th-sm">ردیف
                        </th>
                        <th class="th-sm">نام گروه
                        </th>
                        <th class="th-sm text-left">عملیات
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$role->name}}</td>
                            <td align="left">
                                <!-- Basic dropdown -->
                                <a class="btn btn-md btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">عملیات</a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#"><i class="  text-danger"></i>ویرایش</a>
                                    <a class="dropdown-item" onclick="deleteEntity('{{url('/role', [$role->id])}}')"><i class="  text-danger"></i>حذف</a>
                                </div>
                                <!-- Basic dropdown -->
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
            {{$roles->links()}}
        </div>
    </div>

@endsection

@section('searchBox')
    <section>
        <div class="modal fade left" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true" data-backdrop="true" style="z-index: 99999 ">
            <form action="{{url('role')}}" method="GET">
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
                        <div class="modal-body searchBox">

                            <div class="row">
                                <div class="md-form input-group input-group-sm mb-3 col-sm-12">
                                    <input id="name" name="name" type="text" class="form-control" placeholder="عنوان گروه کاربری" aria-label="Sizing example input" aria-describedby="inputGroupMaterial-sizing-sm">
                                </div>
                            </div>
                        </div>

                        <!--Footer-->
                        <div class="modal-footer justify-content-center">
                            {{-- <a type="submit" class="btn btn-primary waves-effect waves-light">اعمال فیلتر
                                 <i class="fa fa-filter ml-1"></i>
                             </a>--}}
                            <input type="submit" class="btn btn-primary waves-effect waves-light" value="اعمال فیلتر">
                            <a type="button" class="btn btn-outline-primary waves-effect clearSearch">پاک کردن</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('editBox')
    <section>
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
             aria-hidden="true" style="z-index: 9999; margin-top: 50px">
            <form action="{{route('role.store')}}" method="POST">
                @csrf
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold">ثبت گروه کاربری</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="md-form input-group input-group-sm mb-3 col-sm-12 ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text md-addon" id="inputGroupMaterial-sizing-sm">عنوان گروه</span>
                                    </div>
                                    <input id="name" name="name" type="text" class="form-control" required>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer justify-content-center">
                            <input type="submit" class="btn btn-success waves-effect waves-light" value="ثبت">
                            <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal" aria-label="Close">انصراف</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
