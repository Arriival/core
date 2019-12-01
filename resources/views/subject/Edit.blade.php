@extends('layouts.master')
@section('content')
    <!-- Default box -->
    <div class="card">
        <div class="card-header mb-5">
            <h3 class="card-title">سرفصل جدید</h3>

            <div class="card-tools">

                <a class="btn btn-app" href="{{route('subject.index')}}">
                    <i class="fa fa-arrow-left text-info"></i>بازگشت
                </a>
            </div>
        </div>
        <div class="card-body">
            @if($entity->id)
                <form action="{{route('subject.update', $entity->id)}}" method="POST">
                    @method('PATCH')
                    @else
                        <form method="POST" action="{{ route('subject.store') }}">
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
                                                        <div class="form-group form-group-sm col-sm-6">
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