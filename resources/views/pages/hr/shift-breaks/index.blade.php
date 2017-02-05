<?php $uses = ["datatables", "bootstrap-select"]; ?>

@extends('layouts.bsb-side-nav')

@section('js')
<script src="{{url("js/pages/hr/shift-breaks/index.js")}}"></script>
@endsection

@section('content')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 class="pull-left">
                    Shift Break <small>list</small>
                </h2>

                <div class="pull-right">
                    <a href="{{url("hr/shift-breaks/create")}}" class="btn bg-green waves-effect">
                        <i class="fa fa-plus"></i> Create New
                    </a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="body table-responsive">
                <table id="shift-breaks-datatable" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Code</th>
                            <th>Description</th>
                            <th>Start</th>
                            <th>End</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection