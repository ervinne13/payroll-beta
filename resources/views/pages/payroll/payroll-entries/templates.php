
<script id="payroll-entry-row-template" type="text/html">
    <tr class="payroll-entry-row">
        <td></td>        
        <td><%= payroll_item.description %></td>
        <td><%= payroll_item.type == "E" ? "Earnings" : "Deductions" %></td>
        <td class="align-right"><%= qty %></td>
        <td class="align-right"><%= displayAmount %></td>
        <td><%= remarks %></td>
    </tr>
</script>

<script id="payroll-entry-footer-row-template" type="text/html">
    <tr class="payroll-entry-row">
        <th colspan="3"></th>
        <th class="align-right">Total Earnings:</th>
        <th class="align-right"><%= totalEarnings %></th>
        <th></th>
    </tr>
</script>