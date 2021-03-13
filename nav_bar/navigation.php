<?php
//session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
   $loggedin = true;
} else {
   $loggedin = false;
}

echo '  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <a class="navbar-brand" href="/restro/main_index.php">online restro </a>
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
   </button>';



echo '
   <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
         <li class="nav-item active">
            <a class="nav-link" href="/restro/main_index.php">Home <span class="sr-only"> </span></a>
         </li>';

if (!$loggedin) {
   echo '  <li class="nav-item">
            <a class="nav-link" href="/restro/login_system/about.php">Restaurant Login<span class="sr-only"> </span></a>
         </li>
         <li class="nav-item">
            <a class="nav-link" href="/restro/login_system/contact.php">Restaurant Sign- Up <span class="sr-only"> </span></a>

         </li>';
}

echo ' </ul>';
if (!$loggedin) {
   echo '   <li class="nav-item navbar-nav">
              <a class="nav-link" href="/restro/login_system/login.php">Login</a>
            </li>
            <li class="nav-item navbar-nav">
              <a class="nav-link" href="/restro/login_system/sign_up.php">Signup</a>
            </li>';
}

if ($loggedin) {
   echo ' 
			
         <li class="nav-item navbar-nav">
            <a class="nav-link" href="/restro/login_system/logout.php">logout</a>
         </li>';
}
echo '    
   </div>
</nav>

';