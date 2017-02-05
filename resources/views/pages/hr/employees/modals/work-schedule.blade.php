
<div class="modal fade" id="assign-work-schedule-modal" tabindex="-1" role="dialog" style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="assign-work-schedule-modal-label">New Work Schedule</h4>
            </div>
            <div class="modal-body">
                <div class="row">                    
                    <div class="col-md-6">
                        <br>
                        <div class="form-group">
                            <label>Work Schedule <span class="required">*</span></label>
                            <div class="form-line">
                                <select name="work_schedule_code" required class="form-control selectpicker" data-live-search="true">
                                    <option selected disabled></option>
                                    @foreach($workSchedules AS $workSchedule)                                    
                                    <option value="{{$workSchedule->code}}">{{$workSchedule->description}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Effective Date <span class="required">*</span></label>
                            <div class="form-line">
                                <input 
                                    data-date-format="dddd, MMMM DD YYYY"
                                    name="effective_date"                                        
                                    class="form-control datepicker"
                                    type="text" required >
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h3>IMPORTANT!</h3>

                        <p>You may <b>NOT</b> delete a work schedule once it's processed in a payroll and that payroll is closed.</p>
                        <p>You only have the opportunity to modify and/or delete work schedules if that work schedule is not yet processed.</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="action-assign-work-schedule" type="button" class="btn bg-teal waves-effect">
                    <i class="fa fa-plus"></i> Assign Work Schedule
                </button>
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>