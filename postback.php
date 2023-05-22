<?php
// Load WordPress environment
require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');

// Cek apakah variabel POST yang diperlukan ada atau tidak
if (isset($_REQUEST['subid']) && isset($_REQUEST['virtual_currency']) && isset($_REQUEST['password']) && isset($_REQUEST['campaign_name'])) {

    $user_id = $_REQUEST['subid'];
    $points = $_REQUEST['virtual_currency'];
    $password = $_REQUEST['password'];
    $reason = $_REQUEST['campaign_name'];

    // Ganti ini dengan password yang Anda buat pada pengaturan postback di CPAlead
    $your_password = '415678aar';

    // Cek apakah password cocok
    if ($password === $your_password) {
        // Jika password benar, tambahkan poin ke pengguna
        $data = array(
            'user_id' => $user_id,
            'points' => $points,
            'reason' => $reason,
        );
        $result = apply_filters('woorewards_add_points', $data);

        if ($result) {
            echo 'Point ditambahkan';
        } else {
            echo 'Gagal menambahkan poin';
        }
    } else {
        // Jika password tidak cocok, kirim pesan kesalahan
        echo 'Password salah.';
        die;
    }
} else {
    // Jika variabel POST yang diperlukan tidak ada, kembalikan pesan kesalahan
    echo 'Variabel URL tidak cocok.';
}
?>
