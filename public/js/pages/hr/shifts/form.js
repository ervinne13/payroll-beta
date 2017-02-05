/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* global form_utilities, code, mode */

(function () {

    var $detailsTable;

    $(document).ready(function () {

//        initializeDetailsTable();

        initializeUI();
        initializeForm();

        if (mode === "view") {
            $('.form-control').prop('disabled', true);
        }

    });

    function initializeUI() {
        form_utilities.initializeDefaultTimePicker();

        setInterval(function () {
//            console.log($('[name=date_start]').bootstrapMaterialDatePicker('get'));
        }, 1000);

    }

    function initializeForm() {
        form_utilities.moduleUrl = "/hr/shifts";
        form_utilities.updateObjectId = code;
        form_utilities.validate = true;
        form_utilities.initializeDefaultProcessing($('.fields-container'));
    }

})();