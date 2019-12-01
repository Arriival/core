@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">دفتر روزنامه
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-app" data-toggle="modal" data-target="#searchModal">
                    <i class="fa fa-search text-info"></i>جستجو
                </button>
                <a class="btn btn-app" href="{{route('dailyBook.create')}}">
                    <i class="fa fa-plus text-success"></i>ثبت
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row mt-5">
                <div class="col-sm-3">
                    <select id="subject" name="subject" class="form-control ">
                        <option value="-1">...</option>
                        <option value="1">فروردین</option>
                        <option value="2">اردیبهشت</option>
                        <option value="3">خرداد</option>
                        <option value="4">تیر</option>
                        <option value="5">مرداد</option>
                        <option value="6">شهریور</option>
                        <option value="7">مهر</option>
                        <option value="8">آبان</option>
                        <option value="9">آذر</option>
                        <option value="10">دی</option>
                        <option value="11">بهمن</option>
                        <option value="12">اسفند</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <select id="topic" name="topic" class="form-control ">
                        <option value="-1">...</option>
                        <option value="1">فروردین</option>
                        <option value="2">اردیبهشت</option>
                        <option value="3">خرداد</option>
                        <option value="4">تیر</option>
                        <option value="5">مرداد</option>
                        <option value="6">شهریور</option>
                        <option value="7">مهر</option>
                        <option value="8">آبان</option>
                        <option value="9">آذر</option>
                        <option value="10">دی</option>
                        <option value="11">بهمن</option>
                        <option value="12">اسفند</option>
                    </select>
                </div>
            </div>
            <div class="row mt-3">
                <table id="grid" class="table table-striped" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="col-sm-1">ردیف
                        </th>
                        <th class="col-sm-1">کد
                        </th>
                        <th class="col-sm-3">عنوان
                        </th>
                        <th class="col-sm-5">توضیحات
                        </th>
                        <th class="col-sm-1">مبلغ
                        </th>
                        <th class="col-sm-1 text-left">عملیات
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($result as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->code}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->description}}</td>
                            <td align="left">
                                <a class="btn btn-md btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">عملیات</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('dailyBook.edit',$item->id)}}"><i class="  text-info"></i>ویرایش</a>
                                    <form method="POST" action="{{route('dailyBook.destroy',$item->id)}}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="submit" class="dropdown-item deleteEntity" onsubmit="return confirmDelete()" value="حذف">
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
            {{$result->links()}}
        </div>
    </div>

@endsection
@section('searchBox')
    {{-- <section>
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

                         </div>

                         <!--Footer-->
                         <div class="modal-footer justify-content-center">
                             --}}{{-- <a type="submit" class="btn btn-primary waves-effect waves-light">اعمال فیلتر
                                  <i class="fa fa-filter ml-1"></i>
                              </a>--}}{{--
                             <input type="submit" class="btn btn-primary waves-effect waves-light" value="اعمال فیلتر">
                             <a type="button" class="btn btn-outline-primary waves-effect">پاک کردن</a>
                         </div>
                     </div>
                 </div>
             </form>
         </div>
         <!-- Modal: modalPoll -->
     </section>--}}
    <!-- Modal: modalPoll -->
@endsection

@section('javaScript')
    {{--<script>--}}
    $.ajax({
        url: '{{ route('subject.getAll') }}',
        type: 'GET',
        contentType: 'application/json; charset=utf-8',
        success: function (res) {
            console.log(res);
        }
    });


    {{--// </script>--}}
@endsection