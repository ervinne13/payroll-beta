<?php $uses = ["datatables", "bootstrap-select"]; ?>

@extends('layouts.bsb-side-nav')

@section('js')
<script src="{{url("js/pages/timekeeping/employees/index.js")}}"></script>
@endsection

@section('content')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 class="pull-left">
                    Employee <small>list</small>
                </h2>               
                <div class="clearfix"></div>
            </div>
            <div class="body table-responsive">
                <table id="employees-datatable" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th></th>                            
                            <th>Employee Code</th>
                            <th>Name</th>
                            <th>Position</th>                            
                            <th>Contact 1</th>                            
                            <th>Policy / Work Status</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection