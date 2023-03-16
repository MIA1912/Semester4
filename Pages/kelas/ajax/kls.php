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
$query = "SELECT * FROM kelas 
    WHERE
    kelas_kd LIKE '%$keyword' OR
    kelas_nama LIKE '%$keyword%'
    ";
$kelas = query($query);

$jlhDataperHal = 2;
$jlhData = count(query("SELECT * FROM kelas"));
$jlhHal = ceil($jlhData / $jlhDataperHal);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$awalData = ($jlhDataperHal * $halAktif) - $jlhDataperHal;
?>

<table class="greenTable">
    <caption>
        <h1>Table Data Kelas</h1>
    </caption>
    <thead>
        <tr>
            <th>No.</th>
            <th>Kode</th>
            <th>Nama</th>
            <th colspan="2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($kelas as $kls) :
        ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $kls["kelas_kd"] ?></td>
                <td><?= $kls["kelas_nama"] ?></td>
                <td class="ubah">
                    <a href="ubah.php?kelas_kd=<?= $kls["kelas_kd"]; ?>">Ubah</a>
                </td>
                <td class="hapus">
                    <a href="hapus.php?kelas_kd=<?= $kls["kelas_kd"]; ?>" onclick="return confirm('yakin?')">Hapus</a>
                </td>
            </tr>
            <?php $i++ ?>
        <?php endforeach; ?>
    </tbody>
</table>