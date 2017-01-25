<?php $uses     = ["form-utilities", "bootstrap-select", "datetime-picker"] ?>

@extends('layouts.bsb-side-nav')

@section('js')
<script type="text/javascript">
    var code = '{{$holiday->code}}';
    var mode = '{{$mode}}';
</script>
<script src="{{url("js/pages/hr/holidays/form.js")}}"></script>
@endsection

@section('content')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Holiday <small>{{$mode}}</small>
                </h2>               
            </div>
            <div class="body">

                <form class="fields-container" class="row clearfix">

                    <!--Column 1-->
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Code <span class="required">*</span></label>
                            <div class="form-line">
                                <input value="{{$holiday->code}}" name="code" placeholder="Std: MM_DD_short_desc Ex. 01_01_NY for New Year. Unique" type="text" maxlength="32" required class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <div class="form-line">
                                <input value="{{$holiday->description}}" name="description" placeholder="Ex. New Year" type="text" maxlength="64" class="form-control" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Holiday Type <span class="required">*</span></label>
                            <div class="form-line">
                                <select name="holiday_type_code" class="form-control selectpicker">
                                    @foreach($holidayTypes AS $type)
                                    <?php $selected = $holiday->holiday_type_code == $type->code ? "selected" : "" ?>
                                    <option {{$selected}} value="{{$type->code}}">{{$type->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!--*End of column 1-->

                    <!--Column 2-->
                    <div class="col-md-6">                    
                        <div class="form-group">
                            <label>Date Start <span class="required">*</span></label>
                            <div class="form-line">
                                <input value="{{$holiday->date_start}}" name="date_start" data-date-format="dddd, MMMM DD YYYY" required class="form-control date datepicker">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Date End <span class="required">*</span></label>
                            <div class="form-line">
                                <input value="{{$holiday->date_end}}" name="date_end"  data-date-format="dddd, MMMM DD YYYY" required class="form-control date datepicker">
                            </div>
                        </div>
                    </div>                    

                </form>

                <div class="clearfix"></div>
                <div class="row">
                    @include('subviews.form.form-actions')
                </div>

            </div>
        </div>
    </div>
</div>

@endsection