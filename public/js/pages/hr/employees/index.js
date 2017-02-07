
/* global baseURL, datatable_utilities, baseUrl */

(function () {

    $(document).ready(function () {
        initializeTable();

        datatable_utilities.initializeDeleteAction();

    });

    function initializeTable() {
        $('#employees-datatable').DataTable({
            processing: true,
            serverSide: true,
            search: {
                caseInsensitive: true
            },
            ajax: {
                url: baseUrl + "/hr/employees/datatable"
            },
            order: [2, "asc"],
            columns: [
                {data: 'code'},
                {data: 'code'},
                {data: 'first_name'},
                {data: 'position.name'},
//                {data: 'company_code'},
//                {data: 'location.description', name: 'location.description'},
                {data: 'contact_number_1'},
                {data: 'policy.short_description', name: 'policy.short_description'}
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
                    targets: 2,
                    render: function (code, display, rowData) {
                        return rowData.first_name + " " + rowData.last_name;
                    }
                }
            ]
        });
    }

})();
