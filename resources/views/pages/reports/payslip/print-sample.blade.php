<div class="row">
    <div class="col-lg-12 align-center bordered">
        <h4>{{strtoupper(config('app.organization'))}}</h4>
    </div>         
</div>

<div class="row">
    <div class="col-md-5">

        <table style="width: 100%">
            <tr>
                <th>Name:</th>
                <th colspan="2" content-source="display_name">Ervinne Sodusta</th>
            </tr>
            <tr>
                <td>Position:</td>
                <td colspan="2" content-source="position_name">Developer</td>
            </tr>
            <tr>
                <td>Period Covered:</td>
                <td class="align-right" colspan="2" content-source="period_covered">Feb. 26 - Jan. 10 2017</td>
            </tr>
            <tr>
                <td colspan="2">Daily Rate:</td>
                <td class="align-right" content-source="daily_rate">1,200.75</td>
            </tr>
            <tr>
                <td colspan="2">No. of Days Present:</td>
                <td class="align-right" content-source="days_present">12</td>
            </tr>
        </table>
    </div>   

    <div class="col-md-12">
        <table class="payslip-table" style="width: 100%">
            <tr>
                <td colspan="3">Basic:</td>
                <td class="payroll-detail-col align-right">Php</td>
                <td class="payroll-detail-col"></td>
                <td class="align-right border-bottom-thick payroll-detail-col">
                    <b content-source="basic_salary">21,000.00</b>
                </td>
            </tr>
            <tr>
                <td colspan="5">Salary:</td>                
                <td class="align-right payroll-detail-col" content-source="cutoff_salary">
                    10,500.00
                </td>
            </tr>

            <!--Other Earnings-->

            <tr>
                <td class="border-bottom payroll-detail-col">Add:</td>
                <td class="open-border-right payroll-detail-col">COLA</td>
                <td colspan="2"></td>
                <td class="border-top-bottom payroll-detail-col align-right">250.00</td>
                <td class="payroll-detail-col"></td>
            </tr>
            <tr>
                <td class="payroll-detail-col"></td>
                <td class="open-border-right payroll-detail-col">Taxable Allowance</td>
                <td colspan="2"></td>
                <td class="border-top-bottom payroll-detail-col align-right">500.00</td>
                <td class="payroll-detail-col"></td>
            </tr>
            <tr >
                <td class="payroll-detail-col"></td>
                <td class="open-border-right payroll-detail-col"><b>Total</b></td>
                <td colspan="2"></td>
                <td class="border-bottom-thick  payroll-detail-col"></td>
                <td class="payroll-detail-col align-right border-bottom-thick align-right">750.00</td>
            </tr>

            <tr>
                <td colspan="4" class="payroll-detail-col">
                    <b><i>Gross Income</i></b>
                </td>                                        
                <td class="payroll-detail-col"></td>
                <td class="payroll-detail-col align-right">
                    <b content-source="gross_income">11,250.00</b>
                </td>
            </tr>

            <!--Deductions-->
            <tr>
                <td class="border-bottom payroll-detail-col">Less:</td>
                <td class="open-border-right payroll-detail-col">SSS</td>
                <td colspan="2"></td>
                <td class="border-top-bottom payroll-detail-col align-right">500.00</td>
                <td class="payroll-detail-col"></td>
            </tr>
            <tr>
                <td class="payroll-detail-col"></td>
                <td class="open-border-right payroll-detail-col">Philhealth</td>
                <td colspan="2"></td>
                <td class="border-top-bottom payroll-detail-col align-right">500.00</td>
                <td class="payroll-detail-col"></td>
            </tr>
            <tr>
                <td class="payroll-detail-col"></td>
                <td class="open-border-right payroll-detail-col">HDMF</td>
                <td colspan="2"></td>
                <td class="border-top-bottom payroll-detail-col align-right">500.00</td>
                <td class="payroll-detail-col"></td>
            </tr>
            <tr>
                <td class="payroll-detail-col"></td>
                <td class="open-border-right payroll-detail-col">Taxable Allowance</td>
                <td colspan="2"></td>
                <td class="border-top-bottom payroll-detail-col align-right">500.00</td>
                <td class="payroll-detail-col"></td>
            </tr>

            <tr class="m-t-20">
                <td class="payroll-detail-col"></td>
                <td class="open-border-right payroll-detail-col border-bottom-thick"><b>Total Deductions</b></td>
                <td class="border-bottom-thick" colspan="3"></td>                    
                <td class="payroll-detail-col align-right border-bottom-thick">1,000.00</td>
            </tr>

            <tr>
                <td colspan="3" class="payroll-detail-col">
                    <b><i>Net Income</i></b>
                </td>                                        
                <td class="payroll-detail-col align-right">Php</td>
                <td class="payroll-detail-col align-right"></td>
                <td class="payroll-detail-col align-right">
                    <b content-source="net_income">10,250.00</b>
                </td>
            </tr>

        </table>

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
                <td>Name</td>
                <td>Name</td>
                <td>Name</td>
            </tr>
        </table>
    </div>
    <!--</div>-->
</div>

<div class="row">

</div>