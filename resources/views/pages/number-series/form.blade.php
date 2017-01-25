<?php $uses = ["form-utilities", "bootstrap-select", "datetime-picker"] ?>

@extends('layouts.bsb-side-nav')

@section('js')
<script src="{{url("js/pages/number-series/form.js")}}"></script>
<script type="text/javascript">
var code = '{{$numberSeries->code}}';
</script>

@endsection

@section('content')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Number Series <small>{{$mode}}</small>
                </h2>               
            </div>
            <div class="body">

                <form class="fields-container" class="row clearfix">

                    <!--Column 1-->
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Code <span class="required">*</span></label>
                            <div class="form-line">
                                <input value="{{$numberSeries->code}}" ame="code" type="text" maxlength="32" required class="form-control" placeholder="Ex. CA (or CA-2017) for Cash Advance, must be unique.">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <div class="form-line">
                                <input value="{{$numberSeries->description}}" name="description" type="text" maxlength="64" class="form-control" placeholder="Description of this number series">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Applies to Module <span class="required">*</span></label>
                            <div class="form-line" >
                                @include('subviews.form.module-select', [
                                "value" => $numberSeries->module_code
                                ])
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Expiry Date <span class="required">*</span></label>
                            <div class="form-line">
                                <input value="{{$numberSeries->expiry_date}}" name="expiry_date"  data-date-format="dddd, MMMM DD YYYY" required class="form-control date datepicker">
                            </div>
                        </div>
                    </div>
                    <!--*End of column 1-->

                    <!--Column 2-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Start Number <span class="required">*</span></label>
                            <div class="form-line">
                                <input value="{{$numberSeries->start_number}}" type="number" maxlength="10" required class="form-control" placeholder="Ex. 0, if ending number is 99999, resulting no. is XX-00001">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>End Number <span class="required">*</span></label>
                            <div class="form-line">
                                <input value="{{$numberSeries->end_number}}" type="number" maxlength="10" required class="form-control" placeholder="Ex. 99999. This will be the last number usable">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Last Number Used </label>
                            <div class="form-line">
                                <input value="{{$numberSeries->last_number_used}}" type="number" maxlength="10" class="form-control" placeholder="Use this only for adjustments">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Last Date Used </label>
                            <div class="form-line">
                                <input value="{{$numberSeries->last_date_used}}" type="date" disabled maxlength="10" class="form-control date">
                            </div>
                        </div>
                    </div>                    

                </form>

                <div class="row clearfix">
                    @include('subviews.form.form-actions')
                </div>

            </div>
        </div>
    </div>
</div>

@endsection