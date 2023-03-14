<?php

function hapus($matkul_kd)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM matkul WHERE matkul_kd = $matkul_kd");

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;

    $matkul_kd = htmlspecialchars($data['matkul_kd']);
    $matkul_nama = htmlspecialchars($data['matkul_nama']);
    $matkul_sks = htmlspecialchars($data['matkul_sks']);

    $query =
        "UPDATE
    matkul
SET
    matkul_kd = '$matkul_kd',
    matkul_nama = '$matkul_nama',
    matkul_sks = '$matkul_sks'
WHERE
    matkul_kd = '$_GET[matkul_kd]'";


    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambah($data)
{
    global $conn;
    // ambil data dari tiap elemen dalam form
    $matkul_kd = htmlspecialchars($data["matkul_kd"]);
    $matkul_nama =  htmlspecialchars($data["matkul_nama"]);
    $matkul_sks =  htmlspecialchars($data["matkul_sks"]);

    $query = "INSERT INTO
        matkul (matkul_kd, matkul_nama, matkul_sks)
        VALUES
        (
            '$matkul_kd',
            '$matkul_nama',
            '$matkul_sks'
        );";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
