<?php $uses = ["form-utilities", "bootstrap-select"] ?>

@extends('layouts.bsb-side-nav')

@section('js')
<script type="text/javascript">
    var code = '{{$payrollItem->code}}';
    var mode = '{{$mode}}';
</script>
<script src="{{url("js/pages/payroll/items/form.js")}}"></script>
@endsection

@section('content')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Payroll Item <small>{{$mode}}</small>
                </h2>               
            </div>
            <div class="body">

                <form class="fields-container" class="row clearfix">

                    <!--Column 1-->
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Code <span class="required">*</span></label>
                            <div class="form-line">
                                <input value="{{$payrollItem->code}}" 
                                       name="code" 
                                       placeholder="Ex. STD_D_BTL (Break Time Lates)" 
                                       class="form-control"
                                       type="text" maxlength="32" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <div class="form-line">
                                <input value="{{$payrollItem->description}}" 
                                       name="description" 
                                       placeholder="Ex. Break Time Lates" 
                                       class="form-control"
                                       type="text" maxlength="64"  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Payslip Display String</label>
                            <div class="form-line">
                                <input value="{{$payrollItem->payslip_display_string}}" 
                                       name="payslip_display_string" 
                                       placeholder="Ex. Lates" 
                                       class="form-control"
                                       type="text" maxlength="32"  >
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Type</label>
                            <div class="form-line">
                                <select name="type" class="form-control">
                                    <option {{$payrollItem->computation_basis == "D" ? "selected" : ""}} value="D">Deduction</option>
                                    <option {{$payrollItem->computation_basis == "E" ? "selected" : ""}} value="E">Earnings</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Computation Basis</label>
                            <div class="form-line">
                                <select name="computation_basis" class="form-control">
                                    <option {{$payrollItem->computation_basis == "DAY" ? "selected" : ""}} value="D">Day</option>
                                    <option {{$payrollItem->computation_basis == "HR" ? "selected" : ""}} value="H">Hour</option>
                                    <option {{$payrollItem->computation_basis == "MIN" ? "selected" : ""}} value="M">Minute</option>
                                    <option {{$payrollItem->computation_basis == "EA" ? "selected" : ""}} value="EA">Exact Amount</option>
                                </select>
                            </div>
                        </div>                        
                    </div>
                    <!--*End of column 1-->

                    <!--Column 2-->
                    <div class="col-md-6">      

                        <div class="input-group">
                            <label>Computation Multiplier</label>
                            <div class="form-line">
                                <input value="{{$payrollItem->multiplier}}" 
                                       name="multiplier" 
                                       placeholder="Ex. 1 or 1.69 (On Special Holiday Overtime)" 
                                       class="form-control"
                                       type="number" maxlength="3">
                            </div>
                            <span class="input-group-addon">%</span>
                        </div>

                        <div class="input-group">
                            <label>Computation Divider</label>
                            <div class="form-line">
                                <input value="{{$payrollItem->divider}}" 
                                       name="divider" 
                                       placeholder="Ex. 1" 
                                       class="form-control"
                                       type="number" maxlength="3"  >
                            </div>
                            <span class="input-group-addon">%</span>
                        </div>

                        <div class="form-group">
                            @if($payrollItem->standard)
                            <input type="checkbox" name="standard" id="check-standard" disabled checked />
                            <label for="check-standard">Standard?</label>
                            @endif

                            <input type="checkbox" name="taxable" id="check-taxable" {{$payrollItem->taxable ? "checked" : ""}} />
                            <label for="check-taxable">Taxable?</label>
                            
                            <input type="checkbox" name="requires_employee_amount" id="check-requires-employee-amount" {{$payrollItem->requires_employee_amount ? "checked" : ""}} />
                            <label for="check-requires-employee-amount">Requires Employee Amount?</label>
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