<?php

if (isset($_COOKIE['Logado'])) {
unset($_COOKIE['Logado']);
setcookie('Logado');
setcookie('Logado', ' ', time()-3600);
setcookie('Logado', '', 1, '/');
header("Location:http://painel.baixar-videos.net");
}
else
{
header("Location:http://painel.baixar-videos.net");
}

?>