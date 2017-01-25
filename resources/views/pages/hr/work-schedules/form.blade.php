<?php $uses                     = ["form-utilities", "bootstrap-select", "multi-select", "datetime-picker"] ?>

<?php
$days                     = [
    1 => "Sunday",
    2 => "Monday",
    3 => "Tuesday",
    4 => "Wednesday",
    5 => "Thursday",
    6 => "Friday",
    7 => "Saturday"
];
?>

@extends('layouts.bsb-side-nav')

@section('js')
<script type="text/javascript">
    var code = '{{$workSchedule->code}}';
    var mode = '{{$mode}}';
    var workScheduleShifts = JSON.parse('{!!$workSchedule->workScheduleShifts!!}');
    //
</script>
<script src="{{url("js/pages/hr/work-schedules/form.js")}}"></script>
@endsection

@section('css')
<style>
    .day-schedule-row td:nth-child(1) {
        text-align: right;
    }

    #work-schedule-days-table thead tr th:nth-child(2) {
        width: 60%;
    }
</style>
@endsection

@section('content')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Work Schedule <small>{{$mode}}</small>
                </h2>               
            </div>
            <div class="body">

                <form class="fields-container" class="row clearfix">

                    <!--Column 1-->
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Code <span class="required">*</span></label>
                            <div class="form-line">
                                <input value="{{$workSchedule->code}}" 
                                       name="code" 
                                       placeholder="Ex. STD_Weekday_M (Standard Weekday - Morning)" 
                                       class="form-control"
                                       type="text" maxlength="32" required>
                            </div>
                        </div>                        

                        <div class="form-group">
                            <label>Description</label>
                            <div class="form-line">
                                <input value="{{$workSchedule->description}}" 
                                       name="description" 
                                       placeholder="Ex. Monday to Friday Morning Work"
                                       class="form-control"
                                       type="text" maxlength="64"  >
                            </div>
                        </div>

                        <h3>Work Schedule Code Guide</h3>

                        <p>
                            Work schedule can be Standard (<b>STD</b>), Custom (<b>CUST</b>) or Temporary (<b>TEMP</b>). Use corresponding keywords when naming your work schedule code.
                        </p>

                        <p>
                            To differentiate between morning, mid shift, night shift, and mixed, use <b>M</b>, <b>MD</b>, <b>N</b>, and <b>MX</b> as code prefix respectively.
                            <br>
                            Ex. A temporary mixed schedule without Sundays should be named <b>TEMP_NoSunday_MX</b>
                        </p>
                    </div>
                    <!--*End of column 1-->

                    <!--Column 2-->
                    <div class="col-md-6">

                        <table id="work-schedule-days-table" class="table table-striped table-hover">                            
                            <thead>
                                <tr>
                                    <th>Day of the Week</th>
                                    <!--<th>Day Off</th>-->
                                    <th>Shift</th>
                                </tr>
                            </thead>
                            <tbody>

                                @if ($mode == "view")                               
                                <?php
                                $workScheduleShifts       = $workSchedule->workScheduleShifts()->with('shift')->get();
                                $mappedWorkScheduleShifts = [];

                                foreach ($workScheduleShifts AS $workScheduleShift) {
                                    $mappedWorkScheduleShifts[$workScheduleShift->week_day] = $workScheduleShift;
                                }
                                ?>
                                @endif

                                @foreach($days AS $dayId => $dayName)
                                <tr class="day-schedule-row" data-day-id="{{$dayId}}">
                                    <td>{{$dayName}}</td>
                                    <td>
                                        @if ($mode == "create" || $mode == "edit")
                                        <div class="form-line">
                                            <select name="shift_{{$dayId}}" class="form-control select-shift" placeholder="Shift">
                                                @foreach($shifts AS $shift)
                                                <option value="{{$shift->code}}">{{$shift->description}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @else
                                        {{$mappedWorkScheduleShifts[$dayId]->shift->description}}
                                        @endif
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>

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