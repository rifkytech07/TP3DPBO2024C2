<?php
require_once "config/db.php";
require_once "classes/AnggotaDPR.php";

$id = $_GET['id_anggota'];

$query = "SELECT * FROM anggota WHERE id_anggota=$id";
$result = $conn->query($query);

$row = $result->fetch_assoc();
?>

<?php include("templates/skin.html"); ?>

<h2>Update Anggota DPR</h2>
<form action="index.php" method="post">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label for="nama">Nama:</label><br>
    <input type="text" id="nama" name="nama_anggota" value="<?php echo $row['nama_anggota']; ?>" required><br>
    <label for="fraksi">Fraksi:</label><br>
    <input type="text" id="fraksi" name="fraksi" value="<?php echo $row['id_fraksi']; ?>" required><br>
    <label for="dapil">Dapil:</label><br>
    <input type="text" id="dapil" name="dapil" value="<?php echo $row['id_dapil']; ?>" required><br><br>
    <input type="submit" name="edit" value="Update">
</form>
