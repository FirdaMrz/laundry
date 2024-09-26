<?php
include('connection.php'); // Pastikan koneksi di-include

function Serv_Type() {
    global $db; // Mengakses koneksi database global
    $sel = "SELECT * FROM services_type";
    $data = $db->query($sel);
    return $data;
}

function Get_item($food_type) {
    global $db; // Mengakses koneksi database global
    $sel = "SELECT * FROM services_uploade WHERE Services_Type = ?";
    $stmt = $db->prepare($sel);
    $stmt->bind_param("s", $food_type); // Menggunakan prepared statement untuk keamanan
    $stmt->execute();
    $info = $stmt->get_result();
    return $info;
}

function Get_item_detail($type, $item) {
    global $db; // Mengakses koneksi database global
    $sel = "SELECT * FROM services_uploade WHERE Services_Type = ? AND Services_name = ?";
    $stmt = $db->prepare($sel);
    $stmt->bind_param("ss", $type, $item); // Menggunakan prepared statement untuk keamanan
    $stmt->execute();
    $info = $stmt->get_result();
    return $info;
}

function get_menu_Count() {
    global $db; // Mengakses koneksi database global
    $query = "SELECT COUNT(*) AS total FROM menu_items"; // Sesuaikan query ini dengan skema database Anda
    $result = $db->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        return $row['total'];
    } else {
        return 0;
    }
}
?>
