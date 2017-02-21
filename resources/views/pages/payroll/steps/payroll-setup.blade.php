<div id="payroll-setup-field-container" class="col-lg-6">                            
    <b>Cut-off Start</b>
    <div class="input-group">
        <span class="input-group-addon">
            <i class="material-icons">date_range</i>
        </span>
        <div class="form-line">
            <input name="cutoff_start" data-date-format="dddd, MMMM DD YYYY" type="text" class="payroll-field form-control date datepicker" placeholder="Ex: 01/11/2016">
        </div>
    </div>

    <b>Cut-off End</b>
    <div class="input-group">
        <span class="input-group-addon">
            <i class="material-icons">date_range</i>
        </span>
        <div class="form-line">
            <input name="cutoff_end" data-date-format="dddd, MMMM DD YYYY" type="text" class="payroll-field form-control date datepicker" placeholder="Ex: 01/25/2016">
        </div>
    </div>

    <b>Pay Period</b>
    <div class="input-group">
        <span class="input-group-addon">
            <i class="material-icons">date_range</i>
        </span>
        <div class="form-line">
            <input name="pay_period" data-date-format="dddd, MMMM DD YYYY" type="text" class="payroll-field form-control date datepicker" placeholder="Ex: 01/31/2016">
        </div>
    </div>

    <div class="form-group">
        <label>Approved By:</label>
        <div class="form-line">
            <input type="text" name="approved_by" class="form-control" placeholder="Please provide the approver's name">
        </div>
    </div>

    <div class="form-group">
        <label>Received By:</label>
        <div class="form-line">
            <input type="text" name="received_by" class="form-control" placeholder="Please provide the receiver's name">
        </div>
    </div>

    <div class="form-group">
        <label>Prepared By:</label>
        <div class="form-line">
            <input type="text" readonly name="prepared_by" class="form-control" value="{{Auth::user()->display_name}}">
        </div>
    </div>

    <input type="checkbox" id="check_include_monthly_processable" name="include_monthly_processable" class="payroll-field "/>
    <label for="check_include_monthly_processable">Include Monthly Processable</label>

</div>

<div class="col-lg-6">

    <h3>Payroll Setup</h3>

    <p>Check "Include Monthly Processable" checkbox to include SSS, PAGIBIG, etc. in the current payroll.</p>

    <p>If you are reprocessing this payroll pay period, note that this will only overwrite previously created payroll entries which does NOT include payroll entry adjustments that are manually entered in the "Payroll Entries" module.</p>

</div>