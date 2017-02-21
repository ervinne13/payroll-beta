
<script id="report-table-template" type="text/html">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Date</th>
                <th>Present/Absent</th>
                <th>No. of Min. Late</th>
            </tr>
        </thead>
        <tbody>
            <% _.each(days, function(day) {%>
            <tr>
                <td><%= moment(day.date, form_utilities.SERVER_DATE_FORMAT).format(form_utilities.DISPLAY_DATE_FORMAT) %></td>
                <td><%= day.status %></td>
                <td><%= day.late %></td>
            </tr>
            <%  }); %>
        </tbody>
    </table>
</script>
