
/* global baseURL, datatable_utilities, baseUrl */

(function () {

    $(document).ready(function () {
        initializeTable();

        datatable_utilities.initializeDeleteAction();

    });

    function initializeTable() {
        $('#payroll-items-datatable').DataTable({
            processing: true,
            serverSide: true,
            search: {
                caseInsensitive: true
            },
            ajax: {
                url: baseUrl + "/payroll/items/datatable"
            },
            order: [1, "asc"],
            columns: [
                {data: 'code'},
                {data: 'code'},
                {data: 'description'},
                {data: 'taxable'},
                {data: 'type'},
                {data: 'computation_basis'},
                {data: 'special_holiday_rate'},
                {data: 'regular_holiday_rate'}
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
                    targets: 3,
                    render: function (taxable) {
                        if (taxable == 1) {
                            return 'Yes';
                        } else {
                            return 'No';
                        }
                    }
                },
                {
                    targets: 4,
                    render: function (type) {

                        if (type == "D") {
                            return "Deduction";
                        } else {
                            return "Earnings";
                        }
                    }
                },
                {
                    targets: 5,
                    render: function (basis) {

                    console.log(basis);

                        switch (basis) {
                            case "D":
                                return "Day";
                            case "H":
                                return "Hour";
                            case "M":
                                return "Minute";
                            case "A":
                                return "Amount";
                            default:
                                return "";
                        }
                    }
                },
                {
                    targets: [6, 7],
                    render: function (percent) {
                        return percent + "%";
                    }
                }
            ]
        });
    }

})();
