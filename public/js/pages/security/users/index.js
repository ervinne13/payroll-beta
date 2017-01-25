
/* global baseURL, datatable_utilities, baseUrl */

(function () {

    $(document).ready(function () {
        initializeTable();

        datatable_utilities.initializeDeleteAction();

    });

    function initializeTable() {
        $('#users-datatable').DataTable({
            processing: true,
            serverSide: true,
            search: {
                caseInsensitive: true
            },
            ajax: {
                url: baseUrl + "/security/users/datatable"
            },
            order: [1, "asc"],
            columns: [
                {data: 'id'},
                {data: 'id'},
                {data: 'display_name'},
                {data: 'role_code'}
            ],
            columnDefs: [
                {searchable: false, targets: [0]},
                {orderable: false, targets: [0]},
                {
                    targets: 0,
                    render: function (id) {

                        var viewAction = datatable_utilities.getDefaultViewAction(id);
                        var editAction = datatable_utilities.getDefaultEditAction(id);

                        var actions = [viewAction, editAction];

                        if (id != "admin") {
                            actions.push(datatable_utilities.getDefaultDeleteAction(id));
                        }

                        var view = datatable_utilities.getInlineActionsView(actions);
                        return view;
                    }
                }
            ]
        });
    }

})();
