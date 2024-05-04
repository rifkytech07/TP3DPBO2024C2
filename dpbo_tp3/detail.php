<?php

include('config/db.php');
include('classes/DB.php');
include('classes/AnggotaDPR.php');
include('classes/Template.php');

$anggotaDPR = new AnggotaDPR($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
$anggotaDPR->open();

$data = null;

if (isset($_GET['id_anggota'])) {
    $id = $_GET['id_anggota'];
    if ($id > 0) {
        $anggotaDPR->getAnggotaDPRById($id);
        $row = $anggotaDPR->getResult();

        $data .= '<div class="card-header text-center">
        <h3 class="my-0">Detail ' . $row['nama_anggota'] . '</h3>
        </div>
        <div class="card-body text-end">
            <div class="row mb-5">
                <div class="col-3">
                    <div class="col-9">
                        <div class="card px-3">
                            <table border="0" class="text-start">
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>' . $row['nama_anggota'] . '</td>
                                </tr>
                                <tr>
                                    <td>Fraksi</td>
                                    <td>:</td>
                                    <td>' . $row['id_fraksi'] . '</td>
                                </tr>
                                <tr>
                                    <td>Dapil</td>
                                    <td>:</td>
                                    <td>' . $row['id_dapil'] . '</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="update.php?id=' . $row['id_anggota'] . '"><button type="button" class="btn btn-success text-white">Ubah Data</button></a>
                <a href="delete.php?id=' . $row['id_anggota'] . '"><button type="button" class="btn btn-danger">Hapus Data</button></a>
            </div>';
    }
}

$anggotaDPR->close();
$detail = new Template('templates/skindetail.html');
$detail->replace('DATA_DETAIL_ANGGOTA', $data);
$detail->write();

?>
