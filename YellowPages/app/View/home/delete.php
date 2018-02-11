<?php
if(!isset($_SESSION))
{session_start();}
header('Location: /home/main/?id=' . $_SESSION['userId']);
?>