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
$query = "SELECT * FROM matkul 
    WHERE
    matkul_kd LIKE '%$keyword' OR
    matkul_nama LIKE '%$keyword%' OR
    matkul_sks LIKE '%$keyword%'
    ";
$matkul = query($query);

$jlhDataperHal = 2;
$jlhData = count(query("SELECT * FROM matkul"));
$jlhHal = ceil($jlhData / $jlhDataperHal);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$awalData = ($jlhDataperHal * $halAktif) - $jlhDataperHal;
?>

<table class="greenTable">
    <caption>
        <h1>Table Data Mata Kuliah</h1>
    </caption>
    <thead>
        <tr>
            <th>No.</th>
            <th>matkul_kd</th>
            <th>matkul_nama</th>
            <th>matkul_sks</th>
            <th colspan="2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($matkul as $mk) :
        ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $mk["matkul_kd"] ?></td>
                <td><?= $mk["matkul_nama"] ?></td>
                <td><?= $mk["matkul_sks"] ?></td>
                <td class="ubah">
                    <a href="ubah.php?matkul_kd=<?= $mk["matkul_kd"]; ?>">Ubah</a>
                </td>
                <td class="hapus">
                    <a href="hapus.php?matkul_kd=<?= $mk["matkul_kd"]; ?>" onclick="return confirm('yakin?')">Hapus</a>
                </td>
            </tr>
            <?php $i++ ?>
        <?php endforeach; ?>
    </tbody>
</table>