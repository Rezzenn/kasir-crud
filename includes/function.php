<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

//Mencegah Dari Input XSS
function sanitize(string $data): string {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

function rupiah(float $angka): string {
    return 'Rp' . number_format($angka, 0, ',','.');
}

//memeriksa Pengguna Apakah Sudah Login?
function check_login(): void {
    if (!isset($_SESSION['user_id'])) {
        header('Location: ../auth/login.php');
        exit;
    }
}

function check_admin(): void {
    check_login();
    if ($_SESSION['role'] !== 'admin'){
        header('Location: ../dashboard/index.php');
        exit;
    }
}

function set_flash_message(string $type, string $message): void {
    $_SESSION['flash'] = [
        'type'      => $type,
        'message'   => $message
    ];

}
