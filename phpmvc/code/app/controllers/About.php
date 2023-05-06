<?php

class About extends Controller
{

  public function index($name = 'Sandhika', $perkerjaan = 'Dosen', $umer = 32)
  {
    $data['name'] = $name;
    $data['perjerjaan'] = $perkerjaan;
    $data['umur'] = $umer;
    $data['judul'] = 'About Me';
    $this->view('templates/header', $data);
    $this->view('about/index', $data);
    $this->view('templates/footer');
  }

  public function page()
  {
    $data['judul'] = 'Pages';
    $this->view('templates/header', $data);
    $this->view('about/page');
    $this->view('templates/footer');
  }
}
