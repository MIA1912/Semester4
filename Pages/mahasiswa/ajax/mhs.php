<?php
$conn = mysqli_connect("localhost", "root", "", "db_ilham");
if (!$conn) {
    die("Connection failed : " . mysqli_connect_error());
}

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

$keyword = $_GET['keyword'];
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
$mahasiswa = query($query);

$jlhDataperHal = 2;
$jlhData = count(query("SELECT * FROM mahasiswa"));
$jlhHal = ceil($jlhData / $jlhDataperHal);
// ceil adalah function untuk mengubah pecahan ke decimal
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$awalData = ($jlhDataperHal * $halAktif) - $jlhDataperHal;
?>

<table class="greenTable">
    <thead>
        <tr>
            <th>No.</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamain</th>
            <th>Agama</th>
            <th>Foto</th>
            <th>Kode Kelas</th>
            <th>Kode Prodi</th>
            <th colspan="2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($mahasiswa as $mhs) :
        ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $mhs['mhs_nim'] ?></td>
                <td><?= $mhs['mhs_nama'] ?></td>
                <td><?= $mhs['mhs_alamat'] ?></td>
                <td><?= $mhs['mhs_tempat_lahir'] ?></td>
                <td><?= $mhs['mhs_tgl_lahir'] ?></td>
                <td><?= $mhs['mhs_jenkel'] ?></td>
                <td><?= $mhs['mhs_agama'] ?></td>
                <td>
                    <img src="../Foto/<?= $mhs['mhs_foto']; ?>" alt="">
                </td>
                <td><?= $mhs['kelas_kd'] ?></td>
                <td><?= $mhs['prodi_kd'] ?></td>
                <td class="ubah">
                    <a href="ubah.php?mhs_nim=<?= $mhs["mhs_nim"]; ?>">Ubah</a>
                </td>
                <td class="hapus">
                    <a href="hapus.php?mhs_nim=<?= $mhs["mhs_nim"]; ?>" onclick="return confirm('yakin?')">Hapus</a>
                </td>
            </tr>
            <?php $i++ ?>
        <?php endforeach; ?>
    </tbody>
</table>