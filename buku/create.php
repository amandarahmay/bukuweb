<?php
include '../koneksi.php';

//post data
if ($_POST){
    $isbn = $_POST['isbn'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];
    $abstrak = $_POST['abstrak'];

    //insert data
    $stmt = $connection->prepare("INSERT INTO buku (isbn, judul, pengarang, jumlah, tanggal, abstrak) VALUES ('$isbn', '$judul', '$pengarang', '$jumlah', '$tanggal', '$abstrak')");
    $stmt->execute();

    $response['message'] = "Insert Berhasil";
    $response['data'] = [
        'isbn' => $isbn,
        'judul' => $judul,
        'pengarang' => $pengarang,
        'jumlah' => $jumlah,
        'tanggal' => $tanggal,
        'abstrak' => $abstrak
    ];

    //Mengubah data dalam bentuk JSON
    $json = json_encode($response, JSON_PRETTY_PRINT);
    echo $json;

} else {
    $response['message'] = "Insert Gagal";
    $json = json_encode($response, JSON_PRETTY_PRINT);
    echo $json;
}