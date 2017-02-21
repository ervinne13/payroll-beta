
/* global form_utilities, payPeriodDisplay, moment, baseUrl */

(function () {

    var reportTableTemplate;

    $(document).ready(function () {

        reportTableTemplate = _.template($('#report-table-template').html());

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
                report = JSON.parse(report);
                console.log(report);

                setHeaderData(report);
                setDetailsData(report);
            }).fail(function (xhr) {
                swal("Error", xhr.responseText, "error");
            });

        }

    }

    function setHeaderData(report) {
        $('[content-source=display_name]').html(report.employee.first_name + " " + report.employee.last_name);
        $('[content-source=position_name]').html(report.employee.position.name);
    }

    function setDetailsData(report) {
        var html = reportTableTemplate(report);
        
        $('#absence-and-tardiness-details-table-container').html(html);
        
    }

})();
