
(function () {

    $(function () {
        initializeSteps();

        initializeUI();
    });

    function initializeUI() {
        $('.datepicker').bootstrapMaterialDatePicker({
            format: 'dddd, MMMM DD YYYY',
            clearButton: true,
            weekStart: 1,
            time: false
        });
        console.log('adsfasdf');
    }

    function initializeSteps() {
        $("#wizard").steps();
    }

})();