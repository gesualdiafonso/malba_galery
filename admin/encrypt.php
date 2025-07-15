<h1>Teste de encriptação de senha</h1>

<?php
$passwordPassado = "tgiPfm5";

$passwordPassadoMD5 = md5($passwordPassado);

$passwordPassadoPH = password_hash($passwordPassado, PASSWORD_DEFAULT);

echo "<p>Senha passada: $passwordPassado</p>";
echo "<p>Senha passada em MD5: $passwordPassadoMD5</p>";
echo "<p>Senha passada em password_hash: $passwordPassadoPH</p>";
echo "<p>Senha passada em password_hash (verificação): " . password_verify($passwordPassado, $passwordPassadoPH) . "</p>";
echo "<p>Senha passada em password_hash (verificação com senha errada): " . password_verify("senhaErrada", $passwordPassadoPH) . "</p>";