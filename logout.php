<?php

if(isset($_SESSION['is_login'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
} else {
    header("Location: index.php");
}

?>