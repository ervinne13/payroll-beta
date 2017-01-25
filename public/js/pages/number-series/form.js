/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* global form_utilities, code */

(function () {

    $(document).ready(function () {
        initializeUI();
        initializeForm();
    });

    function initializeUI() {
        form_utilities.initializeDefaultDatePicker();
        $('.selectpicker').selectpicker({
            style: 'btn-info',
            size: 4
        });
    }

    function initializeForm() {
        form_utilities.moduleUrl = "/number-series";
        form_utilities.updateObjectId = code;
        form_utilities.validate = true;
        form_utilities.initializeDefaultProcessing($('.fields-container'));

    }

})();