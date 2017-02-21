<div class="card">
    <div class="header">
        <h2>
            System Information
        </h2>               
    </div>
    <div class="body">

        <!--Column 1-->
        <div class="col-md-6">

            <div class="form-group">
                <label>Employee Code <span class="required">*</span></label>
                <div class="form-line">
                    <input value="{{$employee->code}}"
                           name="code"                                        
                           class="form-control"
                           type="text" required >
                </div>
            </div>

            <div class="form-group">
                <label>Tax Category <span class="required">*</span></label>
                <div class="form-line">
                    <select name="tax_category_code" required class="form-control selectpicker" data-live-search="true">
                        @foreach($taxCategories AS $taxCategory)
                        <?php $selected = $taxCategory->code == $employee->tax_cateogry_code ? "selected" : "" ?>
                        <option {{$selected}} value="{{$taxCategory->code}}">{{$taxCategory->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Date Hired <span class="required">*</span></label>
                <div class="form-line">
                    <input value="{{$employee->date_hired}}"
                           data-date-format="dddd, MMMM DD YYYY"
                           name="date_hired"                                        
                           class="form-control datepicker"
                           type="text" required >
                </div>
            </div>

            <div class="form-group">
                <label>Date Dismissed</label>
                <div class="form-line">
                    <input value="{{$employee->date_dismissed}}"
                           data-date-format="dddd, MMMM DD YYYY"
                           name="date_dismissed"                                        
                           class="form-control datepicker"
                           type="text" >
                </div>
            </div>                   
        </div>

        <!--*End of column 1-->

        <!--Column 2-->
        <div class="col-md-6">
            <div class="form-group">
                <label>Position <span class="required">*</span></label>
                <div class="form-line">
                    <select name="position_code" required class="form-control selectpicker" data-live-search="true">
                        @foreach($positions AS $position)
                        <?php $selected = $position->code == $employee->position_code ? "selected" : "" ?>
                        <option {{$selected}} value="{{$position->code}}">{{$position->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Company <span class="required">*</span></label>
                <div class="form-line">
                    <select name="company_code" required class="form-control selectpicker" data-live-search="true">
                        @foreach($companies AS $company)
                        <?php $selected = $company->code == $employee->company_code ? "selected" : "" ?>
                        <option {{$selected}} value="{{$company->code}}">{{$company->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Location <span class="required">*</span></label>
                <div class="form-line">
                    <select name="location_code" required class="form-control selectpicker" data-live-search="true">
                        @foreach($locations AS $location)
                        <?php $selected = $location->code == $employee->location_code ? "selected" : "" ?>
                        <option {{$selected}} value="{{$location->code}}">{{$location->description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Policy <span class="required">*</span></label>
                <div class="form-line">
                    <select name="policy_code" required class="form-control selectpicker" data-live-search="true">
                        @foreach($policies AS $policy)
                        <?php $selected = $policy->code == $employee->policy_code ? "selected" : "" ?>
                        <option {{$selected}} value="{{$policy->code}}">{{$policy->short_description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <!--*End of column 2-->


        <div class="clearfix"></div>

    </div>
</div>