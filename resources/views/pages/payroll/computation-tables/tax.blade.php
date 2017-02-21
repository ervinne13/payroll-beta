@extends('layouts.bsb-side-nav')

@section('content')

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2 class="pull-left">
                    Tax Table
                </h2>                
            </div>
            <div class="body table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>                            
                            <th class="align-right">Over Amount</th>
                            <th class="align-right">Not Over</th>
                            <th class="align-right">Tax Due</th>
                            <th class="align-right">Percent</th>                        
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($taxComputations AS $taxComputation)
                        <tr>                            
                            <td class="align-right">{{number_format($taxComputation->over_amount, 2)}}</td>
                            <td class="align-right">{{number_format($taxComputation->below_amount, 2)}}</td>
                            <td class="align-right">{{number_format($taxComputation->tax_due, 2)}}</td>
                            <td class="align-right">{{$taxComputation->percent}}%</td>
                        </tr>
                        @endforeach
                    </tbody>                    
                </table>
            </div>
        </div>
    </div>
</div>

@endsection