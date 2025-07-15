<?php
require_once '../../includes/utilities/controllers/autoloader.php';

session_start();

// Salva o role antes de destruir a sessão
$role = $_SESSION['logged_in']['role'] ?? null;

// Finaliza a sessão
Autentication::log_out();

// Redireciona com base no role
if ($role === 'client') {
    header('Location: ../../index.php?section=login');
} else {
    header('Location: ../index.php?section=login');
}