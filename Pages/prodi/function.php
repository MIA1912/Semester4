<?php

function hapus($prodi_kd)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM prodi WHERE prodi_kd = $prodi_kd");

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;

    $prodi_kd = htmlspecialchars($data['prodi_kd']);
    $prodi_nama = htmlspecialchars($data['prodi_nama']);
    $prodi_jenjang = htmlspecialchars($data['prodi_jenjang']);

    $query =
        "UPDATE
    prodi
SET
    prodi_kd = '$prodi_kd',
    prodi_nama = '$prodi_nama',
    prodi_jenjang = '$prodi_jenjang'
WHERE
    prodi_kd = '$_GET[prodi_kd]'";


    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambah($data)
{
    global $conn;
    // ambil data dari tiap elemen dalam form
    $prodi_kd = htmlspecialchars($data["prodi_kd"]);
    $prodi_nama =  htmlspecialchars($data["prodi_nama"]);
    $prodi_jenjang =  htmlspecialchars($data["prodi_jenjang"]);

    $query = "INSERT INTO
        prodi
        VALUES
        (
            '$prodi_kd',
            '$prodi_nama',
            '$prodi_jenjang'
        );";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM prodi
    WHERE
    prodi_kd LIKE '%$keyword%' OR
    prodi_nama LIKE '%$keyword%' OR 
    prodi_jenjang LIKE '%$keyword' 
    ";
    return query($query);
}
