
/* global baseURL, datatable_utilities, baseUrl */

(function () {

    $(document).ready(function () {
        initializeTable();
    });

    function initializeTable() {
        $('#modules-datatable').DataTable({
            processing: true,
            serverSide: true,
            search: {
                caseInsensitive: true
            },
            ajax: {
                url: baseUrl + "/modules/datatable"
            },
            order: [0, "asc"],
            columns: [
                {data: 'code'},
                {data: 'description'},
                {data: 'module_group_code'},
                {data: 'relative_url'}
            ]
        });
    }

})();
