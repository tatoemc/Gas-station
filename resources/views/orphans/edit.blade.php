@extends('layouts.master')
@section('css')
    <!---Internal  Prism css-->
    <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
    <!---Internal Input tags css-->
    <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
    <!--- Custom-scroll -->
    <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('title')
    تعديل اليتيم
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الأيتام</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    تعديل اليتيم</span>
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
            <div class="card mg-b-20" id="tabs-style2">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-2">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li><a href="#tab4" class="nav-link active" data-toggle="tab">تعديل ولي امر</a></li>
                                        
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border">
                                    <div class="tab-content">

                                        <div class="tab-pane active" id="tab4">
                                            <div class="table-responsive mt-15">
                                          {!! Form::model($orphan, ['route'=>['orphans.update',$orphan->id] ,'method' => 'PUT', 'files' => 'ture']) !!}
                                                <table class="table table-striped" style="text-align:center">
                                                    <tbody>
                                                      <tr>
                                                            <th scope="row">الاسم</th>
                                                            <th scope="row">تاريخ الميلاد</th>
                                                            <th scope="row"> تاريخ وفاة الوالد</th>
                                                            
                                                            <th scope="row">النوع</th>
                                                           
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                            <input type="hidden" name="id" id="sponsor_id" value="{{$orphan->id}}">
                                                            <input type="text" name="name" value="{{$orphan->name}}">
                                                            </td>
                                                            
                                                            <td>
                                                            <input type="text" class="form-control fc-datepicker" name="b_date" value="{{$orphan->b_date}}">
                                                            </td>                                               

                                                            <td>
                                                            <input type="text" class="form-control fc-datepicker" name="father_deth" value="{{$orphan->father_deth}}">
                                                            </td>

                                                            <td>
                                                            <select class="form-control" name="gender">
	                                                         <option value='ذكر'{{ $orphan->gender == 'ذكر' ? 'selected' : ''}}> ذكر </option>
	                                                         <option value='انثى'{{ $orphan->gender == 'انثى' ? 'selected' : ''}}> انثى </option> 
                                                              </select> 
                                                            </td>
        
                                                        </tr>

                                                        <tr>
                                                            
                                                            <th scope="row">المرحلة الدراسية</th>
                                                            <th scope="row">العنوان</th>
                                                            <th scope="row">الحالة الصحية</th>
                                                            <th scope="row">الرقم الوطني</th> 
                                                            
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                            <select class="form-control" name="schoolLevel">
                                                             <option value='التعليم قبل المدرسي'{{ $orphan->schoolLevel == 'التعليم ما قبل المدرسي' ? 'selected' : ''}}> التعليم ما قبل المدرسي </option> 
	                                                        <option value='1'{{ $orphan->schoolLevel == '1' ? 'selected' : ''}}> 1 </option>
                                                            <option value='2'{{ $orphan->schoolLevel == '2' ? 'selected' : ''}}> 2 </option>
                                                            <option value='3'{{ $orphan->schoolLevel == '3' ? 'selected' : ''}}> 3 </option> 
                                                             <option value='1'{{ $orphan->schoolLevel == '4' ? 'selected' : ''}}> 4 </option>
                                                            <option value='2'{{ $orphan->schoolLevel == '5' ? 'selected' : ''}}> 5 </option>
                                                            <option value='3'{{ $orphan->schoolLevel == '6' ? 'selected' : ''}}> 6 </option> 
                                                             <option value='1'{{ $orphan->schoolLevel == '7' ? 'selected' : ''}}> 7 </option>
                                                            <option value='2'{{ $orphan->schoolLevel == '8' ? 'selected' : ''}}> 8 </option>
                                                            <option value='3'{{ $orphan->schoolLevel == '3' ? 'selected' : ''}}> 3 </option>  
                                                            </select> 
                                                            </td>

                                                            <td>
                                                            <select class="form-control" name="add">
	                                                        <option value='الخرطوم'{{ $orphan->add == 'الخرطوم' ? 'selected' : ''}}> الخرطوم </option>
	                                                        <option value='بحري'{{ $orphan->add == 'بحري' ? 'selected' : ''}}> بحري </option>  
	                                                        <option value='ام درمان'{{ $orphan->add == 'ام درمان' ? 'selected' : ''}}> ام درمان </option>  
                                                            </select> 
                                                            </td>

                                                            <td>
                                                            <select class="form-control" name="helth_state">
	                                                        <option value='سليم'{{ $orphan->helth_state == 'سليم' ? 'selected' : ''}}> سليم </option>
	                                                        <option value='مريض'{{ $orphan->helth_state == 'مريض' ? 'selected' : ''}}> مريض </option>  
	                                                          
                                                            </select> 
                                                            </td>

                                                        <td>
                                                        <input type="text" name="ssn" value="{{$orphan->ssn}}">
                                                        </td>
                                                        </tr>

                                                        <tr>
                                                            <th scope="row">عدد الاخوان</th>
                                                            <th scope="row">العنوان</th>
                                                            <th scope="row">الحالة الصحية</th>
                                                            <th scope="row">الرقم الوطني</th> 
                                                        </tr>

                                                        <tr>
                                                            <td>
                                                            <select class="form-control" name="brother_count">
                                                            <option value='0'{{ $orphan->brother_count == '0' ? 'selected' : ''}}> 0 </option>
	                                                        <option value='1'{{ $orphan->brother_count == '1' ? 'selected' : ''}}> 1 </option>
                                                            <option value='2'{{ $orphan->brother_count == '2' ? 'selected' : ''}}> 2 </option>
                                                            <option value='3'{{ $orphan->brother_count == '3' ? 'selected' : ''}}> 3 </option> 
                                                            <option value='4'{{ $orphan->brother_count == '4' ? 'selected' : ''}}> 4 </option>
                                                            <option value='5'{{ $orphan->brother_count == '5' ? 'selected' : ''}}> 5 </option>
                                                            <option value='6'{{ $orphan->brother_count == '6' ? 'selected' : ''}}> 6 </option>
                                                            <option value='2'{{ $orphan->brother_count == '7' ? 'selected' : ''}}> 7 </option>
                                                            <option value='3'{{ $orphan->brother_count == '8' ? 'selected' : ''}}> 8 </option> 
                                                            <option value='4'{{ $orphan->brother_count == '9' ? 'selected' : ''}}> 9 </option>
                                                            <option value='5'{{ $orphan->brother_count == '10' ? 'selected' : ''}}> 10 </option>
                                                            </select> 
                                                            </td>
                                                        </tr>



                                                        <tr>
                                                        <td colspan="2">
                                                        <label for="images" class="control-label">الصورة</label>
                                                        <input type="file" name="images" class="dropify" accept=".jpg, .png, image/jpeg, image/png" data-height="70" />
                                                        </td>

                                                        <td colspan="2">
                                                        <label for="death_certif" class="control-label">شهادة الوفاة</label>
                                                        <input type="file" name="death_certif" class="dropify" accept=".jpg, .png, image/jpeg, image/png" data-height="70" />
                                                        </td>

                                                        </tr>

                                                        <tr>
                                                        <td> {{ Form::submit('حفظ', ['class'=>'btn btn-success btn-block'] )}}</td>
                                                         <td> {{ Html::linkRoute('orphans.show','الغاء',array($orphan->id),array('class'=>'btn btn-danger btn-block')) }}</td>
                                                        </tr>
                                                                            
                                                    </tbody>
                                                </table>
                                             {!! Form::close() !!}
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="tab5">
                                            <div class="table-responsive mt-15">
                                                <table class="table center-aligned-table mb-0 table-hover"
                                                    style="text-align:center">
                                                    <thead>
                                                        <tr class="text-dark">
                                                            <th>الاسم</th>
                                                            <th>النوع</th>
                                                            <th>الحالة</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                       4
                                                    </tbody>
                                                </table>


                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>

    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
    </script>
    
     
@endsection
