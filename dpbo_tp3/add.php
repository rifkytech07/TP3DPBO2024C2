<?php

include('config/db.php');
include('classes/DB.php');
include('classes/AnggotaDPR.php');
include('classes/Template.php');

$anggota = new AnggotaDPR($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$anggota->open();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = array(
        'nama_anggota' => $_POST['nama_anggota'],
        'id_fraksi' => $_POST['id_fraksi'],
        'id_dapil' => $_POST['id_dapil']
    );

    $anggota->addData($data);
    header('Location: index.php');
}

$anggota->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Anggota DPR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Tambah Anggota DPR</h2>
                <form action="add.php" method="POST">
                    <div class="mb-3">
                        <label for="nama_anggota" class="form-label">Nama Anggota</label>
                        <input type="text" class="form-control" id="nama_anggota" name="nama_anggota">
                    </div>
                    <div class="mb-3">
                        <label for="id_fraksi" class="form-label">Fraksi</label>
                        <select class="form-select" id="id_fraksi" name="id_fraksi">
                            <option value="1">PDIP</option>
                            <option value="2">Demokrat</option>
                            <option value="2">Gerindra</option>
                            <!-- Dan seterusnya -->
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="id_dapil" class="form-label">Dapil</label>
                        <select class="form-select" id="id_dapil" name="id_dapil">
                            <option value="1">JAKARTA</option>
                            <option value="1">JAWA BARAT</option>
                            <option value="1">BANTEN</option>
                            <option value="1">SUMATRA BARAT</option>
                            <!-- Dan seterusnya -->
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
