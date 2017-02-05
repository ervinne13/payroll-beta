
/* global baseUrl, datatable_utilities */

(function () {

    $(document).ready(function () {
        initializeTable();
    });

    function initializeTable() {

        $('#policies-datatable').DataTable({
            processing: true,
            serverSide: true,
            search: {
                caseInsensitive: true
            },
            ajax: {
                url: baseUrl + "/hr/policies/datatable"
            },
            order: [1, "asc"],
            columns: [
                {data: 'code'},
                {data: 'code'},
                {data: 'short_description'}
            ],
            columnDefs: [
                {searchable: false, targets: [0]},
                {orderable: false, targets: [0]},
                {
                    targets: 0,
                    render: function (code) {
                        var actions = [datatable_utilities.getDefaultViewAction(code)];
                        var view = datatable_utilities.getInlineActionsView(actions);
                        return view;
                    }
                }
            ]
        });
    }

})();
