<script id="policy-payroll-item-row-template" type="text/html">
    <tr class="policy-payroll-item" data-payroll-item-code="<%= code %>" >
        <td></td>
        <td><%= description %></td>
        <td><%= type == "E" ? "Earnings" : "Deduction" %></td>
        <td>
            <div class="form-group" style="margin-bottom: 0px;">
                <div class="form-line">
                    <input type="text" class="form-control policy-payroll-item-computation" value="<%= employee_payroll_item_computation ? employee_payroll_item_computation.amount : 0 %>">
                </div>
            </div>                  
        </td>
    </tr>
</script>