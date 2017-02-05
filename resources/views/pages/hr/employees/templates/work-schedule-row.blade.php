
<script type="text/html" id="work-schedule-row-template">

    <tr class="employee-work-schedule-row" 
        data-state="<%= state %>"
        data-effective-date="<%= effectiveDate %>" 
        data-work-schedule-code="<%= workSchedule %>">
        <td><%= actions %></td>
        <td>
            <a href="{{url("hr/work-schedules")}}/<%= workSchedule %>" target="_blank"><%= workScheduleDisplay %></a>
        </td>
        <td class="employee-work-schedule-effective-date-display"><%= effectiveDateDisplay %></td>
    </tr>

</script>
