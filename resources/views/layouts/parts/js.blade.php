<!-- Jquery Core Js -->
<script src="{{bsb_plugins_url("jquery/jquery.min.js")}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{bsb_plugins_url("bootstrap/js/bootstrap.js")}}"></script>

<!-- Select Plugin Js -->
<script src="{{bsb_plugins_url("bootstrap-select/js/bootstrap-select.js")}}"></script>

<!-- Slimscroll Plugin Js -->
<script src="{{bsb_plugins_url("jquery-slimscroll/jquery.slimscroll.js")}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{bsb_plugins_url("node-waves/waves.js")}}"></script>

<!--Commonly used JS-->
<!--Alerts-->
<script src="{{bsb_plugins_url("sweetalert/sweetalert.min.js")}}"></script>

<!--Templating-->
<script src="{{url("vendor/underscore/underscore.js")}}"></script>

@yield("js-plugins")

@include('layouts.parts.uses-js-plugins')

<!-- BSB JS -->
<script src="{{bsb_js_url("admin.js")}}"></script>

<!--Developer JS-->
<script src="{{url("js/layout/sidebar-nav.js")}}"></script>
<script src="{{url("js/helpers.js")}}"></script>