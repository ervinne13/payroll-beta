
<script id="payslip-details-table-template" type="text/html">
    <table class="payslip-details-table" style="width: 100%">
        <tr>
            <td colspan="3">Basic:</td>
            <td class="payroll-detail-col align-right">Php</td>
            <td class="payroll-detail-col"></td>
            <td class="align-right border-bottom-thick payroll-detail-col">
                <b content-source="basic_salary"><%= formatCurrency(basic_rate) %></b>
            </td>
        </tr>
        <tr>
            <td colspan="5">Salary:</td>                
            <td class="align-right payroll-detail-col" content-source="cutoff_salary">
                <%= formatCurrency(cutoff_rate) %>
            </td>
        </tr>

        <!--Other Earnings-->

        <% if (totalEarnings > 0) { %>
        <% var index = 0; %>

        <% _.each(earnings, function(entry) { %>

        <tr>
            <% if (index == 0) { %>
            <td class="border-bottom payroll-detail-col">Add:</td>
            <% } else { %>
            <td class="payroll-detail-col"></td>
            <% } %>
            <td class="open-border-right payroll-detail-col"><%= entry.text %></td>
            <td colspan="2"></td>
            <td class="border-top-bottom payroll-detail-col align-right"><%= formatCurrency(entry.total) %></td>
            <td class="payroll-detail-col"></td>
        </tr>

        <% index ++ %>
        <% }); %>

        <tr >
            <td class="payroll-detail-col"></td>
            <td class="open-border-right payroll-detail-col"><b>Total</b></td>
            <td colspan="2"></td>
            <td class="border-bottom-thick  payroll-detail-col"></td>
            <td class="payroll-detail-col align-right border-bottom-thick align-right"><%= formatCurrency(totalEarnings) %></td>
        </tr>

        <% } %>

        <tr>
            <td colspan="4" class="payroll-detail-col">
                <b><i>Gross Income</i></b>
            </td>                                        
            <td class="payroll-detail-col"></td>
            <td class="payroll-detail-col align-right">
                <b content-source="gross_income"><%= formatCurrency(cutoff_rate + totalEarnings) %></b>
            </td>
        </tr>

        <!--Deductions-->

        <% if (totalDeductions > 0) { %>
        <% var index = 0; %>

        <% _.each(deductions, function(entry) { %>

        <tr>
            <% if (index == 0) { %>
            <td class="border-bottom payroll-detail-col">Less:</td>
            <% } else { %>
            <td class="payroll-detail-col"></td>
            <% } %>
            <td class="open-border-right payroll-detail-col"><%= entry.text %></td>
            <td colspan="2"></td>
            <td class="border-top-bottom payroll-detail-col align-right"><%= formatCurrency(entry.total) %></td>
            <td class="payroll-detail-col"></td>
        </tr>

        <% index ++ %>
        <% }); %>      

        <tr class="m-t-20">
            <td class="payroll-detail-col"></td>
            <td class="open-border-right payroll-detail-col border-bottom-thick"><b>Total Deductions</b></td>
            <td class="border-bottom-thick" colspan="3"></td>                    
            <td class="payroll-detail-col align-right border-bottom-thick"><%= formatCurrency(totalDeductions) %></td>
        </tr>

        <% } %>

        <tr>
            <td colspan="3" class="payroll-detail-col">
                <b><i>Net Income</i></b>
            </td>                                        
            <td class="payroll-detail-col align-right">Php</td>
            <td class="payroll-detail-col align-right"></td>
            <td class="payroll-detail-col align-right">
                <% var netIncome = formatCurrency(cutoff_rate + totalEarnings - totalDeductions) %>
                <b content-source="net_income"><%= netIncome > 0 ? netIncome : 0 %></b>
            </td>
        </tr>

    </table>
</script>
