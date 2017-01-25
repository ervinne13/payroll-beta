<?php $uses     = ["form-utilities", "bootstrap-select"] ?>

@extends('layouts.bsb-side-nav')

@section('js')
<script type="text/javascript">
    var id = '{{$user->id}}'
</script>
<script src="{{url("js/pages/security/users/form.js")}}"></script>
@endsection

@section('content')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    User <small>{{$mode}}</small>
                </h2>               
            </div>
            <div class="body">

                <form class="fields-container" class="row clearfix">

                    <div class="col-md-6">

                        <div class="form-group">
                            <label>User I.D. <span class="required">*</span></label>
                            <div class="form-line">
                                <input name="id" type="text" class="form-control" placeholder="Ex. JDelaCruz for <Juan Dela Cruz>, must be unique">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Display Name <span class="required">*</span></label>
                            <div class="form-line">
                                <input name="display_name" type="text" class="form-control" placeholder="Your Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Role <span class="required">*</span></label>
                            <div class="form-line">
                                <select name="role_code" class="form-control">
                                    @foreach($roles AS $role)
                                    <?php $selected = $user->role_code == $role->code ? "selected" : "" ?>
                                    <option {{$selected}} value="{{$role->code}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>                        

                        <div class="form-group">
                            <label>Link to Employee</label>
                            <div class="form-line">
                                <select name="employee_id" class="form-control" data-live-search="true">
                                    <option value="none">Non Employee</option>
                                    @foreach($employees AS $employee)
                                    <?php $selected = $user->employee_id == $employee->id ? "selected" : "" ?>
                                    <option {{$selected}} value="{{$employee->id}}">{{$employee->first_name}} {{$employee->last_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Default Company <span class="required">*</span></label>
                            <div class="form-line">
                                <select name="default_company_code" class="form-control">
                                    <option selected disabled></option>
                                    @foreach($companies AS $company)
                                    <?php $selected = $user->default_company_code == $company->code ? "selected" : "" ?>
                                    <option {{$selected}} value="{{$company->code}}">{{$company->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Default Location <span class="required">*</span></label>
                            <div class="form-line">
                                <select name="default_location_code" class="form-control">
                                    <option selected disabled></option>
                                    @foreach($locations AS $location)
                                    <?php $selected = $user->default_location_code == $location->code ? "selected" : "" ?>
                                    <option {{$selected}} value="{{$location->code}}">{{$location->description}} ({{$location->company_code}})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>                        

                    </div>

                    <div class="col-md-6">
                        @if($mode === "create")
                        <div class="form-group">
                            <label>Password <span class="required">*</span></label>
                            <div class="form-line">
                                <input name="password" type="password" class="form-control" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Repeat Password <span class="required">*</span></label>
                            <div class="form-line">
                                <input name="password_repeat" type="password" class="form-control" placeholder="Make sure your passwords match">
                            </div>
                        </div>
                        @elseif($mode === "edit")

                        <div class="form-group">
                            <label>Change Password?</label>
                            <div class="switch">
                                <label>
                                    <input id="action-switch-change-password" type="checkbox">
                                    <span class="lever switch-col-light-green"></span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Old Password <span class="required">*</span></label>
                            <div class="form-line">
                                <input name="old_password" disabled type="password" class="form-control" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>New Password <span class="required">*</span></label>
                            <div class="form-line">
                                <input name="password" disabled type="password" class="form-control" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Repeat New Password <span class="required">*</span></label>
                            <div class="form-line">
                                <input name="password_repeat" disabled type="password" class="form-control" placeholder="Make sure your passwords match">
                            </div>
                        </div>

                        @endif

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