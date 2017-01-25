
/* global id, form_utilities */

(function () {

    $(function () {
        initializeEvents();
        initializeForm();
    });

    function initializeForm() {
        form_utilities.moduleUrl = "/security/users";
        form_utilities.updateObjectId = id;
        form_utilities.validate = true;
        form_utilities.initializeDefaultProcessing($('.fields-container'));
        form_utilities.postValidate = function () {
            var password1 = $('[name=password]').val();
            var password2 = $('[name=password_repeat]').val();

            if (password1 != password2) {

                form_utilities.setFieldError('password', 'Passwords do not match');
                form_utilities.setFieldError('password_repeat', 'Passwords do not match');

                swal("Error", "Passwords must match", "error");
                return false;
            }

            return true;
        };
    }

    function initializeEvents() {
        $('#action-switch-change-password').change(function () {
            enableChangePasswordFields($(this).is(':checked'));
        });
    }

    function enableChangePasswordFields(enable) {
        $('[type=password]').prop('disabled', !enable);
        if (!enable) {
            $('[type=password]').val("");
        }
    }

})();
