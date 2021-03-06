@extends('layouts.master')
@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header mb-5">
            <h3 class="card-title">پرسنل</h3>

            <div class="card-tools">
                @if($person->id)
                    <a class="btn btn-app" href="{{route('user.create', ['person'=>$person->id])}}">
                        <i class="fa fa-user-plus text-warning"></i>ثبت کاربر
                    </a>
                @endif
                <a class="btn btn-app" href="{{route('personnel.create')}}">
                    <i class="fa fa-plus text-success"></i>جدید
                </a>
                <a class="btn btn-app" href="{{url('personnel')}}">
                    <i class="fa fa-arrow-left text-info"></i>بازگشت
                </a>
            </div>
        </div>
        {{--
                @if (count($errors) > 0)
                    <div class="card-body">
                        <div class="callout callout-danger">
                            <ul class="error-bag">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
        --}}


        <div class="card-body">
            @if($person->id)
                <form action="{{route('personnel.update', $person->id)}}" method="POST" accept-charset="UTF-8"  enctype="multipart/form-data">
                    @method('PATCH')
                    @else
                        <form action="{{route('personnel.store')}}" method="POST" enctype="multipart/form-data">
                            @endif
                            @csrf
                            <div class="row">
                                <div class="card  card-primary card-outline col-sm-12">
                                    <div class="card-body box-profile">
                                        <div class="row">
                                            <div class="col-sm-3 text-center">
                                                <img class="img-fluid profile-user-img lg img-circle" src="{{asset(Storage::url($person->image))}}" style="height: 200px ; width: 200px">
                                                <div class="text-center mt-3">
                                                    <span id="imageName">---</span>
                                                </div>
                                                <div class="row">
                                                    {{--<a href="#" class="btn  btn-block mt-3" --}}{{--data-toggle="modal" data-target="#searchModal"--}}{{--><b>آپلود عکس</b></a>--}}
                                                    <input type="file" name="avatar" class="btn btn-block mt-3">
                                                    <input type="hidden" name="image" value="@if($person->id > 0) {{$person->image}} @else {{ old('image') }} @endif">
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
                                                            <span class="validation-error">@error('firstName') {{$message}} @enderror</span>
                                                            <input id="firstName" name="firstName" type="text" class="form-control required" value="@if($person->id > 0) {{$person->firstName}} @else {{ old('firstName') }} @endif">
                                                        </div>
                                                        <div class="form-group form-group-sm col-sm-3 ">
                                                            <label for="lastName" class="control-label">
                                                                نام خانوادگی
                                                            </label>
                                                            <span class="validation-error">@error('lastName') {{$message}} @enderror</span>
                                                            <input id="lastName" name="lastName" type="text" class="form-control required  @error('lastName') invalid @enderror" value="@if($person->id > 0) {{$person->lastName}} @else {{ old('lastName') }} @endif">
                                                        </div>
                                                        <div class="form-group form-group-sm col-sm-3 ">
                                                            <label for="fatherName" class="control-label">
                                                                نام پدر
                                                            </label>
                                                            <span class="validation-error">@error('fatherName') {{$message}} @enderror</span>
                                                            <input id="fatherName" type="text" class="form-control">
                                                        </div>
                                                        <div class="form-group form-group-sm col-sm-3 ">
                                                            <label for="nationalCode" class="control-label">
                                                                کد ملی
                                                            </label>
                                                            <span class="validation-error">@error('code') {{$message}} @enderror</span>
                                                            <input id="nationalCode" name="code" type="text" class="form-control required" value="@if($person->id > 0) {{$person->code}} @else {{ old('code') }} @endif">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group form-group-sm col-sm-3">
                                                            <label for="gender" class="control-label">
                                                                جنسیت
                                                            </label>
                                                            <span class="validation-error">@error('gender') {{$message}} @enderror</span>
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
                                                            <span class="validation-error">@error('mobileNumber') {{$message}} @enderror</span>
                                                            <input id="mobileNumber" name="mobileNumber" type="text" class="form-control">
                                                        </div>
                                                        <div class="form-group form-group-sm col-sm-3 ">
                                                            <label for="phoneNumber" class="control-label">
                                                                تلفن ثابت
                                                            </label>
                                                            <span class="validation-error">@error('phoneNumber') {{$message}} @enderror</span>
                                                            <input id="phoneNumber" name="phoneNumber" type="text" class="form-control" value="@if($person->id > 0) {{$person->phoneNumber}} @else {{ old('phoneNumber') }} @endif">
                                                        </div>
                                                        <div class="form-group form-group-sm col-sm-3 ">
                                                            <label for="email" class="control-label">
                                                                ایمیل
                                                            </label>
                                                            <span class="validation-error">@error('email') {{$message}} @enderror</span>
                                                            <input id="email" name="email" type="text" class="form-control" value="@if($person->id > 0) {{$person->email}} @else {{ old('email') }} @endif">
                                                        </div>
                                                        <div class="form-group form-group-sm col-sm-3 ">
                                                            <label for="postalCode" class="control-label">
                                                                کد پستی
                                                            </label>
                                                            <span class="validation-error">@error('postalCode') {{$message}} @enderror</span>
                                                            <input id="postalCode" type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group form-group-sm col-sm-3">
                                                            <label for="lifeProvince" class="control-label">
                                                                استان محل سکونت
                                                            </label>
                                                            <span class="validation-error">@error('lifeProvince') {{$message}} @enderror</span>
                                                            <input id="lifeProvince" type="text" class="form-control">
                                                        </div>
                                                        <div class="form-group form-group-sm col-sm-3 ">
                                                            <label for="lifeCity" class="control-label">
                                                                شهر محل سکونت
                                                            </label>
                                                            <span class="validation-error">@error('lifeCity') {{$message}} @enderror</span>
                                                            <input id="lifeCity" type="text" class="form-control">
                                                        </div>
                                                        <div class="form-group form-group-sm col-sm-6 ">
                                                            <label for="address" class="control-label">
                                                                آدرس
                                                            </label>
                                                            <span class="validation-error">@error('lifeCity') {{$message}} @enderror</span>
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
@endsection

{{--
@section('searchBox')
    <section>
        <div class="modal fade top" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true" data-backdrop="true" style="z-index: 99999 ">
            <div class="modal-dialog modal-fluid modal-full-height modal-top modal-notify modal-info" role="document">
                <form method="POST" action="{{route('file.store')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true" class="white-text"><i class="fa fa-times text-white"></i></span>
                            </button>
                            <p class="heading lead">بارگذاری فایل</p>
                        </div>
                        <div class="modal-body">
                            <input name="file" type="file" required>
                            <input name="file" type="hidden" required>
                        </div>
                        <div class="modal-footer justify-content-center">
                            <input type="submit" class="btn btn-primary waves-effect waves-light" value="بارگذاری">
                            <a type="button" class="btn btn-outline-primary waves-effect">انصراف</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection--}}
