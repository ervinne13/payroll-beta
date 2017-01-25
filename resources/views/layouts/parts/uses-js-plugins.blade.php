@if (!empty($uses))

@foreach($uses AS $use)

<!--Plugin Dependencies-->
@if (in_array($use, ["datatables", "datetime-picker", "form-utilities"]))
<script src="{{bsb_plugins_url("momentjs/moment.js")}}"></script>
@endif

@if(in_array($use, ["datatables", "form-utilities"]))
<!--Form utilities is dependent on jquery validate-->
<script src="{{bsb_plugins_url("jquery-validation/jquery.validate.js")}}"></script>
<script src="{{url("js/form-utilities.js")}}"></script>

@endif

<!--=========================================-->
<!--Datatables-->
@if($use == "datatables")
<script src="{{datatables_url("js/jquery.dataTables.min.js")}}"></script>
<script src="{{datatables_bs_url("js/dataTables.bootstrap.min.js")}}"></script>

<script src="{{url("js/datatable-utilities.js")}}"></script>

@include('templates.table-inline-actions')
<!--=========================================-->
<!--Bootstrap Select-->
@elseif($use == "bootstrap-select")
<script src="{{bsb_plugins_url("bootstrap-select/js/bootstrap-select.min.js")}}"></script>

<!--=========================================-->
<!--DateTime Picker-->
@elseif($use == "datetime-picker")
<script src="{{bsb_plugins_url("bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js")}}"></script>

<!--=========================================-->
<!--Auto Numeric-->
@elseif($use == "auto-numeric")
<script src="{{url("vendor/autoNumeric/autoNumeric.js")}}"></script>


@endif

@endforeach

@endif