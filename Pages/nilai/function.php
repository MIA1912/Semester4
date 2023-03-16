<?php

function hapus($nilai_id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM nilai WHERE nilai_id = $nilai_id");

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;
    
    $nilai_sem = htmlspecialchars($data['nilai_sem']);
    $mhs_nim = htmlspecialchars($data['mhs_nim']);
    $matkul_kd = htmlspecialchars($data['matkul_kd']);
    $dsn_nidn = htmlspecialchars($data['dsn_nidn']);
    $hadir = htmlspecialchars($data['hadir']);
    $tugas = htmlspecialchars($data['tugas']);
    $kuis = htmlspecialchars($data['kuis']);
    $uts = htmlspecialchars($data['uts']);
    $uas = htmlspecialchars($data['uas']);

    $query =
        "UPDATE
    nilai
SET
    nilai_sem = '$nilai_sem',
    mhs_nim = '$mhs_nim',
    matkul_kd = '$matkul_kd',
    dsn_nidn = '$dsn_nidn',
    hadir = '$hadir',
    tugas = '$tugas',
    kuis = '$kuis',
    uts = '$uts',
    uas = '$uas'
WHERE
    nilai_id = '$_GET[nilai_id]'";


    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambah($data)
{
    global $conn;
    // ambil data dari tiap elemen dalam form
    $nilai_sem = htmlspecialchars($data['nilai_sem']);
    $mhs_nim = htmlspecialchars($data['mhs_nim']);
    $matkul_kd = htmlspecialchars($data['matkul_kd']);
    $dsn_nidn = htmlspecialchars($data['dsn_nidn']);
    $hadir = htmlspecialchars($data['hadir']);
    $tugas = htmlspecialchars($data['tugas']);
    $kuis = htmlspecialchars($data['kuis']);
    $uts = htmlspecialchars($data['uts']);
    $uas = htmlspecialchars($data['uas']);

    $query = "INSERT INTO
        nilai(nilai, mhs_nim, matkul_kd, dsn_nidn, hadir, tugas, kuis, uts, uas)
        VALUES
        (
            '$nilai_sem',
            '$mhs_nim',
            '$matkul_kd',
            '$dsn_nidn',
            '$hadir',
            '$tugas',
            '$kuis',
            '$uts',
            '$uas'
        );";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM nilai
    WHERE
    nilai_id LIKE '%$keyword%' OR
    nilai_sem LIKE '%$keyword%' OR 
    mhs_nim LIKE '%$keyword%' OR 
    matkul_kd LIKE '%$keyword%' OR 
    dsn_nidn LIKE '%$keyword%' OR 
    hadir LIKE '%$keyword%' OR 
    tugas LIKE '%$keyword%' OR 
    kuis LIKE '%$keyword%' OR 
    uts LIKE '%$keyword%' OR 
    uas LIKE '%$keyword' 
    ";
    return query($query);
}
