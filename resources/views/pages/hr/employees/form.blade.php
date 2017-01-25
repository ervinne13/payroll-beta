<?php $uses     = ["form-utilities", "bootstrap-select", "multi-select", "datetime-picker"] ?>

@extends('layouts.bsb-side-nav')

@section('js')
<script type="text/javascript">
    var code = '{{$employee->code}}';
    var mode = '{{$mode}}';
</script>
<script src="{{url("js/pages/hr/employees/form.js")}}"></script>
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
                        Basic Information
                    </h2>               
                </div>
                <div class="body">

                    <!--Column 1-->
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Email <span class="required">*</span></label>
                            <div class="form-line">
                                <input value="{{$employee->email}}"
                                       name="email" 
                                       placeholder="juandc@poms.com.ph" 
                                       class="form-control"
                                       type="text" maxlength="64" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label>First Name <span class="required">*</span></label>
                            <div class="form-line">
                                <input value="{{$employee->first_name}}"
                                       name="first_name" 
                                       placeholder="Juan" 
                                       class="form-control"
                                       type="text" maxlength="32" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Middle Name </label>
                            <div class="form-line">
                                <input value="{{$employee->middle_name}}"
                                       name="middle_name" 
                                       placeholder="Carpio" 
                                       class="form-control"
                                       type="text" maxlength="32" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Last Name <span class="required">*</span></label>
                            <div class="form-line">
                                <input value="{{$employee->last_name}}"
                                       name="last_name" 
                                       placeholder="Dela Cruz" 
                                       class="form-control"
                                       type="text" maxlength="32" required >
                            </div>
                        </div>
                    </div>
                    <!--*End of column 1-->

                    <!--Column 2-->
                    <div class="col-md-6">                    
                        <div class="form-group">
                            <label>Birth Date <span class="required">*</span></label>
                            <div class="form-line">
                                <input value="{{$employee->birth_date}}"
                                       name="birth_date"                                        
                                       class="form-control datepicker"
                                       type="text" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Gender <span class="required">*</span></label>
                            <div class="form-line">
                                <select name="gender_code" class="form-control selectpicker">
                                    <option {{$employee->gender_code == "M" ? "selected" : ""}} value="M">Male</option>
                                    <option {{$employee->gender_code == "F" ? "selected" : ""}} value="F">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Civil Status <span class="required">*</span></label>
                            <div class="form-line">
                                <select name="gender_code" class="form-control selectpicker">
                                    <option {{$employee->gender_code == "S" ? "selected" : ""}} value="S">Single</option>
                                    <option {{$employee->gender_code == "M" ? "selected" : ""}} value="M">Married</option>
                                </select>
                            </div>
                        </div>

                    </div>


                    <div class="clearfix"></div>

                </div>
            </div>

            <div class="card">
                <div class="header">
                    <h2>
                        Contact Information
                    </h2>               
                </div>
                <div class="body">

                    <!--Column 1-->
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Phone Number </label>
                            <div class="form-line">
                                <input value="{{$employee->phone_number}}"
                                       name="phone_number" 
                                       placeholder="777-7777" 
                                       class="form-control"
                                       type="text" maxlength="10" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Contact Number 1 <span class="required">*</span></label>
                            <div class="form-line">
                                <input value="{{$employee->contact_number_1}}"
                                       name="contact_number_1" 
                                       placeholder="+6391234567" 
                                       class="form-control"
                                       type="text" maxlength="13" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Contact Number 2</label>
                            <div class="form-line">
                                <input value="{{$employee->contact_number_2}}"
                                       name="contact_number_2" 
                                       placeholder="+6391234567" 
                                       class="form-control"
                                       type="text" maxlength="13" >
                            </div>
                        </div>
                    </div>
                    <!--*End of column 1-->

                    <!--Column 2-->
                    <div class="col-md-6">                    
                        <div class="form-group">
                            <label>Address <span class="required">*</span></label>
                            <div class="form-line">
                                <textarea name="address" class="form-control" required>{{$employee->address}}</textarea>
                            </div>
                        </div>                     
                    </div>


                    <div class="clearfix"></div>

                </div>
            </div>

            <div class="card">
                <div class="header">
                    <h2>
                        System Information
                    </h2>               
                </div>
                <div class="body">

                    <!--Column 1-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Position <span class="required">*</span></label>
                            <div class="form-line">
                                <select name="position" required class="form-control selectpicker" data-live-search="true">
                                    @foreach($positions AS $position)
                                    <?php $selected = $position->code == $employee->position_code ? "selected" : "" ?>
                                    <option {{$selected}} value="{{$position->code}}">{{$position->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Company <span class="required">*</span></label>
                            <div class="form-line">
                                <select name="company" required class="form-control selectpicker" data-live-search="true">
                                    @foreach($companies AS $company)
                                    <?php $selected = $company->code == $employee->company_code ? "selected" : "" ?>
                                    <option {{$selected}} value="{{$company->code}}">{{$company->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Location <span class="required">*</span></label>
                            <div class="form-line">
                                <select name="location" required class="form-control selectpicker" data-live-search="true">
                                    @foreach($locations AS $location)
                                    <?php $selected = $location->code == $employee->location_code ? "selected" : "" ?>
                                    <option {{$selected}} value="{{$location->code}}">{{$location->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Policy <span class="required">*</span></label>
                            <div class="form-line">
                                <select name="policy" required class="form-control selectpicker" data-live-search="true">
                                    @foreach($policies AS $policy)
                                    <?php $selected = $policy->code == $employee->policy_code ? "selected" : "" ?>
                                    <option {{$selected}} value="{{$policy->code}}">{{$policy->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!--*End of column 1-->

                    <!--Column 2-->
                    <div class="col-md-6">                    
                        <div class="form-group">
                            <label>Date Hired <span class="required">*</span></label>
                            <div class="form-line">
                                <input value="{{$employee->date_hired}}"
                                       name="date_hired"                                        
                                       class="form-control datepicker"
                                       type="text" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Date Dismissed</label>
                            <div class="form-line">
                                <input value="{{$employee->date_dismissed}}"
                                       name="date_dismissed"                                        
                                       class="form-control datepicker"
                                       type="text" >
                            </div>
                        </div>                   
                    </div>


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