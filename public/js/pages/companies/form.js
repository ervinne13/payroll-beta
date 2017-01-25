/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* global form_utilities, code, mode */

(function () {

    $(document).ready(function () {


        initializeForm();

        form_utilities.disableFieldsOnViewMode(mode);

    });

    function initializeForm() {
        form_utilities.moduleUrl = "/companies";
        form_utilities.updateObjectId = code;
        form_utilities.validate = true;
        form_utilities.initializeDefaultProcessing($('.fields-container'));
    }

})();