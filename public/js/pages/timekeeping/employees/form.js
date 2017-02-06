
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
                {data: 'entry_time'},
                {data: 'entry_type'}
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
                    targets: 2,
                    render: function (time) {
                        return datatable_utilities.renderTimeFromDateTime(time, "display");
//                        return time;
                    }
                },
                {
                    targets: 3,
                    render: function (type) {
                        switch (type) {
                            case "IN":
                                return "Time In";
                            case "OUT":
                                return "Time Out";
                            case "BIN":
                                return "Breaktime In";
                            case "BOUT":
                                return "Breaktime Out";
                        }
                    }
                }
            ]
        });
    }

})();
