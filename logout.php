<?php

// Inicia ou retoma a sessão ativa para que o PHP saiba qual sessão deve ser manipulada
session_start();

// Destrói todas as variáveis de sessão ativas (limpa o status de "logado", ID do usuário, etc.)
session_destroy();

// Redireciona o usuário imediatamente para a página de login (index.php)
header("Location: index.php");

?>