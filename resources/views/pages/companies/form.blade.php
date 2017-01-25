<?php $uses           = ["form-utilities", "bootstrap-select", "multi-select", "datetime-picker"] ?>

<?php
$selectedBreaks = [];
foreach ($shift->breaks AS $break) {
    array_push($selectedBreaks, $break->code);
}
?>

@extends('layouts.bsb-side-nav')

@section('js')
<script type="text/javascript">
    var code = '{{$shift->code}}';
    var mode = '{{$mode}}';
</script>
<script src="{{url("js/pages/hr/shifts/form.js")}}"></script>
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
                                <input value="{{$shift->code}}" name="code" placeholder="Std: MM_DD_short_desc Ex. 01_01_NY for New Year. Unique" type="text" maxlength="32" required class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <div class="form-line">
                                <input value="{{$shift->description}}" name="description" placeholder="Ex. New Year" type="text" maxlength="64" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <!--*End of column 1-->

                    <!--Column 2-->
                    <div class="col-md-6">                    
                        <div class="form-group">
                            <label>Scheduled In <span class="required">*</span></label>
                            <div class="form-line">
                                <input value="{{$shift->scheduled_in}}" name="scheduled_in" data-time-format="HH:mm a" required class="form-control time timepicker">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Scheduled Out <span class="required">*</span></label>
                            <div class="form-line">
                                <input value="{{$shift->scheduled_out}}" name="scheduled_out"  data-time-format="HH:mm a" required class="form-control time timepicker">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Breaks <span class="required">*</span></label>
                            <div class="form-line">
                                <select name="breaks" class="form-control multi-select" multiple='multiple'>
                                    @foreach($breaks AS $break)
                                    <?php $selected = in_array($break->code, $selectedBreaks) ? "selected" : "" ?>
                                    <option {{$selected}} value="{{$break->code}}">{{$break->description}} ({{$break->break_start}} - {{$break->break_end}})</option>
                                    @endforeach
                                </select>
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