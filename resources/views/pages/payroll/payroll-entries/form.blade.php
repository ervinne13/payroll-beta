<?php $uses = ["form-utilities", "bootstrap-select"] ?>

@extends('layouts.bsb-side-nav')

@section('js')
<script type="text/javascript">
    var payrollEntry = JSON.parse('{!!$payrollEntry!!}');
    var mode = '{{$mode}}';
</script>
<script src="{{url("js/pages/payroll/entries/form.js")}}"></script>
@endsection

@section('content')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Payroll Entry / Adjustment Entry <small>{{$mode}}</small>
                </h2>               
            </div>
            <div class="body">

                <form class="fields-container" class="row clearfix">

                    <!--Column 1-->
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Employee <span class="required">*</span></label>
                            <div class="form-line">
                                <select name="employee_code" class="form-control">
                                    @foreach($employees as $employee)
                                    <option value="{{$employee->code}}">{{$employee->first_name}} {{$employee->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Payroll Item <span class="required">*</span></label>
                            <div class="form-line">
                                <select name="payroll_item_code" class="form-control">
                                    @foreach($payrollItems as $payrollItem)
                                    <option value="{{$payrollItem->code}}">{{$payrollItem->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <!--*End of column 1-->

                    <!--Column 2-->
                    <div class="col-md-6">      

                        <div class="form-group">
                            <label>Qty <span class="required">*</span></label>
                            <div class="form-line">
                                <input value="{{$payrollEntry->qty}}" 
                                       name="qty" 
                                       placeholder="" 
                                       class="form-control"
                                       type="text" maxlength="32"  >
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Amount <span class="required">*</span></label>
                            <div class="form-line">
                                <input value="{{$payrollEntry->amount}}" 
                                       name="amount" 
                                       placeholder="Ex. How much deduction or earning per qty" 
                                       class="form-control"
                                       type="text" maxlength="32"  >
                            </div>
                        </div>


                        <div class="form-group">
                            <label>Remarks</label>
                            <div class="form-line">
                                <textarea name="remarks" class="form-control"></textarea>
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