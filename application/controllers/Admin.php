<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        // Cek login
        if (!$this->session->userdata('logged_in')) {
            redirect('welcome');
        }
        $this->load->model('Ab_rental');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index()
    {
        // Data untuk dashboard
        $data['total_alat'] = $this->Ab_rental->count_alat();
        $data['total_customer'] = $this->Ab_rental->count_customer();
        $data['total_transaksi'] = $this->Ab_rental->count_transaksi();
        $data['total_pendapatan'] = $this->Ab_rental->total_pendapatan();
        $data['transaksi_terbaru'] = $this->Ab_rental->get_transaksi_terbaru();
        $data['alat_disewa'] = $this->Ab_rental->get_alat_disewa();
        
        $this->load->view('admin/header');
        $this->load->view('admin/index', $data);
        $this->load->view('admin/footer');
    }

    // CRUD untuk Alat Berat
    public function alatberat()
    {
        $data['alat'] = $this->Ab_rental->get_all_alat();
        
        $this->load->view('admin/header');
        $this->load->view('admin/alatberat', $data);
        $this->load->view('admin/footer');
    }

    public function tambahalatberat()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/tambahalatberat');
        $this->load->view('admin/footer');
    }

    public function simpanalatberat()
    {
        $this->form_validation->set_rules('nama_alat', 'Nama Alat', 'required');
        $this->form_validation->set_rules('merk', 'Merk', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('plat_nomor', 'Plat Nomor', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|numeric');
        $this->form_validation->set_rules('harga_sewa', 'Harga Sewa', 'required|numeric');
        
        if ($this->form_validation->run() == FALSE) {
            $this->tambahalatberat();
        } else {
            $data = array(
                'nama_alat' => $this->input->post('nama_alat'),
                'merk' => $this->input->post('merk'),
                'jenis' => $this->input->post('jenis'),
                'plat_nomor' => $this->input->post('plat_nomor'),
                'tahun' => $this->input->post('tahun'),
                'harga_sewa' => $this->input->post('harga_sewa'),
                'status' => 'tersedia'
            );
            
            $this->Ab_rental->insert_alat($data);
            $this->session->set_flashdata('pesan', 'Data alat berat berhasil ditambahkan!');
            redirect('admin/alatberat');
        }
    }

    public function editalatberat($id)
    {
        $data['alat'] = $this->Ab_rental->get_alat_by_id($id);
        
        $this->load->view('admin/header');
        $this->load->view('admin/editalatberat', $data);
        $this->load->view('admin/footer');
    }

    public function updatealatberat()
    {
        $this->form_validation->set_rules('nama_alat', 'Nama Alat', 'required');
        $this->form_validation->set_rules('merk', 'Merk', 'required');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('plat_nomor', 'Plat Nomor', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required|numeric');
        $this->form_validation->set_rules('harga_sewa', 'Harga Sewa', 'required|numeric');
        
        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post('id_alat');
            $this->editalatberat($id);
        } else {
            $id = $this->input->post('id_alat');
            $data = array(
                'nama_alat' => $this->input->post('nama_alat'),
                'merk' => $this->input->post('merk'),
                'jenis' => $this->input->post('jenis'),
                'plat_nomor' => $this->input->post('plat_nomor'),
                'tahun' => $this->input->post('tahun'),
                'harga_sewa' => $this->input->post('harga_sewa')
            );
            
            $this->Ab_rental->update_alat($id, $data);
            $this->session->set_flashdata('pesan', 'Data alat berat berhasil diperbarui!');
            redirect('admin/alatberat');
        }
    }

    public function hapusalatberat($id)
    {
        $this->Ab_rental->delete_alat($id);
        $this->session->set_flashdata('pesan', 'Data alat berat berhasil dihapus!');
        redirect('admin/alatberat');
    }

    // CRUD untuk Customer
    public function customer()
    {
        $data['customer'] = $this->Ab_rental->get_all_customer();
        
        $this->load->view('admin/header');
        $this->load->view('admin/customer', $data);
        $this->load->view('admin/footer');
    }

    public function tambahcustomer()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/tambahcustomer');
        $this->load->view('admin/footer');
    }

    public function simpancustomer()
    {
        $this->form_validation->set_rules('nama_customer', 'Nama Customer', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required');
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        
        if ($this->form_validation->run() == FALSE) {
            $this->tambahcustomer();
        } else {
            $data = array(
                'nama_customer' => $this->input->post('nama_customer'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp'),
                'no_ktp' => $this->input->post('no_ktp'),
                'email' => $this->input->post('email')
            );
            
            $this->Ab_rental->insert_customer($data);
            $this->session->set_flashdata('pesan', 'Data customer berhasil ditambahkan!');
            redirect('admin/customer');
        }
    }

    public function editcustomer($id)
    {
        $data['customer'] = $this->Ab_rental->get_customer_by_id($id);
        
        $this->load->view('admin/header');
        $this->load->view('admin/editcustomer', $data);
        $this->load->view('admin/footer');
    }

    public function updatecustomer()
    {
        $this->form_validation->set_rules('nama_customer', 'Nama Customer', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('no_hp', 'No HP', 'required');
        $this->form_validation->set_rules('no_ktp', 'No KTP', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        
        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post('id_customer');
            $this->editcustomer($id);
        } else {
            $id = $this->input->post('id_customer');
            $data = array(
                'nama_customer' => $this->input->post('nama_customer'),
                'alamat' => $this->input->post('alamat'),
                'no_hp' => $this->input->post('no_hp'),
                'no_ktp' => $this->input->post('no_ktp'),
                'email' => $this->input->post('email')
            );
            
            $this->Ab_rental->update_customer($id, $data);
            $this->session->set_flashdata('pesan', 'Data customer berhasil diperbarui!');
            redirect('admin/customer');
        }
    }

    public function hapuscustomer($id)
    {
        $this->Ab_rental->delete_customer($id);
        $this->session->set_flashdata('pesan', 'Data customer berhasil dihapus!');
        redirect('admin/customer');
    }

    // CRUD untuk Transaksi
    public function peminjaman()
    {
        $data['transaksi'] = $this->Ab_rental->get_all_transaksi();
        
        $this->load->view('admin/header');
        $this->load->view('admin/peminjaman', $data);
        $this->load->view('admin/footer');
    }

    public function tambah_peminjaman()
    {
        $data['customer'] = $this->Ab_rental->get_all_customer();
        $data['alat'] = $this->Ab_rental->get_alat_tersedia();
        
        $this->load->view('admin/header');
        $this->load->view('admin/tambah_peminjaman', $data);
        $this->load->view('admin/footer');
    }

    public function simpan_peminjaman()
    {
        $this->form_validation->set_rules('id_customer', 'Customer', 'required');
        $this->form_validation->set_rules('id_alat', 'Alat Berat', 'required');
        $this->form_validation->set_rules('tanggal_sewa', 'Tanggal Sewa', 'required');
        $this->form_validation->set_rules('tanggal_kembali', 'Tanggal Kembali', 'required');
        $this->form_validation->set_rules('total_bayar', 'Total Bayar', 'required|numeric');
        
        if ($this->form_validation->run() == FALSE) {
            $this->tambah_peminjaman();
        } else {
            $id_customer = $this->input->post('id_customer');
            $id_alat = $this->input->post('id_alat');
            $tanggal_sewa = $this->input->post('tanggal_sewa');
            $tanggal_kembali = $this->input->post('tanggal_kembali');
            $total_bayar = $this->input->post('total_bayar');
            
            $data = array(
                'id_customer' => $id_customer,
                'id_alat' => $id_alat,
                'id_admin' => $this->session->userdata('id_admin'),
                'tanggal_sewa' => $tanggal_sewa,
                'tanggal_kembali' => $tanggal_kembali,
                'total_bayar' => $total_bayar,
                'status' => 'proses'
            );
            
            $this->Ab_rental->insert_transaksi($data);
            
            // Update status alat berat menjadi disewa
            $this->Ab_rental->update_status_alat($id_alat, 'disewa');
            
            $this->session->set_flashdata('pesan', 'Data transaksi berhasil ditambahkan!');
            redirect('admin/peminjaman');
        }
    }

    public function edit_peminjaman($id)
    {
        $data['transaksi'] = $this->Ab_rental->get_transaksi_by_id($id);
        $data['customer'] = $this->Ab_rental->get_all_customer();
        $data['alat'] = $this->Ab_rental->get_all_alat();
        
        $this->load->view('admin/header');
        $this->load->view('admin/edit_peminjaman', $data);
        $this->load->view('admin/footer');
    }

    public function update_peminjaman()
    {
        $this->form_validation->set_rules('id_customer', 'Customer', 'required');
        $this->form_validation->set_rules('id_alat', 'Alat Berat', 'required');
        $this->form_validation->set_rules('tanggal_sewa', 'Tanggal Sewa', 'required');
        $this->form_validation->set_rules('tanggal_kembali', 'Tanggal Kembali', 'required');
        $this->form_validation->set_rules('total_bayar', 'Total Bayar', 'required|numeric');
        
        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post('id_transaksi');
            $this->edit_peminjaman($id);
        } else {
            $id = $this->input->post('id_transaksi');
            $id_customer = $this->input->post('id_customer');
            $id_alat = $this->input->post('id_alat');
            $tanggal_sewa = $this->input->post('tanggal_sewa');
            $tanggal_kembali = $this->input->post('tanggal_kembali');
            $total_bayar = $this->input->post('total_bayar');
            
            // Get transaksi lama
            $transaksi_lama = $this->Ab_rental->get_transaksi_by_id($id);
            
            $data = array(
                'id_customer' => $id_customer,
                'id_alat' => $id_alat,
                'tanggal_sewa' => $tanggal_sewa,
                'tanggal_kembali' => $tanggal_kembali,
                'total_bayar' => $total_bayar
            );
            
            $this->Ab_rental->update_transaksi($id, $data);
            
            // Jika alat berat berubah, update status alat lama dan baru
            if ($transaksi_lama->id_alat != $id_alat) {
                $this->Ab_rental->update_status_alat($transaksi_lama->id_alat, 'tersedia');
                $this->Ab_rental->update_status_alat($id_alat, 'disewa');
            }
            
            $this->session->set_flashdata('pesan', 'Data transaksi berhasil diperbarui!');
            redirect('admin/peminjaman');
        }
    }

    public function hapus_peminjaman($id)
    {
        // Get transaksi
        $transaksi = $this->Ab_rental->get_transaksi_by_id($id);
        
        // Update status alat berat menjadi tersedia
        $this->Ab_rental->update_status_alat($transaksi->id_alat, 'tersedia');
        
        // Hapus transaksi
        $this->Ab_rental->delete_transaksi($id);
        $this->session->set_flashdata('pesan', 'Data transaksi berhasil dihapus!');
        redirect('admin/peminjaman');
    }

    public function transaksi_selesai($id)
    {
        // Get transaksi
        $transaksi = $this->Ab_rental->get_transaksi_by_id($id);
        
        $data['transaksi'] = $transaksi;
        
        $this->load->view('admin/header');
        $this->load->view('admin/transaksi_selesai', $data);
        $this->load->view('admin/footer');
    }

    public function proses_selesai()
    {
        $id = $this->input->post('id_transaksi');
        $tanggal_pengembalian = $this->input->post('tanggal_pengembalian');
        $denda = $this->input->post('denda');
        
        // Get transaksi
        $transaksi = $this->Ab_rental->get_transaksi_by_id($id);
        
        // Update status transaksi menjadi selesai
        $data_transaksi = array(
            'status' => 'selesai',
            'tanggal_pengembalian' => $tanggal_pengembalian,
            'denda' => $denda
        );
        
        $this->Ab_rental->update_transaksi($id, $data_transaksi);
        
        // Update status alat berat menjadi tersedia
        $this->Ab_rental->update_status_alat($transaksi->id_alat, 'tersedia');
        
        $this->session->set_flashdata('pesan', 'Transaksi telah selesai!');
        redirect('admin/peminjaman');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('welcome');
    }
}
?>
