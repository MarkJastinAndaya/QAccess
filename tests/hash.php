<?php

$password = 'admin123';

$hash = password_hash($password, PASSWORD_DEFAULT);

echo "<h3>Generated Hash</h3>";
echo $hash;

echo "<hr>";

echo "<h3>Verification</h3>";

var_dump(password_verify($password, $hash));