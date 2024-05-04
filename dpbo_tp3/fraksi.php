<?php include("templates/skin.html"); ?>

<h2>Fraksi Anggota DPR</h2>

<?php
require_once "config/db.php";

$fraksi = $_GET['fraksi'];

$query = "SELECT * FROM anggota WHERE fraksi='$fraksi'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Nama</th>
                <th>Dapil</th>
                <th>Detail</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['nama'] . "</td>
                <td>" . $row['dapil'] . "</td>
                <td><a href='detail.php?id=" . $row['id'] . "'>Detail</a></td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "Data tidak ditemukan";
}
?>
