<?php
require_once('../layout/header.php');
?>
<div class="col-md-12">
     <div class="card">
          <h1>Register Here</h1>
          <div>Already have account? <a href="login.php">Login Here</a></div>
          <form action="" method="post">
               <div class="form-control">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" id="username" name="username" class="form-control">
               </div>
               <div class="form-control">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control">
               </div>
               <div class="form-control">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" autocomplete>
               </div>
               <div class="form-control">
                    <label for="confirmpassword" class="form-label">Confirm Password</label>
                    <input type="password" id="confirmpassword" name="confirmpassword" class="form-control" autocomplete>
               </div>
          </form>
          <button type="submit" class="button" id="registerBtn">Register</button>

     </div>
</div>
<?php
require_once('../layout/footer.php');
?>