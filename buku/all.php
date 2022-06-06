<?php
include_once '../koneksi.php';
/**
 * @var $connection PDO
 */
$statement = $connection -> query("select * from buku");
$statement -> setFetchMode(PDO::FETCH_ASSOC);
$result = $statement -> fetchAll();

$data = [];
foreach ($result as $result){
    $carbon = \Carbon\Carbon::parse($result{'tanggal'});
    $data[] = [
        'isbn' => $result['isbn'],
        'judul' => $result['judul'],
        'pengarang' => $result['pengarang'],
        'jumlah' => $result['jumlah'],
        'tanggal' => $result['tanggal'],
        'abstrak' => $result['abstrak'],
        'tanggal_indonesia' => $carbon->isnFormat('DD MMMM YYYY')
    ];
}

header('Content-Type: application/json');
echo json_encode($result);