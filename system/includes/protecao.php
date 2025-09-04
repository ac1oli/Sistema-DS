<?php
// Inicia a sessão se ainda não estiver iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Configurações de segurança para cookies de sessão
ini_set("session.cookie_httponly", 1);
ini_set("session.cookie_secure", 1);
ini_set("session.use_strict_mode", 1);

// Define um tempo de vida adequado para as sessões (ex: 30 minutos)
$session_lifetime = 1800; // 30 minutos em segundos
ini_set("session.gc_maxlifetime", $session_lifetime);

// Regenera o ID da sessão para prevenir ataques de fixação de sessão
// Isso deve ser feito após o login e outras ações importantes
if (!isset($_SESSION["regenerated"])) {
    session_regenerate_id(true);
    $_SESSION["regenerated"] = true;
}

// Verifica se a sessão está ativa e se o usuário está logado
if (!isset($_SESSION["id"]) || empty($_SESSION["id"])) {
    // Redireciona para a página de login se não estiver logado
    header("Location: ../../login/index.php"); // Ajuste o caminho conforme a estrutura do seu projeto
    exit();
}

// Atualiza o tempo de atividade da sessão
$_SESSION["last_activity"] = time();

// Verifica inatividade da sessão
if (isset($_SESSION["last_activity"]) && (time() - $_SESSION["last_activity"] > $session_lifetime)) {
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
    header("Location: ../../login/index.php?timeout"); // Redireciona para login com mensagem de timeout
    exit();
}

?>

