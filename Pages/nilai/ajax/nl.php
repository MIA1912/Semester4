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
$nilai = query($query);

$jlhDataperHal = 2;
$jlhData = count(query("SELECT * FROM nilai"));
$jlhHal = ceil($jlhData / $jlhDataperHal);
$halAktif = (isset($_GET['hal'])) ? $_GET['hal'] : 1;
$awalData = ($jlhDataperHal * $halAktif) - $jlhDataperHal;
?>

<table class="greenTable">
    <caption>
        <h1>Table Data Nilai</h1>
    </caption>
    <thead>
        <tr>
            <th>No.</th>
            <th>Semester</th>
            <th>NIM</th>
            <th>Kode MataKuliah</th>
            <th>NIDN</th>
            <th>Hadir</th>
            <th>Tugas</th>
            <th>Kuis</th>
            <th>UTS</th>
            <th>UAS</th>
            <th colspan="2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        foreach ($nilai as $nl) :
        ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $nl["nilai_sem"] ?></td>
                <td><?= $nl["mhs_nim"] ?></td>
                <td><?= $nl["matkul_kd"] ?></td>
                <td><?= $nl["dsn_nidn"] ?></td>
                <td><?= $nl["hadir"] ?></td>
                <td><?= $nl["tugas"] ?></td>
                <td><?= $nl["kuis"] ?></td>
                <td><?= $nl["uts"] ?></td>
                <td><?= $nl["uas"] ?></td>
                <td class="ubah">
                    <a href="ubah.php?nilai_id=<?= $nl["nilai_id"]; ?>">Ubah</a>
                </td>
                <td class="hapus">
                    <a href="hapus.php?nilai_id=<?= $nl["nilai_id"]; ?>" onclick="return confirm('yakin?')">Hapus</a>
                </td>
            </tr>
            <?php $i++ ?>
        <?php endforeach; ?>
    </tbody>
</table>