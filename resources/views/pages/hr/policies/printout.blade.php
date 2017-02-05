@extends('layouts.bsb-side-nav')


@section('content')

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">

                <h2 class="pull-left">
                    Policy: <small>{{$policy->short_description}}</small>
                </h2>

                <div class="col-lg-12">                   
                    {!!$policy->long_description!!}
                </div>

                <div class="col-lg-12">
                    <h4>Inclusive of:</h4>

                    <table class="table table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>Payroll Item</th>
                                <th>Type</th>
                                <th>Taxable</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $payrollItems = $policy->policyPayrollItems()->with('payrollItem')->get(); ?>

                            @foreach($policy->payrollItems AS $payrollItem)
                            <tr>
                                <td>{{$payrollItem->description}}</td>                                
                                <td>{{$payrollItem->type == "E" ? "Earnings" : "Deduction"}}</td>                                
                                <td>{{$payrollItem->taxable ? "Yes" : "No"}}</td>                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>    
</div>

@endsection