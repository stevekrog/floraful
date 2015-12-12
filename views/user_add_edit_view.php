<?php
  foreach($error_msg as $err){
    print "<b>" . $err . "</b><br>";
  }
?>
<div class="container">
    <form action="user.php" method="get">
        <input type="hidden" name="email" value="<?= $user->getemail() ?>">
        <input type="hidden" name="action" value="save_user">
        <input type="hidden" name="created" value="<?= $user->getcreated() ?>">

        <div class="form-group">
            <label for="name">Name: </label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $user->getname() ?>" required autofocus>
        </div>

        <div class="form-group">
            <label for="password">Password: </label>
            <input type="text" class="form-control" id="password" name="password" value="<?= $user->getpassword() ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email: </label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $user->getemail() ?>" required>
        </div>

        <div class="form-group">
            <label for="roleid">Role: </label>
            <select class="form-control" id="roleid" name="roleid">
            <?php
              foreach($roles as $role){
                if($role['roleid'] == $user->getrole()) {
                  echo "<option value='" . $role['roleid'] . "' selected>" .$role['roleName'] . "</option>";
                }else{
                  echo "<option value='" . $role['roleid'] . "'>" .$role['roleName'] . "</option>";
                }
              }
            ?>
            </select>
        </div>
        <br><br>
        <input type="submit" value="Save" class="btn btn-info" role="button">
        <a href="../webroot/home.php" class="btn btn-info" role="button">Home</a><br />
    </form>
</div>
