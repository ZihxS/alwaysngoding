<?php defined('BASEPATH') OR exit('No direct script access allowed');

class C_sitemap_ang_2019 extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($_SERVER['CI_ENV'] != 'development')
		{
			if (strpos($_SERVER['HTTP_HOST'], 'mail.example.test') !== false)
			{
				header('location: https://example.test');
				exit;
			}
		}
	}

	public function index()
	{
		header("Content-Type: text/xml;charset=iso-8859-1");
		$this->load->view('sitemap/indeks');
	}

	public function umum()
	{
		$data = ['loker' => $this->loker->untuk_sitemap()]; // karena loker bisa kadaluarsa (takut gaada data loker, jadi pasang di umum aja)
		header("Content-Type: text/xml;charset=iso-8859-1");
		$this->load->view('sitemap/umum', $data);
	}

	public function artikel()
	{
		$data = ['data' => $this->artikel->untuk_sitemap(), 'kategori' => $this->artikel->untuk_sitemap()];
		header("Content-Type: text/xml;charset=iso-8859-1");
		$this->load->view('sitemap/artikel', $data);
	}

	public function diskusi()
	{
		$data = ['data' => $this->diskusi->untuk_sitemap()];
		header("Content-Type: text/xml;charset=iso-8859-1");
		$this->load->view('sitemap/diskusi', $data);
	}

	public function pengguna()
	{
		$data = ['data' => $this->pengguna->untuk_sitemap()];
		header("Content-Type: text/xml;charset=iso-8859-1");
		$this->load->view('sitemap/pengguna', $data);
	}
}
