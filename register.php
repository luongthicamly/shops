<!-- <div class="popup">
        <form>
            <h1>Register</h1>
            <div class="row-form">
                <input type="text" class="control" placeholder="First name">
                <input type="text" class="control" placeholder="Last name">
            </div>
            <div class="row-form register-form">
            <label class="form-check-label name" >Birthday</label>
                <select id='select-day'>
                   
                </select>
                <select id='select-month'>
                    
                </select>
                <select id='select-year'>
                    
                </select>
            </div>
            <input type="text" class="form-control" placeholder="0361782935">
            <input type="email" class="form-control" placeholder="exanple@gmail.com">
            <input type="password" class="form-control" placeholder="Enter your password">
            <input type="text" class="form-control" placeholder="Enter your address">
           
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                <label class="form-check-label" for="male">Male</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                <label class="form-check-label" for="female">Female</label>
            </div>
            <input type="submit" class="form-control submit-form" value="REGISTER">
        </form>
        <span class="close">
            <i class="fa fa-close"></i>
        </span>
    </div> -->



<div class="modal" id="myModal1">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h1 class="modal-title">Register</h1>
                <button type="button" class="close" data-dismiss="modal"><span class="close">
                        <i class="fa fa-close"></i>
                    </span></button>

            </div>

            <div class="modal-body">
                <form class="needs-validation" novalidate>
                    <div class="row-form">
                        <input type="text" class="control" placeholder="First name" required>
                        
                        <p class="invalid-feedback">
                            Please password
                        </p>
                        <input type="text" class="control" placeholder="Last name" required>
                        
                        <p class="invalid-feedback">
                            Please password
                        </p>
                    </div>
                    <div class="row-form register-form">
                        <label class="form-check-label name">Birthday</label>
                        <select id='select-day'>

                        </select>
                        <select id='select-month'>

                        </select>
                        <select id='select-year'>

                        </select>
                    </div>
                    <input type="text" class="form-control" placeholder="0361782935" required>
                    
                    <p class="invalid-feedback">
                        Please password
                    </p>
                    <input type="email" class="form-control" placeholder="exanple@gmail.com" required>
                    
                    <p class="invalid-feedback">
                        Please password
                    </p>
                    <input type="password" class="form-control" placeholder="Enter your password" required>
                    
                    <p class="invalid-feedback">
                        Please password
                    </p>
                    <input type="text" class="form-control" placeholder="Enter your address" required>
                    
                    <p class="invalid-feedback">
                        Please password
                    </p>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                    <input type="submit" class="form-control submit-form" value="REGISTER" name="register">
                </form>
            </div>
        </div>
    </div>
</div>