
/* global form_utilities, payPeriodDisplay, moment, baseUrl */

(function () {

    $(document).ready(function () {
        initializeUI();
        initializeEvents();
    });

    function initializeUI() {
        form_utilities.initializeDefaultDatePicker();
    }

    function initializeEvents() {
        $('.report-updating-field').change(function () {
            loadReport();
        });

        $('#action-print').click(function () {
            window.print();
        });
    }

    function loadReport() {
        var employeeCode = $('#employee-select').val();
        var dateFromDisplay = $('#date-from').val();
        var dateToDisplay = $('#date-to').val();

        var dateFrom = moment(dateFromDisplay, $('#payroll-period-input').data('date-format'))
                .format(form_utilities.SERVER_DATE_FORMAT);

        var dateTo = moment(dateToDisplay, $('#payroll-period-input').data('date-format'))
                .format(form_utilities.SERVER_DATE_FORMAT);

        if (dateFrom && dateTo && employeeCode) {
            var url = baseUrl + "/reports/absence-tardiness/" + employeeCode + "/from/" + dateFrom + "/to/" + dateTo;
            $.get(url, function (report) {
                console.log(report);

                setHeaderData(report);
                setDetailsData(report);
            }).fail(function (xhr) {
                swal("Error", xhr.responseText, "error");
            });

        }

    }

    function setHeaderData(report) {

    }

    function setDetailsData(report) {

    }

})();
