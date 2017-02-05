<div class="card">
    <div class="header">
        <h2>
            Contact Information
        </h2>               
    </div>
    <div class="body">

        <!--Column 1-->
        <div class="col-md-6">

            <div class="form-group">
                <label>Phone Number </label>
                <div class="form-line">
                    <input value="{{$employee->phone_number}}"
                           name="phone_number" 
                           placeholder="777-7777" 
                           class="form-control"
                           type="text" maxlength="10" >
                </div>
            </div>

            <div class="form-group">
                <label>Contact Number 1 <span class="required">*</span></label>
                <div class="form-line">
                    <input value="{{$employee->contact_number_1}}"
                           name="contact_number_1" 
                           placeholder="+6391234567" 
                           class="form-control"
                           type="text" maxlength="13" required >
                </div>
            </div>

            <div class="form-group">
                <label>Contact Number 2</label>
                <div class="form-line">
                    <input value="{{$employee->contact_number_2}}"
                           name="contact_number_2" 
                           placeholder="+6391234567" 
                           class="form-control"
                           type="text" maxlength="13" >
                </div>
            </div>
        </div>
        <!--*End of column 1-->

        <!--Column 2-->
        <div class="col-md-6">                    
            <div class="form-group">
                <label>Address <span class="required">*</span></label>
                <div class="form-line">
                    <textarea name="address" class="form-control" required>{{$employee->address}}</textarea>
                </div>
            </div>                     
        </div>


        <div class="clearfix"></div>

    </div>
</div>