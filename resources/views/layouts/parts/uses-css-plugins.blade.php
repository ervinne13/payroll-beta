@if (!empty($uses))

@foreach($uses AS $use)

@if($use == "datatables")
<link href="{{datatables_bs_url("css/dataTables.bootstrap.min.css")}}" rel="stylesheet">
@elseif($use == "bootstrap-select")
<link href="{{bsb_plugins_url("bootstrap-select/css/bootstrap-select.min.css")}}" rel="stylesheet">
@elseif($use == "datetime-picker")
<link href="{{bsb_plugins_url("bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css")}}" rel="stylesheet">
@endif

@endforeach

@endif