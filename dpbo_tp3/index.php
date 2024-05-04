<?php

include('config/db.php');
include('classes/DB.php');
include('classes/AnggotaDPR.php');
include('classes/Template.php');

// Buat instance anggota DPR
$listAnggotaDPR = new AnggotaDPR($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);

// Buka koneksi
$listAnggotaDPR->open();

// Tampilkan data anggota DPR
$listAnggotaDPR->getAnggotaDPRJoin();

// Cari anggota DPR
if (isset($_POST['btn-cari'])) {
    // Metode mencari data anggota DPR
    $listAnggotaDPR->searchAnggotaDPR($_POST['cari']);
} else {
    // Method menampilkan data anggota DPR
    $listAnggotaDPR->getAnggotaDPRJoin();
}

$data = null;

// Ambil data anggota DPR
// Gabungkan dengan tag HTML
// Untuk dipassing ke skin/template
while ($row = $listAnggotaDPR->getResult()) {
    $data .= '<div class="col gx-2 gy-3 justify-content-center">' .
        '<div class="card pt-4 px-2 anggota-thumbnail">
        <a href="detail.php?id=' . $row['id_anggota'] . '">
        <div class="row justify-content-center">
            
         </div>
            <div class="card-body">
                <p class="card-text anggota-nama my-0">' . $row['nama_anggota'] . '</p>
                <p class="card-text fraksi-nama">' . $row['nama_fraksi'] . '</p>';
                // Sesuaikan dengan nama kolom yang benar
                if(isset($row['asal_dapil'])) {
                    $data .= '<p class="card-text dapil-nama my-0">' . $row['asal_dapil'] . '</p>';
                } else {
                    $data .= '<p class="card-text dapil-nama my-0">Nama Kolom Dapil</p>';
                }
                
                $data .= '</div>
        </a>
    </div>    
    </div>';
}

// Tutup koneksi
$listAnggotaDPR->close();

// Buat instance template
$home = new Template('templates/skin.html');

// Simpan data ke template
$home->replace('DATA_ANGGOTA', $data);
$home->write();
?>
