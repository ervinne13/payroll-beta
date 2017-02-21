
/* global baseUrl */

"use strict";

var PayrollProcessor = function () {
    this.currentlyProcessingEmployees = [];
    this.currentlyProcessedEmployees = [];

    this.processingEmployeeCount = 0;
    this.processsedEmployeeCount = 0;
    this.payPeriod = null;
    this.isCurrentlyRunning = false;

    this.handler = {
        error: null,
        processStarted: null,
        processFinished: null,
        employeeProcessed: null,
        employeeProcessing: null
    };
};

//
/* * ************************************************************************* */
//<editor-fold defaultstate="collapsed" desc="Payroll Process Events">

/**
 * Since we're (I'm) lazy, we'll use scopes to alias PayrollProcessor.prototype to PPp
 * @param {Prototype} PPp Alias for PayrollProcessor.prototype
 * @returns {undefined}
 */
(function (PPp) {

    PPp.processPayroll = function (payPeriod) {

        this.payPeriod = payPeriod;

        var ppInstance = this;
        this.getActiveEmployees(function (employees) {
            ppInstance.processEmployees(employees);
        });
    };

    PPp.processEmployees = function (employees) {
        var ppInstance = this;

        this.notifyProcessStarted(employees);

        var resultingPromise = employees.reduce(function (previous, current) {
            return previous
                    .then(function () {
                        ppInstance.processsedEmployeeCount++;
                        ppInstance.notifyEmployeeProcessing(current);
                        return ppInstance.processEmployee(current);
                    });
        }, ppInstance.processEmployee(employees[0]));

        resultingPromise.then(function () {
            ppInstance.notifyProcessFinsihed();
        });

    };

    PPp.processEmployee = function (employee) {

        var ppInstance = this;
        var def = $.Deferred();
        var url = baseUrl + "/payroll/process/" + employee.code + "/period/" + this.payPeriod;

        $.get(url)
                .done(function (response) {

                    ppInstance.notifyEmployeeProcessed(employee);

                    //  TODO: comment out later
                    console.log(response);

                    //  give the process a 100ms rest
                    setTimeout(function () {
                        def.resolve();
                    }, 100);
                })
                .fail(function (xhr) {
                    ppInstance.notifyError(xhr);
                    def.reject();
                })
                ;

        return def.promise();

    };

    PPp.getActiveEmployees = function (callback) {
        var url = baseUrl + "/api/hr/employees/active";
        var params = {
            "fields[]": ["code", "first_name", "last_name", "policy_code"]
        };

        $.get(url, params, function (employees) {
            callback(employees);
        }).fail(function (xhr) {
            console.error(xhr);
        });
    };

    //
    //<editor-fold defaultstate="collapsed" desc="Event notifiers">

    PPp.setHandler = function (handlerName, handler) {
        switch (handlerName) {
            case "processStarted" :
                this.handler.processStarted = handler;
                break;
            case "processFinished" :
                this.handler.processFinished = handler;
                break;
            case "employeeProcessing" :
                this.handler.employeeProcessing = handler;
                break;
            case "employeeProcessed" :
                this.handler.employeeProcessed = handler;
                break;
            case "processError" :
                this.handler.processError = handler;
                break;
        }

    };

    PPp.notifyProcessStarted = function (employees) {
        this.processingEmployeeCount = employees.length;
        this.isCurrentlyRunning = true;
        if (this.handler.processStarted) {
            this.handler.processStarted(employees);
        } else {
            console.warn("Unhandled event processStarted");
        }
    };

    PPp.notifyProcessFinsihed = function () {
        this.isCurrentlyRunning = false;
        if (this.handler.processFinished) {
            this.handler.processFinished();
        } else {
            console.warn("Unhandled event processFinished");
        }
    };

    PPp.notifyEmployeeProcessing = function (employee) {
        if (this.handler.employeeProcessing) {
            this.handler.employeeProcessing(employee);
        } else {
            console.warn("Unhandled event employeeProcessing");
        }
    };

    PPp.notifyEmployeeProcessed = function (employee) {
        if (this.handler.employeeProcessed) {
            this.handler.employeeProcessed(employee);
        } else {
            console.warn("Unhandled event employeeProcessed");
        }
    };

    PPp.notifyError = function (error) {
        console.error(error);
        if (this.handler.processError) {
            this.handler.processError(error);
        }
    };

    //</editor-fold>

})(PayrollProcessor.prototype);

//</editor-fold>
