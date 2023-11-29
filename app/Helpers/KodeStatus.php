<?php

function getStatusSkripsi($id){
    if ($id == 0) {
        $result = '<span class="badge badge-pill badge-info">Baru</span>';
    } elseif ($id == 1) {
        $result = '<span class="badge badge-pill badge-success">Proses</span>';
    } elseif ($id == 2) {
        $result = '<span class="badge badge-pill badge-success">Teruskan Ke Kaprodi</span>';
    } elseif ($id == 3) {
        $result = '<span class="badge badge-pill badge-warning">Revisi</span>';
    } elseif ($id == 4) {
        $result = '<span class="badge badge-pill badge-danger">Ditolak</span>';
    } elseif ($id == 5) {
        $result = '<span class="badge badge-pill badge-success">Diterima</span>';
    } else {
        $result = 'Error';
    }

    return $result;
}
