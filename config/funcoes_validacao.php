<?php

/**
 * Sanitiza uma string para uso seguro em HTML.
 * Converte caracteres especiais em entidades HTML para prevenir ataques XSS.
 * @param string $data A string a ser sanitizada.
 * @return string A string sanitizada.
 */
function sanitize_html_input($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

/**
 * Sanitiza uma string para uso seguro em consultas SQL.
 * Usa mysqli_real_escape_string para escapar caracteres especiais.
 * Requer uma conexão mysqli ativa.
 * @param mysqli $conn O objeto de conexão mysqli.
 * @param string $data A string a ser sanitizada.
 * @return string A string sanitizada.
 */
function sanitize_sql_input($conn, $data) {
    return mysqli_real_escape_string($conn, $data);
}

/**
 * Valida se um valor é um número inteiro.
 * @param mixed $value O valor a ser validado.
 * @return int|false O valor inteiro ou false se a validação falhar.
 */
function validate_int($value) {
    return filter_var($value, FILTER_VALIDATE_INT);
}

/**
 * Valida se um valor é um endereço de e-mail válido.
 * @param string $email O endereço de e-mail a ser validado.
 * @return string|false O endereço de e-mail validado ou false se a validação falhar.
 */
function validate_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

/**
 * Valida se um valor é um número de ponto flutuante.
 * @param mixed $value O valor a ser validado.
 * @return float|false O valor float ou false se a validação falhar.
 */
function validate_float($value) {
    return filter_var($value, FILTER_VALIDATE_FLOAT);
}

?>

