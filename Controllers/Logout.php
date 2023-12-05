<?php
 include_once 'session.php';

 $userSession = new Session();
 $userSession->closeSession();

 header("location: ../index.php");
?>