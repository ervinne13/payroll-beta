
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
                url: baseUrl + "/employees/datatable"
            },
            order: [1, "asc"],
            columns: [
                {data: 'id'},
                {data: 'email'},
                {data: 'first_name'},
                {data: 'company.name', name: 'company.name'},
                {data: 'location.name', name: 'location.name'},
                {data: 'contact_number_1'},
                {data: 'contact_number_2'},
                {data: 'policy.description', name: 'policy.description'}
            ],
            columnDefs: [
                {searchable: false, targets: [0]},
                {orderable: false, targets: [0]},
                {
                    targets: 0,
                    render: function (code, test, test2) {
                        console.log(test);
                        console.log(test2);
                        var actions = datatable_utilities.getAllDefaultActions(code);
                        var view = datatable_utilities.getInlineActionsView(actions);
                        return view;
                    }
                }
            ]
        });
    }

})();
