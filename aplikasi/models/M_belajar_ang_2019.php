<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_belajar_ang_2019 extends CI_Model
{
	private $kolom_order;

	public function __construct()
	{
		parent::__construct();
	}

	public function ambil_bagian_terakhir_teori_html($modul)
	{
		return $this->db
					->select('bagian_terakhir')
					->from('1_html')
					->where(['pengguna' => $this->session->ang_nama_pengguna,'modul_ke' => $modul])
					->get()
					->row()
					->bagian_terakhir;
	}

	public function ambil_bagain_terakhir($tabel,$modul_ke)
	{
		return $this->db
					->select('bagian_terakhir')
		 			->from($tabel)
		 			->where(['pengguna' => $this->session->ang_nama_pengguna,'modul_ke' => $modul_ke])
		 			->get()
		 			->row()
		 			->bagian_terakhir;
	}

	public function segarkan_bagian_teori_html($modul_ke,$bagian_terakhir)
	{
		$q = $this->db
				  ->select('id_1_html')
				  ->from('1_html')
				  ->where(['pengguna' => $this->session->ang_nama_pengguna,'modul_ke' => $modul_ke,'bagian_terakhir <=' => $bagian_terakhir])
				  ->get()
				  ->num_rows();

		if ($q)
		{
			$this->db->where(['pengguna' => $this->session->ang_nama_pengguna,'modul_ke' => $modul_ke])->update('1_html',['bagian_terakhir' => $bagian_terakhir+1]);
			$this->db->set('poin_belajar','poin_belajar+5',FALSE)->where('nama_pengguna',$this->session->ang_nama_pengguna)->update('pengguna');

			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function q_teori_html($modul,$bagian)
	{
		return $this->db
					->select('id_1_html')
		 			->from('1_html')
		 			->where(['pengguna' => $this->session->ang_nama_pengguna,'modul_ke' => $modul,'bagian_terakhir >=' => $bagian])
		 			->get()
		 			->num_rows();
	}

	public function ambil_bagian_terakhir_teori_css($modul)
	{
		return $this->db
					->select('bagian_terakhir')
					->from('1_css')
					->where(['pengguna' => $this->session->ang_nama_pengguna,'modul_ke' => $modul])
					->get()
					->row()
					->bagian_terakhir;
	}

	public function q_teori_css($modul,$bagian)
	{
		return $this->db
					->select('id_1_css')
		 			->from('1_css')
		 			->where(['pengguna' => $this->session->ang_nama_pengguna,'modul_ke' => $modul,'bagian_terakhir >=' => $bagian])
		 			->get()
		 			->num_rows();
	}

	public function segarkan_bagian_teori_css($modul_ke,$bagian_terakhir)
	{
		$q = $this->db
				  ->select('id_1_css')
				  ->from('1_css')
				  ->where(['pengguna' => $this->session->ang_nama_pengguna,'modul_ke' => $modul_ke,'bagian_terakhir <=' => $bagian_terakhir])
				  ->get()
				 ->num_rows();

		if ($q)
		{
			$this->db->where(['pengguna' => $this->session->ang_nama_pengguna,'modul_ke' => $modul_ke])->update('1_css',['bagian_terakhir' => $bagian_terakhir+1]);
			$this->db->set('poin_belajar','poin_belajar+5',FALSE)->where('nama_pengguna',$this->session->ang_nama_pengguna)->update('pengguna');

			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function ambil_bagian_terakhir_teori_php($modul)
	{
		return $this->db
					->select('bagian_terakhir')
					->from('1_php')
					->where(['pengguna' => $this->session->ang_nama_pengguna,'modul_ke' => $modul])
					->get()
					->row()
					->bagian_terakhir;
	}

	public function q_teori_php($modul,$bagian)
	{
		return $this->db
					->select('id_1_php')
		 			->from('1_php')
		 			->where(['pengguna' => $this->session->ang_nama_pengguna,'modul_ke' => $modul,'bagian_terakhir >=' => $bagian])
		 			->get()
		 			->num_rows();
	}

	public function segarkan_bagian_teori_php($modul_ke,$bagian_terakhir)
	{
		$q = $this->db
				  ->select('id_1_php')
				  ->from('1_php')
				  ->where(['pengguna' => $this->session->ang_nama_pengguna,'modul_ke' => $modul_ke,'bagian_terakhir <=' => $bagian_terakhir])
				  ->get()
				  ->num_rows();

		if ($q)
		{
			$this->db->where(['pengguna' => $this->session->ang_nama_pengguna,'modul_ke' => $modul_ke])->update('1_php',['bagian_terakhir' => $bagian_terakhir+1]);
			$this->db->set('poin_belajar','poin_belajar+5',FALSE)->where('nama_pengguna',$this->session->ang_nama_pengguna)->update('pengguna');

			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function ambil_bagian_terakhir_teori_mysql($modul)
	{
		return $this->db
					->select('bagian_terakhir')
					->from('1_mysql')
					->where(['pengguna' => $this->session->ang_nama_pengguna,'modul_ke' => $modul])
					->get()
					->row()
					->bagian_terakhir;
	}

	public function q_teori_mysql($modul,$bagian)
	{
		return $this->db
					->select('id_1_mysql')
		 			->from('1_mysql')
		 			->where(['pengguna' => $this->session->ang_nama_pengguna,'modul_ke' => $modul,'bagian_terakhir >=' => $bagian])
		 			->get()
		 			->num_rows();
	}

	public function segarkan_bagian_teori_mysql($modul_ke,$bagian_terakhir)
	{
		$q = $this->db
				  ->select('id_1_mysql')
				  ->from('1_mysql')
				  ->where(['pengguna' => $this->session->ang_nama_pengguna,'modul_ke' => $modul_ke,'bagian_terakhir <=' => $bagian_terakhir])
				  ->get()
				  ->num_rows();

		if ($q)
		{
			$this->db->where(['pengguna' => $this->session->ang_nama_pengguna,'modul_ke' => $modul_ke])->update('1_mysql',['bagian_terakhir' => $bagian_terakhir+1]);
			$this->db->set('poin_belajar','poin_belajar+5',FALSE)->where('nama_pengguna',$this->session->ang_nama_pengguna)->update('pengguna');

			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function ambil_bagian_terakhir_teori_javascript($modul)
	{
		return $this->db
					->select('bagian_terakhir')
					->from('1_js')
					->where(['pengguna' => $this->session->ang_nama_pengguna,'modul_ke' => $modul])
					->get()
					->row()
					->bagian_terakhir;
	}

	public function q_teori_javascript($modul,$bagian)
	{
		return $this->db
					->select('id_1_js')
		 			->from('1_js')
		 			->where(['pengguna' => $this->session->ang_nama_pengguna,'modul_ke' => $modul,'bagian_terakhir >=' => $bagian])
		 			->get()
		 			->num_rows();
	}

	public function segarkan_bagian_teori_javascript($modul_ke,$bagian_terakhir)
	{
		$q = $this->db
				  ->select('id_1_js')
				  ->from('1_js')
				  ->where(['pengguna' => $this->session->ang_nama_pengguna,'modul_ke' => $modul_ke,'bagian_terakhir <=' => $bagian_terakhir])
				  ->get()
				  ->num_rows();

		if ($q)
		{
			$this->db->where(['pengguna' => $this->session->ang_nama_pengguna,'modul_ke' => $modul_ke])->update('1_js',['bagian_terakhir' => $bagian_terakhir+1]);
			$this->db->set('poin_belajar','poin_belajar+5',FALSE)->where('nama_pengguna',$this->session->ang_nama_pengguna)->update('pengguna');

			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function jawaban_salah($kelas,$modul,$bagian)
	{
		if ($kelas == 'html')
		{
			$bagian_akhir = $this->ambil_bagian_terakhir_teori_html($modul);
		}
		elseif ($kelas == 'css')
		{
			$bagian_akhir = $this->ambil_bagian_terakhir_teori_css($modul);
		}
		elseif ($kelas == 'php')
		{
			$bagian_akhir = $this->ambil_bagian_terakhir_teori_php($modul);
		}
		elseif ($kelas == 'mysql')
		{
			$bagian_akhir = $this->ambil_bagian_terakhir_teori_mysql($modul);
		}
		elseif ($kelas == 'javascript')
		{
			$bagian_akhir = $this->ambil_bagian_terakhir_teori_javascript($modul);
		}

		if ($bagian_akhir <= $bagian)
		{
			$this->db->set('poin_belajar','poin_belajar-1',FALSE)->where('nama_pengguna',$this->session->ang_nama_pengguna)->update('pengguna');

			return "u"; // updated
		}

		return "nu"; // non updated
	}

	public function cek_sertifikat($sertifikat)
	{
		$_nama = $this->session->ang_nama_pengguna;
		$query = $this->db->select('id_sertifikat,nama_sertifikat')
											->from('sertifikat')
											->where('nama_sertifikat', $sertifikat)
											->limit(1)
											->get();

    if ($query->num_rows() > 0)
		{
			$data = $query->row();
			$_cek = $this->db->select('id_p_sertifikat')
											 ->from('p_sertifikat')
											 ->where(['pengguna' => $_nama,'id_sertifikat' => $data->id_sertifikat])
											 ->get()
											 ->num_rows();

			if ($_cek == 0)
			{
				$this->db->insert('p_sertifikat', [
					'id_sertifikat'      => $data->id_sertifikat,
					'pengguna'           => $_nama,
					'tanggal_memperoleh' => date('Y-m-d'),
					'jam_memperoleh'     => date('H:i:s')
				]);

				$id = urlencode(str_replace('=', '', base64_encode("sertifikat-{$this->db->insert_id()}")));
				$id = str_replace('%3D','',$id);
				$ls = site_url("sertifikat/{$id}");

				$this->notifikasi->input($_nama,"Selamat, anda telah mendapatkan sertifikat <a href='{$ls}' target='_blank'><q>{$data->nama_sertifikat}</q></a>.","sertifikat/{$id}");
				$this->ang->kakd("{$_nama} (".site_url("anggota/{$_nama}").") berhasil mendapatkan sertifikat {$data->nama_sertifikat} ({$ls}), selamat untuk {$_nama} :partying_face:", TRUE);

				$data = array_merge((array)$data, ['link_sertifikat' => $ls]);

				$return = (object)$data;
			}
			else
			{
				$return = NULL;
			}
		}
		else
		{
			$return = NULL;
		}

		return $return;
	}

	public function cek_pencapaian()
	{
		$_nama = $this->session->ang_nama_pengguna;
		$_poin = $this->db->select('poin_belajar')->from('pengguna')->where('nama_pengguna',$_nama)->get()->row()->poin_belajar;
		$qry_1 = $this->db->select('id_pencapaian,nama_pencapaian,gambar')
											->from('pencapaian')
											->where(['tipe' => 'kalkulasi 3 jumlah','target >=' => $_poin-10,'target <=' => $_poin])
											->limit(1)
											->get();

    if ($qry_1->num_rows() > 0)
		{
			$data = $qry_1->row();
			$_cek = $this->db->select('id_p_pencapaian')
											 ->from('p_pencapaian')
											 ->where(['pengguna' => $_nama,'id_pencapaian' => $data->id_pencapaian])
											 ->get()
											 ->num_rows();

			if ($_cek == 0)
			{
				$this->db->insert('p_pencapaian', [
					'id_pencapaian'    => $data->id_pencapaian,
					'pengguna'         => $_nama,
					'tanggal_tercapai' => date('Y-m-d'),
					'jam_tercapai'     => date('H:i:s')
				]);

				$this->notifikasi->input($_nama,"Selamat, anda meraih pencapaian <q>{$data->nama_pencapaian}</q>.","anggota/{$_nama}");
				$this->ang->kakd("{$_nama} (".site_url("anggota/{$_nama}").") meraih pencapaian baru yaitu: {$data->nama_pencapaian}, selamat untuk {$_nama} atas pencapaian yang telah anda raih :partying_face:", TRUE);

				$return = $data;
			}
			else
			{
				$return = NULL;
			}
		}
		else
		{
			$qry_2 = $this->db->select('id_pencapaian,nama_pencapaian,gambar')
											->from('pencapaian')
											->where(['tipe' => 'untuk jumlah poin belajar','target >=' => $_poin-20,'target <=' => $_poin])
											->limit(1)
											->get();

			if ($qry_2->num_rows() > 0)
			{
				$data = $qry_2->row();
				$_cek = $this->db->select('id_p_pencapaian')
												 ->from('p_pencapaian')
												 ->where(['pengguna' => $_nama,'id_pencapaian' => $data->id_pencapaian])
												 ->get()
												 ->num_rows();

				if ($_cek == 0)
				{
					$this->db->insert('p_pencapaian', [
						'id_pencapaian'    => $data->id_pencapaian,
						'pengguna'         => $_nama,
						'tanggal_tercapai' => date('Y-m-d'),
						'jam_tercapai'     => date('H:i:s')
					]);

					$this->notifikasi->input($_nama,"Selamat, anda meraih pencapaian <q>{$data->nama_pencapaian}</q>.","anggota/{$_nama}");
					$this->ang->kakd("{$_nama} (".site_url("anggota/{$_nama}").") meraih pencapaian baru yaitu: {$data->nama_pencapaian}, selamat untuk {$_nama} atas pencapaian yang telah anda raih :partying_face:", TRUE);

					$return = $data;
				}
				else
				{
					$return = NULL;
				}
			}
			else
			{
				$return = NULL;
			}
		}

		return $return;
	}

	public function cek_slhd($pengguna,$kelas,$modul)
	{
		return $this->db->select('id_slhd')->from('slhd')->where([
			'pengguna' => $pengguna, 'kelas' => $kelas, 'modul' => $modul
		])->get()->num_rows();
	}

	public function set_slhd($pengguna,$kelas,$modul)
	{
		$this->db->insert('slhd', ['pengguna' => $pengguna, 'kelas' => $kelas, 'modul' => $modul]);
	}

	public function ambil_peserta($kelas)
	{
		return $this->db->select("id_1_{$kelas}")->from("1_{$kelas}")->where(['modul_ke' => '1', 'bagian_terakhir >' => 1])->get()->num_rows();
	}

	public function init_kelas_pengguna($kelas)
	{
		$cek = $this->db->select("id_1_{$kelas}")->from("1_{$kelas}")->where('pengguna', $this->session->ang_nama_pengguna)->get()->num_rows();

		if ($cek == 0)
		{
			$data;
			$jumlah_modul = (($kelas == 'html' || $kelas == 'mysql') ? 6 : ($kelas == 'css' || $kelas == 'php')) ? 8 : 9;

			for ($i = 1; $i <= $jumlah_modul; $i++)
			{
				$data[] = ['pengguna' => $this->session->ang_nama_pengguna, 'modul_ke' => $i, 'bagian_terakhir' => 1];
			}

			$this->db->insert_batch("1_{$kelas}", $data);
		}
	}
}
