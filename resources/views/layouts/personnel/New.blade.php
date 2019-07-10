@extends('layouts.master')
@section('content')
<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title">پرسنل</h3>

        <div class="card-tools">
            <a class="btn btn-app" href="{{route('personnel.create')}}">
                <i class="fa fa-plus text-success"></i>جدید
            </a>
            <a class="btn btn-app" href="{{url('personnel')}}">
                <i class="fa fa-arrow-left text-info"></i>بازگشت
            </a>
        </div>
    </div>
    <div class="card-body">

        @if($person->id)
            <form action="{{route('personnel.update', $person->id)}}" method="POST">
                @method('PATCH')
                @else
                    <form action="{{route('personnel.store')}}" method="POST">
                        @endif

                        @csrf
                        <div class="row mt-3">
                            <div class="card  card-primary card-outline col-sm-12">
                                <div class="card-body box-profile">
                                    <div class="row">
                                        <div class="col-sm-3 text-center">
                                            <img class="img-fluid profile-user-img lg img-circle" src="../../dist/img/user8-128x128.jpg">
                                            <div class="text-center mt-3">
                                                <span id="imageName">---</span>
                                            </div>
                                            <div class="row">
                                                <a href="#" class="btn  btn-block mt-3"><b>آپلود عکس</b></a>
                                            </div>
                                        </div>
                                        <fieldset class="col-sm-9 ">
                                            <legend>اطلاعات شخصی</legend>

                                            <hr>
                                            <div class="form-horizontal">
                                                <div class="row">
                                                    <div class="form-group form-group-sm col-sm-3">
                                                        <label for="firstName" class="control-label">
                                                            نام
                                                        </label>
                                                        <input id="firstName" name="firstName" type="text" class="form-control" value="{{$person->firstName}}" required>
                                                    </div>
                                                    <div class="form-group form-group-sm col-sm-3 ">
                                                        <label for="lastName" class="control-label">
                                                            نام خانوادگی
                                                        </label>
                                                        <input id="lastName" name="lastName" type="text" class="form-control" value="{{$person->lastName}}" required="required">
                                                    </div>
                                                    <div class="form-group form-group-sm col-sm-3 ">
                                                        <label for="fatherName" class="control-label">
                                                            نام پدر
                                                        </label>
                                                        <input id="fatherName" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group form-group-sm col-sm-3 ">
                                                        <label for="nationalCode" class="control-label">
                                                            کد ملی
                                                        </label>
                                                        <input id="nationalCode" name="code" type="text" value="{{$person->code}}" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group form-group-sm col-sm-3">
                                                        <label for="gender" class="control-label">
                                                            جنسیت
                                                        </label>
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <input type="radio" name="gender" value="1" @if($person->gender) checked @endif required>
                                                                <label>مرد</label>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input type="radio" name="gender" value="0" @if(!$person->gender) checked @endif required>
                                                                <label>زن</label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="form-group form-group-sm col-sm-3 ">
                                                        <label for="birthDate" class="control-label">
                                                            تاریخ تولد
                                                        </label>
                                                        <input id="birthDate" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group form-group-sm col-sm-3 ">
                                                        <label for="birthPlace" class="control-label">
                                                            محل تولد
                                                        </label>
                                                        <input id="birthPlace" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group form-group-sm col-sm-3 ">
                                                        <label for="identityNumber" class="control-label">
                                                            شماره شناسنامه
                                                        </label>
                                                        <input id="identityNumber" type="text" class="form-control">
                                                    </div>
                                                </div>

                                            </div>
                                        </fieldset>
                                        <br>
                                        <br>

                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-sm-3 text-center">
                                            <label for="isActive" class="col-sm-4">
                                                وضعیت
                                            </label>
                                            <input id="isActive" name="isActive" type="checkbox" value="1" checked>
                                        </div>
                                        <fieldset class="col-sm-9 mt-5">
                                            <legend>اطلاعات تماس</legend>
                                            <hr>
                                            <div class="form-horizontal">
                                                <div class="row">
                                                    <div class="form-group form-group-sm col-sm-3">
                                                        <label for="mobileNumber" class="control-label">
                                                            تلفن همراه
                                                        </label>
                                                        <input id="mobileNumber" name="mobileNumber" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group form-group-sm col-sm-3 ">
                                                        <label for="phoneNumber" class="control-label">
                                                            تلفن ثابت
                                                        </label>
                                                        <input id="phoneNumber" name="phoneNumber" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group form-group-sm col-sm-3 ">
                                                        <label for="email" class="control-label">
                                                            ایمیل
                                                        </label>
                                                        <input id="email" name="email" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group form-group-sm col-sm-3 ">
                                                        <label for="postalCode" class="control-label">
                                                            کد پستی
                                                        </label>
                                                        <input id="postalCode" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group form-group-sm col-sm-3">
                                                        <label for="lifeProvince" class="control-label">
                                                            استان محل سکونت
                                                        </label>
                                                        <input id="lifeProvince" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group form-group-sm col-sm-3 ">
                                                        <label for="lifeCity" class="control-label">
                                                            شهر محل سکونت
                                                        </label>
                                                        <input id="lifeCity" type="text" class="form-control">
                                                    </div>
                                                    <div class="form-group form-group-sm col-sm-6 ">
                                                        <label for="address" class="control-label">
                                                            آدرس
                                                        </label>
                                                        <input id="lifeCity" type="text" class="form-control">
                                                    </div>
                                                </div>

                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-block btn-outline-success col-sm-2  pull-left" value="ثبت اطلاعات">
                        @if($person->id)
                    </form>
                    @else
            </form>
        @endif
    </div>
</div>
<!-- /.card -->
@endsection