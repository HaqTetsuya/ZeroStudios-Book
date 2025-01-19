<?php
defined('BASEPATH') or exit('No script direct access allowed');
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
        $this->load->model('m_data');
    }
    function index()
    {
        $this->load->view('v_login');
    }
    function aksi()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() != false) {
            // menangkap data username dan password dari halaman login
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $where = array(
                'pengguna_username' => $username,
                'pengguna_password' => md5($password),
                'pengguna_status' => 1
            );
            //$this->load->model('m_login');
            // cek kesesuaian login pada table pengguna
            $cek = $this->m_login->cek_login('pengguna', $where);
            //cek login apabila benar
            if ($cek->num_rows() > 0) {
                // ambil data pengguna yang melakukan login
                $data = $this->m_login->cek_login('pengguna', $where)->row();
                // buat session untuk pengguna yang berhasil login
                $data_session = array(
                    'id' => $data->pengguna_id,
                    'username' => $data->pengguna_username,
                    'level' => $data->pengguna_level,
                    'aktif' => $data->pengguna_status,
                    'profile_picture' => $data->pengguna_foto,
                    'status' => 'telah_login'
                );
                $this->session->set_userdata($data_session);
                // alihkan halaman ke halaman dashboard pengguna
                redirect('');
            } else {
                redirect('login?alert=gagal');
            }
        } else {
            $this->load->view('v_login');
        }
    }
    public function aksi_reg()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required');

        if ($this->form_validation->run() != false) {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $foto = 'default.jpg';
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $password2 = md5($this->input->post('password2'));
            $level = 'user';
            $status = '1';
            $data = array(
                'pengguna_nama' => $nama,
                'pengguna_email' => $email,
                'pengguna_foto' => $foto,
                'pengguna_username' => $username,
                'pengguna_password' => $password,
                'pengguna_level' => $level,
                'pengguna_status' => $status
            );
            if ($password == $password2) {
                $where = array(
                    'pengguna_username' => $username
                );
                $cek = $this->m_login->cek_login('pengguna', $where);
                if ($cek->num_rows() > 0) {
                    redirect('login?alert=duplikat');
                } else {
                    $this->m_data->insert_data('pengguna', $data);
                    $data = $this->m_login->cek_login('pengguna', $where)->row();
                    // buat session untuk pengguna yang berhasil login
                    $data_session = array(
                        'id' => $data->pengguna_id,
                        'username' => $data->pengguna_username,
                        'level' => $data->pengguna_level,
                        'status' => 'telah_login'
                    );
                    $this->session->set_userdata($data_session);
                    // alihkan halaman ke halaman dashboard pengguna
                    redirect('');
                }
            } else {
                redirect('login?alert=password_salah');
            }
        } else {
            redirect('login');
        }
    }

    function dashboard()
    {
        if ($this->session->userdata('level') == 'user') {
            # code...
        } else {
            $this->load->view('v_login2');
        }
    }

    function dashboard_masuk()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() != false) {
            // menangkap data username dan password dari halaman login
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $where = array(
                'pengguna_username' => $username,
                'pengguna_password' => md5($password),
                'pengguna_status' => 1
            );
            //$this->load->model('m_login');
            // cek kesesuaian login pada table pengguna
            $cek = $this->m_login->cek_login('pengguna', $where);
            //cek login apabila benar
            if ($cek->num_rows() > 0) {
                // ambil data pengguna yang melakukan login
                $data = $this->m_login->cek_login('pengguna', $where)->row();
                // buat session untuk pengguna yang berhasil login
                $data_session = array(
                    'id' => $data->pengguna_id,
                    'username' => $data->pengguna_username,
                    'pengguna_level' => $data->pengguna_level,
                    'aktif' => $data->pengguna_status,
                    'profile_picture' => $data->pengguna_foto,
                    'status' => 'telah_login'
                );
                $this->session->set_userdata($data_session);
                // alihkan halaman ke halaman dashboard pengguna
                redirect('dashboard');
            } else {
                redirect('login?alert=gagal');
            }
        } else {
            $this->load->view('v_login');
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('');
    }
}
