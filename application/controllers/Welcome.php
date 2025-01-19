<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model('m_data');
		$this->load->helper('custom_helper');
	}

	private function configure_pagination($base_url, $total_rows, $per_page = 3)
	{
		$config['base_url'] = base_url() . $base_url;
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Prev';
		$config['first_link'] = false;
		$config['last_link'] = false;
		$config['full_tag_open'] = '<ul class="pagination justify-content-center">';
		$config['full_tag_close'] = '</ul>';
		$config['attributes'] = ['class' => 'page-link'];
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';

		return $config;
	}


	public function kirim_pesan()
	{
		if ($this->session->userdata('status') != "telah_login") {
			redirect(base_url() . 'login');
		} else {
			$this->form_validation->set_rules('konten', 'Konten', 'required');
			if ($this->form_validation->run() != false) {
				$pengirim = $this->session->userdata('id');
				$id_subjek = $this->input->post('id');
				$subjek = $this->input->post('subjek');
				$tipe = $this->input->post('tipe');
				$konten = $this->input->post('konten');
				$slug = $this->input->post('slug');
				$data = array(
					'komen_pengguna' => $pengirim,
					'komen_konten' => $konten,
					'komen_subjek_id' => $id_subjek,
					'komen_subjek' => $subjek,
					'komen_tipe' => $tipe
				);
				$this->m_data->insert_data('comment', $data);
				if ($tipe == "buku") {
					redirect(base_url('book/') . $slug);
				} else {
					redirect(base_url('') . $slug);
				}
			}
		}
	}

	public function index()
	{
		$data['buku'] = $this->db->query('SELECT * FROM service, buku, genre 
        WHERE service_buku=buku_id
        and service_genre=genre_id
		and service_status= "publish"
        order by service_id desc')->result();
		$data['service'] = $this->db->query("SELECT * FROM buku, genre
		WHERE buku_genre = genre_id")->result();
		$data['artikel'] = $this->db->query('SELECT * FROM artikel, pengguna, kategori
		WHERE artikel_status = "publish"
		AND artikel_author = pengguna_id
		AND artikel_kategori = kategori_id
		ORDER BY artikel_id DESC
		LIMIT 3 ')->result();
		//Data Pengaturan Website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
		//SEO Meta
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;
		$this->load->view('frontend/v_header', $data);
		$this->load->view('frontend/v_homepage', $data);
		$this->load->view('frontend/v_footer', $data);
	}

	public function test()
	{
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
		//SEO Meta
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;
		$this->load->view('frontend/v_header', $data);
		$this->load->view('frontend/v_single', $data);
		$this->load->view('frontend/v_footer', $data);
	}
	public function blog()
	{
		// data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
		// SEO Meta
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;

		$jumlah_data = $this->m_data->get_data('artikel')->num_rows();
		$this->load->library('pagination');

		// Configure pagination
		$config = $this->configure_pagination('blog/', $jumlah_data);
		$this->pagination->initialize($config);

		$FROM = $this->uri->segment(2);
		if ($FROM == "") {
			$FROM = 0;
		}
		$data['artikel'] = $this->db->query("
        SELECT * FROM artikel, pengguna, kategori
        WHERE artikel_status = 'publish'
        AND artikel_author = pengguna_id
        AND artikel_kategori = kategori_id
        ORDER BY artikel_id DESC
        LIMIT $config[per_page] OFFSET $FROM
    ")->result();

		$this->load->view('frontend/v_header', $data);
		$this->load->view('frontend/v_blog', $data);
		$this->load->view('frontend/v_footer', $data);
	}
	public function single($slug)
	{
		$data['artikel'] = $this->db->query("
		SELECT * FROM artikel,pengguna,kategori
		WHERE artikel_status = 'publish'
		AND artikel_author = pengguna_id
		AND artikel_kategori = kategori_id
		AND artikel_slug = '$slug'
		")->result();
		//Data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
		//SEO Meta
		if (count($data['artikel']) > 0) {
			$data['meta_keyword'] = $data['artikel'][0]->artikel_judul;
			$data['meta_description'] = substr($data['artikel'][0]->artikel_konten, 0, 100);
		} else {
			$data['meta_keyword'] = $data['pengaturan']->nama;
			$data['meta_description'] = $data['pengaturan']->deskripsi;
		}
		$this->load->view('frontend/v_header', $data);
		$this->load->view('frontend/v_single', $data);
		$this->load->view('frontend/v_footer', $data);
	}

	public function page($slug)
	{
		$where = array(
			'halaman_slug' => $slug
		);
		$data['halaman'] = $this->m_data->edit_data('halaman', $where)->result();
		//data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
		//SEO Meta
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;
		$this->load->view('frontend/v_header', $data);
		$this->load->view('frontend/v_page', $data);
		$this->load->view('frontend/v_footer', $data);
	}

	public function kategori($slug)
	{
		//data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
		//SEO Meta
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;
		$jumlah_artikel = $this->db->query("
		SELECT * FROM artikel,pengguna,kategori
		WHERE artikel_status = 'publish'
		AND artikel_author = pengguna_id
		AND artikel_kategori = kategori_id
		AND kategori_slug = '$slug'
		")->num_rows();
		$this->load->library('pagination');
		// Configure pagination
		$config = $this->configure_pagination('blog/', $jumlah_artikel);
		$this->pagination->initialize($config);
		$FROM = $this->uri->segment(3);
		if ($FROM == "") {
			$FROM = 0;
		}
		$this->pagination->initialize($config);
		$data['artikel'] = $this->db->query("
		SELECT * FROM artikel,pengguna,kategori
		WHERE artikel_status = 'publish'
		AND artikel_author = pengguna_id
		AND artikel_kategori = kategori_id
		AND kategori_slug = '$slug'
		ORDER BY artikel_id DESC
		LIMIT $config[per_page] OFFSET $FROM
		")->result();
		$this->load->view('frontend/v_header', $data);
		$this->load->view('frontend/v_kategori', $data);
		$this->load->view('frontend/v_footer', $data);
	}

	public function genre($slug)
	{
		//data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
		//SEO Meta
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;
		$jumlah_artikel = $this->db->query("
		SELECT * FROM service,genre,buku
		WHERE service_status = 'publish'
		AND service_buku = buku_id
		AND service_genre = genre_id
		AND genre_slug = '$slug'
		and service_status= 'publish'
		")->num_rows();
		$this->load->library('pagination');
		// Configure pagination
		$config = $this->configure_pagination('blog/', $jumlah_artikel);
		$this->pagination->initialize($config);
		$FROM = $this->uri->segment(3);
		if ($FROM == "") {
			$FROM = 0;
		}
		$this->pagination->initialize($config);
		$data['books'] = $this->db->query("
		SELECT * FROM service,genre,buku
		WHERE service_status = 'publish'
		AND service_buku = buku_id
		AND service_genre = genre_id
		AND genre_slug = '$slug'
		and service_status= 'publish'
		ORDER BY service_id DESC
		LIMIT $config[per_page] OFFSET $FROM
		")->result();
		$this->load->view('frontend/v_header', $data);
		$this->load->view('frontend/v_genre', $data);
		$this->load->view('frontend/v_footer', $data);
	}

	public function search()
	{
		//mengambil nilai keyword dari form pencarian
		$cari = htmlentities((trim($this->input->post('cari', true))) ? trim($this->input->post('cari', true)) : '');
		//Jika uri segmen 2 ada, maka nilai variabel $search akan digantidengan nilai uri segmen 2
		$cari = ($this->uri->segment(2)) ? $this->uri->segment(2) : $cari;
		//data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
		//SEO Meta
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;
		$jumlah_artikel = $this->db->query("
		SELECT * FROM artikel,pengguna,kategori
		WHERE artikel_status = 'publish'
		AND artikel_author = pengguna_id
		AND artikel_kategori = kategori_id
		AND (artikel_judul LIKE '%$cari%' OR artikel_konten LIKE '%$cari%')")->num_rows();
		$this->load->library('pagination');
		// Configure pagination
		$config = $this->configure_pagination('search/', $jumlah_artikel);
		$this->pagination->initialize($config);
		$FROM = $this->uri->segment(3);
		if ($FROM == "") {
			$FROM = 0;
		}
		$this->pagination->initialize($config);
		$data['artikel'] = $this->db->query("
		SELECT * FROM artikel,pengguna,kategori
		WHERE artikel_status = 'publish'
		AND artikel_author = pengguna_id
		AND artikel_kategori = kategori_id
		AND (artikel_judul LIKE '%$cari%' OR artikel_konten LIKE '%$cari%')
		ORDER BY artikel_id DESC
		LIMIT $config[per_page] OFFSET $FROM
		")->result();
		$data['cari'] = $cari;
		$this->load->view('frontend/v_header', $data);
		$this->load->view('frontend/v_search', $data);
		$this->load->view('frontend/v_footer', $data);
	}

	public function search2()
	{
		//mengambil nilai keyword dari form pencarian
		$cari = htmlentities((trim($this->input->post('cariw', true))) ? trim($this->input->post('cariw', true)) : '');
		//Jika uri segmen 2 ada, maka nilai variabel $search akan digantidengan nilai uri segmen 2

		//data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
		//SEO Meta
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;
		$jumlah_service = $this->db->query("
		SELECT * FROM service,buku,genre
		WHERE service_status = 'publish'
		AND service_buku = buku_id
		AND service_genre = genre_id
		and service_status= 'publish'
		AND (buku_judul LIKE '%$cari%' OR service_konten LIKE '%$cari%')")->num_rows();
		$this->load->library('pagination');
		// Configure pagination
		$config = $this->configure_pagination('book/search/', $jumlah_service);
		$this->pagination->initialize($config);
		$FROM = $this->uri->segment(3);
		if ($FROM == "") {
			$FROM = 0;
		}
		$this->pagination->initialize($config);
		$data['books'] = $this->db->query("
		SELECT * FROM service,buku,genre
		WHERE service_status = 'publish'
		AND service_buku = buku_id
		AND service_genre = genre_id
		and service_status= 'publish'
		AND (buku_judul LIKE '%$cari%' OR service_konten LIKE '%$cari%')
		ORDER BY service_id DESC
		LIMIT $config[per_page] OFFSET $FROM
		")->result();
		$data['cari'] = $cari;
		$this->load->view('frontend/v_header', $data);
		$this->load->view('frontend/v_search2', $data);
		$this->load->view('frontend/v_footer', $data);
	}

	public function book()
	{
		// Fetch distinct genres
		$data['genres'] = $this->db->query('SELECT * FROM genre')->result();

		/* Fetch all books and join with genre and service
		$data['books'] = $this->db->query('SELECT b.*, g.genre_nama, g.genre_slug, s.service_slug 
        FROM buku b
        JOIN genre g ON b.buku_genre = g.genre_id
        JOIN service s ON s.service_buku = b.buku_id
        ORDER BY b.buku_id DESC
    	')->result();
		// Fetch website settings*/
		$data['books'] = $this->db->query('SELECT * FROM service, buku 
        WHERE service_buku=buku_id
		and service_status= "publish"
        order by service_id desc')->result();
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

		// SEO Meta
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;

		$this->load->view('frontend/v_header', $data);
		$this->load->view('frontend/v_book', $data);
		$this->load->view('frontend/v_footer', $data);
	}

	public function b($slug)
	{
		$data['books'] = $this->db->query("SELECT * FROM service,buku,genre
		WHERE service_status = 'publish'
		AND service_buku = buku_id
		AND service_genre = genre_id
		AND service_slug = '$slug'
		")->result();
		//Data pengaturan website
		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
		//SEO Meta
		if (count($data['books']) > 0) {
			$data['meta_keyword'] = $data['books'][0]->buku_judul;
			$data['meta_description'] = substr($data['books'][0]->service_konten, 0, 100);
		} else {
			$data['meta_keyword'] = $data['pengaturan']->nama;
			$data['meta_description'] = $data['pengaturan']->deskripsi;
		}
		$this->load->view('frontend/v_header', $data);
		$this->load->view('frontend/v_b', $data);
		$this->load->view('frontend/v_footer', $data);
	}

	public function profile()
	{

		$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
		//SEO Meta
		$data['meta_keyword'] = $data['pengaturan']->nama;
		$data['meta_description'] = $data['pengaturan']->deskripsi;
		$id_pengguna = $this->session->userdata('id');
		$where = array(
			'pengguna_id' => $id_pengguna
		);
		$data['pengguna'] = $this->m_data->edit_data('pengguna', $where)->result();
		$this->load->view('frontend/v_header', $data);
		$this->load->view('frontend/v_profile', $data);
		$this->load->view('frontend/v_footer', $data);
	}
	public function profil_update()
	{
		//rules form wajib diisi untuk nama dan email
		$this->form_validation->set_rules('username', 'Username', 'Required');
		$this->form_validation->set_rules('nama', 'Nama', 'Required');
		$this->form_validation->set_rules('email', 'Email', 'Required');
		if ($this->form_validation->run() != false) {
			$id = $this->session->userdata('id');
			$usename = $this->input->post('username');
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$where = array(
				'pengguna_id' => $id
			);
			$data = array(
				'pengguna_username' => $usename,
				'pengguna_nama' => $nama,
				'pengguna_email' => $email
			);
			$data_session = array(
				'username' => $usename
			);
			$this->m_data->update_data('pengguna', $data, $where);
			$this->session->set_userdata($data_session);
			redirect(base_url() . 'profile');
		} else {
			//id pengguna yang sedang login
			$id_pengguna = $this->session->userdata('id');
			$where = array(
				'pengguna_id' => $id_pengguna
			);
			$data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
			//SEO Meta
			$data['meta_keyword'] = $data['pengaturan']->nama;
			$data['meta_description'] = $data['pengaturan']->deskripsi;
			$data['pengguna'] = $this->m_data->edit_data('dashboard', $where)->result();
			$this->load->view('frontend/v_header', $data);
			$this->load->view('frontend/v_profile', $data);
			$this->load->view('frontend/v_footer', $data);
		}
	}

	public function profil_foto_update()
	{
		$id = $this->input->post('id');
		$config['upload_path'] = './img/user/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = 2048;
		$new_filename = uniqid() . '.' . pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);
		$config['file_name'] = $new_filename;
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('foto')) {
			$file_data = $this->upload->data();
			$foto = $file_data['file_name'];

			$where = array('pengguna_id' => $id);
			$data = array('pengguna_foto' => $foto);
			$data_session = array(
				'profile_picture' => $foto
			);
			$this->m_data->update_data('pengguna', $data, $where);
			$this->session->set_userdata($data_session);
			redirect(base_url('profile'));
		} else {
			$error = $this->upload->display_errors();
			// Handle the error case as needed, e.g., show an error message
			redirect(base_url('profile?alert=gagal'));
		}
	}
}
