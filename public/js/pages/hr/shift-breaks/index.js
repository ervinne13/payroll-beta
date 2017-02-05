
/* global baseURL, datatable_utilities, baseUrl */

(function () {

    $(document).ready(function () {
        initializeTable();

        datatable_utilities.initializeDeleteAction();

    });

    function initializeTable() {
        $('#shift-breaks-datatable').DataTable({
            processing: true,
            serverSide: true,
            search: {
                caseInsensitive: true
            },
            ajax: {
                url: baseUrl + "/hr/shift-breaks/datatable"
            },
            order: [3, "asc"],
            columns: [
                {data: 'code'},
                {data: 'code'},
                {data: 'description'},
                {data: 'break_start'},
                {data: 'break_end'}
            ],
            columnDefs: [
                {searchable: false, targets: [0]},
                {orderable: false, targets: [0]},
                {
                    targets: 0,
                    render: function (code) {
                        var actions = datatable_utilities.getAllDefaultActions(code);
                        var view = datatable_utilities.getInlineActionsView(actions);
                        return view;
                    }
                },
                {
                    targets: [3, 4],
                    render: datatable_utilities.renderTime
                }
            ]
        });
    }

})();
