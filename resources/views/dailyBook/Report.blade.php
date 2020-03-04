<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>گزارش</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- jQuery -->
    <script src="{{ asset('/dist/js/plugins/jquery/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('/dist/js/headContnet.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/dist/js/mdb.min.js') }}"></script>
    <script src="{{ asset('/dist/js/icheck.js') }}"></script>
    <script src="{{ asset('/dist/js/jquery-confirm.min.js') }}"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href=" {{ asset('/dist/fonts/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/dist/css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('/dist/css/bootstrap-rtl.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/dist/css/custom-style.css') }}">
    <link href="{{ asset('/dist/css/mdb.css') }}" rel="stylesheet">
    <link href="{{ asset('/dist/css/skins/square/_all.css') }}" rel="stylesheet">
    <link href="{{ asset('/dist/css/jquery-confirm.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/dist/css/themes/default.css') }}"/>
    <style>

        @media print {

            html, body {
                height: 100% !important;
                margin: 20px !important;
                padding: 10px !important;
                overflow: hidden !important;
                page-break-after: always !important;
            }

        }

    </style>
</head>

<body>
<div class="card">

    <div class="card-header">
        <h3 class="card-title">دفتر روزنامه
        </h3>
    </div>
    <div class="card-body">
        <div class="row mt-3">
            <table id="grid" class="table table-striped table-sm" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>ردیف
                    </th>
                    <th class="">تاریخ
                    </th>
                    <th class=""> شرح
                    </th>
                    <th class="text-left">بدهکار/بستانکار
                    </th>
                    <th class="text-left">مانده
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
                        <td>
                                <span class="persianNumber">
                                {{$item->date}}
                                </span>
                        </td>
                        <td>
                            {{$item->description}}
                        </td>
                        <td class="ltr">
                            @if($item->amount < 0)
                                <span class="text-danger persianNumber">
                                    {{number_format($item->amount)}}
                                </span>
                            @else
                                <span class="persianNumber">
                                    {{number_format($item->amount)}}
                                </span>
                            @endif
                        </td>
                        <td class="ltr">
                            @php
                                $remaining = $remaining + $item->amount;
                            @endphp
                            @if($remaining < 0)
                                <span class="text-danger persianNumber">
                                     {{number_format($remaining)}}
                                </span>
                            @else
                                <span class="persianNumber">
                                    {{number_format($remaining)}}
                                </span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>


