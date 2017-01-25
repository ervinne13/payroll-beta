<?php $uses = ["form-utilities", "bootstrap-select", "datetime-picker"] ?>

@extends('layouts.bsb-side-nav')

@section('js')
<script type="text/javascript">
    var code = '{{$shiftBreak->code}}';
    var mode = '{{$mode}}';
</script>
<script src="{{url("js/pages/hr/shift-breaks/form.js")}}"></script>
@endsection

@section('content')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Shift <small>{{$mode}}</small>
                </h2>               
            </div>
            <div class="body">

                <form class="fields-container" class="row clearfix">

                    <!--Column 1-->
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Code <span class="required">*</span></label>
                            <div class="form-line">
                                <input value="{{$shiftBreak->code}}" name="code" placeholder="Ex. MB01 for Morning Break 1" type="text" maxlength="32" required class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <div class="form-line">
                                <input value="{{$shiftBreak->description}}" name="description" placeholder="Ex. Morning Break 1" type="text" maxlength="64" class="form-control" >
                            </div>
                        </div>                      
                    </div>
                    <!--*End of column 1-->

                    <!--Column 2-->
                    <div class="col-md-6">                    
                        <div class="form-group">
                            <label>Break Start <span class="required">*</span></label>
                            <div class="form-line">
                                <input value="{{$shiftBreak->break_start}}" name="break_start" data-time-format="HH:mm a" required class="form-control time timepicker">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Break End <span class="required">*</span></label>
                            <div class="form-line">
                                <input value="{{$shiftBreak->break_end}}" name="break_end"  data-time-format="HH:mm a" required class="form-control time timepicker">
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