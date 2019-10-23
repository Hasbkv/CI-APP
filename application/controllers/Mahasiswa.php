<?php

class Mahasiswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->getAllMahasiswa();
        if( $this->input->post('keyword') ) 
        {
            $data['mahasiswa'] = $this->Mahasiswa_model->cariDataMahasiswa();
        }
        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/index', $data);
        $this->load->view('templates/footer');
    }
 
    // public function detail($id)
    // {
    //     $data['judul'] = 'Detail Mahasiswa';
    //     $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
    //     $this->view('templates/header', $data);
    //     $this->view('mahasiswa/detail', $data);
    //     $this->view('templates/footer');
    // }

    public function tambah()
    {
        $data['judul'] = 'Form Tambah Data Mahasiswa';


        $this->form_validation->set_rules('nama', 'Nama' , 'required');
        $this->form_validation->set_rules('nrp', 'NRP' , 'required|numeric');
        $this->form_validation->set_rules('email', 'Email' , 'required|valid_email');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('mahasiswa/tambah',);
            $this->load->view('templates/footer');
        }
        else
        {
            $this->Mahasiswa_model->tambahDataMahasiswa();
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('mahasiswa');
        }
        // if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
        //     Flasher::setFlash('Berhasil', 'ditambah', 'success');
        //     header('Location: ' . BASEURL . 'mahasiswa');
        //     exit;
        // } else {
        //     Flasher::setFlash('Gagal', 'ditambah', 'danger');
        //     header('Location: ' . BASEURL . 'mahasiswa');
        //     exit;
        // }
    }

    public function hapus($id)
    {
        $this->Mahasiswa_model->hapusDataMahasiswa($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('mahasiswa');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('mahasiswa/detail', $data);
        $this->load->view('templates/footer');
    }

    public function ubah($id)
    {
        $data['judul'] = 'Form Ubah Data Mahasiswa';
        $data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaById($id);
        $data['jurusan'] = ['Teknik Informatika', 'Teknik Mesin', 'Teknik Planologi', 'Teknik Lingkungan', 'Teknik Pangan'];


        $this->form_validation->set_rules('nama', 'Nama' , 'required');
        $this->form_validation->set_rules('nrp', 'NRP' , 'required|numeric');
        $this->form_validation->set_rules('email', 'Email' , 'required|valid_email');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('mahasiswa/ubah', $data);
            $this->load->view('templates/footer');
        }
        else
        {
            $this->Mahasiswa_model->ubahDataMahasiswa();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('mahasiswa');
        }
    }
    
    // if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
        //     Flasher::setFlash('Berhasil', 'dihapus', 'success');
        //     header('Location: ' . BASEURL . 'mahasiswa');
        //     exit;
        // } else {
        //     Flasher::setFlash('Gagal', 'dihapus', 'danger');
        //     header('Location: ' . BASEURL . 'mahasiswa');
        //     exit;
        // }

    // public function getUbah()
    // {
    //     echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    // }

    // public function ubah()
    // {
    //     if ($this->model('Mahasiswa_model')->ubahDataMahasiswa($_POST) > 0) {
    //         Flasher::setFlash('Berhasil', 'diubah', 'success');
    //         header('Location: ' . BASEURL . 'mahasiswa');
    //         exit;
    //     } else {
    //         Flasher::setFlash('Gagal', 'ditambah', 'danger');
    //         header('Location: ' . BASEURL . 'mahasiswa');
    //         exit;
    //     }
    // }

    // public function cari()
    // {
    //     $data['judul'] = 'Daftar Mahasiswa';
    //     $data['mhs'] = $this->model('Mahasiswa_model')->cariDataMahasiswa();
    //     $this->view('templates/header', $data);
    //     $this->view('mahasiswa/index', $data);
    //     $this->view('templates/footer');
    // }
}
