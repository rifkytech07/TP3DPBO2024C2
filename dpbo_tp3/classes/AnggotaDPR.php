<?php

class AnggotaDPR extends DB
{
    function getAnggotaDPRJoin()
    {
        $query = "SELECT * FROM anggota JOIN fraksi ON anggota.id_fraksi=fraksi.id_fraksi ORDER BY anggota.id_anggota";
        return $this->execute($query);
    }

    function getAnggotaDPR()
    {
        $query = "SELECT * FROM anggota";
        return $this->execute($query);
    }

    function getAnggotaDPRById($id)
    {
        $query = "SELECT * FROM anggota JOIN fraksi ON anggota.id_fraksi=fraksi.id_fraksi WHERE id_anggota=$id";
        return $this->execute($query);
    }

    function searchAnggotaDPR($keyword)
    {
        $query = "SELECT * FROM anggota
              JOIN fraksi ON anggota.id_fraksi=fraksi.id_fraksi
              WHERE nama LIKE '%$keyword%'  
              OR fraksi.nama_fraksi LIKE '%$keyword%' 
              OR dapil LIKE '%$keyword%'";
        return $this->execute($query);
    }

    function addData($data)
    {
        $nama = $data['nama_anggota'];
        $fraksi = $data['id_fraksi'];
        $dapil = $data['id_dapil'];
        
        $query = "INSERT INTO anggota (nama_anggota, id_fraksi,  id_dapil) 
                  VALUES ('$nama','$fraksi', '$dapil')";
        return $this->executeAffected($query);
    }

    function updateData($id, $data, $file)
    {
        $nama = $data['nama_anggota'];
        
        $fraksi = $data['id_fraksi'];
        $dapil = $data['id_dapil'];

        $query = "UPDATE anggota
                  SET nama='$nama', id_fraksi='$fraksi', id_dapil='$dapil' 
                  WHERE id_anggota=$id";
        return $this->executeAffected($query);
    }

    function deleteData($id)
    {
        $query = "DELETE FROM anggota WHERE id_anggota=$id";
        return $this->executeAffected($query);
    }
}
?>
