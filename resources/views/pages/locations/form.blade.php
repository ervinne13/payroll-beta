<?php $uses     = ["form-utilities", "bootstrap-select"] ?>

@extends('layouts.bsb-side-nav')

@section('js')
<script type="text/javascript">
    var code = '{{$location->code}}';
    var mode = '{{$mode}}';
</script>
<script src="{{url("js/pages/locations/form.js")}}"></script>
@endsection

@section('content')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Location <small>{{$mode}}</small>
                </h2>               
            </div>
            <div class="body">

                <form class="fields-container" class="row clearfix">

                    <!--Column 1-->
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Code <span class="required">*</span></label>
                            <div class="form-line">
                                <input value="{{$location->code}}" 
                                       name="code" 
                                       placeholder="Ex. HO for Head Office" type="text" maxlength="32" required class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Description <span class="required">*</span></label>
                            <div class="form-line">
                                <input value="{{$location->description}}" name="description" placeholder="Ex. Head Office" type="text" maxlength="64" class="form-control" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Address</label>
                            <div class="form-line">
                                <textarea name="address" class="form-control">{{$location->address}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Company <span class="required">*</span></label>
                            <div class="form-line">
                                <select name="company_code" class="form-control selectpicker">
                                    @foreach($companies AS $company)
                                    <?php $selected = $company->code == $location->company_code ? "selected" : "" ?>
                                    <option {{$selected}} value="{{$company->code}}">{{$company->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <!--*End of column 1-->

                    <!--Column 2-->
                    <div class="col-md-6">                    

                        <h3>Location Code Guide</h3>

                        <p>
                            Location codes MUST be unique for every company.
                        </p>

                        <p>
                            For example, having multiple locations with <b>HO</b> as code is okay as long as they belong on multiple, different companies.
                        </p>
                        
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