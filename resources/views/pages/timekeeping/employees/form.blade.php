<?php $uses = ["datatables", "form-utilities", "bootstrap-select", "multi-select", "datetime-picker"] ?>

@extends('layouts.bsb-side-nav')

@section('js')
<script type="text/javascript">
    var code = '{{$employee->code}}';
    var mode = '{{$mode}}';
</script>
<script src="{{url("js/pages/timekeeping/employees/form.js")}}"></script>
@endsection


@section('content-header')

<h2>Employee: {{$mode}}</h2>

@endsection

@section('content')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

        <form class="fields-container" class="row">

            <div class="card">
                <div class="header">
                    <h2>
                        {{$employee->first_name}} {{$employee->last_name}} ({{$employee->code}})
                    </h2>               
                </div>
                <div class="body table-responsive">

                    <table id="chronolog-datatable" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Entry Date</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                            </tr>
                        </thead>
                    </table>

                    <div class="clearfix"></div>

                </div>
            </div>

        </form>

        <div class="clearfix"></div>
        <div class="row m-b-100">
            <div class="col-lg-12">
                @include('subviews.form.form-actions')
            </div>
        </div>
    </div>
</div>

@endsection