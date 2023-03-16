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
$query = "SELECT * FROM prodi
    WHERE
    prodi_kd LIKE '%$keyword%' OR
    prodi_nama LIKE '%$keyword%' OR 
    prodi_jenjang LIKE '%$keyword' 
    ";
$prodi = query($query);

$jlhDataperHal = 2;
$jlhData = count(query("SELECT * FROM prodi"));
$jlhHal = ceil($jlhData / $jlhDataperHal);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$awalData = ($jlhDataperHal * $halAktif) - $jlhDataperHal;
?>

<table class="greenTable">
    <caption>
        <h1>Table Data Prodi</h1>
    </caption>
    <thead>
        <tr>
            <th>No.</th>
            <th>Kode</th>
            <th>Nama</th>
            <th>Jenjang</th>
            <th colspan="2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($prodi as $prd) :
        ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $prd["prodi_kd"] ?></td>
                <td><?= $prd["prodi_nama"] ?></td>
                <td><?= $prd["prodi_jenjang"] ?></td>
                <td class="ubah">
                    <a href="ubah.php?prodi_kd=<?= $prd["prodi_kd"]; ?>">Ubah</a>
                </td>
                <td class="hapus">
                    <a href="hapus.php?prodi_kd=<?= $prd["prodi_kd"]; ?>" onclick="return confirm('yakin?')">Hapus</a>
                </td>
            </tr>
            <?php $i++ ?>
        <?php endforeach; ?>
    </tbody>
</table>