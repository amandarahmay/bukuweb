<?php
include '../koneksi.php';

//post data
if ($_POST){
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];
    $abstrak = $_POST['abstrak'];
    $isbn = $_POST['isbn'];
    
    //Update data
    $stmt = $connection->prepare("UPDATE `buku` SET `judul`='$judul',`pengarang`='$pengarang',`jumlah`='$jumlah',`tanggal`='$tanggal',`abstrak`='$abstrak' WHERE `isbn` = $isbn");
    $stmt->execute();

    $response['message'] = "update berhasil";
    $response['data'] = [
        
        'judul' => $judul,
        'pengarang' => $pengarang,
        'jumlah' => $jumlah,
        'tanggal' => $tanggal,
        'abstrak' => $abstrak,
        'isbn' => $isbn
    ];

    //mengubah data dalam bentuk JSON
    $json = json_encode($response, JSON_PRETTY_PRINT);
    echo $json;

} else {
    $response['message'] = "update gagal";
    $json = json_encode($response, JSON_PRETTY_PRINT);
    echo $json;
}