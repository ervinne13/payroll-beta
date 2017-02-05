/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* global form_utilities, code, mode */

(function () {

    $(document).ready(function () {

        initializeUI();
        initializeForm();

        if (mode === "view") {
            $('.form-control').prop('disabled', true);
        }

    });

    function initializeUI() {
        form_utilities.initializeDefaultTimePicker();
    }

    function initializeForm() {
        form_utilities.moduleUrl = "/hr/shift-breaks";
        form_utilities.updateObjectId = code;
        form_utilities.validate = true;
        form_utilities.initializeDefaultProcessing($('.fields-container'));
    }

})();