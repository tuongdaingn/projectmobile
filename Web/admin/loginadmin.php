<style>
  <?php include("../CSS/login.css") ?>
</style>
<body>
  <form method="post">
    <section style="color:red; font-weight:bold;"><?=isset($alert)?$alert:''?></section>
    
    <h1 style="text-align:center; color:#00FFFF; font-weight:bolder;">Login to ADMIN</h1>
    <div class="container">
      <label><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" required>

      <label><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>

      <input type="submit" value="Login">
      <!-- <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label> -->
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</body>