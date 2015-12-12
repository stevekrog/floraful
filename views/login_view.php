<?php
  foreach($error_msg as $err){
    print "<b>" . $err . "</b><br>";
  }
?>
<h2>Please login</h2>
<div class="container">
    <form name="login" action="login.php" method="get">
        <input type="hidden" name="action" value="login" required>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" placeholder="email" value="<?= $email ?>" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" class="form-control" name="password" placeholder="password" value="<?= $password ?>"
              pattern=".{5,50}" title="5 to 50 characters" required>
        </div>

        <input type="submit" value="Login" class="btn btn-info" role="button">
        <a href="../webroot/home.php" class="btn btn-info" role="button">Home</a>
    </form>
</div>