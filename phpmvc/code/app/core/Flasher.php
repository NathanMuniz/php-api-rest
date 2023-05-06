<?php

class Flasher
{

  public static function setFlash($pesan, $aski, $tipe)
  {

    $_SESSION['flash'] = [
      'pesan' => $pesan,
      'aksi' => $aksi,
      'tipe' => $tipe
    ];
  }


  public static function flash()
  {


    if (isset($_SESSION['flash'])) {
      echo '<div class="aler-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show role="alert">
        Data Mahasiwa <strong>' . $_SESSION['flash']['pesan'] . '</strong> ' . $_SESSION['flash']['aksi'] . '
        <span aria-hidden="true">&times;</span> 
        </button>
      </div>';
      unset($_SESSION['flash']);
    }
  }
}
