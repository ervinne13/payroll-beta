
/* global PayrollProcessor, form_utilities, baseUrl */

(function () {

    var $payrollSteps;

    //  VanillaJS Module Objects
    var payrollProcessor;

    //  page state
    var payrollQueuedForProcessing = false;
    var currentlyProcessingPayroll = null;

    $(function () {
        payrollProcessor = new PayrollProcessor();
//        var payrollProcessor2 = new PayrollProcessor();
//
//        payrollProcessor.currentlyProcessingEmployees = 'test';
//        console.log(payrollProcessor.currentlyProcessingEmployees);
//        console.log(payrollProcessor2.currentlyProcessingEmployees);

        initializeSteps();

        initializeUI();
        initializeEvents();

        intitializePayrollProcessorEventHandlers();
    });


    function initializeSteps() {
        $payrollSteps = $("#wizard").steps({
            onStepChanging: function (e, currentIndex) {

                if (!payrollQueuedForProcessing) {
                    savePayroll(function () {
                        showLoading(false);

                        payrollQueuedForProcessing = true;
                        $payrollSteps.steps("next");
                    });

                    showLoading(true);
                }

                //  allow next only on steps 2, and 3
                if (currentIndex === 0) {   //  payroll setup
                    return payrollQueuedForProcessing;
                } else if (currentIndex === 1) { //  payroll processing
                    //  allow next navigation only if payroll processor is not running
                    return !payrollProcessor.isCurrentlyRunning;
                } else {
                    return true;
                }

                return currentIndex > 0 || payrollQueuedForProcessing;
            }
        });
    }

    function initializeUI() {
        $('.datepicker').bootstrapMaterialDatePicker({
            format: 'dddd, MMMM DD YYYY',
            clearButton: true,
            weekStart: 1,
            time: false
        });
    }

    function initializeEvents() {
        $('.payroll-field').change(function () {
            //  if any of the payroll fields are changed, payroll should be resaved
            payrollQueuedForProcessing = false;
        });

        $('#action-start-payroll-process').click(function () {            
            displayPayrollProcessProgress(0);
            payrollProcessor.processPayroll(currentlyProcessingPayroll.pay_period);
        });
    }

    function enablePayrollProcessingActions(enable) {
        $('#action-start-payroll-process').prop("disabled", !enable);
    }

    /**
     * For testing only
     * @returns {undefined}
     */
    function getTestPayrollData() {

        return {
            cutoff_start: '2017-01-26',
            cutoff_end: '2017-02-10',
            pay_period: '2017-02-15',
        };
    }


    function savePayroll(callback) {
        form_utilities.useIntegerForBooleanValues = true;
        currentlyProcessingPayroll = form_utilities.formToJSON($('#payroll-setup-field-container'));
//        currentlyProcessingPayroll = getTestPayrollData();
        var url = baseUrl + "/payroll/payroll";

        $.post(url, currentlyProcessingPayroll, function (response) {
            console.log(response);
            callback();
        }).fail(function (xhr) {
            console.error(xhr);
            showLoading(false);
        });
    }

    //
    /* * ************************************************************************* */
    //<editor-fold defaultstate="collapsed" desc="Payroll Processor Event Handlers">

    function intitializePayrollProcessorEventHandlers() {
        payrollProcessor.setHandler("processStarted", function () {
            enablePayrollProcessingActions(false);
            displayPayrollProcessStatus("Processing " + payrollProcessor.processingEmployeeCount + " employees");
            displayPayrollProcessProgress(0);
            displayPayrollProcessProgressStatus("ongoing");
        });

        payrollProcessor.setHandler("processFinished", function () {
            enablePayrollProcessingActions(true);
            displayPayrollProcessStatus("Payroll Process Done");
            displayPayrollProcessProgress(100);
            displayPayrollProcessProgressStatus("finished");
        });

        payrollProcessor.setHandler("employeeProcessing", onEmployeeProcessing);
        payrollProcessor.setHandler("employeeProcessed", onEmployeeProcessed);
        payrollProcessor.setHandler("processError", onProcessError);

    }

    function onEmployeeProcessing(employee) {
        var employeeUrl = baseUrl + "/hr/employees/" + employee.code;
        var name = employee.first_name + " " + employee.last_name + ' (<a href="' + employeeUrl + '" target="_blank">' + employee.code + '</a>)';
        displayPayrollProcessStatus("Now processing " + name);
    }

    function onEmployeeProcessed(employee) {
        var percent = (payrollProcessor.processsedEmployeeCount / payrollProcessor.processingEmployeeCount) * 100;

        console.log("processsedEmployeeCount", payrollProcessor.processsedEmployeeCount);
        console.log("processingEmployeeCount", payrollProcessor.processingEmployeeCount);
        console.log("Progress", percent);

        displayPayrollProcessProgress(percent);
    }

    function onProcessError(error) {
        enablePayrollProcessingActions(true);        
        swal("Error", error.responseText, "error");

        displayPayrollProcessStatus("Error");
        displayPayrollProcessProgressStatus("error");
    }

    function displayPayrollProcessStatus(status) {
        $('#payroll-process-status-label').html(status);
    }

    function displayPayrollProcessProgress(percent) {
        $('#payroll-process-progress-bar').attr('aria-valuenow', percent);
        $('#payroll-process-progress-bar').css('width', percent + '%');
    }

    function displayPayrollProcessProgressStatus(status) {
        $('#payroll-process-progress-bar').removeClass('progress-bar-danger');
        $('#payroll-process-progress-bar').removeClass('progress-bar-success');
        $('#payroll-process-progress-bar').removeClass('progress-bar-info');

        if (status === "error") {
            $('#payroll-process-progress-bar').addClass('progress-bar-danger');
        } else if (status === "ongoing") {
            $('#payroll-process-progress-bar').addClass('progress-bar-info');
        } else if (status === "finished") {
            $('#payroll-process-progress-bar').addClass('progress-bar-success');
        }

    }

    //</editor-fold>

})();