<?php $uses = ["datatables", "form_utilities", "bootstrap-select", "datetime-picker"]; ?>

@extends('layouts.bsb-side-nav')

@section('js')

@include('pages.payroll.payroll-entries.templates')

<script src="{{url("vendor/underscore/underscore.js")}}"></script>
<script src="{{url("js/sg-formatter.js")}}"></script>
<script src="{{url("js/pages/payroll/entries/index.js")}}"></script>
@endsection

@section('content')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 class="pull-left">
                    Payroll Entries
                </h2>

                <div class="pull-right">
                    <a id="action-load-entries" href="javascript:void(0)" class="btn bg-blue waves-effect">
                        <i class="fa fa-refresh"></i> Load Payroll Entries
                    </a>
                    <a href="{{url("payroll/entries/create")}}" class="btn bg-green waves-effect">
                        <i class="fa fa-plus"></i> Create New
                    </a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="body table-responsive">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Employee <span class="required">*</span></label>
                            <div class="form-line">
                                <select name="employee" class="form-control selectpicker"  data-live-search="true">
                                    <option selected disabled></option>
                                    @foreach($employees AS $employee)
                                    <option value="{{$employee->code}}">{{$employee->first_name}} {{$employee->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pay Period <span class="required">*</span></label>
                            <div class="form-line">
                                <input 
                                    data-date-format="dddd, MMMM DD YYYY"
                                    name="pay_period"                                        
                                    class="form-control datepicker"
                                    type="text" required >
                            </div>
                        </div>
                    </div>
                </div>                              

                <table id="payroll-entries-datatable" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th style="min-width: 55px;"></th>                            
                            <th>Description</th>
                            <th>Type</th>
                            <th class="align-right">Qty</th>
                            <th class="align-right">Amount</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot></tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection