<?php $uses = ["datatables", "bootstrap-select", "datetime-picker"]; ?>

@extends('layouts.bsb-side-nav')

@section('css')
<link href="{{url("css/pages/reports/payslip/payslip.css")}}" rel="stylesheet">
@endsection

@section('js')

@include("pages.reports.payslip.templates.print-details")

<script src="{{url("js/helpers.js")}}"></script>
<script src="{{url("vendor/underscore/underscore.js")}}"></script>
<script src="{{url("js/pages/payroll/payslip/payslip.js")}}"></script>
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
                                id="payroll-period-input"
                                data-date-format="dddd, MMMM DD YYYY"
                                placeholder="Select Payroll Period"                                
                                class="form-control datepicker"
                                type="text" required >
                        </div>
                    </div>
                </span>

                <span class="col-lg-4">
                    <select id="employee-select" class="form-control selectpicker"  data-live-search="true">
                        <option selected disabled>-- Select Employee --</option>
                        @foreach($employees AS $employee)
                        <option value="{{$employee->code}}">{{$employee->first_name}} {{$employee->last_name}}</option>
                        @endforeach
                    </select> 
                </span>               

                <div class="pull-right">
                    <button id="action-print" class="btn bg-success waves-effect">
                        <i class="fa fa-print"></i> Print
                    </button>
                </div>
                <div class="clearfix"></div>
            </div>
            <div id="printout-container" class="body">
                @include("pages.reports.payslip.print")
            </div>
        </div>
    </div>
</div>

@endsection