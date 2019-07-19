@extends('layouts.master')
@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header mb-5">
            <h3 class="card-title">گروه کاربری</h3>

            <div class="card-tools">
                <a class="btn btn-app" href="{{route('role.create')}}">
                    <i class="fa fa-plus text-success"></i>جدید
                </a>
                <a class="btn btn-app" href="{{url('role')}}">
                    <i class="fa fa-arrow-left text-info"></i>بازگشت
                </a>
            </div>
        </div>
        <div class="card-body">
            @if($role->id)
                <form action="{{route('role.update', $role->id)}}" method="POST">
                    @method('PATCH')
                    @else
                        <form action="{{route('role.store')}}" method="POST">
                            @endif
                            @csrf
                            <div class="row">
                                <div class="form-horizontal">
                                    <div class="row">
                                        <div class="form-group form-group-sm col-sm-3 ">
                                            <label for="birthDate" class="control-label">
                                                تاریخ تولد
                                            </label>
                                            <span class="validation-error">@error('birthDate') {{$message}} @enderror</span>
                                            <input id="birthDate" type="text" class="form-control">
                                        </div>
                                        <div class="form-group form-group-sm col-sm-3 ">
                                            <label for="birthPlace" class="control-label">
                                                محل تولد
                                            </label>
                                            <span class="validation-error">@error('birthPlace') {{$message}} @enderror</span>
                                            <input id="birthPlace" type="text" class="form-control">
                                        </div>
                                        <div class="form-group form-group-sm col-sm-3 ">
                                            <label for="identityNumber" class="control-label">
                                                شماره شناسنامه
                                            </label>
                                            <span class="validation-error">@error('identityNumber') {{$message}} @enderror</span>
                                            <input id="identityNumber" type="text" class="form-control">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <input type="submit" class="btn btn-block btn-outline-success col-sm-2  pull-left" value="ثبت اطلاعات">
                            @if($role->id)
                        </form>
                        @else
                </form>
            @endif
        </div>
    </div>
    <!-- /.card -->
@endsection