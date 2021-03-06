@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">یادداشت ها</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-app" data-toggle="modal" data-target="#searchModal">
                    <i class="fa fa-search text-info"></i>جستجو
                </button>
                <a class="btn btn-app" href="{{route('note.create')}}">
                    <i class="fa fa-plus text-success"></i>ثبت
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row mt-3">
                <table id="grid" class="table table-striped" cellspacing="0" width="100%">
                    <thead >
                    <tr>
                        <th class="">ردیف
                        </th>
                        <th class="" >تاریخ
                        </th>
                        <th class="">موضوع
                        </th>
                        <th class="">یادداشت
                        </th>
                        <th class=" text-left">عملیات
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($notes as $note)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$note->date}}</td>
                            <td>{{$note->subject}}</td>
                            <td>{{$note->description}}</td>
                            <td align="left">
                                <!-- Basic dropdown -->
                                <a class="btn btn-md btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">عملیات</a>

                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('note.edit', $note->id)}}"><i class="  text-info"></i>ویرایش</a>
                                    <form method="POST" action="{{route('note.destroy', $note->id)}}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="submit" class="dropdown-item deleteEntity" onsubmit="return confirmDelete()" value="حذف">
                                    </form>
                                </div>
                                <!-- Basic dropdown -->
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>


            </div>
            {{$notes->links()}}
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

                             <div class="row">
                                 <div class="md-form input-group input-group-sm mb-3 col-sm-6">
                                     --}}{{-- <div class="input-group-prepend">
                                          <span class="input-group-text md-addon" id="inputGroupMaterial-sizing-sm">نام</span>
                                      </div>--}}{{--
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

@endsection
