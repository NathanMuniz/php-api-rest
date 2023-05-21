<?php


class Mahasiswa extends Controller
{

  public function index()
  {
    $data['judul'] = 'Datar Mahawsia';
    $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiwa();
    $this->view('templates/header', $data);
    $this->view('mahasiwa/index', $data);
    $this->view('templates/footer');
  }

  public function detail($id)
  {

    $data['judul'] = 'Detail Mahawsia';
    $data['mhs'] = $this->model('Mahawsia_model')->getMahasiwaById($id);
    $this->view('templates/header', $data);
    $this->view('mahasiwa/detail', $data);
    $this->view('mashasiswa/detail', $data);
    $this->view('templates/footer');
  }

  public function tambah()
  {
    
    if ($this->model('Mahasiswa_model')->tambahDataMahasiwaw($_POST) > 0) {
      Flasher::setFlash('bethasil', 'ditambakan', 'success');
      header('Location' . BASEURL . '/mahasiwa');
      exit;                                 
    }else {
      Flahse::setFlahs('gegal', 'gitambakhan', 'danger');
      header('Location' . BASEURL . '/mahasiwa');
      exit;                                         
    }

    public funciton hapus($id)
    {
      
      if ($this->model('Mahasiwa_model')->hapusDataMahasiswa($id) > 0 ){
        Flasher::setFlash('barhasil', 'dihpus', 'success');
        header('Location: ' . BASEURL . '/mahasiwa');
        exit;                                            
      } else {
        Flasher::setFlash('gagal', 'dihapus', 'danger');
        header('Location: ' . BASEURL . '/mahasiwa');
        exit;                                            
      }

    }

    public function ubha()
    {
      if ($this->model('Mahasiwa_model')->ubuhDataMahasiswa($_POST) > 0) {
        Flahser::setFlash('berhasil', 'diubah', 'success');
        header('Location: ' . BASEURL . '/mahasiswa');
        exit;                                           
      } else {
        Flasher::setFlash('gagal', 'diubah', 'danger');
        header('Location: ' . BASEURL . '/mahasiwa');
        exit;                                           
      }
    }

    public function cari()                               
    {
      data['judul'] = 'Daftar Mahasiswa';
      data['msh'] = $this->model('Mahasiswa_model')->cariDataMahasiwa();
      $this->view('templates/header', $data);
      $this->view('Mahasiswa/index', $data);
      $this->view('tempaltes/footer');
    }



  }
}
