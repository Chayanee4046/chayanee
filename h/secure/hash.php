<?php

$hash = password_hash($password,"1234", PASSWORD_DEFAULT);
echo $hash;

?>