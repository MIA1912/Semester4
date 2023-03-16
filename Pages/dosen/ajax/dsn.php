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
$query = "SELECT * FROM dosen 
    WHERE
    dsn_nidn LIKE '%$keyword' OR
    dsn_nama LIKE '%$keyword%' OR
    dsn_alamat LIKE '%$keyword%' OR
    dsn_jenkel LIKE '%$keyword%' OR
    dsn_agama LIKE '%$keyword%' OR
    dsn_no_hp LIKE '%$keyword%'
    ";
$dosen = query($query);

$jlhDataperHal = 2;
$jlhData = count(query("SELECT * FROM dosen"));
$jlhHal = ceil($jlhData / $jlhDataperHal);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$awalData = ($jlhDataperHal * $halAktif) - $jlhDataperHal;
?>

<table class="greenTable">
    <caption>
        <h1>Table Data Dosen</h1>
    </caption>
    <thead>
        <tr>
            <th>No.</th>
            <th>dsn_nidn</th>
            <th>dsn_nama</th>
            <th>dsn_alamat</th>
            <th>dsn_jenkel</th>
            <th>dsn_agama</th>
            <th>dsn_no_hp</th>
            <th colspan="2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($dosen as $dsn) :
        ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $dsn["dsn_nidn"] ?></td>
                <td><?= $dsn["dsn_nama"] ?></td>
                <td><?= $dsn["dsn_alamat"] ?></td>
                <td><?= $dsn["dsn_jenkel"] ?></td>
                <td><?= $dsn["dsn_agama"] ?></td>
                <td><?= $dsn["dsn_no_hp"] ?></td>
                <td class="ubah">
                    <a href="ubah.php?dsn_nidn=<?= $dsn["dsn_nidn"]; ?>">Ubah</a>
                </td>
                <td class="hapus">
                    <a href="hapus.php?dsn_nidn=<?= $dsn["dsn_nidn"]; ?>" onclick="return confirm('yakin?')">Hapus</a>
                </td>
            </tr>
            <?php $i++ ?>
        <?php endforeach; ?>
    </tbody>
</table>