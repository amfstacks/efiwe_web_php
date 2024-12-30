<?php
// public/logout.php

require_once __DIR__ . '/../functions/auth.php';

logout_user();

header('Location: signin.php');
exit();
?>
