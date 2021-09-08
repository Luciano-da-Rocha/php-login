<?php

$senha_sha = sha1("12345");
$senha_base = "12345";
$senha_base = base64_encode($senha_base);
$senha_md = md5("12345");

echo "$senha_sha"."<br>"."$senha_base"."<br>"."$senha_md"."<br>";

$senha_base = base64_decode($senha_base);

echo "$senha_base"."<br>";

$senha = "12345";
$options = [
    'cost' => 10
];
$senhaSegura = password_hash($senha, PASSWORD_DEFAULT, $options);
echo "$senhaSegura"."<br>";



if(password_verify($senha, $senhaSegura)):
    echo "confere!";
else:
    echo "não confere";
endif;

