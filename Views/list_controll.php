<?php ob_start(); ?>
<li><a href="Views/login.php?">Espac Admin</a></li>
<li><a href="#">My Account</a></li>
<!-- <li><a href="Views/signup.html">Login</a></li>
<li><a href='Views/signup.html'>Signup</a></li> -->
<li><a href="#">Contact</a></li>
<?php $listcontrolle = ob_get_clean();
include ('../index.com'); ?>