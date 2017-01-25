
<aside id="leftsidebar" class="sidebar">                
    <!-- Menu -->
    <div class="menu">
        <div class="slimScrollDiv" >
            <ul class="list sidebar-nav auto-select-sidebar-nav">
                <li class="header">System</li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                        <i class="material-icons">account_circle</i>
                        <span>Payroll</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{url("/payroll/process")}}" class=" waves-effect waves-block">
                                Payroll Entries
                            </a>
                        </li>
                        <li>
                            <a href="{{url("/payroll/process")}}" class=" waves-effect waves-block">
                                Process Payroll
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="header">Setup & Maintenance</li>
                <!--Master Files-->
                <li>
                    <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                        <i class="material-icons">insert_drive_file</i>
                        <span>Master Files</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                                <span>Main</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="{{url("companies")}}" class=" waves-effect waves-block">
                                        <span>Companies</span>
                                    </a>
                                </li>
                                <!--                                <li>
                                                                    <a href="{{url("departments")}}" class=" waves-effect waves-block">
                                                                        <span>Department</span>
                                                                    </a>
                                                                </li>-->
                                <li>
                                    <a href="{{url("positions")}}" class=" waves-effect waves-block">
                                        <span>Position</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url("locations")}}" class=" waves-effect waves-block">
                                        <span>Locations</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                                <span>Human Resource</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="{{url("employees")}}" class=" waves-effect waves-block">
                                        <span>Employees</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url("hr/policies")}}" class=" waves-effect waves-block">
                                        <span>Policies</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url("holidays")}}" class=" waves-effect waves-block">
                                        <span>Holidays</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url("tax-categories")}}" class=" waves-effect waves-block">
                                        <span>Tax Categories</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url("shifts")}}" class=" waves-effect waves-block">
                                        <span>Shifts</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url("shift-breaks")}}" class=" waves-effect waves-block">
                                        <span>Shift Breaks</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url("work-schedules")}}" class=" waves-effect waves-block">
                                        <span>Work Schedules</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url("leave-types")}}" class=" waves-effect waves-block">
                                        <span>Leave Types</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url("loan-types")}}" class=" waves-effect waves-block">
                                        <span>Loans </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                                <span>Payroll</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="{{url("payroll/items")}}" class=" waves-effect waves-block">
                                        <span>Payroll Items</span>
                                    </a>
                                </li>
                            </ul>
                        </li>                       

                        <li>
                            <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                                <span>Computation Tables</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="{{url("computation-tables/tax")}}" class=" waves-effect waves-block">
                                        <span>Tax Table</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url("computation-tables/sss")}}" class=" waves-effect waves-block">
                                        <span>SSS Table</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url("computation-tables/philhealth")}}" class=" waves-effect waves-block">
                                        <span>Philhealth Table</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!--*End of Master Files-->

                <!--Application Setup-->
                <!--Master Files-->
                <li>
                    <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
<!--                        <i class="material-icons">insert_drive_file</i>-->
                        <span>Application Setup</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{url("modules")}}" class=" waves-effect waves-block">
                                Modules
                            </a>
                        </li>
                        <li>
                            <a href="{{url("number-series")}}" class=" waves-effect waves-block">
                                Number Series
                            </a>
                        </li>                       
                    </ul>
                </li>
                <!--*End of Application Setup-->

                <!--Security-->
                <li>
                    <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                        <i class="material-icons">lock</i>
                        <span>Security</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{url("security/users")}}" class=" waves-effect waves-block">
                                Users
                            </a>
                        </li>
                        <!--                        <li>
                                                    <a href="{{url("security/roles")}}" class=" waves-effect waves-block">
                                                        Roles
                                                    </a>
                                                </li>-->
                    </ul>
                </li>
                <!--*End of Security-->

            </ul>
        </div>
    </div>
    <!-- #Menu -->

    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            © 2017 <a href="{{config('app.author_link')}}"> {{config('app.author_name')}} </a>.
        </div>
        <!-- <div class="version">
        <b>Version: </b> 1.0.4
</div>-->
    </div>
    <!-- #Footer -->
</aside>