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
                    <select id="subject" name="subject" class="form-control" onchange="getTopics(this.value)">
                        <option value="-1">...</option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <select id="topic" name="topic" class="form-control " onchange="refreshData(this.value)">
                        <option value="-1">...</option>
                    </select>
                </div>
                <div class="col-sm-5 mt-1 mr-5 ">
                    <span class="col-sm-6">
                        مانده کل :
                    </span>
                    <span class="col-sm-6 ">
                        @if($totalRemaining < 0)
                            <span class="text-danger">
                                    {{$totalRemaining}}
                                </span>
                        @else
                            <span class="ltr">
                                    {{$totalRemaining}}
                                </span>
                        @endif
                    </span>
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
                        <th class="col-sm-1">تاریخ
                        </th>
                        <th class="col-sm-1">ش سند
                        </th>
                        <th class="col-sm-5"> شرح
                        </th>
                        <th class="col-sm-1">بدهکار/بستانکار
                        </th>
                        <th class="col-sm-1">مانده
                        </th>
                        <th class="col-sm-1 text-left">عملیات
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $remaining = 0;
                    @endphp
                    @foreach ($result as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->code}}</td>
                            <td>{{$item->date}}</td>
                            <td>{{$item->document_number}}</td>
                            <td>{{$item->description}}</td>
                            <td class="ltr">
                                {{$item->amount}}
                            </td>
                            <td class="ltr">
                                @php
                                    $remaining = $remaining + $item->amount;
                                @endphp
                                @if($remaining < 0)
                                    <span class="text-danger">
                                    {{$remaining}}
                                </span>
                                @else
                                    <span>
                                    {{$remaining}}
                                </span>
                                @endif
                            </td>
                            <td align="left" class="p-0">
                                <a class="btn btn-md btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">عملیات</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('dailyBook.edit',["id"=>$item->id, "topic"=>$topic_id, "subject"=>$subject])}}"><i class="  text-info"></i>ویرایش</a>
                                    <form method="POST" action="{{route('dailyBook.destroy',["id"=>$item->id, "topic"=>$topic_id, "subject"=>$subject])}}">
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
    dataType: 'json',
    contentType: 'application/json; charset=utf-8',
    success: function (res) {
    $.each(res, function (key, val) {
    $("#subject").append(new Option(val.title, val.id));
    });
    @if($subject)
        $("#subject").val("{{$subject}}");
        getTopics({{$subject}});
    @endif
    }
    });


    function getTopics(id) {
    $("#topic").empty().append(new Option("...", -1));
    var url = '{{route("topic.getAll" , ":subjectId")}}';
    url = url.replace(':subjectId', id);
    $.ajax({
    url: url,
    type: 'GET',
    dataType: 'json',
    contentType: 'application/json; charset=utf-8',
    success: function (res) {
    $.each(res, function (key, val) {
    $("#topic").append(new Option(val.title, val.id));
    });
    @if($topic_id)
        $("#topic").val("{{$topic_id}}");
    @endif
    }
    });
    }

    function refreshData(id) {
    var param = 'subject=:subjectId&topic=:topicId';
    param = param.replace(':subjectId', $("#subject").val());
    param = param.replace(':topicId', $("#topic").val());
    var url = '{{route("dailyBook.index" , ":param")}}';
    url = url.replace(':param', param);
    location.href= url;
    }


    {{--</script>--}}
@endsection