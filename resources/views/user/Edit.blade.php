@extends('layouts.master')
@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header mb-5">
            <h3 class="card-title">ایجاد کاربر</h3>

            <div class="card-tools">

                <a class="btn btn-app" href="{{url()->previous()}}">
                    <i class="fa fa-arrow-left text-info"></i>بازگشت
                </a>
            </div>
        </div>
        <div class="card-body">
            @if($user->id)
                <form action="{{route('user.update', $user->id)}}" method="POST">
                    @method('PATCH')
                    @else
                        <form method="POST" action="{{ route('register') }}">
                            @endif
                            @csrf
                            <div class="row">
                                <div class="card  card-primary card-outline col-sm-12">
                                    <div class="card-body box-profile">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="text-center">
                                                    <img class="img-fluid profile-user-img @if($person->isActive) active @else deActive @endif img-circle" src="../../dist/img/user8-128x128.jpg">
                                                </div>
                                                <h3 class="profile-username text-center">{{$person->firstName . " " . $person->lastName}}</h3>
                                                <p class="text-muted text-center">مهندس نرم افزار</p>
                                                <ul class="list-group list-group-unbordered mb-3">
                                                    <li class="list-group-item text-center">
                                                        {{$person->code}}
                                                    </li>
                                                    <div class="col-sm-12 mt-4 text-center">
                                                        <label for="isActive" class="col-sm-4">
                                                            فعال
                                                        </label>
                                                        <input id="isActive" name="isActive" type="checkbox" value="1" checked>
                                                    </div>

                                                </ul>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="form-horizontal">
                                                    <input id="person" type="hidden" class="form-control " name="person" value="{{request()->get('person')}}" required autofocus>
                                                    <div class="row">
                                                        <div class="form-group form-group-sm col-sm-2"></div>
                                                        <div class="form-group form-group-sm col-sm-4">
                                                            <label for="firstName" class="control-label">
                                                                نام کاربری
                                                            </label>
                                                            <span class="validation-error">@error('username') {{$message}} @enderror</span>
                                                            <input id="username" name="username" type="text" class="form-control required" value="@if($user->id > 0) {{$user->username}} @else {{ old('username') }} @endif">
                                                        </div>
                                                        <div class="form-group form-group-sm col-sm-4">
                                                            <label for="firstName" class="control-label">
                                                                تاریخ اعتبار
                                                            </label>
                                                            <span class="validation-error">@error('expire_date') {{$message}} @enderror</span>
                                                            <input id="expireDate" name="expire_date" type="text" class="form-control required" value="@if($user->id > 0) {{$user->expire_date}} @else {{ old('expire_date') }} @endif">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group form-group-sm col-sm-2"></div>
                                                        <div class="form-group form-group-sm col-sm-4">
                                                            <label for="firstName" class="control-label">
                                                                رمز عبور
                                                            </label>
                                                            <span class="validation-error">@error('password') {{$message}} @enderror</span>
                                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror required" name="password">
                                                        </div>
                                                        <div class="form-group form-group-sm col-sm-4">
                                                            <label for="firstName" class="control-label">
                                                                تکرار رمز عبور
                                                            </label>
                                                            <span class="validation-error">@error('password-confirm') {{$message}} @enderror</span>
                                                            <input id="password-confirm" type="password" class="form-control required" name="password_confirmation">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <input type="submit" class="btn btn-block btn-outline-success col-sm-3 pull-left" value="ثبت اطلاعات">
                                </div>
                            </div>
                            @if($user->id)
                        </form>
                        @else
                </form>
            @endif
        </div>
    </div>
    <!-- /.card -->
@endsection