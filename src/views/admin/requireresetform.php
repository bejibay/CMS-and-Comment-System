<?php include "templates/admin/header.php":?>
<div class="row">
<div class="col-12">
<form action="admin.php" method="post">
<label for="logininfo">Login Info:</label>
<input type="text" name="logininfo" placeholder="Type in your username or email" id="logininfo">
<input type="submit" name="reset" value="Require Password Reset">
</form>
</div>
</div>
<div class="footer"><?php "templates/include/footer.php";?></div>
</body>
</html>
