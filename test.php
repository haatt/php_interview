<?php
$password = 'aaaa';
echo $password = password_hash($password, PASSWORD_DEFAULT).'<br>';
echo $a =  password_verify( 'aaaa', $password);
?>