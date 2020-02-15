@extends('layouts.master')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">دفتر روزنامه
            </h3>
            <div class="card-tools">
                <button type="button" class="btn btn-app" data-toggle="modal" data-target="#reportModal">
                    <i class="fa fa-print text-warning"></i>چاپ
                </button>
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
                <div class="col-sm-5 mt-1 mr-5 p-2 " style="background-color: rgba(83,126,255,0.19); border-radius:8px; ">
                    <span class="col-sm-6">
                        مانده کل :
                    </span>
                    <span class="col-sm-6 ">
                        @if($totalRemaining < 0)
                            <span class="text-danger persianNumber">
                                    {{$totalRemaining}}
                                </span>
                        @else
                            <span class="ltr persianNumber">
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
                        <th>ردیف
                        </th>
                        <th class="">کد
                        </th>
                        <th class="">تاریخ
                        </th>
                        <th class="">ش سند
                        </th>
                        <th class=""> شرح
                        </th>
                        <th class="">بدهکار/بستانکار
                        </th>
                        <th class="">مانده
                        </th>
                        <th class="">پیوست
                        </th>
                        <th class=" text-left">عملیات
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $remaining = 0;
                    @endphp
                    @foreach ($result as $item)
                        <tr>
                            <td>
                                <span class="persianNumber">
                               {{$loop->iteration}}
                                </span>

                            </td>
                            <td>{{$item->code}}</td>
                            <td>
                                <span class="persianNumber">
                                {{$item->date}}
                                </span>
                            </td>
                            <td>
                                <span class="persianNumber">
                            {{$item->document_number}}

                            </span>
                            </td>
                            <td>
                                {{$item->description}}
                            </td>
                            <td class="ltr">
                                <span class="persianNumber">
                                {{$item->amount}}
                                </span>
                            </td>
                            <td class="ltr">
                                @php
                                    $remaining = $remaining + $item->amount;
                                @endphp
                                @if($remaining < 0)
                                    <span class="text-danger persianNumber">
                                    {{$remaining}}
                                </span>
                                @else
                                    <span class="persianNumber">
                                    {{$remaining}}
                                </span>
                                @endif
                            </td>
                            <td>
                                @if($item->attachFile != null)
                                    <a class="dropdown-item" href="{{Storage::url($item->attachFile)}}" target="_blank">
                                    <i class="fa fa-download text-lg text-success" style="cursor: pointer"></i>
                                    </a>
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
            {{$result->appends(['subject'=>$subject, 'topic'=>$topic_id])->links()}}

        </div>
    </div>

@endsection
@section('searchBox')
    <section>
        <!-- Modal: modalPoll -->
        <div class="modal fade top" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true" data-backdrop="true" style="z-index: 99999 ">
            <form action="{{url('dailyBook')}}" method="GET">
                <div class="modal-dialog modal-fluid modal-full-height modal-top modal-notify modal-info" role="document">
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
                                {{--<input id="subject_search" name="subject" type="hidden" class="form-control search" placeholder="سرفصل" value="{{ $request->subject}}" aria-label="Sizing example input" aria-describedby="inputGroupMaterial-sizing-sm">--}}
                                {{--<input id="topic_search" name="topic" type="hidden" class="form-control search" placeholder="موضوع" value="{{ $request->topic_id}}" aria-label="Sizing example input" aria-describedby="inputGroupMaterial-sizing-sm">--}}

                                <div class="col-sm-6">
                                    <select id="subject" name="subject" class="form-control search" onchange="getTopics(this.value)">
                                        <option value="-1">...</option>
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <select id="topic" name="topic" class="form-control search" {{--onchange="refreshData(this.value)"--}}>
                                        <option value="-1">...</option>
                                    </select>
                                </div>


                                <div class="md-form input-group input-group-sm mb-3 col-sm-3">
                                    <input id="fromDate" name="fromDate" type="text" class="form-control search" placeholder="از تاریخ" value="{{ $request->fromDate}}" aria-label="Sizing example input" aria-describedby="inputGroupMaterial-sizing-sm">
                                </div>
                                <div class="md-form input-group input-group-sm mb-3 col-sm-3">
                                    <input id="toDate" name="toDate" type="text" class="form-control search" placeholder="تا تاریخ" value="{{ $request->toDate}}" aria-label="Sizing example input" aria-describedby="inputGroupMaterial-sizing-sm">
                                </div>
                                <div class="md-form input-group input-group-sm mb-3  col-sm-3">
                                    <input id="amountFrom" name="amountFrom" type="text" class="form-control search" placeholder="مبلغ از" value="{{ $request->amountFrom}}" aria-label="Sizing example input" aria-describedby="inputGroupMaterial-sizing-sm">
                                </div>
                                <div class="md-form input-group input-group-sm mb-3  col-sm-3">
                                    <input id="amountTo" name="amountTo" type="text" class="form-control search" placeholder="مبلغ تا" value="{{ $request->amountTo}}" aria-label="Sizing example input" aria-describedby="inputGroupMaterial-sizing-sm">
                                </div>
                                <div class="md-form input-group input-group-sm mb-3  col-sm-6">
                                    <input id="code" name="code" type="text" class="form-control search" placeholder="کد" value="{{ $request->code}}" aria-label="Sizing example input" aria-describedby="inputGroupMaterial-sizing-sm">
                                </div>
                                <div class="md-form input-group input-group-sm mb-3  col-sm-6">
                                    <input id="docNumber" name="documentNumber" type="text" class="form-control search" placeholder="شماره سند" value="{{ $request->documentNumber}}" aria-label="Sizing example input" aria-describedby="inputGroupMaterial-sizing-sm">
                                </div>
                            </div>
                        </div>

                        <!--Footer-->
                        <div class="modal-footer justify-content-center">
                            <input type="submit" class="btn btn-primary waves-effect waves-light" value="اعمال فیلتر">
                            <a type="button" class="btn btn-outline-primary waves-effect" onclick="$('.search').val('')">پاک کردن</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Modal: modalPoll -->
    </section>
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
        $("#topic_search").val("{{$topic_id}}");
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

    function clearForm(){

    }



    {{--</script>--}}
@endsection