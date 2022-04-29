@extends('layouts.master')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endsection
@section('title')
    تفاصيل المحطة
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المحطة</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تفاصيل  المحطة</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content') 
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- row opened -->
    <div class="row row-sm">

        <div class="col-xl-12">
            <!-- div -->
           <div class="card">
                <div class="card-body">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('feeds.create') }}">رجوع</a>
                        </div>
                    </div><br>
                    <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='50'>
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">رقم التغذية</th>
                                     <th class="border-bottom-0">اسم المحطة</th>
                                      <th class="border-bottom-0">اسم السائق</th>
                                      <th class="border-bottom-0">سعة التغذية</th>
                                    <th class="border-bottom-0">التاريخ</th>
                                     <th class="border-bottom-0"> امر التغذية</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($feeds as $index => $feed)
                                    <tr>
                                        <td>{{ $feed->id }} </td>
                                        <td>{{ $feed->station->name }} </td>
                                       <td>{{ $feed->user->name }} </td>
                                       <td>{{ $feed->capacity }} </td>
                                        <td>{{ date( 'j m Y', strtotime($feed->created_at)) }}</td>
                                       <td>{{ $feed->emp }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table> 
                    
                </div>
            </div>
            <!-- /div -->
        </div>

    </div>
    <!-- /row -->


@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!-- Internal Jquery.mCustomScrollbar js-->
    <script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <!-- Internal Input tags js-->
    <script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
    <!--- Tabs JS-->
    <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
    <script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
    <!--Internal  Clipboard js-->
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
    <!-- Internal Prism js-->
    <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>

@endsection
