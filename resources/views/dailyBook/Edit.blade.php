@extends('layouts.master')
@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header mb-5">
            <h3 class="card-title">ثبت اطلاعات</h3>
            <div class="card-tools">

                <a class="btn btn-app" href="{{url()->previous()}}">
                    <i class="fa fa-arrow-left text-info"></i>بازگشت
                </a>
            </div>
        </div>
        <div class="card-body">
            @if($entity->id)
                <form action="{{route('dailyBook.update', $entity->id)}}" method="POST">
                    @method('PATCH')
                    @else
                        <form method="POST" action="{{ route('dailyBook.store') }}">
                            @endif
                            @csrf
                            <div class="row">
                                <div class="card  card-primary card-outline col-sm-12">
                                    <div class="card-body box-profile">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-horizontal">
                                                    <div class="row">
                                                        <div class="form-group form-group-sm col-sm-2"></div>
                                                        <div class="form-group form-group-sm col-sm-4">
                                                            <label for="subject" class="control-label">
                                                                سرفصل
                                                            </label>
                                                            <span class="validation-error">@error('title') {{$message}} @enderror</span>
                                                            <select id="subject" name="subject" class="form-control ">
                                                                <option value="-1">...</option>
                                                                <option value="1">فروردین</option>
                                                                <option value="2">اردیبهشت</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group form-group-sm col-sm-4">
                                                            <label for="subject" class="control-label">
                                                                موضوع
                                                            </label>
                                                            <span class="validation-error">@error('title') {{$message}} @enderror</span>
                                                            <select id="subject" name="subject" class="form-control ">
                                                                <option value="-1">...</option>
                                                                <option value="1">فروردین</option>
                                                                <option value="2">اردیبهشت</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group form-group-sm col-sm-2"></div>
                                                        <div class="form-group form-group-sm col-sm-4">
                                                            <label for="subject" class="control-label">
                                                                عنوان
                                                            </label>
                                                            <span class="validation-error">@error('title') {{$message}} @enderror</span>
                                                            <input id="title" name="title" type="text" class="form-control required" value="@if($entity->id > 0) {{$entity->title}} @else {{ old('title') }} @endif">
                                                        </div>
                                                        <div class="form-group form-group-sm col-sm-2">
                                                            <label for="date" class="control-label">
                                                                کد
                                                            </label>
                                                            <span class="validation-error">@error('code') {{$message}} @enderror</span>
                                                            <input id="code" name="code" type="text" class="form-control text-center" value="@if($entity->id > 0) {{$entity->code}} @else {{ old('code') }} @endif ">
                                                        </div>
                                                        <div class="form-group form-group-sm col-sm-2">
                                                            <label for="date" class="control-label">
                                                                مبلغ
                                                            </label>
                                                            <span class="validation-error">@error('amount') {{$message}} @enderror</span>
                                                            <input id="amount" name="amount" type="text" class="form-control text-center required" value="@if($entity->id > 0) {{$entity->amount}} @else {{ old('amount') }} @endif ">
                                                        </div>
                                                        <div class="form-group form-group-sm col-sm-2 mt-4">
                                                            <div class="row">
                                                                <input id="talab" name="amount" type="radio" class="form-control text-center required" value="@if($entity->id > 0) {{$entity->amount}} @else {{ old('amount') }} @endif ">
                                                                <label for="talab" class="control-label text-success mr-2">
                                                                    طلبکار +
                                                                </label>
                                                            </div>
                                                            <div class="row">
                                                                <input id="bedeh" name="amount" type="radio" class="form-control text-center required" value="@if($entity->id > 0) {{$entity->amount}} @else {{ old('amount') }} @endif ">
                                                                <label for="bedeh" class="control-label text-danger mr-2">
                                                                    بدهکار -
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group form-group-sm col-sm-2"></div>
                                                        <div class="form-group form-group-sm col-sm-8">
                                                            <label for="description" class="control-label">
                                                                توضیحات
                                                            </label>
                                                            <span class="validation-error">@error('description') {{$message}} @enderror</span>
                                                            <textarea id="description" class="form-control @error('password') is-invalid @enderror" name="description">@if($entity->id > 0) {{$entity->description}} @else {{ old('description') }} @endif</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <input type="submit" class="btn btn-block btn-outline-success col-sm-2 pull-left" value="ثبت">
                                </div>
                            </div>
                            @if($entity->id)
                        </form>
                        @else
                </form>
            @endif
        </div>
    </div>
    <!-- /.card -->
@endsection