
/* global baseUrl */

(function () {

    $(document).ready(function () {
        initializeTable();
    });

    function initializeTable() {
        $('#chronolog-datatable').DataTable({
            processing: true,
            serverSide: true,
            search: {
                caseInsensitive: true
            },
            ajax: {
                url: baseUrl + "/timekeeping/employees/" + code + "/chronolog/datatable"
            },
            order: [2, "desc"],
            columns: [
                {data: 'entry_date'},
                {data: 'entry_date'},
                {data: 'time_in'},
                {data: 'time_out'}
            ],
            columnDefs: [
                {searchable: false, targets: [0]},
                {orderable: false, targets: [0]},
                {
                    targets: 0,
                    render: function (code) {
                        return "";
                    }
                },
                {
                    targets: [2, 3],
                    render: function (time) {
                        return datatable_utilities.renderTimeFromDateTime(time, "display");
//                        return time;
                    }
                }
            ]
        });
    }

})();
