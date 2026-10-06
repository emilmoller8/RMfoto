<?php
require __DIR__ . '/includes/admin.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    tjek_csrf();
    $_SESSION = [];
    session_destroy();
}
header('Location: index.php');
