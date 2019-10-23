<?php

class Mahasiswa_model extends CI_model
{
    // private $table = "mahasiswa";
    // private $db;

    // public function __construct()
    // {
    //     $this->db = new Database;
    // }

    public function getAllMahasiswa()
    {
        return $this->db->get('mahasiswa')->result_array();
    } 

    // public function getMahasiswaById($id)
    // {
    //     $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
    //     $this->db->bind('id', $id);
    //     return $this->db->single();
    // }

    public function tambahDataMahasiswa()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nrp" => $this->input->post('nrp', true),
            "email" => $this->input->post('email', true),
            "jurusan" => $this->input->post('jurusan', true)
        ];

        $this->db->insert('mahasiswa', $data);
    }

    public function hapusDataMahasiswa($id)
    {
        $this->db->where('id' , $id);
        $this->db->delete('mahasiswa');
    }

    // $query = "DELETE FROM mahasiswa
        //           WHERE id=:id";
        // $this->db->query($query);
        // $this->db->bind('id', $id);

        // $this->db->execute();

        // return $this->db->affected_rows();

    //   public function ubahDataMahasiswa($data)
    // {
    //     $query = "UPDATE mahasiswa SET
    //               nama = :nama,
    //               nrp = :nrp,
    //               email = :email,
    //               jurusan = :jurusan
    //               WHERE id = :id";
    //     $this->db->query($query);

    //     $this->db->bind('id', $data['id']);
    //     $this->db->bind('nama', $data['nama']);
    //     $this->db->bind('nrp', $data['nrp']);
    //     $this->db->bind('email', $data['email']);
    //     $this->db->bind('jurusan', $data['jurusan']);

    //     $this->db->execute();

    //     return $this->db->affected_rows();
    // }
    // public function cariDataMahasiswa()
    // {
    //     $keyword = $_POST['keyword'];
    //     $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
    //     $this->db->query($query);
    //     $this->db->bind('keyword', "%$keyword%");
    //     return $this->db->resultSet();
    // }
}
