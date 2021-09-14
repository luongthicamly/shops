    
<div class="modal" id="myModal-login">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <div class="modal-header">
          <h1 class="modal-title">Login</h1>
          <button type="button" class="close" data-dismiss="modal"><span class="close">
            <i class="fa fa-close"></i>
        </span></button>
          
        </div>
        
        <div class="modal-body">
        <form class="login-form" action="./php/login_index.php" method="POST" role="form">
            <input type="email" class="form-control" placeholder="exanple@gmail.com" name="username">
            <input type="password" class="form-control" placeholder="Enter your password" name="password">
           
            <div class="custom-control custom-checkbox mb-3">
					<input type="checkbox" class="custom-control-input" id="customCheck" name="checkbox1">
					<label class="custom-control-label" for="customCheck">Remember is password</label>
				</div>
            <input type="submit" class="form-control submit-form" value="LOGIN">
        </form>
        </div>
      </div>
    </div>
  </div>