<?php $uses     = ["form-utilities", "bootstrap-select", "datetime-picker"] ?>

@extends('layouts.bsb-side-nav')

@section('js-plugins')
<script src="{{url("js/sg-table.js")}}"></script>
@endsection

@section('js')
<script type="text/javascript">
var code = '{{$policy->code}}';
var mode = '{{$mode}}';
</script>
<script src="{{url("js/pages/hr/policies/form.js")}}"></script>
@endsection

@section('content')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Policy <small>{{$mode}}</small>
                </h2>               
            </div>
            <div class="body">

                <form class="fields-container" class="row clearfix">

                    <!--Column 1-->
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Code <span class="required">*</span></label>
                            <div class="form-line">
                                <input value="{{$policy->code}}" name="code" placeholder="A unique identifier for your policy" type="text" maxlength="32" required class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Short Description / Name</label>
                            <div class="form-line">
                                <input value="{{$policy->short_description}}" name="short_description" placeholder="The name of your policy" type="text" maxlength="64" class="form-control" >
                            </div>
                        </div>
                    </div>
                    <!--*End of column 1-->

                    <!--Column 2-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Long Description</label>
                            <div class="form-line">
                                <textarea style="min-height: 300px;" name="long_description" class="form-control" >{{$policy->long_description}}</textarea>
                            </div>
                        </div>
                    </div>                    

                    <div class="col-md-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td style="min-width: 55px;">Included?</td>
                                    <td>Payroll Item</td>
                                    <td>Type</td>
                                    <td>Taxable</td>
                                    <td>Computation Source</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payrollItems AS $payrollItem)
                                <tr class="payroll-item-row" data-payroll-item-code="{{$payrollItem->code}}">
                                    <td>
                                        <input type="checkbox" id="payroll-item-selected-{{$payrollItem->code}}" class="payroll-item-selected filled-in" data-payroll-item-code="{{$payrollItem->code}}" {{$policy->hasPayrollItem($payrollItem->code) ? "checked" : ""}} />
                                        <label for="payroll-item-selected-{{$payrollItem->code}}"></label>
                                    </td>
                                    <td>
                                        {{$payrollItem->description}}
                                        <div>
                                            <b class="error-message-container"></b>
                                        </div>
                                    </td>
                                    <td>{{$payrollItem->type == "E" ? "Earnings" : "Deduction"}}</td>                                
                                    <td>{{$payrollItem->taxable ? "Yes" : "No"}}</td>
                                    <td>
                                        <div class="form-group" style="margin-bottom: 0px;">
                                            <div class="form-line">
                                                <select name="computation_source" class="computation-source form-control selectpicker" data-live-search="true" data-payroll-item-code="{{$payrollItem->code}}">
                                                    <option selected value=""><span class="text-muted">No Dependency</span></option>
                                                    @foreach($payrollItems AS $selectablePayrollItem)
                                                    <?php $selected = $payrollItem->policyPayrollItem && $selectablePayrollItem->code == $payrollItem->policyPayrollItem->computation_source ? "selected" : "" ?>
                                                    <option {{$selected}} value="{{$selectablePayrollItem->code}}">{{$selectablePayrollItem->description}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
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