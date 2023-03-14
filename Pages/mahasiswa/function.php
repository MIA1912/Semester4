<?php

function hapus($mhs_nim)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE mhs_nim = $mhs_nim");

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;

    $mhs_nim = htmlspecialchars($data['mhs_nim']);
    $mhs_nama = htmlspecialchars($data['mhs_nama']);
    $mhs_alamat = htmlspecialchars($data['mhs_alamat']);
    $mhs_tempat_lahir = htmlspecialchars($data['mhs_tempat_lahir']);
    $mhs_tgl_lahir = htmlspecialchars($data['mhs_tgl_lahir']);
    $mhs_jenkel = htmlspecialchars($data['mhs_jenkel']);
    $mhs_agama = htmlspecialchars($data['mhs_agama']);
    $kelas_kd = htmlspecialchars($data['kelas_kd']);
    $prodi_kd = htmlspecialchars($data['prodi_kd']);
    $mhs_foto_lama = htmlspecialchars($data['mhs_foto_lama']);

    if ($_FILES['mhs_foto']['error'] === 4) {
        $mhs_foto = $mhs_foto_lama;
    } else {
        $mhs_foto = upload();
    }

    // cek apakah user pilih gambar baru atau tidak

    $query =
        "UPDATE
    mahasiswa
SET
    mhs_nim = '$mhs_nim',
    mhs_nama = '$mhs_nama',
    mhs_alamat = '$mhs_alamat',
    mhs_tempat_lahir = '$mhs_tempat_lahir',
    mhs_tgl_lahir = '$mhs_tgl_lahir',
    mhs_jenkel = '$mhs_jenkel',
    mhs_agama = '$mhs_agama',
    mhs_foto = '$mhs_foto',
    kelas_kd = '$kelas_kd',
    prodi_kd = '$prodi_kd'
WHERE
    mhs_nim = '$_GET[mhs_nim]'";


    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function tambah($data)
{
    global $conn;
    // ambil data dari tiap elemen dalam form
    $mhs_nim = htmlspecialchars($data["mhs_nim"]);
    $mhs_nama =  htmlspecialchars($data["mhs_nama"]);
    $mhs_alamat =  htmlspecialchars($data["mhs_alamat"]);
    $mhs_tempat_lahir = htmlspecialchars($data['mhs_tempat_lahir']);
    $mhs_tgl_lahir = htmlspecialchars($data['mhs_tgl_lahir']);
    $mhs_jenkel = htmlspecialchars($data['mhs_jenkel']);
    $mhs_agama = htmlspecialchars($data['mhs_agama']);
    $kelas_kd = htmlspecialchars($data['kelas_kd']);
    $prodi_kd = htmlspecialchars($data['prodi_kd']);

    $mhs_foto = upload();
    if (!$mhs_foto) {
        return false;
    }

    $query = "INSERT INTO
        mahasiswa
        VALUES
        (
            '$mhs_nim',
            '$mhs_nama',
            '$mhs_alamat',
            '$mhs_tempat_lahir',
            '$mhs_tgl_lahir',
            '$mhs_jenkel',
            '$mhs_agama',
            '$mhs_foto',
            '$kelas_kd',
            '$prodi_kd'
        );";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function upload()
{
    $namaFile = $_FILES['mhs_foto']['name'];
    $sizeFile =  $_FILES['mhs_foto']['size'];
    $error = $_FILES['mhs_foto']['error'];
    $tmpName = $_FILES['mhs_foto']['tmp_name'];


    // * cek apakah tidak ada gambar yang di upload
    //! 4 artinya tidak ada gambar yang di upload
    if ($error === 4) {
        echo
        '<script>
        alert("pilih gambar terlebih dahulu")
        </script> ;';
        return false;
    }

    // * cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ["jpg", "jpeg", "png"];
    // explode adalah pemecah string menjadi array
    $ekstensiGambar = explode('.', $namaFile);
    // mengambil data di akhir, jika nama file photo.ilham.jpg
    $ekstensiGambar = strtolower(end($ekstensiGambarValid));


    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo
        "<script>
        alert('yang anda upload bukan gambar')
        </script> ;";
        return false;
    }

    if ($sizeFile > 1000000) {
        echo
        "<script>
        alert('ukuran gambar terlalu besar')
        </script> ;";
        return false;
    }

    // lolos pengecekan, gambar siap di jalankan

    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, "../Foto/" . $namaFileBaru);
    return $namaFileBaru;
}

function cari($keyword)
{
    $query = "SELECT * FROM mahasiswa 
    WHERE
    mhs_nim LIKE '%$keyword' OR
    mhs_nama LIKE '%$keyword%' OR
    mhs_alamat LIKE '%$keyword%' OR
    mhs_tempat_lahir LIKE '%$keyword%' OR
    mhs_tgl_lahir LIKE '%$keyword%' OR
    mhs_jenkel LIKE '%$keyword%' OR
    mhs_agama LIKE '%$keyword%' OR
    mhs_foto LIKE '%$keyword%' OR
    kelas_kd LIKE '%$keyword%' OR
    prodi_kd LIKE '%$keyword%'
    ";
    return query($query);
}
