<?php
function hapus($dsn_nidn)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM dosen WHERE dsn_nidn = $dsn_nidn");

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;

    $dsn_nidn = htmlspecialchars($data['dsn_nidn']);
    $dsn_nama = htmlspecialchars($data['dsn_nama']);
    $dsn_alamat = htmlspecialchars($data['dsn_alamat']);
    $dsn_jenkel = htmlspecialchars($data['dsn_jenkel']);
    $dsn_agama = htmlspecialchars($data['dsn_agama']);
    $dsn_no_hp = htmlspecialchars($data['dsn_no_hp']);

    $query =
        "UPDATE
    dosen
SET
    dsn_nidn = '$dsn_nidn',
    dsn_nama = '$dsn_nama',
    dsn_alamat = '$dsn_alamat',
    dsn_jenkel = '$dsn_jenkel',
    dsn_agama = '$dsn_agama',
    dsn_no_hp = '$dsn_no_hp'
WHERE
    dsn_nidn = '$_GET[dsn_nidn]'";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function tambah($data)
{
    global $conn;
    // ambil data dari tiap elemen dalam form
    $dsn_nidn = htmlspecialchars($data["dsn_nidn"]);
    $dsn_nama =  htmlspecialchars($data["dsn_nama"]);
    $dsn_alamat = htmlspecialchars($data['dsn_alamat']);
    $dsn_jenkel = htmlspecialchars($data['dsn_jenkel']);
    $dsn_agama = htmlspecialchars($data['dsn_agama']);
    $dsn_no_hp = htmlspecialchars($data['dsn_no_hp']);

    $query = "INSERT INTO
        dosen (dsn_nidn, dsn_nama, dsn_alamat, dsn_jenkel, dsn_agama, dsn_no_hp)
        VALUES
        (
            '$dsn_nidn',
            '$dsn_nama',
            '$dsn_alamat',
            '$dsn_jenkel',
            '$dsn_agama',
            '$dsn_no_hp'
        );";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM dosen 
    WHERE
    dsn_nidn LIKE '%$keyword' OR
    dsn_nama LIKE '%$keyword%' OR
    dsn_alamat LIKE '%$keyword%' OR
    dsn_jenkel LIKE '%$keyword%' OR
    dsn_agama LIKE '%$keyword%' OR
    dsn_no_hp LIKE '%$keyword%'
    ";
    return query($query);
}
