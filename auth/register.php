<?php
require_once('../layout/header.php');    
?>
<div class="col-md-12">
    <h1>Register Here</h1>
    <form action="">
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
            <input type="password" id="password" name="password" class="form-control">
       </div>
       <div class="form-control">
            <label for="confirmpassword" class="form-label">Confirm Password</label>
            <input type="password" id="confirmpassword" name="confirmpassword" class="form-control">
       </div>
       <button type="submit" id="registerBtn">Register</button>
       <span>Already have account? <a href="login.php">Login Here</a></span>
    </form>

</div>
<?php
require_once('../layout/footer.php');    
?>  