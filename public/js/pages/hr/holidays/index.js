
/* global baseURL, datatable_utilities, baseUrl */

(function () {

    $(document).ready(function () {
        initializeTable();

        datatable_utilities.initializeDeleteAction();

    });

    function initializeTable() {
        $('#holidays-datatable').DataTable({
            processing: true,
            serverSide: true,
            search: {
                caseInsensitive: true
            },
            ajax: {
                url: baseUrl + "/hr/holidays/datatable"
            },
            order: [1, "asc"],
            columns: [
                {data: 'code'},
                {data: 'code'},
                {data: 'description'},
                {data: 'type.description', name: 'type.description'},
                {data: 'date_start'},
                {data: 'date_end'}
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
                    targets: [4, 5],
                    render: datatable_utilities.renderDate
                }
            ]
        });
    }

})();
