<?php

function hapus($kelas_kd)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM kelas WHERE kelas_kd = $kelas_kd");

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;

    $kelas_kd = htmlspecialchars($data['kelas_kd']);
    $kelas_nama = htmlspecialchars($data['kelas_nama']);

    $query =
        "UPDATE
    kelas
SET
    kelas_kd = '$kelas_kd',
    kelas_nama = '$kelas_nama'
WHERE
    kelas_kd = '$_GET[kelas_kd]'";


    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambah($data)
{
    global $conn;
    // ambil data dari tiap elemen dalam form
    $kelas_kd = htmlspecialchars($data["kelas_kd"]);
    $kelas_nama =  htmlspecialchars($data["kelas_nama"]);

    $query = "INSERT INTO
        kelas (kelas_kd, kelas_nama)
        VALUES
        (
            '$kelas_kd',
            '$kelas_nama'
        );";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM mahasiswa 
    WHERE
    kelas_kd LIKE '%$keyword' OR
    kelas_nama LIKE '%$keyword%'
    ";
    return query($query);
}
