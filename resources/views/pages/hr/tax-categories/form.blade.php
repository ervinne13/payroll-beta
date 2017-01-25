<?php $uses = ["form-utilities", "bootstrap-select", "datetime-picker", "auto-numeric"] ?>

@extends('layouts.bsb-side-nav')

@section('js')
<script type="text/javascript">
    var code = '{{$taxCategory->code}}';
    var mode = '{{$mode}}';
</script>
<script src="{{url("js/pages/hr/tax-categories/form.js")}}"></script>
@endsection

@section('content')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    Tax Category <small>{{$mode}}</small>
                </h2>               
            </div>
            <div class="body">

                <form class="fields-container" class="row clearfix">

                    <!--Column 1-->
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Code <span class="required">*</span></label>
                            <div class="form-line">
                                <input value="{{$taxCategory->code}}" name="code" placeholder="Unique" type="text" maxlength="32" required class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Description <span class="required">*</span></label>
                            <div class="form-line">
                                <input value="{{$taxCategory->description}}" name="description" placeholder="Tax Category Description" type="text" required maxlength="64" class="form-control" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Exemption Amount <span class="required">*</span></label>
                            <div class="form-line">
                                <input value="{{$taxCategory->exemption_amount}}" name="exemption_amount" placeholder="Ex. 50,000" type="text" required class="form-control" >
                            </div>
                        </div>
                    </div>
                    <!--*End of column 1-->

                    <!--Column 2-->
                    <div class="col-md-6">
                        <p>

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