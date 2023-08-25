<?php

// starting needed sessions
session_start();
//unsetting it
session_unset();
//finally destroying it for logout
session_destroy();

header("Location:index.php");

?>