<div class="card">
    <div class="header">
        <h2>
            Basic Information
        </h2>               
    </div>
    <div class="body">

        <!--Column 1-->
        <div class="col-md-6">

            <div class="form-group">
                <label>Email <span class="required">*</span></label>
                <div class="form-line">
                    <input value="{{$employee->email}}"
                           name="email" 
                           placeholder="juandc@poms.com.ph" 
                           class="form-control"
                           type="text" maxlength="64" required >
                </div>
            </div>

            <div class="form-group">
                <label>First Name <span class="required">*</span></label>
                <div class="form-line">
                    <input value="{{$employee->first_name}}"
                           name="first_name" 
                           placeholder="Juan" 
                           class="form-control"
                           type="text" maxlength="32" required >
                </div>
            </div>

            <div class="form-group">
                <label>Middle Name </label>
                <div class="form-line">
                    <input value="{{$employee->middle_name}}"
                           name="middle_name" 
                           placeholder="Carpio" 
                           class="form-control"
                           type="text" maxlength="32" required >
                </div>
            </div>

            <div class="form-group">
                <label>Last Name <span class="required">*</span></label>
                <div class="form-line">
                    <input value="{{$employee->last_name}}"
                           name="last_name" 
                           placeholder="Dela Cruz" 
                           class="form-control"
                           type="text" maxlength="32" required >
                </div>
            </div>
        </div>
        <!--*End of column 1-->

        <!--Column 2-->
        <div class="col-md-6">                    
            <div class="form-group">
                <label>Birth Date <span class="required">*</span></label>
                <div class="form-line">
                    <input value="{{$employee->birth_date}}"
                           data-date-format="dddd, MMMM DD YYYY"
                           name="birth_date"                                        
                           class="form-control datepicker"
                           type="text" required >
                </div>
            </div>

            <div class="form-group">
                <label>Gender <span class="required">*</span></label>
                <div class="form-line">
                    <select name="gender_code" class="form-control selectpicker">
                        <option {{$employee->gender_code == "M" ? "selected" : ""}} value="M">Male</option>
                        <option {{$employee->gender_code == "F" ? "selected" : ""}} value="F">Female</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Civil Status <span class="required">*</span></label>
                <div class="form-line">
                    <select name="gender_code" class="form-control selectpicker">
                        <option {{$employee->gender_code == "S" ? "selected" : ""}} value="S">Single</option>
                        <option {{$employee->gender_code == "M" ? "selected" : ""}} value="M">Married</option>
                    </select>
                </div>
            </div>

        </div>


        <div class="clearfix"></div>

    </div>
</div>