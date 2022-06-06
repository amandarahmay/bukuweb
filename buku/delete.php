<?php
include '../koneksi.php';

//POST DATA
if ($_POST){
    $isbn = $_POST['isbn'];

    //INSERT DATA
    $stmt = $connection->prepare("DELETE FROM buku WHERE isbn = '$isbn'");
    $stmt->execute();

    $response['message'] = "Berhasil di Hapus";

    //Mengubah data dalam bentuk JSON
    $json = json_encode($response, JSON_PRETTY_PRINT);
    echo $json;

} else {
    $response['message'] = "Gagal menghapus data";
    $json = json_encode($response, JSON_PRETTY_PRINT);
    echo $json;
}