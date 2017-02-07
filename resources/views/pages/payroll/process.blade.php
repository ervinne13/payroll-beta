<?php $uses = ["form-utilities", "datetime-picker"] ?>

@extends('layouts.bsb-side-nav')

@section('js-plugins')
<script src="{{bsb_plugins_url("jquery-steps/jquery.steps.min.js")}}"></script>
@endsection

@section('js')
<script src="{{url("js/helpers.js")}}"></script>
<script src="{{url("js/modules/payroll-processor.js")}}"></script>
<script src="{{url("js/pages/payroll/process/processor.js")}}"></script>
@endsection

@section('content-header')

<h2>Payroll Process</h2>
<small>This module will guide you through the payroll process</small>

@endsection

@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">              

                <div id="wizard">

                    <h1>Payroll Setup</h1>
                    <div class="row">
                        <div id="payroll-setup-field-container" class="col-lg-6">                            
                            <b>Cut-off Start</b>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">date_range</i>
                                </span>
                                <div class="form-line">
                                    <input name="cutoff_start" data-date-format="dddd, MMMM DD YYYY" type="text" class="payroll-field form-control date datepicker" placeholder="Ex: 01/11/2016">
                                </div>
                            </div>

                            <b>Cut-off End</b>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">date_range</i>
                                </span>
                                <div class="form-line">
                                    <input name="cutoff_end" data-date-format="dddd, MMMM DD YYYY" type="text" class="payroll-field form-control date datepicker" placeholder="Ex: 01/25/2016">
                                </div>
                            </div>

                            <b>Pay Period</b>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">date_range</i>
                                </span>
                                <div class="form-line">
                                    <input name="pay_period" data-date-format="dddd, MMMM DD YYYY" type="text" class="payroll-field form-control date datepicker" placeholder="Ex: 01/31/2016">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Approved By:</label>
                                <div class="form-line">
                                    <input type="text" name="approved_by" class="form-control" placeholder="Please provide the approver's name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Received By:</label>
                                <div class="form-line">
                                    <input type="text" name="received_by" class="form-control" placeholder="Please provide the receiver's name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Prepared By:</label>
                                <div class="form-line">
                                    <input type="text" readonly name="prepared_by" class="form-control" value="{{Auth::user()->display_name}}">
                                </div>
                            </div>

                            <input type="checkbox" id="check_include_monthly_processable" name="include_monthly_processable" class="payroll-field "/>
                            <label for="check_include_monthly_processable">Include Monthly Processable</label>

                        </div>

                        <div class="col-lg-6">

                            <h3>Payroll Setup</h3>

                            <p>Check "Include Monthly Processable" checkbox to include SSS, PAGIBIG, etc. in the current payroll.</p>

                            <p>If you are reprocessing this payroll pay period, note that this will only overwrite previously created payroll entries which does NOT include payroll entry adjustments that are manually entered in the "Payroll Entries" module.</p>

                        </div>

                    </div>                    

                    <h1>Payroll Processing</h1>
                    <div>
                        <h4>Progress:</h4>
                        <div class="progress">
                            <div id="payroll-process-progress-bar" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                                <!--<span class="sr-only">85% Complete <i class="fa fa-warning"></i> (Error!)</span>-->
                            </div>
                        </div>

                        <label id="payroll-process-status-label"></label>

                        <div class="row">
                            <div class="col-lg-6 col-lg-offset-3">
                                <button id="action-start-payroll-process" type="button" class="btn bg-cyan btn-block btn-lg waves-effect">
                                    Start Processing Payroll
                                </button>
                            </div>
                        </div>

<!--                        <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                            <div class="panel-group full-body" id="error-accordion-container" role="tablist" aria-multiselectable="true">
                                <div class="panel panel-col-pink">
                                    <div class="panel-heading" role="tab">
                                        <h4 class="panel-title">
                                            <a role="button" class="collapsed" data-toggle="collapse" href="#collapse_error" aria-expanded="false" aria-controls="collapse_error">
                                                <i class="material-icons">warning</i> 
                                                There was an error when processing payroll.

                                                - Click for details about the error
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse_error" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapse_error">
                                        <div class="panel-body">
                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute,
                                            non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                                            eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                                            single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh
                                            helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                            Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table,
                                            raw denim aesthetic synth nesciunt you probably haven't heard of them
                                            accusamus labore sustainable VHS.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>-->

                    </div>

                    <h1>Close Pay Period</h1>
                    <div>

                        <h1 class="text-danger m-t-10"><i class="fa fa-warning"></i> Warning!</h1>
                        <b>Once the period is closed, it cannot be opened again!</b>

                        <div class="row m-t-10 m-b-35">
                            <div class="col-lg-6 col-lg-offset-3">
                                <button type="button" class="btn bg-pink btn-block btn-lg waves-effect">
                                    <i class="fa fa-warning"></i>
                                    Close Pay Period!
                                </button>
                            </div>
                        </div>

                        <p>
                            Previously closed transactions are available via reports (tentative).
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
