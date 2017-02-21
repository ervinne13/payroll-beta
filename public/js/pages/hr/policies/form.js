/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* global form_utilities, code, mode */

(function () {

    $(document).ready(function () {
        initializeForm();
        getSelectedPayrollItems();
    });


    function initializeForm() {
        form_utilities.moduleUrl = "/hr/policies";
        form_utilities.updateObjectId = code;
        form_utilities.validate = true;
        form_utilities.postValidate = postValidate;
        form_utilities.initializeDefaultProcessing($('.fields-container'));
        form_utilities.appendDataOnSave = appendDataOnSave;
    }

    function appendDataOnSave(originalData) {
        originalData.policyPayrollItems = getSelectedPayrollItems();
        return originalData;
    }

    function getSelectedPayrollItems() {
        var policyPayrollItems = [];

        $('.payroll-item-selected:checked').each(function () {
            var payrollItemCode = $(this).data('payroll-item-code');
            var computationSource = $('.computation-source[data-payroll-item-code=' + payrollItemCode + ']').val();

            policyPayrollItems.push({
                policy_code: code,
                payroll_item_code: payrollItemCode,
                computation_source: computationSource ? computationSource : null
            });
        });

        return policyPayrollItems;
    }

    function postValidate() {
        return validateDependencies();
    }

    function validateDependencies() {
        var dependencies = [];
        var policyPayrollItemCodes = [];

        $('.payroll-item-row').removeClass('bg-danger');

        $('.payroll-item-selected:checked').each(function () {
            var payrollItemCode = $(this).data('payroll-item-code');
            var computationSource = $('.computation-source[data-payroll-item-code=' + payrollItemCode + ']').val();

            if (computationSource && dependencies.indexOf(computationSource) < 0) {
                console.log("added", computationSource);
                dependencies.push(computationSource);
            }

            policyPayrollItemCodes.push(payrollItemCode);
        });

        for (var i in policyPayrollItemCodes) {
            dependencies.remove(policyPayrollItemCodes[i]);
        }

        if (dependencies.length > 0) {

            swal("Error", "Some dependencies are not resolved. Please recheck your payroll items", 'error');

            for (var i = 0; i < dependencies.length; i++) {
                $('.payroll-item-row[data-payroll-item-code=' + dependencies[i] + ']').addClass('bg-danger');
                $('.payroll-item-row[data-payroll-item-code=' + dependencies[i] + '] .error-message-container').text("This is a required dependency. Check this as dependency or remove dependency to this payroll item.");
            }

            return false;
        }

        return true;

    }

})();