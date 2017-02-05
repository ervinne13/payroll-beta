<?php $uses = ["datatables", "form-utilities", "bootstrap-select", "multi-select", "datetime-picker"] ?>

@extends('layouts.bsb-side-nav')

@section('js-plugins')
<script src="{{url("vendor/underscore/underscore.js")}}"></script>
@endsection

@section('js')
<script type="text/javascript">
var code = '{{$employee->code}}';
var mode = '{{$mode}}';
var employeeWorkSchedules = JSON.parse('{!! $employee->employeeWorkSchedules()->with("workSchedule")->get() !!}');
</script>

@include('pages.hr.employees.templates.work-schedule-row')

<script src="{{url("js/pages/hr/employees/form.js")}}"></script>
@endsection


@section('content-header')

<h2>Employee: {{$mode}}</h2>

@endsection

@section('content')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <form class="fields-container" class="row">
            @include('pages.hr.employees.form-parts.basic-information')
            @include('pages.hr.employees.form-parts.contact-information')
            @include('pages.hr.employees.form-parts.system-information')
            @include('pages.hr.employees.form-parts.work-schedule')
        </form>

        @include('pages.hr.employees.modals.work-schedule')

        <div class="clearfix"></div>
        <div class="row m-b-100">
            <div class="col-lg-12">
                @include('subviews.form.form-actions')
            </div>
        </div>
    </div>
</div>

@endsection