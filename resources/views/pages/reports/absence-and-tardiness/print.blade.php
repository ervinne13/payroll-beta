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
        </table>
    </div>   

    <div id="absence-and-tardiness-details-table-container" class="col-md-12">

    </div>
</div>
