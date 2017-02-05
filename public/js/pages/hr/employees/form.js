/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/* global _, form_utilities, code, mode, moment, datatable_utilities, employeeWorkSchedules */

(function () {

    var workScheduleRowTemplate = null;

    $(document).ready(function () {

        initializeTemplates();

        initializeUI();
        initializeForm();
        initializeEvents();
        initializeUIData();

        form_utilities.disableFieldsOnViewMode(mode);

    });

    function initializeTemplates() {
        workScheduleRowTemplate = _.template($('#work-schedule-row-template').html());
    }

    function initializeUI() {
        form_utilities.initializeDefaultDatePicker();
    }

    function initializeForm() {
        form_utilities.moduleUrl = "/hr/employees";
        form_utilities.updateObjectId = code;
        form_utilities.validate = true;
        form_utilities.initializeDefaultProcessing($('.fields-container'));
        form_utilities.appendDataOnSave = appendDataOnSave;
    }

    function initializeEvents() {
        $('#action-assign-work-schedule').click(function () {
            var effectiveDateDisplay = $('[name=effective_date').val();

            if (validateWorkSchedule(effectiveDateDisplay)) {
                addEmployeeWorkSchedule();
            }
        });

        $('#employee-work-schedule-table').on('click', '.action-delete', function (e) {
            e.preventDefault();

            var $parentRow = $(this).parents('.employee-work-schedule-row');

            var employeeCode = $('[name=code]').val();
            var effectiveDate = $parentRow.data('effective-date');

            var state = $parentRow.data('state');

            console.log(state);

            if (state == "unmodified") {
                onDeleteEmployeeWorkSchedule(employeeCode, effectiveDate);
            } else {
                removeEmployeeWorkScheduleRow(effectiveDate);
            }
        });
    }

    function initializeUIData() {
        for (var i in employeeWorkSchedules) {

            var effectiveDate = employeeWorkSchedules[i].effective_date;
            var effectiveDateDisplay = moment(effectiveDate, form_utilities.SERVER_TIME_FORMAT)
                    .format(form_utilities.DISPLAY_DATE_FORMAT);

            var employeeWorkSchedule = {
                state: "unmodified",
                workSchedule: employeeWorkSchedules[i].work_schedule_code,
                workScheduleDisplay: employeeWorkSchedules[i].work_schedule.description,
                effectiveDate: effectiveDate,
                effectiveDateDisplay: effectiveDateDisplay
            };

            var id = getEmployeeWorkSchedulePsuedoId(employeeWorkSchedule);

            var actions = [
//                datatable_utilities.getDefaultEditAction(id),
                datatable_utilities.getDefaultDeleteAction(id),
            ];

            employeeWorkSchedule.actions = datatable_utilities.getInlineActionsView(actions);

            addEmployeeWorkScheduleRow(employeeWorkSchedule);
        }
    }

    function appendDataOnSave(originalData) {

        originalData.modifiedWorkSchedules = getModifiedEmployeeWorkSchedules();

        return originalData;
    }

    //<editor-fold defaultstate="collapsed" desc="Employee Work Schedule Functions">

    function getModifiedEmployeeWorkSchedules() {

        var workSchedules = [];

        $('.employee-work-schedule-row[data-state=created],.employee-work-schedule-row[data-state=updated]').each(function () {
            workSchedules.push({
                employee_code: $('[name=code]').val(),
                effective_date: $(this).data('effective-date'),
                work_schedule_code: $(this).data('work-schedule-code'),
            });
        });

        return workSchedules;
    }

    function validateWorkSchedule(effectiveDateDisplay) {

        var valid = true;
        $('.employee-work-schedule-effective-date-display').each(function () {
            if ($(this).html() == effectiveDateDisplay) {

                form_utilities.setFieldError('effective_date', 'A work schedule already exists for this date.');

                valid = false;
                return;
            }
        });

        return valid;
    }

    function addEmployeeWorkSchedule() {

        var workSchedule = $('[name=work_schedule_code').val();
        var workScheduleDisplay = $('[name=work_schedule_code] option:selected').text();
        var effectiveDateDisplay = $('[name=effective_date').val();

        var effectiveDate = moment(effectiveDateDisplay, $('[name=effective_date').data('date-format'))
                .format(form_utilities.SERVER_DATE_FORMAT);

        console.log(effectiveDateDisplay, effectiveDate);

        var employeeWorkSchedule = {
            state: "created",
            workSchedule: workSchedule,
            workScheduleDisplay: workScheduleDisplay,
            effectiveDate: effectiveDate,
            effectiveDateDisplay: effectiveDateDisplay
        };

        var id = getEmployeeWorkSchedulePsuedoId(employeeWorkSchedule);

        var actions = [
//            datatable_utilities.getDefaultEditAction(id),
            datatable_utilities.getDefaultDeleteAction(id),
        ];

        employeeWorkSchedule.actions = datatable_utilities.getInlineActionsView(actions);

        addEmployeeWorkScheduleRow(employeeWorkSchedule);

        $('#assign-work-schedule-modal').modal('hide');
    }

    function removeEmployeeWorkScheduleRow(effectiveDate) {
        $('.employee-work-schedule-row[data-effective-date=' + effectiveDate + ']').remove();
    }

    function addEmployeeWorkScheduleRow(workSchedule) {
        var rowHtml = workScheduleRowTemplate(workSchedule);
        $('#employee-work-schedule-table tbody').append(rowHtml);
    }

    function getEmployeeWorkSchedulePsuedoId(employeeWorkSchedule) {
        return employeeWorkSchedule.workSchedule + "_" + employeeWorkSchedule.effectiveDate;
    }

    function onDeleteEmployeeWorkSchedule(employeeCode, effectiveDate) {

        var url = baseUrl + "/hr/employees/" + employeeCode + "/work-schedule/" + effectiveDate;

        swal({
            title: "You are about to delete a work schedule",
            text: "This work schedule will be permanently deleted!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function () {
            $.ajax({
                url: url,
                type: "DELETE",
                success: function (response) {
                    console.log(response);
                    swal("Success", "Work schedule deleted", "success");

                    removeEmployeeWorkScheduleRow(effectiveDate);
                },
                error: function (response) {
                    console.error(response);
                    swal("Error", response.responseText, "error");
                }
            });
        });
    }

    //</editor-fold>    

    //<editor-fold defaultstate="collapsed" desc="Payroll Items Amount">
    
    function loadPolicyPayrollItems() {
        
        
        
    }
    
    //</editor-fold>


})();