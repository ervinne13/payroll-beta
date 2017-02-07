<div class="row">
    <div id="organization-name" class="col-lg-12 align-center bordered">
        <h4>{{strtoupper(config('app.organization'))}}</h4>
    </div>         
</div>

<div class="row">
    <div class="col-md-5">

        <table style="width: 100%">
            <tr>
                <th>Name:</th>
                <th colspan="2" content-source="display_name">(Please select employee & period)</th>
            </tr>
            <tr>
                <td>Position:</td>
                <td colspan="2" content-source="position_name"></td>
            </tr>
            <tr>
                <td>Period Covered:</td>
                <td class="align-right" colspan="2" content-source="period_covered"></td>
            </tr>
            <tr>
                <td colspan="2">Daily Rate:</td>
                <td class="align-right" content-source="daily_rate"></td>
            </tr>
            <tr>
                <td colspan="2">No. of Days Present:</td>
                <td class="align-right" content-source="days_present"></td>
            </tr>
        </table>
    </div>   

    <div id="payslip-details-table-container" class="col-md-12">

    </div>

    <div class="col-md-12">
        <table style="width: 100%;" class="table-border-all signature-table m-t-20">
            <tr>
                <td>Approved By:</td>
                <td>Prepared By:</td>
                <td>Received By:</td>
            </tr>
            <tr class="signature-row">
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td content-source="approved_by"></td>
                <td content-source="prepared_by">Name</td>
                <td content-source="received_by">Name</td>
            </tr>
        </table>
    </div>        
    <!--</div>-->
</div>

<div class="row">

</div>