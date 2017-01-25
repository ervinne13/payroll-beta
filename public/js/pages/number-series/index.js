
/* global baseURL, datatable_utilities, baseUrl */

(function () {

    $(document).ready(function () {
        initializeTable();        
    });

    function initializeTable() {
        $('#number-series-datatable').DataTable({
            processing: true,
            serverSide: true,
            search: {
                caseInsensitive: true
            },
            ajax: {
                url: baseUrl + "/number-series/datatable"
            },
            order: [0, "asc"],
            columns: [
                {data: 'code'},
                {data: 'code'},
                {data: 'description'},
                {data: 'module_code'},
                {data: 'start_number'},
                {data: 'end_number'},
                {data: 'last_number_used'},
                {data: 'last_date_used'}
            ],
            columnDefs: [
                {searchable: false, targets: [0]},
                {orderable: false, targets: [0]},
                {
                    targets: 0,
                    render: function (code, type, rowData, meta) {
                        var editAction = datatable_utilities.getDefaultEditAction(code);
                        var viewAction = datatable_utilities.getDefaultViewAction(code);
                        var view = datatable_utilities.getInlineActionsView([viewAction, editAction]);
                        return view;
                    }
                }
            ]
        });
    }

})();
