@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('title')
     تغذية محطة
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المحطات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تغذية محطة</span>
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

    @if (session()->has('Add_Location'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم اضافة المحطة بنجاح",
                    type: "success"
                })
            }
        </script>
    @endif
    @if (session()->has('Update_Location'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم تعديل المحطة  بنجاح",
                    type: "success"
                })
            }
        </script>
    @endif
    @if (session()->has('delete_location'))
        <script>
            window.onload = function() {
                notif({
                    msg: "تم حذف  المحطة بنجاح",
                    type: "success"
                })
            }
        </script>
    @endif

    @if (session()->has('station_full'))
        <script>
            window.onload = function() {
                notif({
                    msg: "الكمية المشحونة اكبر من سعة المحطة",
                    type: "success"
                })
            }
        </script>
    @endif


    <!-- row -->
    <div class="row">

        <div class="col-lg-12 col-md-12">
            <div class="card"> 
            <div class="card-body">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-right">
                        <a class="btn btn-primary btn-sm" href="{{ route('stations.index') }}">رجوع</a>
                    </div>
                </div><br>
                    

                    {!! Form::open(['route' => 'details', 'class' => 'parsley-style-1','method'=>'POST','id'=>'selectForm2','name'=>'selectForm2','autocomplete'=>'off' ]) !!}
                    {{csrf_field()}}
                    {{ method_field('get') }}

                    <div class="">

                        <div class="row mg-b-20">
                            <div class="parsley-input col-md-6" id="fnWrapper">
                                <label> المحطة: <span class="tx-danger">*</span></label>
                                <select class="form-control" name="station_id" required>
                                 <option value="" selected disabled> -- اختيار  المحطة--</option>
			                    	@foreach($stations as $station)
	                               <option value='{{ $station->id}}'> {{ $station->name}}</option>
	        	                    @endforeach
	                            </select>
                            </div>

                            <div class="parsley-input col-md-6" id="fnWrapper">
                                <label> السائق: <span class="tx-danger">*</span></label>
                                <select class="form-control" name="user_id" required>
                                 <option value="" selected disabled> -- اختيار  السائق--</option>
			                    	@foreach($users as $user)
	                               <option value='{{ $user->id}}'> {{ $user->name}}</option>
	        	                    @endforeach
	                            </select>
                            </select>
                            </div>     
                        </div>
                        <div class="row mg-b-20">
                             <div class="parsley-input col-md-6 mg-t-20 mg-md-t-0" id="lnWrapper">
                                <label>السعة: <span class="tx-danger">*</span></label>
                                <input class="form-control form-control-sm mg-b-20"
                                    data-parsley-class-handler="#lnWrapper" name="capacity" required="" type="text">
                            </div>
                        </div>
                   <div class="row mg-b-20">
                    
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button class="btn btn-main-primary pd-x-20" type="submit">تاكيد</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        </div>
    </div>

    </div>

    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
    </script>

    <script>
        $(document).ready(function() {
            $('select[name="Section"]').on('change', function() {
                var SectionId = $(this).val();
                if (SectionId) {
                    $.ajax({
                        url: "{{ URL::to('section') }}/" + SectionId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $('select[name="product"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="product"]').append('<option value="' +
                                    value + '">' + value + '</option>');
                            });
                        },
                    });

                } else {
                    console.log('AJAX load did not work');
                }
            });

        });
    </script>


    <script>
        function myFunction() {

            var Amount_Commission = parseFloat(document.getElementById("Amount_Commission").value);
            var Discount = parseFloat(document.getElementById("Discount").value);
            var Rate_VAT = parseFloat(document.getElementById("Rate_VAT").value);
            var Value_VAT = parseFloat(document.getElementById("Value_VAT").value);

            var Amount_Commission2 = Amount_Commission - Discount;


            if (typeof Amount_Commission === 'undefined' || !Amount_Commission) {

                alert('يرجي ادخال مبلغ العمولة ');

            } else {
                var intResults = Amount_Commission2 * Rate_VAT / 100;

                var intResults2 = parseFloat(intResults + Amount_Commission2);

                sumq = parseFloat(intResults).toFixed(2);

                sumt = parseFloat(intResults2).toFixed(2);

                document.getElementById("Value_VAT").value = sumq;

                document.getElementById("Total").value = sumt;

            }

        }
    </script>


@endsection
