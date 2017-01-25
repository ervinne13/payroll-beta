<?php $uses     = ["form-utilities", "bootstrap-select"] ?>

@extends('layouts.bsb-side-nav')

@section('js')
<script type="text/javascript">
    var code = '{{$position->code}}';
    var mode = '{{$mode}}';
</script>
<script src="{{url("js/pages/positions/form.js")}}"></script>
@endsection

@section('content')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Position <small>{{$mode}}</small>
                </h2>               
            </div>
            <div class="body">

                <form class="fields-container" class="row clearfix">

                    <!--Column 1-->
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Code <span class="required">*</span></label>
                            <div class="form-line">
                                <input value="{{$position->code}}" 
                                       name="code" 
                                       placeholder="Ex. 1001" type="number" maxlength="5" required class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <div class="form-line">
                                <input value="{{$position->name}}" name="name" placeholder="Ex. Janitor" type="text" maxlength="64" class="form-control" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Level <span class="required">*</span></label>
                            <div class="form-line">
                                <select name="position_level_code" class="form-control selectpicker">
                                    @foreach($levels AS $level)
                                    <?php $selected = $level->code == $position->position_level_code ? "selected" : "" ?>
                                    <option {{$selected}} value="{{$level->code}}">{{$level->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Parent</label>
                            <div class="form-line">
                                <select name="parent_code" class="form-control selectpicker">
                                    <option {{$position->parent_code == NULL ? "selected" : ""}} value="none">None</option>
                                    @foreach($positions AS $parentPosition)
                                    <?php $selected = $parentPosition->code == $position->parent_code ? "selected" : "" ?>
                                    <option {{$selected}} value="{{$parentPosition->code}}">{{$parentPosition->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <!--*End of column 1-->

                    <!--Column 2-->
                    <div class="col-md-6">                    

                        <h3>Position Code Guide</h3>

                        <p>
                            Positions start at 1000. For uniformity, use the following convention:
                        </p>

                        <table class="table table-striped">
                            <tr>
                                <th>Level</th>
                                <th>Range</th>
                            </tr>
                            <tr>
                                <td>Rank & File</td>
                                <td>1001 - 1999</td>
                            </tr>                            
                            <tr>
                                <td>Supervisory</td>
                                <td>2001 - 2999</td>
                            </tr>
                            <tr>
                                <td>Managerial</td>
                                <td>3001 - 3999</td>
                            </tr>
                            <tr>
                                <td>Directoral</td>
                                <td>4001 - 4999</td>
                            </tr>
                            <tr>
                                <td>Executive</td>
                                <td>5001 - 5999</td>
                            </tr>
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