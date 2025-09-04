<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Regenera o ID da sessão para prevenir ataques de fixação de sessão
if (!isset($_SESSION["regenerated"])) {
    session_regenerate_id(true);
    $_SESSION["regenerated"] = true;
}

// Tempo limite de inatividade (30 min)
$session_lifetime = 1800;

// Verifica login
if (!isset($_SESSION["id"]) || empty($_SESSION["id"])) {
    header("Location: ../../login/index.php");
    exit();
}

// Verifica inatividade
if (isset($_SESSION["last_activity"]) && (time() - $_SESSION["last_activity"] > $session_lifetime)) {
    session_unset();
    session_destroy();
    header("Location: ../../login/index.php?timeout");
    exit();
}

$_SESSION["last_activity"] = time();
