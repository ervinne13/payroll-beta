
/* global form_utilities, baseUrl, SGFormatter */

(function () {

    var payrollEntryRowTemplate;
    var payrollEntryFooterRowTemplate;

    $(document).ready(function () {

        initializeTemplates();

        initializeUI();
        initializeEvents();

    });

    function initializeTemplates() {
        payrollEntryRowTemplate = _.template($('#payroll-entry-row-template').html());
        payrollEntryFooterRowTemplate = _.template($('#payroll-entry-footer-row-template').html());
    }

    function initializeUI() {
        form_utilities.initializeDefaultDatePicker();
    }

    function initializeEvents() {
        $('#action-load-entries').click(function () {
            var employee = $('[name=employee]').val();
            var payPeriodDisplay = $('[name=pay_period]').val();

            if (employee && payPeriodDisplay) {
                var payPeriod = moment(payPeriodDisplay, form_utilities.DISPLAY_DATE_FORMAT)
                        .format(form_utilities.SERVER_DATE_FORMAT);

                loadPayrollEntries(employee, payPeriod);

            } else {
                swal("Error", "Please select an employee and payroll period", "error");
            }
        });
    }

    function loadPayrollEntries(employeeCode, payPeriod) {

        var url = baseUrl + "/payroll/entries/" + employeeCode + "/period/" + payPeriod + "/json";

        $.get(url, function (payrollEntries) {
            var html = "";
            var totalEarnings = 0;

            console.log(payrollEntries);

            for (var i in payrollEntries) {
                payrollEntries[i].displayAmount = SGFormatter.formatCurrency(payrollEntries[i].amount);
                try {
                    html += payrollEntryRowTemplate(payrollEntries[i]);

                    var amount = payrollEntries[i].amount;
                    if (payrollEntries[i].payroll_item.type == "D") {
                        amount = amount * -1;
                    }

                    totalEarnings += amount;
                } catch (e) {
                    console.error("Error when processing payroll entry", payrollEntries[i]);
                    console.error(e);
                }

            }

            $('#payroll-entries-datatable tbody').html(html);
            $('#payroll-entries-datatable tfoot').html(payrollEntryFooterRowTemplate({totalEarnings: SGFormatter.formatCurrency(totalEarnings)}));
        });

    }

})();
