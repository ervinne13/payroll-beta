
/* global form_utilities, moment, baseUrl */

(function () {

    var monthNames = [
        "January", "February", "March",
        "April", "May", "June", "July",
        "August", "September", "October",
        "November", "December"
    ];

    var payslipDetailsTemplate;

    $(document).ready(function () {

        payslipDetailsTemplate = _.template($('#payslip-details-table-template').html());

        initializeUI();
        initializeEvents();
    });

    function initializeUI() {
        form_utilities.initializeDefaultDatePicker();
    }

    function initializeEvents() {
        $('#employee-select').change(function () {
            loadPayslip();
        });

        $('#payroll-period-input').change(function () {
            loadPayslip();
        });

        $('#action-print').click(function () {


            window.print();

//            var newWindow = window.open('', 'PRINT', 'height=400,width=600');
//
//            newWindow.document.write('<html><head><title>' + document.title + '</title>');
//            newWindow.document.write('<link href="http://payroll.local.com/bower_components/adminbsb-materialdesign/plugins/bootstrap/css/bootstrap.css" rel="stylesheet"  media="print">');
//            newWindow.document.write('<link href="http://payroll.local.com/bower_components/adminbsb-materialdesign/css/themes/all-themes.css" rel="stylesheet"  media="print">');
//            newWindow.document.write('<link rel="stylesheet" href="http://payroll.local.com/css/app.css" media="print">');
//            newWindow.document.write('<link rel="stylesheet" href="http://payroll.local.com/css/pages/reports/payslip/payslip-print.css" media="print">');
//
//            newWindow.document.write('</head><body>');
//            newWindow.document.write($('#printout-container').html());
//            newWindow.document.write('</body></html>');
//
//            newWindow.document.close(); // necessary for IE >= 10
//            newWindow.focus(); // necessary for IE >= 10*/
//
//            newWindow.print();
//            newWindow.close();
//
//            return true;
        });
    }

    function loadPayslip() {

        var payPeriodDisplay = $('#payroll-period-input').val();

        var payPeriod = moment(payPeriodDisplay, $('#payroll-period-input').data('date-format'))
                .format(form_utilities.SERVER_DATE_FORMAT);
        var employeeCode = $('#employee-select').val();

        if (payPeriod && employeeCode) {
            var url = baseUrl + "/reports/payslip/" + employeeCode + "/period/" + payPeriod;
            $.get(url, function (payslipData) {
                console.log(payslipData);

                setHeaderData(payslipData);
                setDetailsData(payslipData);
                setFooterData(payslipData);
            }).fail(function (xhr) {
                swal("Error", xhr.responseText, "error");
            });

        }

    }

    function setHeaderData(payslipData) {

        $('[content-source=display_name]').html(payslipData.employee.first_name + " " + payslipData.employee.last_name);
        $('[content-source=position_name]').html(payslipData.employee.position.name);

        var periodCovered = "";

        var from = new Date(payslipData.payroll.cutoff_start);
        var to = new Date(payslipData.payroll.cutoff_end);

        periodCovered += monthNames[from.getMonth()] + " " + from.getDate();
        periodCovered += " to ";
        periodCovered += monthNames[to.getMonth()] + " " + to.getDate() + " " + to.getFullYear();

        $('[content-source=period_covered]').html(periodCovered);

        $('[content-source=daily_rate]').html(formatCurrency(payslipData.daily_rate));
        $('[content-source=days_present]').html(payslipData.present);

    }

    function setDetailsData(payslipData) {

        var exemptEntries = ["Salary"];

        payslipData.totalDeductions = 0;
        payslipData.totalEarnings = 0;

        payslipData.deductions = {};
        payslipData.earnings = {};

        var processedEntries = [];

        for (var i in payslipData.payroll.payroll_entries) {
            var entry = payslipData.payroll.payroll_entries[i];
            var text = entry.payroll_item.payslip_display_string;
            if (entry.payroll_item.type == "D" && exemptEntries.indexOf(text) < 0 && processedEntries.indexOf(entry.payroll_item_code) < 0) {

                if (text in payslipData.deductions) {
                    payslipData.deductions[text].total += (entry.qty * entry.amount);
                } else {
                    payslipData.deductions[text] = {
                        text: text,
                        total: entry.qty * entry.amount
                    };
                }

                payslipData.totalDeductions += entry.qty * entry.amount;

            } else if (exemptEntries.indexOf(text) < 0 && processedEntries.indexOf(entry.payroll_item_code) < 0) {

                if (text in payslipData.earnings) {
                    payslipData.earnings[text].total += (entry.qty * entry.amount);
                } else {
                    payslipData.earnings[text] = {
                        text: text,
                        total: entry.qty * entry.amount
                    };
                }

                payslipData.totalEarnings += entry.qty * entry.amount;
            }
            
            processedEntries.push(entry.payroll_item_code);
            
        }

        var html = payslipDetailsTemplate(payslipData);
        $('#payslip-details-table-container').html(html);

    }

    function setFooterData(payslipData) {
        $('[content-source=approved_by]').html(payslipData.payroll.approved_by);
        $('[content-source=prepared_by]').html(payslipData.payroll.prepared_by);
        $('[content-source=received_by]').html(payslipData.payroll.received_by);
    }

})();
