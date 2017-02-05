/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* global form_utilities, code, mode, workScheduleShifts */

(function () {

    $(document).ready(function () {
        initializeForm();
        initializeWorkScheduleShiftTableData();
        form_utilities.disableFieldsOnViewMode(mode);
    });

    function initializeForm() {
        form_utilities.moduleUrl = "/hr/work-schedules";
        form_utilities.updateObjectId = code;
        form_utilities.validate = true;

        form_utilities.appendDataOnSave = appendDataOnSave;
        form_utilities.initializeDefaultProcessing($('.fields-container'));
    }

    function initializeWorkScheduleShiftTableData() {
        if (!workScheduleShifts) {
            console.error("Missing workScheduleShifts");
            return;
        }

        for (var i in workScheduleShifts) {
            $('[name=shift_' + workScheduleShifts[i].week_day + ']').selectpicker('val', workScheduleShifts[i].shift_code);
        }
    }

    function getWorkScheduleDays() {

        var workDays = [];

        $('.day-schedule-row').each(function () {
            var day = $(this).data('day-id');
            var $selectShift = $(this).find('.select-shift');
            var shiftCode = $selectShift.selectpicker('val');

            workDays.push({
                week_day: day,
                shift_code: shiftCode
            });
        });

        return workDays;

    }

    function appendDataOnSave() {
        console.log(getWorkScheduleDays());
        return {
            workDays: getWorkScheduleDays()
        };
    }

})();