<?php $uses = ["datatables", "bootstrap-select", "datetime-picker"]; ?>

@extends('layouts.bsb-side-nav')

@section('css')
<link href="{{url("css/pages/reports/payslip/payslip.css")}}" rel="stylesheet">
@endsection

@section('js')

@include("pages.reports.absence-and-tardiness.templates")

<script src="{{url("js/helpers.js")}}"></script>
<script src="{{url("vendor/underscore/underscore.js")}}"></script>
<script src="{{url("js/pages/reports/absence-and-tardiness/index.js")}}"></script>
@endsection

@section('content')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header hidden-print">
                <span class="col-lg-4">
                    <div class="form-group ">
                        <div class="form-line">
                            <input 
                                id="date-from"
                                data-date-format="dddd, MMMM DD YYYY"
                                placeholder="Starting Date"                                
                                class="form-control datepicker report-updating-field"
                                type="text" required >
                        </div>
                    </div>
                </span>

                <span class="col-lg-4">
                    <div class="form-group ">
                        <div class="form-line">
                            <input 
                                id="date-to"
                                data-date-format="dddd, MMMM DD YYYY"
                                placeholder="Ending Date"                                
                                class="form-control datepicker report-updating-field"
                                type="text" required >
                        </div>
                    </div>
                </span>

                <span class="col-lg-4">
                    <select id="employee-select" class="form-control selectpicker report-updating-field" data-live-search="true">
                        <option selected disabled>-- Select Employee --</option>
                        @foreach($employees AS $employee)
                        <option value="{{$employee->code}}">{{$employee->first_name}} {{$employee->last_name}}</option>
                        @endforeach
                    </select> 
                </span>               

                <span class="col-lg-12">
                    <div class="pull-right">
                        <button id="action-print" class="btn bg-success waves-effect">
                            <i class="fa fa-print"></i> Print
                        </button>
                    </div>                    
                </span>

                <div class="clearfix"></div>
            </div>
            <div id="printout-container" class="body">
                @include("pages.reports.absence-and-tardiness.print")
            </div>
        </div>
    </div>
</div>

@endsection