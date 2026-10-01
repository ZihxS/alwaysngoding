<?php
  $flagModalMenu = '';

  $kelas = str_replace('belajar-','',$this->uri->segment(1));

  if ($kelas == 'html')
  {
    $modul = $this->uri->segment(3);

    if ($modul == 'berkenalan-dengan-html')
    {
      $flagModalMenu = 'html-1';
    }
    elseif ($modul == 'tag-atribut-dan-elemen-pada-html')
    {
      $flagModalMenu = 'html-2';
    }
    elseif ($modul == 'struktur-dasar-html')
    {
      $flagModalMenu = 'html-3';
    }
    elseif ($modul == 'membuat-tabel-pada-html')
    {
      $flagModalMenu = 'html-4';
    }
    elseif ($modul == 'membuat-formulir-pada-html')
    {
      $flagModalMenu = 'html-5';
    }
    elseif ($modul == 'lebih-banyak-tentang-html')
    {
      $flagModalMenu = 'html-6';
    }

    $terakhir = $this->belajar->ambil_bagian_terakhir_teori_html(str_replace("{$kelas}-",'',$flagModalMenu));
  }
  elseif ($kelas == 'css')
  {
    $modul = $this->uri->segment(3);

    if ($modul == 'berkenalan-dengan-css')
    {
      $flagModalMenu = 'css-1';
    }
    elseif ($modul == 'perpaduan-css-dengan-html')
    {
      $flagModalMenu = 'css-2';
    }
    elseif ($modul == 'bekerja-dengan-text')
    {
      $flagModalMenu = 'css-3';
    }
    elseif ($modul == 'property-property-pada-css')
    {
      $flagModalMenu = 'css-4';
    }
    elseif ($modul == 'posisi-dan-layout-pada-css')
    {
      $flagModalMenu = 'css-5';
    }
    elseif ($modul == 'gradient-dan-background-pada-css')
    {
      $flagModalMenu = 'css-6';
    }
    elseif ($modul == 'transisi-transformasi-dan-animasi-pada-css')
    {
      $flagModalMenu = 'css-7';
    }
    elseif ($modul == 'lebih-banyak-tentang-css')
    {
      $flagModalMenu = 'css-8';
    }

    $terakhir = $this->belajar->ambil_bagian_terakhir_teori_css(str_replace("{$kelas}-",'',$flagModalMenu));
  }
  elseif ($kelas == 'php')
  {
    $modul = $this->uri->segment(3);

    if ($modul == 'berkenalan-dengan-php')
    {
      $flagModalMenu = 'php-1';
    }
    elseif ($modul == 'syntax-dasar-php')
    {
      $flagModalMenu = 'php-2';
    }
    elseif ($modul == 'tipe-data-pada-php')
    {
      $flagModalMenu = 'php-3';
    }
    elseif ($modul == 'kondisi-dan-perulangan-pada-php')
    {
      $flagModalMenu = 'php-4';
    }
    elseif ($modul == 'function-pada-php')
    {
      $flagModalMenu = 'php-5';
    }
    elseif ($modul == 'pbo-oop-pada-php')
    {
      $flagModalMenu = 'php-6';
    }
    elseif ($modul == 'kelola-session-cookie-dan-files')
    {
      $flagModalMenu = 'php-7';
    }
    elseif ($modul == 'lebih-banyak-tentang-php')
    {
      $flagModalMenu = 'php-8';
    }

    $terakhir = $this->belajar->ambil_bagian_terakhir_teori_php(str_replace("{$kelas}-",'',$flagModalMenu));
  }
  elseif ($kelas == 'mysql')
  {
    $modul = $this->uri->segment(3);

    if ($modul == 'berkenalan-dengan-mysql')
    {
      $flagModalMenu = 'mysql-1';
    }
    elseif ($modul == 'perintah-perintah-dasar-mysql')
    {
      $flagModalMenu = 'mysql-2';
    }
    elseif ($modul == 'tipe-data-pada-mysql')
    {
      $flagModalMenu = 'mysql-3';
    }
    elseif ($modul == 'create-read-update-delete-mysql')
    {
      $flagModalMenu = 'mysql-4';
    }
    elseif ($modul == 'penggabungan-tabel-pada-mysql')
    {
      $flagModalMenu = 'mysql-5';
    }
    elseif ($modul == 'lebih-banyak-tentang-mysql')
    {
      $flagModalMenu = 'mysql-6';
    }

    $terakhir = $this->belajar->ambil_bagian_terakhir_teori_mysql(str_replace("{$kelas}-",'',$flagModalMenu));
  }
  elseif ($kelas == 'javascript')
  {
    $modul = $this->uri->segment(3);

    if ($modul == 'berkenalan-dengan-javascript')
    {
      $flagModalMenu = 'javascript-1';
    }
    elseif ($modul == 'aturan-penulisan-kode-di-javascript')
    {
      $flagModalMenu = 'javascript-2';
    }
    elseif ($modul == 'dasar-javascript')
    {
      $flagModalMenu = 'javascript-3';
    }
    elseif ($modul == 'tipe-data-pada-javascript')
    {
      $flagModalMenu = 'javascript-4';
    }
    elseif ($modul == 'function-dan-object-pada-javascript')
    {
      $flagModalMenu = 'javascript-5';
    }
    elseif ($modul == 'kondisi-dan-perulangan-pada-javascript')
    {
      $flagModalMenu = 'javascript-6';
    }
    elseif ($modul == 'lebih-banyak-tentang-string-di-javascript')
    {
      $flagModalMenu = 'javascript-7';
    }
    elseif ($modul == 'lebih-banyak-tentang-array-dan-object-di-javascript')
    {
      $flagModalMenu = 'javascript-8';
    }
    elseif ($modul == 'lebih-banyak-tentang-javascript')
    {
      $flagModalMenu = 'javascript-9';
    }

    $terakhir = $this->belajar->ambil_bagian_terakhir_teori_javascript(str_replace("{$kelas}-",'',$flagModalMenu));
  }
?>

<?php if ($flagModalMenu == 'html-1'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Berkenalan Dengan HTML</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-html/teori/berkenalan-dengan-html/bagian/1').'">Pengertian HTML</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-html/teori/berkenalan-dengan-html/bagian/2').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-html/teori/berkenalan-dengan-html/bagian/3').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-html/teori/berkenalan-dengan-html/bagian/4').'">Sejarah HTML</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-html/teori/berkenalan-dengan-html/bagian/5').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-html/teori/berkenalan-dengan-html/bagian/6').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-html/teori/berkenalan-dengan-html/bagian/7').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-html/teori/berkenalan-dengan-html/bagian/8').'">Halaman Untuk Soal Ke 6</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-html/teori/berkenalan-dengan-html/bagian/9').'">Halaman Untuk Soal Ke 7</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-html/teori/berkenalan-dengan-html/bagian/10').'">Halaman Untuk Soal Ke 8</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            11. <?= $terakhir >= intval('11') ? '<a href="'.site_url('belajar-html/teori/berkenalan-dengan-html/bagian/11').'">Persiapan Tempur</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'html-2'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Tag, Atribut dan Elemen Pada HTML</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-html/teori/tag-atribut-dan-elemen-pada-html/bagian/1').'">Pengertian Tag Pada HTML</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-html/teori/tag-atribut-dan-elemen-pada-html/bagian/2').'">Tag-Tag Pada HTML</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-html/teori/tag-atribut-dan-elemen-pada-html/bagian/3').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-html/teori/tag-atribut-dan-elemen-pada-html/bagian/4').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-html/teori/tag-atribut-dan-elemen-pada-html/bagian/5').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-html/teori/tag-atribut-dan-elemen-pada-html/bagian/6').'">Catatan</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-html/teori/tag-atribut-dan-elemen-pada-html/bagian/7').'">Pengertian Atribut Pada HTML</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-html/teori/tag-atribut-dan-elemen-pada-html/bagian/8').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-html/teori/tag-atribut-dan-elemen-pada-html/bagian/9').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-html/teori/tag-atribut-dan-elemen-pada-html/bagian/10').'">Halaman Untuk Soal Ke 6</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            11. <?= $terakhir >= intval('11') ? '<a href="'.site_url('belajar-html/teori/tag-atribut-dan-elemen-pada-html/bagian/11').'">Pengertian Element Pada HTML</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            12. <?= $terakhir >= intval('12') ? '<a href="'.site_url('belajar-html/teori/tag-atribut-dan-elemen-pada-html/bagian/12').'">Halaman Untuk Soal Ke 7</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            13. <?= $terakhir >= intval('13') ? '<a href="'.site_url('belajar-html/teori/tag-atribut-dan-elemen-pada-html/bagian/13').'">Catatan #2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'html-3'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Struktur Dasar HTML</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-html/teori/struktur-dasar-html/bagian/1').'">Struktur Dasar HTML</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-html/teori/struktur-dasar-html/bagian/2').'">Atribut "lang" Pada HTML</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-html/teori/struktur-dasar-html/bagian/3').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-html/teori/struktur-dasar-html/bagian/4').'">Meta Charset UTF-8</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-html/teori/struktur-dasar-html/bagian/5').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-html/teori/struktur-dasar-html/bagian/6').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-html/teori/struktur-dasar-html/bagian/7').'">Memanfaatkan Tag Baru HTML5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-html/teori/struktur-dasar-html/bagian/8').'">Halaman Untuk Soal Ke 4 (Kesimpulan)</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'html-4'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Membuat Tabel Pada HTML</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/1').'">Tabel Pada HTML</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/2').'">Membuat Tabel Sederhana</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/3').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/4').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/5').'">Mengatur Lebar Tabel</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/6').'">Mengatur Tinggi Baris Pada Tabel</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/7').'">Mengatur Lebar Kolom Pada Tabel</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/8').'">Table Heading</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/9').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/10').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            11. <?= $terakhir >= intval('11') ? '<a href="'.site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/11').'">Memanfaatkan Atribut Align</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            12. <?= $terakhir >= intval('12') ? '<a href="'.site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/12').'">Tag Penjelas</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            13. <?= $terakhir >= intval('13') ? '<a href="'.site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/13').'">Cara Menggabungkan Sel (Kolom) Tabel</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            14. <?= $terakhir >= intval('14') ? '<a href="'.site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/14').'">Atribut Cellpadding dan Cellspacing</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            15. <?= $terakhir >= intval('15') ? '<a href="'.site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/15').'">Membuat Judul Tabel Dengan Tag Caption</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            16. <?= $terakhir >= intval('16') ? '<a href="'.site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/16').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            17. <?= $terakhir >= intval('17') ? '<a href="'.site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/17').'">Halaman Untuk Soal Ke 6</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            18. <?= $terakhir >= intval('18') ? '<a href="'.site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/18').'">Halaman Untuk Soal Ke 7</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            19. <?= $terakhir >= intval('19') ? '<a href="'.site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/19').'">Halaman Untuk Soal Ke 8</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            20. <?= $terakhir >= intval('20') ? '<a href="'.site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/20').'">Memanfaatkan Atribut Valign (Vertical Align)</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            21. <?= $terakhir >= intval('21') ? '<a href="'.site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/21').'">Membuat Garis Antara Baris & Kolom Tabel</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            22. <?= $terakhir >= intval('22') ? '<a href="'.site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/22').'">Membuat Grup Kolom (Tag Colgroup dan Tag Col)</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            23. <?= $terakhir >= intval('23') ? '<a href="'.site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/23').'">Halaman Untuk Soal Ke 9</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            24. <?= $terakhir >= intval('24') ? '<a href="'.site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/24').'">Halaman Untuk Soal Ke 10</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            25. <?= $terakhir >= intval('25') ? '<a href="'.site_url('belajar-html/teori/membuat-tabel-pada-html/bagian/25').'">Halaman Untuk Soal Ke 11</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'html-5'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Membuat Formulir Pada HTML</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-html/teori/membuat-formulir-pada-html/bagian/1').'">Membuat Formulir Pada HTML</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-html/teori/membuat-formulir-pada-html/bagian/2').'">Berkenalan Terlebih Dahulu</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-html/teori/membuat-formulir-pada-html/bagian/3').'">Membuat Form Sederhana (Daftar Anggota)</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-html/teori/membuat-formulir-pada-html/bagian/4').'">Input Type Radio dan Checkbox</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-html/teori/membuat-formulir-pada-html/bagian/5').'">Tag Label Untuk Tag Input</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-html/teori/membuat-formulir-pada-html/bagian/6').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-html/teori/membuat-formulir-pada-html/bagian/7').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-html/teori/membuat-formulir-pada-html/bagian/8').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-html/teori/membuat-formulir-pada-html/bagian/9').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-html/teori/membuat-formulir-pada-html/bagian/10').'">Tag Textarea, Select dan Option</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            11. <?= $terakhir >= intval('11') ? '<a href="'.site_url('belajar-html/teori/membuat-formulir-pada-html/bagian/11').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            12. <?= $terakhir >= intval('12') ? '<a href="'.site_url('belajar-html/teori/membuat-formulir-pada-html/bagian/12').'">Tag Optgroup</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            13. <?= $terakhir >= intval('13') ? '<a href="'.site_url('belajar-html/teori/membuat-formulir-pada-html/bagian/13').'">Halaman Untuk Soal Ke 6</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            14. <?= $terakhir >= intval('14') ? '<a href="'.site_url('belajar-html/teori/membuat-formulir-pada-html/bagian/14').'">Input Type Date, Time dan Month</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            15. <?= $terakhir >= intval('15') ? '<a href="'.site_url('belajar-html/teori/membuat-formulir-pada-html/bagian/15').'">Halaman Untuk Soal Ke 7</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            16. <?= $terakhir >= intval('16') ? '<a href="'.site_url('belajar-html/teori/membuat-formulir-pada-html/bagian/16').'">Input Type Number, Email, Color dan URL</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            17. <?= $terakhir >= intval('17') ? '<a href="'.site_url('belajar-html/teori/membuat-formulir-pada-html/bagian/17').'">Input Type File dan Reset</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            18. <?= $terakhir >= intval('18') ? '<a href="'.site_url('belajar-html/teori/membuat-formulir-pada-html/bagian/18').'">Halaman Untuk Soal Ke 8</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            19. <?= $terakhir >= intval('19') ? '<a href="'.site_url('belajar-html/teori/membuat-formulir-pada-html/bagian/19').'">Halaman Untuk Soal Ke 9</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            20. <?= $terakhir >= intval('20') ? '<a href="'.site_url('belajar-html/teori/membuat-formulir-pada-html/bagian/20').'">Beberapa Atribut Tambahan Untuk Tag Input</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'html-6'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Lebih Banyak Tentang HTML</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-html/teori/lebih-banyak-tentang-html/bagian/1').'">Membuat List - #1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-html/teori/lebih-banyak-tentang-html/bagian/2').'">Membuat List - #2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-html/teori/lebih-banyak-tentang-html/bagian/3').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-html/teori/lebih-banyak-tentang-html/bagian/4').'">Tag Font (Untuk Memodifikasi Font)</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-html/teori/lebih-banyak-tentang-html/bagian/5').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-html/teori/lebih-banyak-tentang-html/bagian/6').'">Konten Berjalan Pada HTML (Tag Marquee)</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-html/teori/lebih-banyak-tentang-html/bagian/7').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-html/teori/lebih-banyak-tentang-html/bagian/8').'">Tag Link, Style, Script dan Atribut Style</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-html/teori/lebih-banyak-tentang-html/bagian/9').'">Mengetahui Tag Inline & Block</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-html/teori/lebih-banyak-tentang-html/bagian/10').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            11. <?= $terakhir >= intval('11') ? '<a href="'.site_url('belajar-html/teori/lebih-banyak-tentang-html/bagian/11').'">Tag Audio dan Video</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            12. <?= $terakhir >= intval('12') ? '<a href="'.site_url('belajar-html/teori/lebih-banyak-tentang-html/bagian/12').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            13. <?= $terakhir >= intval('13') ? '<a href="'.site_url('belajar-html/teori/lebih-banyak-tentang-html/bagian/13').'">Menampilkan Ikon Pada Tab Bar</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            14. <?= $terakhir >= intval('14') ? '<a href="'.site_url('belajar-html/teori/lebih-banyak-tentang-html/bagian/14').'">Halaman Untuk Soal Ke 6</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'css-1'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Berkenalan Dengan CSS</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-css/teori/berkenalan-dengan-css/bagian/1').'">Pengertian CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-css/teori/berkenalan-dengan-css/bagian/2').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-css/teori/berkenalan-dengan-css/bagian/3').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-css/teori/berkenalan-dengan-css/bagian/4').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-css/teori/berkenalan-dengan-css/bagian/5').'">Sejarah CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-css/teori/berkenalan-dengan-css/bagian/6').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-css/teori/berkenalan-dengan-css/bagian/7').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-css/teori/berkenalan-dengan-css/bagian/8').'">Halaman Untuk Soal Ke 6</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-css/teori/berkenalan-dengan-css/bagian/9').'">Halaman Untuk Soal Ke 7</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-css/teori/berkenalan-dengan-css/bagian/10').'">Halaman Untuk Soal Ke 8</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            11. <?= $terakhir >= intval('11') ? '<a href="'.site_url('belajar-css/teori/berkenalan-dengan-css/bagian/11').'">Versi CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            12. <?= $terakhir >= intval('12') ? '<a href="'.site_url('belajar-css/teori/berkenalan-dengan-css/bagian/12').'">Halaman Untuk Soal Ke 9</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            13. <?= $terakhir >= intval('13') ? '<a href="'.site_url('belajar-css/teori/berkenalan-dengan-css/bagian/13').'">Penulisan CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            14. <?= $terakhir >= intval('14') ? '<a href="'.site_url('belajar-css/teori/berkenalan-dengan-css/bagian/14').'">Halaman Untuk Soal Ke 10</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            15. <?= $terakhir >= intval('15') ? '<a href="'.site_url('belajar-css/teori/berkenalan-dengan-css/bagian/15').'">Halaman Untuk Soal Ke 11</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            16. <?= $terakhir >= intval('16') ? '<a href="'.site_url('belajar-css/teori/berkenalan-dengan-css/bagian/16').'">Halaman Untuk Soal Ke 12</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            17. <?= $terakhir >= intval('17') ? '<a href="'.site_url('belajar-css/teori/berkenalan-dengan-css/bagian/17').'">Halaman Untuk Soal Ke 13</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            18. <?= $terakhir >= intval('18') ? '<a href="'.site_url('belajar-css/teori/berkenalan-dengan-css/bagian/18').'">Halaman Untuk Soal Ke 14</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            19. <?= $terakhir >= intval('19') ? '<a href="'.site_url('belajar-css/teori/berkenalan-dengan-css/bagian/19').'">Halaman Untuk Soal Ke 15</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            20. <?= $terakhir >= intval('20') ? '<a href="'.site_url('belajar-css/teori/berkenalan-dengan-css/bagian/20').'">Fakta Menggunakan CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            21. <?= $terakhir >= intval('21') ? '<a href="'.site_url('belajar-css/teori/berkenalan-dengan-css/bagian/21').'">Halaman Untuk Soal Ke 16</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            22. <?= $terakhir >= intval('22') ? '<a href="'.site_url('belajar-css/teori/berkenalan-dengan-css/bagian/22').'">Salam Kenal dari CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'css-2'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Perpaduan CSS Dengan HTML</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-css/teori/perpaduan-css-dengan-html/bagian/1').'">Memadukan CSS Dengan HTML</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-css/teori/perpaduan-css-dengan-html/bagian/2').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-css/teori/perpaduan-css-dengan-html/bagian/3').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-css/teori/perpaduan-css-dengan-html/bagian/4').'">Internal CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-css/teori/perpaduan-css-dengan-html/bagian/5').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-css/teori/perpaduan-css-dengan-html/bagian/6').'">External CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-css/teori/perpaduan-css-dengan-html/bagian/7').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-css/teori/perpaduan-css-dengan-html/bagian/8').'">Inline CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-css/teori/perpaduan-css-dengan-html/bagian/9').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-css/teori/perpaduan-css-dengan-html/bagian/10').'">CSS Class Selector</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            11. <?= $terakhir >= intval('11') ? '<a href="'.site_url('belajar-css/teori/perpaduan-css-dengan-html/bagian/11').'">CSS id Selector</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            12. <?= $terakhir >= intval('12') ? '<a href="'.site_url('belajar-css/teori/perpaduan-css-dengan-html/bagian/12').'">Halaman Untuk Soal Ke 6</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            13. <?= $terakhir >= intval('13') ? '<a href="'.site_url('belajar-css/teori/perpaduan-css-dengan-html/bagian/13').'">CSS Attribute Selector</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            14. <?= $terakhir >= intval('14') ? '<a href="'.site_url('belajar-css/teori/perpaduan-css-dengan-html/bagian/14').'">Menggabungkan Element Selector Dengan Class/id</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            15. <?= $terakhir >= intval('15') ? '<a href="'.site_url('belajar-css/teori/perpaduan-css-dengan-html/bagian/15').'">Macam-Macam Penulisan Selector CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            16. <?= $terakhir >= intval('16') ? '<a href="'.site_url('belajar-css/teori/perpaduan-css-dengan-html/bagian/16').'">Halaman Untuk Soal Ke 7</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            17. <?= $terakhir >= intval('17') ? '<a href="'.site_url('belajar-css/teori/perpaduan-css-dengan-html/bagian/17').'">Halaman Untuk Soal Ke 8</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            18. <?= $terakhir >= intval('18') ? '<a href="'.site_url('belajar-css/teori/perpaduan-css-dengan-html/bagian/18').'">Komentar di CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            19. <?= $terakhir >= intval('19') ? '<a href="'.site_url('belajar-css/teori/perpaduan-css-dengan-html/bagian/19').'">Praktek Yuk!</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'css-3'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Bekerja Dengan Text</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-css/teori/bekerja-dengan-text/bagian/1').'">Bekerja Dengan Text</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-css/teori/bekerja-dengan-text/bagian/2').'">Property Color Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-css/teori/bekerja-dengan-text/bagian/3').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-css/teori/bekerja-dengan-text/bagian/4').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-css/teori/bekerja-dengan-text/bagian/5').'">Property font-size Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-css/teori/bekerja-dengan-text/bagian/6').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-css/teori/bekerja-dengan-text/bagian/7').'">Property font-style Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-css/teori/bekerja-dengan-text/bagian/8').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-css/teori/bekerja-dengan-text/bagian/9').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-css/teori/bekerja-dengan-text/bagian/10').'">Property font-family Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            11. <?= $terakhir >= intval('11') ? '<a href="'.site_url('belajar-css/teori/bekerja-dengan-text/bagian/11').'">Halaman Untuk Soal Ke 6</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            12. <?= $terakhir >= intval('12') ? '<a href="'.site_url('belajar-css/teori/bekerja-dengan-text/bagian/12').'">Property font-weight Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            13. <?= $terakhir >= intval('13') ? '<a href="'.site_url('belajar-css/teori/bekerja-dengan-text/bagian/13').'">Halaman Untuk Soal Ke 7</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            14. <?= $terakhir >= intval('14') ? '<a href="'.site_url('belajar-css/teori/bekerja-dengan-text/bagian/14').'">Property text-decoration Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            15. <?= $terakhir >= intval('15') ? '<a href="'.site_url('belajar-css/teori/bekerja-dengan-text/bagian/15').'">Halaman Untuk Soal Ke 8</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            16. <?= $terakhir >= intval('16') ? '<a href="'.site_url('belajar-css/teori/bekerja-dengan-text/bagian/16').'">Property text-transform Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            17. <?= $terakhir >= intval('17') ? '<a href="'.site_url('belajar-css/teori/bekerja-dengan-text/bagian/17').'">Halaman Untuk Soal Ke 9</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            18. <?= $terakhir >= intval('18') ? '<a href="'.site_url('belajar-css/teori/bekerja-dengan-text/bagian/18').'">Property text-shadow Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            19. <?= $terakhir >= intval('19') ? '<a href="'.site_url('belajar-css/teori/bekerja-dengan-text/bagian/19').'">Halaman Untuk Soal Ke 10</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            20. <?= $terakhir >= intval('20') ? '<a href="'.site_url('belajar-css/teori/bekerja-dengan-text/bagian/20').'">Property text-indent Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            21. <?= $terakhir >= intval('21') ? '<a href="'.site_url('belajar-css/teori/bekerja-dengan-text/bagian/21').'">Property text-align Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            22. <?= $terakhir >= intval('22') ? '<a href="'.site_url('belajar-css/teori/bekerja-dengan-text/bagian/22').'">Halaman Untuk Soal Ke 11</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            23. <?= $terakhir >= intval('23') ? '<a href="'.site_url('belajar-css/teori/bekerja-dengan-text/bagian/23').'">Property letter-spacing Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            24. <?= $terakhir >= intval('24') ? '<a href="'.site_url('belajar-css/teori/bekerja-dengan-text/bagian/24').'">Halaman Untuk Soal Ke 12</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            25. <?= $terakhir >= intval('25') ? '<a href="'.site_url('belajar-css/teori/bekerja-dengan-text/bagian/25').'">Property word-spacing Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            26. <?= $terakhir >= intval('26') ? '<a href="'.site_url('belajar-css/teori/bekerja-dengan-text/bagian/26').'">Halaman Untuk Soal Ke 13</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            27. <?= $terakhir >= intval('27') ? '<a href="'.site_url('belajar-css/teori/bekerja-dengan-text/bagian/27').'">Property word-wrap Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            28. <?= $terakhir >= intval('28') ? '<a href="'.site_url('belajar-css/teori/bekerja-dengan-text/bagian/28').'">Halaman Untuk Soal Ke 14</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            29. <?= $terakhir >= intval('29') ? '<a href="'.site_url('belajar-css/teori/bekerja-dengan-text/bagian/29').'">Bekerja Dengan Text</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            30. <?= $terakhir >= intval('30') ? '<a href="'.site_url('belajar-css/teori/bekerja-dengan-text/bagian/30').'">Halaman Untuk Soal Ke 15 (Kesimpulan)</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'css-4'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Property Pada CSS</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-css/teori/property-property-pada-css/bagian/1').'">Property Border Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-css/teori/property-property-pada-css/bagian/2').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-css/teori/property-property-pada-css/bagian/3').'">Property Border-Radius Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-css/teori/property-property-pada-css/bagian/4').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-css/teori/property-property-pada-css/bagian/5').'">Property Width dan Height Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-css/teori/property-property-pada-css/bagian/6').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-css/teori/property-property-pada-css/bagian/7').'">Property Margin dan Padding Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-css/teori/property-property-pada-css/bagian/8').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-css/teori/property-property-pada-css/bagian/9').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-css/teori/property-property-pada-css/bagian/10').'">Halaman Untuk Soal Ke 6</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            11. <?= $terakhir >= intval('11') ? '<a href="'.site_url('belajar-css/teori/property-property-pada-css/bagian/11').'">Property background-color Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            12. <?= $terakhir >= intval('12') ? '<a href="'.site_url('belajar-css/teori/property-property-pada-css/bagian/12').'">Halaman Untuk Soal Ke 7</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            13. <?= $terakhir >= intval('13') ? '<a href="'.site_url('belajar-css/teori/property-property-pada-css/bagian/13').'">Property background-image Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            14. <?= $terakhir >= intval('14') ? '<a href="'.site_url('belajar-css/teori/property-property-pada-css/bagian/14').'">Halaman Untuk Soal Ke 8</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            15. <?= $terakhir >= intval('15') ? '<a href="'.site_url('belajar-css/teori/property-property-pada-css/bagian/15').'">Property background-repeat Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            16. <?= $terakhir >= intval('16') ? '<a href="'.site_url('belajar-css/teori/property-property-pada-css/bagian/16').'">Halaman Untuk Soal Ke 9</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            17. <?= $terakhir >= intval('17') ? '<a href="'.site_url('belajar-css/teori/property-property-pada-css/bagian/17').'">Property background-attachment Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            18. <?= $terakhir >= intval('18') ? '<a href="'.site_url('belajar-css/teori/property-property-pada-css/bagian/18').'">Halaman Untuk Soal Ke 10</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            19. <?= $terakhir >= intval('19') ? '<a href="'.site_url('belajar-css/teori/property-property-pada-css/bagian/19').'">Property background-position Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            20. <?= $terakhir >= intval('20') ? '<a href="'.site_url('belajar-css/teori/property-property-pada-css/bagian/20').'">Halaman Untuk Soal Ke 11</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            21. <?= $terakhir >= intval('21') ? '<a href="'.site_url('belajar-css/teori/property-property-pada-css/bagian/21').'">Property background-size Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            22. <?= $terakhir >= intval('22') ? '<a href="'.site_url('belajar-css/teori/property-property-pada-css/bagian/22').'">Halaman Untuk Soal Ke 12</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            23. <?= $terakhir >= intval('23') ? '<a href="'.site_url('belajar-css/teori/property-property-pada-css/bagian/23').'">Property background Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            24. <?= $terakhir >= intval('24') ? '<a href="'.site_url('belajar-css/teori/property-property-pada-css/bagian/24').'">Halaman Untuk Soal Ke 13</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            25. <?= $terakhir >= intval('25') ? '<a href="'.site_url('belajar-css/teori/property-property-pada-css/bagian/25').'">Property cursor Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            26. <?= $terakhir >= intval('26') ? '<a href="'.site_url('belajar-css/teori/property-property-pada-css/bagian/26').'">Halaman Untuk Soal Ke 14</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'css-5'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Posisi Dan Layout Pada CSS</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/1').'">Property Display Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/2').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/3').'">Property Visibility Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/4').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/5').'">Property Position Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/6').'">Position Static di CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/7').'">Position Relative di CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/8').'">Position Absolute di CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/9').'">Position Fixed di CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/10').'">Position Sticky di CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            11. <?= $terakhir >= intval('11') ? '<a href="'.site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/11').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            12. <?= $terakhir >= intval('12') ? '<a href="'.site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/12').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            13. <?= $terakhir >= intval('13') ? '<a href="'.site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/13').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            14. <?= $terakhir >= intval('14') ? '<a href="'.site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/14').'">Halaman Untuk Soal Ke 6</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            15. <?= $terakhir >= intval('15') ? '<a href="'.site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/15').'">Halaman Untuk Soal Ke 7</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            16. <?= $terakhir >= intval('16') ? '<a href="'.site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/16').'">Property Float Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            17. <?= $terakhir >= intval('17') ? '<a href="'.site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/17').'">Property Clear Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            18. <?= $terakhir >= intval('18') ? '<a href="'.site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/18').'">Halaman Untuk Soal Ke 8</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            19. <?= $terakhir >= intval('19') ? '<a href="'.site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/19').'">Halaman Untuk Soal Ke 9</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            20. <?= $terakhir >= intval('20') ? '<a href="'.site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/20').'">Halaman Untuk Soal Ke 10</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            21. <?= $terakhir >= intval('21') ? '<a href="'.site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/21').'">Property Overflow Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            22. <?= $terakhir >= intval('22') ? '<a href="'.site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/22').'">Property "z-index" Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            23. <?= $terakhir >= intval('23') ? '<a href="'.site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/23').'">Halaman Untuk Soal Ke 11</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            24. <?= $terakhir >= intval('24') ? '<a href="'.site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/24').'">Halaman Untuk Soal Ke 12</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            25. <?= $terakhir >= intval('25') ? '<a href="'.site_url('belajar-css/teori/posisi-dan-layout-pada-css/bagian/25').'">Halaman Untuk Soal Ke 13</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'css-6'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Gradient Dan Background Pada CSS</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-css/teori/gradient-dan-background-pada-css/bagian/1').'">Gradiasi Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-css/teori/gradient-dan-background-pada-css/bagian/2').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-css/teori/gradient-dan-background-pada-css/bagian/3').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-css/teori/gradient-dan-background-pada-css/bagian/4').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-css/teori/gradient-dan-background-pada-css/bagian/5').'">Property "background-clip" Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-css/teori/gradient-dan-background-pada-css/bagian/6').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-css/teori/gradient-dan-background-pada-css/bagian/7').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-css/teori/gradient-dan-background-pada-css/bagian/8').'">Multiple Background (Images) Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-css/teori/gradient-dan-background-pada-css/bagian/9').'">Halaman Untuk Soal Ke 6</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-css/teori/gradient-dan-background-pada-css/bagian/10').'">Property Opacity Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            11. <?= $terakhir >= intval('11') ? '<a href="'.site_url('belajar-css/teori/gradient-dan-background-pada-css/bagian/11').'">Property Opacity di Internet Explorer</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            12. <?= $terakhir >= intval('12') ? '<a href="'.site_url('belajar-css/teori/gradient-dan-background-pada-css/bagian/12').'">Halaman Untuk Soal Ke 7</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            13. <?= $terakhir >= intval('13') ? '<a href="'.site_url('belajar-css/teori/gradient-dan-background-pada-css/bagian/13').'">Halaman Untuk Soal Ke 8</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            14. <?= $terakhir >= intval('14') ? '<a href="'.site_url('belajar-css/teori/gradient-dan-background-pada-css/bagian/14').'">Halaman Untuk Soal Ke 9</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            15. <?= $terakhir >= intval('15') ? '<a href="'.site_url('belajar-css/teori/gradient-dan-background-pada-css/bagian/15').'">Halaman Untuk Soal Ke 10</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'css-7'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Transisi Transformasi Dan Animasi Pada CSS</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/1').'">Transisi Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/2').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/3').'">Transform Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/4').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/5').'">Method "translate()" Pada CSS Transform</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/6').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/7').'">Method "scale()" Pada CSS Transform</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/8').'">Method "skew()" Pada CSS Transform</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/9').'">Method "rotate()" Pada CSS Transform</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/10').'">Method "matrix()" Pada CSS Transform</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            11. <?= $terakhir >= intval('11') ? '<a href="'.site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/11').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            12. <?= $terakhir >= intval('12') ? '<a href="'.site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/12').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            13. <?= $terakhir >= intval('13') ? '<a href="'.site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/13').'">Halaman Untuk Soal Ke 6</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            14. <?= $terakhir >= intval('14') ? '<a href="'.site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/14').'">Halaman Untuk Soal Ke 7</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            15. <?= $terakhir >= intval('15') ? '<a href="'.site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/15').'">Halaman Untuk Soal Ke 8</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            16. <?= $terakhir >= intval('16') ? '<a href="'.site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/16').'">Multiple Transform Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            17. <?= $terakhir >= intval('17') ? '<a href="'.site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/17').'">Halaman Untuk Soal Ke 9</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            18. <?= $terakhir >= intval('18') ? '<a href="'.site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/18').'">Property Animation Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            19. <?= $terakhir >= intval('19') ? '<a href="'.site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/19').'">Nilai Pada Property Animation</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            20. <?= $terakhir >= intval('20') ? '<a href="'.site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/20').'">Berkenalan Dengan "@keyframes"</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            21. <?= $terakhir >= intval('21') ? '<a href="'.site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/21').'">Halaman Untuk Soal Ke 10</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            22. <?= $terakhir >= intval('22') ? '<a href="'.site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/22').'">Halaman Untuk Soal Ke 11</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            23. <?= $terakhir >= intval('23') ? '<a href="'.site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/23').'">Halaman Untuk Soal Ke 12</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            24. <?= $terakhir >= intval('24') ? '<a href="'.site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/24').'">Memanfaatkan Property Transition dan Transform</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            25. <?= $terakhir >= intval('25') ? '<a href="'.site_url('belajar-css/teori/transisi-transformasi-dan-animasi-pada-css/bagian/25').'">Halaman Untuk Soal Ke 13</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'css-8'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Lebih Banyak Tentang CSS</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/1').'">Filter Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/2').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/3').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/4').'">CSS Vendor Prefixes</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/5').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/6').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/7').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/8').'">Halaman Untuk Soal Ke 6</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/9').'">Halaman Untuk Soal Ke 7</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/10').'">Halaman Untuk Soal Ke 8</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            11. <?= $terakhir >= intval('11') ? '<a href="'.site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/11').'">CSS Animation Vendor Prefixes</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            12. <?= $terakhir >= intval('12') ? '<a href="'.site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/12').'">Pseudo Element Global pada CSS (:root)</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            13. <?= $terakhir >= intval('13') ? '<a href="'.site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/13').'">Variabel Pada CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            14. <?= $terakhir >= intval('14') ? '<a href="'.site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/14').'">Halaman Untuk Soal Ke 9</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            15. <?= $terakhir >= intval('15') ? '<a href="'.site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/15').'">Halaman Untuk Soal Ke 10</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            16. <?= $terakhir >= intval('16') ? '<a href="'.site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/16').'">CSS Media Queries</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            17. <?= $terakhir >= intval('17') ? '<a href="'.site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/17').'">Lebih Banyak Tentang CSS Media Queries</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            18. <?= $terakhir >= intval('18') ? '<a href="'.site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/18').'">Halaman Untuk Soal Ke 11</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            19. <?= $terakhir >= intval('19') ? '<a href="'.site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/19').'">Halaman Untuk Soal Ke 12</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            20. <?= $terakhir >= intval('20') ? '<a href="'.site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/20').'">Mengenal SASS dan SCSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            21. <?= $terakhir >= intval('21') ? '<a href="'.site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/21').'">Halaman Untuk Soal Ke 13</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            22. <?= $terakhir >= intval('22') ? '<a href="'.site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/22').'">CSS Framework</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            23. <?= $terakhir >= intval('23') ? '<a href="'.site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/23').'">Halaman Untuk Soal Ke 14</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            24. <?= $terakhir >= intval('24') ? '<a href="'.site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/24').'">Minifikasi File CSS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            25. <?= $terakhir >= intval('25') ? '<a href="'.site_url('belajar-css/teori/lebih-banyak-tentang-css/bagian/25').'">Kemana Selanjutnya?</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'php-1'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Berkenalan Dengan PHP</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-php/teori/berkenalan-dengan-php/bagian/1').'">Pengertian PHP</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-php/teori/berkenalan-dengan-php/bagian/2').'">Sejarah PHP</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-php/teori/berkenalan-dengan-php/bagian/3').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-php/teori/berkenalan-dengan-php/bagian/4').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-php/teori/berkenalan-dengan-php/bagian/5').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-php/teori/berkenalan-dengan-php/bagian/6').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-php/teori/berkenalan-dengan-php/bagian/7').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-php/teori/berkenalan-dengan-php/bagian/8').'">Halaman Untuk Soal Ke 6</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'php-2'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Syntax Dasar PHP</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-php/teori/syntax-dasar-php/bagian/1').'">PHP Syntax</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-php/teori/syntax-dasar-php/bagian/2').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-php/teori/syntax-dasar-php/bagian/3').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-php/teori/syntax-dasar-php/bagian/4').'">Macam Cara Menggunakan Fungsi "echo"</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-php/teori/syntax-dasar-php/bagian/5').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-php/teori/syntax-dasar-php/bagian/6').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-php/teori/syntax-dasar-php/bagian/7').'">Komentar di PHP</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-php/teori/syntax-dasar-php/bagian/8').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-php/teori/syntax-dasar-php/bagian/9').'">Pengenalan Variabel dalam PHP</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-php/teori/syntax-dasar-php/bagian/10').'">Aturan Penulisan Variabel dalam PHP</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            11. <?= $terakhir >= intval('11') ? '<a href="'.site_url('belajar-php/teori/syntax-dasar-php/bagian/11').'">Variabel dalam PHP</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            12. <?= $terakhir >= intval('12') ? '<a href="'.site_url('belajar-php/teori/syntax-dasar-php/bagian/12').'">Variabel Sistem PHP (Predefined Variables)</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            13. <?= $terakhir >= intval('13') ? '<a href="'.site_url('belajar-php/teori/syntax-dasar-php/bagian/13').'">Cara Menampilkan Nilai Variabel</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            14. <?= $terakhir >= intval('14') ? '<a href="'.site_url('belajar-php/teori/syntax-dasar-php/bagian/14').'">Halaman Untuk Soal Ke 6</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            15. <?= $terakhir >= intval('15') ? '<a href="'.site_url('belajar-php/teori/syntax-dasar-php/bagian/15').'">Halaman Untuk Soal Ke 7</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            16. <?= $terakhir >= intval('16') ? '<a href="'.site_url('belajar-php/teori/syntax-dasar-php/bagian/16').'">Pengenalan Konstanta dalam PHP</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            17. <?= $terakhir >= intval('17') ? '<a href="'.site_url('belajar-php/teori/syntax-dasar-php/bagian/17').'">Konstanta dalam PHP</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            18. <?= $terakhir >= intval('18') ? '<a href="'.site_url('belajar-php/teori/syntax-dasar-php/bagian/18').'">Konstanta Sistem dalam PHP</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            19. <?= $terakhir >= intval('19') ? '<a href="'.site_url('belajar-php/teori/syntax-dasar-php/bagian/19').'">Halaman Untuk Soal Ke 8</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'php-3'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Tipe Data Pada PHP</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-php/teori/tipe-data-pada-php/bagian/1').'">Pengertian Tipe Data Pada PHP</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-php/teori/tipe-data-pada-php/bagian/2').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-php/teori/tipe-data-pada-php/bagian/3').'">Tipe Data Integer</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-php/teori/tipe-data-pada-php/bagian/4').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-php/teori/tipe-data-pada-php/bagian/5').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-php/teori/tipe-data-pada-php/bagian/6').'">Tipe Data Float</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-php/teori/tipe-data-pada-php/bagian/7').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-php/teori/tipe-data-pada-php/bagian/8').'">Tipe Data String #1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-php/teori/tipe-data-pada-php/bagian/9').'">Tipe Data String #2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-php/teori/tipe-data-pada-php/bagian/10').'">Tipe Data String #3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            11. <?= $terakhir >= intval('11') ? '<a href="'.site_url('belajar-php/teori/tipe-data-pada-php/bagian/11').'">Tipe Data String #4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            12. <?= $terakhir >= intval('12') ? '<a href="'.site_url('belajar-php/teori/tipe-data-pada-php/bagian/12').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            13. <?= $terakhir >= intval('13') ? '<a href="'.site_url('belajar-php/teori/tipe-data-pada-php/bagian/13').'">Halaman Untuk Soal Ke 6</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            14. <?= $terakhir >= intval('14') ? '<a href="'.site_url('belajar-php/teori/tipe-data-pada-php/bagian/14').'">Halaman Untuk Soal Ke 7</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            15. <?= $terakhir >= intval('15') ? '<a href="'.site_url('belajar-php/teori/tipe-data-pada-php/bagian/15').'">Tipe Data Boolean</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            16. <?= $terakhir >= intval('16') ? '<a href="'.site_url('belajar-php/teori/tipe-data-pada-php/bagian/16').'">Halaman Untuk Soal Ke 8</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            17. <?= $terakhir >= intval('17') ? '<a href="'.site_url('belajar-php/teori/tipe-data-pada-php/bagian/17').'">Tipe Data Array #1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            18. <?= $terakhir >= intval('18') ? '<a href="'.site_url('belajar-php/teori/tipe-data-pada-php/bagian/18').'">Tipe Data Array #2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            19. <?= $terakhir >= intval('19') ? '<a href="'.site_url('belajar-php/teori/tipe-data-pada-php/bagian/19').'">Mempersingkat Penulisan Array</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            20. <?= $terakhir >= intval('20') ? '<a href="'.site_url('belajar-php/teori/tipe-data-pada-php/bagian/20').'">Halaman Untuk Soal Ke 9</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            21. <?= $terakhir >= intval('21') ? '<a href="'.site_url('belajar-php/teori/tipe-data-pada-php/bagian/21').'">Halaman Untuk Soal Ke 10</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            22. <?= $terakhir >= intval('22') ? '<a href="'.site_url('belajar-php/teori/tipe-data-pada-php/bagian/22').'">Halaman Untuk Soal Ke 11</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            23. <?= $terakhir >= intval('23') ? '<a href="'.site_url('belajar-php/teori/tipe-data-pada-php/bagian/23').'">Menggabungkan atau Merangkai String</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            24. <?= $terakhir >= intval('24') ? '<a href="'.site_url('belajar-php/teori/tipe-data-pada-php/bagian/24').'">Halaman Untuk Soal Ke 12</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            25. <?= $terakhir >= intval('25') ? '<a href="'.site_url('belajar-php/teori/tipe-data-pada-php/bagian/25').'">Array Multidimensi (Array di Dalam Array)</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            26. <?= $terakhir >= intval('26') ? '<a href="'.site_url('belajar-php/teori/tipe-data-pada-php/bagian/26').'">Beberapa Contoh Array Multidimensi</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            27. <?= $terakhir >= intval('27') ? '<a href="'.site_url('belajar-php/teori/tipe-data-pada-php/bagian/27').'">Halaman Untuk Soal Ke 13</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'php-4'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Kondisi Dan Perulangan Pada PHP</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/1').'">Kondisi (Percabangan) (if, elseif, else)</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/2').'">Kondisi (Percabangan) (switch case)</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/3').'">Operator Yang Sering Digunakan Di Percabangan</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/4').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/5').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/6').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/7').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/8').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/9').'">Halaman Untuk Soal Ke 6</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/10').'">Halaman Untuk Soal Ke 7</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            11. <?= $terakhir >= intval('11') ? '<a href="'.site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/11').'">Perulangan Pada PHP</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            12. <?= $terakhir >= intval('12') ? '<a href="'.site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/12').'">Perulangan for Pada PHP</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            13. <?= $terakhir >= intval('13') ? '<a href="'.site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/13').'">Halaman Untuk Soal Ke 8</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            14. <?= $terakhir >= intval('14') ? '<a href="'.site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/14').'">Perulangan while Pada PHP</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            15. <?= $terakhir >= intval('15') ? '<a href="'.site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/15').'">Perulangan do while Pada PHP</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            16. <?= $terakhir >= intval('16') ? '<a href="'.site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/16').'">Halaman Untuk Soal Ke 9</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            17. <?= $terakhir >= intval('17') ? '<a href="'.site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/17').'">Halaman Untuk Soal Ke 10</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            18. <?= $terakhir >= intval('18') ? '<a href="'.site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/18').'">Perulangan foreach Pada PHP</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            19. <?= $terakhir >= intval('19') ? '<a href="'.site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/19').'">Halaman Untuk Soal Ke 11</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            20. <?= $terakhir >= intval('20') ? '<a href="'.site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/20').'">Halaman Untuk Soal Ke 12</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            21. <?= $terakhir >= intval('21') ? '<a href="'.site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/21').'">Halaman Untuk Soal Ke 13</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            22. <?= $terakhir >= intval('22') ? '<a href="'.site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/22').'">Memanfaatkan break & continue pada perulangan</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            23. <?= $terakhir >= intval('23') ? '<a href="'.site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/23').'">Halaman Untuk Soal Ke 14</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            24. <?= $terakhir >= intval('24') ? '<a href="'.site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/24').'">Perulangan Bersarang (Nested Loop)</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            25. <?= $terakhir >= intval('25') ? '<a href="'.site_url('belajar-php/teori/kondisi-dan-perulangan-pada-php/bagian/25').'">Halaman Untuk Soal Ke 15</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'php-5'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Function Pada PHP</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-php/teori/function-pada-php/bagian/1').'">Pengertian Fungsi (Function) Pada PHP</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-php/teori/function-pada-php/bagian/2').'">Fungsi (Function) Pada PHP #1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-php/teori/function-pada-php/bagian/3').'">Fungsi (Function) Pada PHP #2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-php/teori/function-pada-php/bagian/4').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-php/teori/function-pada-php/bagian/5').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-php/teori/function-pada-php/bagian/6').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-php/teori/function-pada-php/bagian/7').'">Fungsi (Function) Pada PHP #3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-php/teori/function-pada-php/bagian/8').'">Fungsi Yang Megembalikan Nilai</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-php/teori/function-pada-php/bagian/9').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-php/teori/function-pada-php/bagian/10').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'php-6'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">PBO (OOP) Pada PHP</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/1').'">Pemrograman Berorientasi Objek Pada PHP #1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/2').'">Pemrograman Berorientasi Objek Pada PHP #2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/3').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/4').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/5').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/6').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/7').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/8').'">Pengertian Class dalam PBO (OOP)</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/9').'">Pengertian Property dalam PBO (OOP)</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/10').'">Pengertian Method dalam PBO (OOP)</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            11. <?= $terakhir >= intval('11') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/11').'">Pengertian Object dalam PBO (OOP)</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            12. <?= $terakhir >= intval('12') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/12').'">Halaman Untuk Soal Ke 6</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            13. <?= $terakhir >= intval('13') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/13').'">Halaman Untuk Soal Ke 7</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            14. <?= $terakhir >= intval('14') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/14').'">Halaman Untuk Soal Ke 8</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            15. <?= $terakhir >= intval('15') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/15').'">Halaman Untuk Soal Ke 9</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            16. <?= $terakhir >= intval('16') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/16').'">Halaman Untuk Soal Ke 10</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            17. <?= $terakhir >= intval('17') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/17').'">Membuat Object dalam PBO (OOP)</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            18. <?= $terakhir >= intval('18') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/18').'">Mengakses Object dalam PBO (OOP)</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            19. <?= $terakhir >= intval('19') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/19').'">Object Sebagai Entitas Terpisah</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            20. <?= $terakhir >= intval('20') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/20').'">Halaman Untuk Soal Ke 11</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            21. <?= $terakhir >= intval('21') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/21').'">Halaman Untuk Soal Ke 12</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            22. <?= $terakhir >= intval('22') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/22').'">Enkapsulasi (Encapsulation) dalam PBO (OOP)</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            23. <?= $terakhir >= intval('23') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/23').'">Santai Sejenak</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            24. <?= $terakhir >= intval('24') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/24').'">Pengertian dan Fungsi Variabel $this</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            25. <?= $terakhir >= intval('25') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/25').'">Pengertian Constructor dan Destructor</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            26. <?= $terakhir >= intval('26') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/26').'">Halaman Untuk Soal Ke 13</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            27. <?= $terakhir >= intval('27') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/27').'">Halaman Untuk Soal Ke 14</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            28. <?= $terakhir >= intval('28') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/28').'">Halaman Untuk Soal Ke 15</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            29. <?= $terakhir >= intval('29') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/29').'">Halaman Untuk Soal Ke 16</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            30. <?= $terakhir >= intval('30') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/30').'">Halaman Untuk Soal Ke 17</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            31. <?= $terakhir >= intval('31') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/31').'">Halaman Untuk Soal Ke 18</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            32. <?= $terakhir >= intval('32') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/32').'">Halaman Untuk Soal Ke 19</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            33. <?= $terakhir >= intval('33') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/33').'">Halaman Untuk Soal Ke 20</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            34. <?= $terakhir >= intval('34') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/34').'">Halaman Untuk Soal Ke 21</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            35. <?= $terakhir >= intval('35') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/35').'">Halaman Untuk Soal Ke 22</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            36. <?= $terakhir >= intval('36') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/36').'">Pewarisan (Inheritance) dalam PBO (OOP)</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            37. <?= $terakhir >= intval('37') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/37').'">Pengertian Static Property dan Static Method</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            38. <?= $terakhir >= intval('38') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/38').'">Akses Constructor & Destructor Parent Class</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            39. <?= $terakhir >= intval('39') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/39').'">Halaman Untuk Soal Ke 23</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            40. <?= $terakhir >= intval('40') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/40').'">Halaman Untuk Soal Ke 24</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            41. <?= $terakhir >= intval('41') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/41').'">Halaman Untuk Soal Ke 25</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            42. <?= $terakhir >= intval('42') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/42').'">Halaman Untuk Soal Ke 26</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            43. <?= $terakhir >= intval('43') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/43').'">Halaman Untuk Soal Ke 27</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            44. <?= $terakhir >= intval('44') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/44').'">Halaman Untuk Soal Ke 28</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            45. <?= $terakhir >= intval('45') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/45').'">Halaman Untuk Soal Ke 29</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            46. <?= $terakhir >= intval('46') ? '<a href="'.site_url('belajar-php/teori/pbo-oop-pada-php/bagian/46').'">Halaman Untuk Soal Ke 30</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'php-7'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Kelola Session, Cookie Dan Files</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-php/teori/kelola-session-cookie-dan-files/bagian/1').'">Session Pada PHP</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-php/teori/kelola-session-cookie-dan-files/bagian/2').'">Mengelola Session Pada PHP</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-php/teori/kelola-session-cookie-dan-files/bagian/3').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-php/teori/kelola-session-cookie-dan-files/bagian/4').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-php/teori/kelola-session-cookie-dan-files/bagian/5').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-php/teori/kelola-session-cookie-dan-files/bagian/6').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-php/teori/kelola-session-cookie-dan-files/bagian/7').'">Mengelola Cookie Pada PHP</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-php/teori/kelola-session-cookie-dan-files/bagian/8').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-php/teori/kelola-session-cookie-dan-files/bagian/9').'">Halaman Untuk Soal Ke 6</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-php/teori/kelola-session-cookie-dan-files/bagian/10').'">Halaman Untuk Soal Ke 7</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            11. <?= $terakhir >= intval('11') ? '<a href="'.site_url('belajar-php/teori/kelola-session-cookie-dan-files/bagian/11').'">Penjelasan Detail 7 Argumen Cookie Pada PHP</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            12. <?= $terakhir >= intval('12') ? '<a href="'.site_url('belajar-php/teori/kelola-session-cookie-dan-files/bagian/12').'">Membuka Dan Membaca File Pada PHP</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            13. <?= $terakhir >= intval('13') ? '<a href="'.site_url('belajar-php/teori/kelola-session-cookie-dan-files/bagian/13').'">Memanipulasi File Pada PHP</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            14. <?= $terakhir >= intval('14') ? '<a href="'.site_url('belajar-php/teori/kelola-session-cookie-dan-files/bagian/14').'">Halaman Untuk Soal Ke 8</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            15. <?= $terakhir >= intval('15') ? '<a href="'.site_url('belajar-php/teori/kelola-session-cookie-dan-files/bagian/15').'">Halaman Untuk Soal Ke 9</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            16. <?= $terakhir >= intval('16') ? '<a href="'.site_url('belajar-php/teori/kelola-session-cookie-dan-files/bagian/16').'">Halaman Untuk Soal Ke 10</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            17. <?= $terakhir >= intval('17') ? '<a href="'.site_url('belajar-php/teori/kelola-session-cookie-dan-files/bagian/17').'">Halaman Untuk Soal Ke 11</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            18. <?= $terakhir >= intval('18') ? '<a href="'.site_url('belajar-php/teori/kelola-session-cookie-dan-files/bagian/18').'">Halaman Untuk Soal Ke 12</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'php-8'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Lebih Banyak Tentang PHP</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-php/teori/lebih-banyak-tentang-php/bagian/1').'">Bekerja Dengan Form (HTML & PHP) #1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-php/teori/lebih-banyak-tentang-php/bagian/2').'">Bekerja Dengan Form (HTML & PHP) #2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-php/teori/lebih-banyak-tentang-php/bagian/3').'">Kelemahan dan Kelebihan Metode GET</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-php/teori/lebih-banyak-tentang-php/bagian/4').'">Kelemahan dan Kelebihan Metode POST</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-php/teori/lebih-banyak-tentang-php/bagian/5').'">$_GET, $_POST dan $_REQUEST Pada PHP</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-php/teori/lebih-banyak-tentang-php/bagian/6').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-php/teori/lebih-banyak-tentang-php/bagian/7').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-php/teori/lebih-banyak-tentang-php/bagian/8').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-php/teori/lebih-banyak-tentang-php/bagian/9').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-php/teori/lebih-banyak-tentang-php/bagian/10').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            11. <?= $terakhir >= intval('11') ? '<a href="'.site_url('belajar-php/teori/lebih-banyak-tentang-php/bagian/11').'">Memanipulasi String Pada PHP</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            12. <?= $terakhir >= intval('12') ? '<a href="'.site_url('belajar-php/teori/lebih-banyak-tentang-php/bagian/12').'">Memanipulasi Array Pada PHP</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            13. <?= $terakhir >= intval('13') ? '<a href="'.site_url('belajar-php/teori/lebih-banyak-tentang-php/bagian/13').'">Halaman Untuk Soal Ke 6</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            14. <?= $terakhir >= intval('14') ? '<a href="'.site_url('belajar-php/teori/lebih-banyak-tentang-php/bagian/14').'">Halaman Untuk Soal Ke 7</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            15. <?= $terakhir >= intval('15') ? '<a href="'.site_url('belajar-php/teori/lebih-banyak-tentang-php/bagian/15').'">Fungsi Bawaan PHP Untuk Mengenkripsi Data</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            16. <?= $terakhir >= intval('16') ? '<a href="'.site_url('belajar-php/teori/lebih-banyak-tentang-php/bagian/16').'">Halaman Untuk Soal Ke 8</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            17. <?= $terakhir >= intval('17') ? '<a href="'.site_url('belajar-php/teori/lebih-banyak-tentang-php/bagian/17').'">Memahami Fungsi Date Pada PHP</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            18. <?= $terakhir >= intval('18') ? '<a href="'.site_url('belajar-php/teori/lebih-banyak-tentang-php/bagian/18').'">Fungsi explode() dan implode() pada PHP</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            19. <?= $terakhir >= intval('19') ? '<a href="'.site_url('belajar-php/teori/lebih-banyak-tentang-php/bagian/19').'">Halaman Untuk Soal Ke 9</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            20. <?= $terakhir >= intval('20') ? '<a href="'.site_url('belajar-php/teori/lebih-banyak-tentang-php/bagian/20').'">Halaman Untuk Soal Ke 10</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            21. <?= $terakhir >= intval('21') ? '<a href="'.site_url('belajar-php/teori/lebih-banyak-tentang-php/bagian/21').'">Perjalanan Yang Lumayan Panjangyaa</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'mysql-1'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Berkenalan Dengan SQL (MySQL)</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-mysql/teori/berkenalan-dengan-mysql/bagian/1').'">Pengertian Basis Data (Database)</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-mysql/teori/berkenalan-dengan-mysql/bagian/2').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-mysql/teori/berkenalan-dengan-mysql/bagian/3').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-mysql/teori/berkenalan-dengan-mysql/bagian/4').'">Pengertian MySQL</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-mysql/teori/berkenalan-dengan-mysql/bagian/5').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-mysql/teori/berkenalan-dengan-mysql/bagian/6').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-mysql/teori/berkenalan-dengan-mysql/bagian/7').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-mysql/teori/berkenalan-dengan-mysql/bagian/8').'">Sejarah MySQL</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-mysql/teori/berkenalan-dengan-mysql/bagian/9').'">Halaman Untuk Soal Ke 6</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-mysql/teori/berkenalan-dengan-mysql/bagian/10').'">Halaman Untuk Soal Ke 7</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            11. <?= $terakhir >= intval('11') ? '<a href="'.site_url('belajar-mysql/teori/berkenalan-dengan-mysql/bagian/11').'">Halaman Untuk Soal Ke 8</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            12. <?= $terakhir >= intval('12') ? '<a href="'.site_url('belajar-mysql/teori/berkenalan-dengan-mysql/bagian/12').'">Halaman Untuk Soal Ke 9</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            13. <?= $terakhir >= intval('13') ? '<a href="'.site_url('belajar-mysql/teori/berkenalan-dengan-mysql/bagian/13').'">Halaman Untuk Soal Ke 10</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            14. <?= $terakhir >= intval('14') ? '<a href="'.site_url('belajar-mysql/teori/berkenalan-dengan-mysql/bagian/14').'">Halaman Untuk Soal Ke 11</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            15. <?= $terakhir >= intval('15') ? '<a href="'.site_url('belajar-mysql/teori/berkenalan-dengan-mysql/bagian/15').'">Halaman Untuk Soal Ke 12</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'mysql-2'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Perintah Dasar SQL (MySQL)</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-mysql/teori/perintah-perintah-dasar-mysql/bagian/1').'">Menjalankan Perintah SQL Di phpMyAdmin</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-mysql/teori/perintah-perintah-dasar-mysql/bagian/2').'">Membuat Database dan Tabel Karyawan</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-mysql/teori/perintah-perintah-dasar-mysql/bagian/3').'">Perintah Untuk Membaca Tabel dan Kolom</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-mysql/teori/perintah-perintah-dasar-mysql/bagian/4').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-mysql/teori/perintah-perintah-dasar-mysql/bagian/5').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-mysql/teori/perintah-perintah-dasar-mysql/bagian/6').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-mysql/teori/perintah-perintah-dasar-mysql/bagian/7').'">Menambah Data Untuk Tabel Karyawan</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-mysql/teori/perintah-perintah-dasar-mysql/bagian/8').'">Perintah SELECT</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-mysql/teori/perintah-perintah-dasar-mysql/bagian/9').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-mysql/teori/perintah-perintah-dasar-mysql/bagian/10').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            11. <?= $terakhir >= intval('11') ? '<a href="'.site_url('belajar-mysql/teori/perintah-perintah-dasar-mysql/bagian/11').'">Menjalankan Perintah Lebih Dari Satu</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            12. <?= $terakhir >= intval('12') ? '<a href="'.site_url('belajar-mysql/teori/perintah-perintah-dasar-mysql/bagian/12').'">Aturan Penulisan Perintah SQL</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            13. <?= $terakhir >= intval('13') ? '<a href="'.site_url('belajar-mysql/teori/perintah-perintah-dasar-mysql/bagian/13').'">Halaman Untuk Soal Ke 6</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            14. <?= $terakhir >= intval('14') ? '<a href="'.site_url('belajar-mysql/teori/perintah-perintah-dasar-mysql/bagian/14').'">Komentar Di Perintah SQL</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            15. <?= $terakhir >= intval('15') ? '<a href="'.site_url('belajar-mysql/teori/perintah-perintah-dasar-mysql/bagian/15').'">Halaman Untuk Soal Ke 7</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            16. <?= $terakhir >= intval('16') ? '<a href="'.site_url('belajar-mysql/teori/perintah-perintah-dasar-mysql/bagian/16').'">Membuat dan Menghapus Database MySQL</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            17. <?= $terakhir >= intval('17') ? '<a href="'.site_url('belajar-mysql/teori/perintah-perintah-dasar-mysql/bagian/17').'">Halaman Untuk Soal Ke 8</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            18. <?= $terakhir >= intval('18') ? '<a href="'.site_url('belajar-mysql/teori/perintah-perintah-dasar-mysql/bagian/18').'">Halaman Untuk Soal Ke 9</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            19. <?= $terakhir >= intval('19') ? '<a href="'.site_url('belajar-mysql/teori/perintah-perintah-dasar-mysql/bagian/19').'">Membuat dan Menghapus Tabel MySQL</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            20. <?= $terakhir >= intval('20') ? '<a href="'.site_url('belajar-mysql/teori/perintah-perintah-dasar-mysql/bagian/20').'">Halaman Untuk Soal Ke 10</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'mysql-3'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Tipe Data Pada SQL (MySQL)</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/1').'">Tipe Data Pada MySQL</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/2').'">Atribut Tipe Data</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/3').'">Tipe Data Integer</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/4').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/5').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/6').'">Tipe Data Fixed Point atau Desimal</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/7').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/8').'">Tipe Data Floating Point (FLOAT & DOUBLE)</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/9').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/10').'">Tipe data CHAR dan VARCHAR</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            11. <?= $terakhir >= intval('11') ? '<a href="'.site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/11').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            12. <?= $terakhir >= intval('12') ? '<a href="'.site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/12').'">Halaman Untuk Soal Ke 6</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            13. <?= $terakhir >= intval('13') ? '<a href="'.site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/13').'">Tipe Data BINARY dan VARBINARY dalam MySQL</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            14. <?= $terakhir >= intval('14') ? '<a href="'.site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/14').'">Halaman Untuk Soal Ke 7</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            15. <?= $terakhir >= intval('15') ? '<a href="'.site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/15').'">Halaman Untuk Soal Ke 8</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            16. <?= $terakhir >= intval('16') ? '<a href="'.site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/16').'">Tipe Data TEXT</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            17. <?= $terakhir >= intval('17') ? '<a href="'.site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/17').'">Tipe Data BLOB</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            18. <?= $terakhir >= intval('18') ? '<a href="'.site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/18').'">Halaman Untuk Soal Ke 9</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            19. <?= $terakhir >= intval('19') ? '<a href="'.site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/19').'">Tipe Data DATE</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            20. <?= $terakhir >= intval('20') ? '<a href="'.site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/20').'">Halaman Untuk Soal Ke 10</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            21. <?= $terakhir >= intval('21') ? '<a href="'.site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/21').'">Halaman Untuk Soal Ke 11</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            22. <?= $terakhir >= intval('22') ? '<a href="'.site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/22').'">Halaman Untuk Soal Ke 12</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            23. <?= $terakhir >= intval('23') ? '<a href="'.site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/23').'">Halaman Untuk Soal Ke 13</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            24. <?= $terakhir >= intval('24') ? '<a href="'.site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/24').'">Halaman Untuk Soal Ke 14</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            25. <?= $terakhir >= intval('25') ? '<a href="'.site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/25').'">Halaman Untuk Soal Ke 15</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            26. <?= $terakhir >= intval('26') ? '<a href="'.site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/26').'">Tipe Data ENUM</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            27. <?= $terakhir >= intval('27') ? '<a href="'.site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/27').'">Halaman Untuk Soal Ke 16</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            28. <?= $terakhir >= intval('28') ? '<a href="'.site_url('belajar-mysql/teori/tipe-data-pada-mysql/bagian/28').'">Halaman Untuk Soal Ke 17</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'mysql-4'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">CRUD Pada SQL (MySQL)</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/1').'">CRUD MySQL</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/2').'">Fungsi dan Pengertian Primary Key</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/3').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/4').'">SELECT DISTINCT</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/5').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/6').'">SELECT dan LIMIT</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/7').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/8').'">SELECT dan ORDER BY</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/9').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/10').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            11. <?= $terakhir >= intval('11') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/11').'">SELECT WHERE</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            12. <?= $terakhir >= intval('12') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/12').'">Halaman Untuk Soal Ke 6</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            13. <?= $terakhir >= intval('13') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/13').'">Operator Perbandingan</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            14. <?= $terakhir >= intval('14') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/14').'">Halaman Untuk Soal Ke 7</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            15. <?= $terakhir >= intval('15') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/15').'">Halaman Untuk Soal Ke 8</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            16. <?= $terakhir >= intval('16') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/16').'">Halaman Untuk Soal Ke 9</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            17. <?= $terakhir >= intval('17') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/17').'">Operator BETWEEN</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            18. <?= $terakhir >= intval('18') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/18').'">Halaman Untuk Soal Ke 10</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            19. <?= $terakhir >= intval('19') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/19').'">Operator Logika</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            20. <?= $terakhir >= intval('20') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/20').'">Halaman Untuk Soal Ke 11</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            21. <?= $terakhir >= intval('21') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/21').'">Halaman Untuk Soal Ke 12</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            22. <?= $terakhir >= intval('22') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/22').'">Operator LIKE</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            23. <?= $terakhir >= intval('23') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/23').'">Halaman Untuk Soal Ke 13</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            24. <?= $terakhir >= intval('24') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/24').'">Halaman Untuk Soal Ke 14</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            25. <?= $terakhir >= intval('25') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/25').'">Perintah INSERT Untuk Menambah Data #1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            26. <?= $terakhir >= intval('26') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/26').'">Halaman Untuk Soal Ke 15</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            27. <?= $terakhir >= intval('27') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/27').'">Perintah INSERT Untuk Menambah Data #2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            28. <?= $terakhir >= intval('28') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/28').'">Halaman Untuk Soal Ke 16</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            29. <?= $terakhir >= intval('29') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/29').'">Memasukkan Lebih Dari 1 Baris Data Sekaligus</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            30. <?= $terakhir >= intval('30') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/30').'">Halaman Untuk Soal Ke 17</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            31. <?= $terakhir >= intval('31') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/31').'">Perintah UPDATE Untuk Mengubah Data</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            32. <?= $terakhir >= intval('32') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/32').'">Halaman Untuk Soal Ke 18</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            33. <?= $terakhir >= intval('33') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/33').'">Perintah DELETE Untuk Menghapus Baris Data</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            34. <?= $terakhir >= intval('34') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/34').'">Halaman Untuk Soal Ke 19</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            35. <?= $terakhir >= intval('35') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/35').'">Halaman Untuk Soal Ke 20</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            36. <?= $terakhir >= intval('36') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/36').'">Halaman Untuk Soal Ke 21</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            37. <?= $terakhir >= intval('37') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/37').'">Halaman Untuk Soal Ke 22</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            38. <?= $terakhir >= intval('38') ? '<a href="'.site_url('belajar-mysql/teori/create-read-update-delete-mysql/bagian/38').'">Kesimpulan CRUD</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'mysql-5'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Penggabungan Tabel Pada SQL (MySQL)</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-mysql/teori/penggabungan-tabel-pada-mysql/bagian/1').'">Persiapan</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-mysql/teori/penggabungan-tabel-pada-mysql/bagian/2').'">Penjelasan</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-mysql/teori/penggabungan-tabel-pada-mysql/bagian/3').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-mysql/teori/penggabungan-tabel-pada-mysql/bagian/4').'">INNER JOIN</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-mysql/teori/penggabungan-tabel-pada-mysql/bagian/5').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-mysql/teori/penggabungan-tabel-pada-mysql/bagian/6').'">LEFT JOIN</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-mysql/teori/penggabungan-tabel-pada-mysql/bagian/7').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-mysql/teori/penggabungan-tabel-pada-mysql/bagian/8').'">RIGHT JOIN</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-mysql/teori/penggabungan-tabel-pada-mysql/bagian/9').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-mysql/teori/penggabungan-tabel-pada-mysql/bagian/10').'">Menggabungkan Lebih Dari 2 Tabel</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            11. <?= $terakhir >= intval('11') ? '<a href="'.site_url('belajar-mysql/teori/penggabungan-tabel-pada-mysql/bagian/11').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'mysql-6'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Lebih Banyak Tentang SQL (MySQL)</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/1').'">Menambah atau Mengurangi Nilai Suatu Kolom</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/2').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/3').'">Mengganti Tampilan Nama Tabel & Kolom (Alias)</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/4').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/5').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/6').'">Operator Aritmatika</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/7').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/8').'">Cara Menyambungkan String</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/9').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/10').'">Fungsi MySQL Yang Sering Digunakan #1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            11. <?= $terakhir >= intval('11') ? '<a href="'.site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/11').'">Fungsi MySQL Yang Sering Digunakan #2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            12. <?= $terakhir >= intval('12') ? '<a href="'.site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/12').'">Fungsi MySQL Yang Sering Digunakan #3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            13. <?= $terakhir >= intval('13') ? '<a href="'.site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/13').'">Halaman Untuk Soal Ke 6</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            14. <?= $terakhir >= intval('14') ? '<a href="'.site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/14').'">Halaman Untuk Soal Ke 7</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            15. <?= $terakhir >= intval('15') ? '<a href="'.site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/15').'">Halaman Untuk Soal Ke 8</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            16. <?= $terakhir >= intval('16') ? '<a href="'.site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/16').'">Halaman Untuk Soal Ke 9</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            17. <?= $terakhir >= intval('17') ? '<a href="'.site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/17').'">Halaman Untuk Soal Ke 10</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            18. <?= $terakhir >= intval('18') ? '<a href="'.site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/18').'">Halaman Untuk Soal Ke 11</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            19. <?= $terakhir >= intval('19') ? '<a href="'.site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/19').'">Halaman Untuk Soal Ke 12</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            20. <?= $terakhir >= intval('20') ? '<a href="'.site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/20').'">Halaman Untuk Soal Ke 13</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            21. <?= $terakhir >= intval('21') ? '<a href="'.site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/21').'">Halaman Untuk Soal Ke 14</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            22. <?= $terakhir >= intval('22') ? '<a href="'.site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/22').'">Halaman Untuk Soal Ke 15</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            23. <?= $terakhir >= intval('23') ? '<a href="'.site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/23').'">Halaman Untuk Soal Ke 16</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            24. <?= $terakhir >= intval('24') ? '<a href="'.site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/24').'">Pengertian dan Cara Penggunaan VIEW</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            25. <?= $terakhir >= intval('25') ? '<a href="'.site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/25').'">Halaman Untuk Soal Ke 17</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            26. <?= $terakhir >= intval('26') ? '<a href="'.site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/26').'">Fungsi IF</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            27. <?= $terakhir >= intval('27') ? '<a href="'.site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/27').'">Halaman Untuk Soal Ke 18</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            28. <?= $terakhir >= intval('28') ? '<a href="'.site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/28').'">Fungsi CASE</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            29. <?= $terakhir >= intval('29') ? '<a href="'.site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/29').'">Halaman Untuk Soal Ke 19</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            30. <?= $terakhir >= intval('30') ? '<a href="'.site_url('belajar-mysql/teori/lebih-banyak-tentang-mysql/bagian/30').'">Seruyaa Belajar MySQL</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'javascript-1'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Berkenalan Dengan JavaScript</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-javascript/teori/berkenalan-dengan-javascript/bagian/1').'">Pengertian JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-javascript/teori/berkenalan-dengan-javascript/bagian/2').'">Sejarah JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-javascript/teori/berkenalan-dengan-javascript/bagian/3').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-javascript/teori/berkenalan-dengan-javascript/bagian/4').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-javascript/teori/berkenalan-dengan-javascript/bagian/5').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-javascript/teori/berkenalan-dengan-javascript/bagian/6').'">Fungsi dan Keunggulan JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-javascript/teori/berkenalan-dengan-javascript/bagian/7').'">Contoh Kode JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'javascript-2'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Aturan Penulisan Kode di JavaScript</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-javascript/teori/aturan-penulisan-kode-di-javascript/bagian/1').'">Aturan Penulisan kode di JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-javascript/teori/aturan-penulisan-kode-di-javascript/bagian/2').'">Case Sensitivity</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-javascript/teori/aturan-penulisan-kode-di-javascript/bagian/3').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-javascript/teori/aturan-penulisan-kode-di-javascript/bagian/4').'">Whitespace</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-javascript/teori/aturan-penulisan-kode-di-javascript/bagian/5').'">Reserved Words di JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-javascript/teori/aturan-penulisan-kode-di-javascript/bagian/6').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-javascript/teori/aturan-penulisan-kode-di-javascript/bagian/7').'">Penulisan Tanda Semicolon pada Akhir Baris</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'javascript-3'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Dasar JavaScript</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-javascript/teori/dasar-javascript/bagian/1').'">Komentar di JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-javascript/teori/dasar-javascript/bagian/2').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-javascript/teori/dasar-javascript/bagian/3').'">Variabel pada JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-javascript/teori/dasar-javascript/bagian/4').'">Cara Membuat Variabel di JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-javascript/teori/dasar-javascript/bagian/5').'">Memanggil atau Menampilkan Isi Variabel</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-javascript/teori/dasar-javascript/bagian/6').'">Mengubah (Mengisi Ulang) Variabel</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-javascript/teori/dasar-javascript/bagian/7').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-javascript/teori/dasar-javascript/bagian/8').'">Aturan Penulisan Variabel di JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-javascript/teori/dasar-javascript/bagian/9').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-javascript/teori/dasar-javascript/bagian/10').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'javascript-4'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Tipe Data Pada JavaScript</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/1').'">Tipe Data Pada JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/2').'">Tipe Data Integer</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/3').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/4').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/5').'">Tipe Data Float</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/6').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/7').'">Tipe Data String</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/8').'">Karakter Khusus String (Escape Sequences)</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/9').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/10').'">Operator (+) untuk operasi String pada JS</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            11. <?= $terakhir >= intval('11') ? '<a href="'.site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/11').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            12. <?= $terakhir >= intval('12') ? '<a href="'.site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/12').'">Halaman Untuk Soal Ke 6</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            13. <?= $terakhir >= intval('13') ? '<a href="'.site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/13').'">Halaman Untuk Soal Ke 7</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            14. <?= $terakhir >= intval('14') ? '<a href="'.site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/14').'">Tipe Data Boolean</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            15. <?= $terakhir >= intval('15') ? '<a href="'.site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/15').'">Halaman Untuk Soal Ke 8</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            16. <?= $terakhir >= intval('16') ? '<a href="'.site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/16').'">Tipe Data null Pada JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            17. <?= $terakhir >= intval('17') ? '<a href="'.site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/17').'">Tipe Data undefined Pada JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            18. <?= $terakhir >= intval('18') ? '<a href="'.site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/18').'">Tipe Data NaN Pada JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            19. <?= $terakhir >= intval('19') ? '<a href="'.site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/19').'">Halaman Untuk Soal Ke 9</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            20. <?= $terakhir >= intval('20') ? '<a href="'.site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/20').'">Halaman Untuk Soal Ke 10</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            21. <?= $terakhir >= intval('21') ? '<a href="'.site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/21').'">Halaman Untuk Soal Ke 11</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            22. <?= $terakhir >= intval('22') ? '<a href="'.site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/22').'">Array pada JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            23. <?= $terakhir >= intval('23') ? '<a href="'.site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/23').'">Array di dalam Array</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            24. <?= $terakhir >= intval('24') ? '<a href="'.site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/24').'">Halaman Untuk Soal Ke 12</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            25. <?= $terakhir >= intval('25') ? '<a href="'.site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/25').'">Halaman Untuk Soal Ke 13</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            26. <?= $terakhir >= intval('26') ? '<a href="'.site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/26').'">Halaman Untuk Soal Ke 14</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            27. <?= $terakhir >= intval('27') ? '<a href="'.site_url('belajar-javascript/teori/tipe-data-pada-javascript/bagian/27').'">Object (objek) pada JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'javascript-5'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Function dan Object Pada JavaScript</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/1').'">Pengertian Fungsi (Function) Pada JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/2').'">Fungsi (Function) Pada JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/3').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/4').'">Fungsi Yang Megembalikan Nilai</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/5').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/6').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/7').'">Objek (Object) Pada JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/8').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/9').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/10').'">Halaman Untuk Soal Ke 6</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            11. <?= $terakhir >= intval('11') ? '<a href="'.site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/11').'">Halaman Untuk Soal Ke 7</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            12. <?= $terakhir >= intval('12') ? '<a href="'.site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/12').'">Halaman Untuk Soal Ke 8</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            13. <?= $terakhir >= intval('13') ? '<a href="'.site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/13').'">Halaman Untuk Soal Ke 9</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            14. <?= $terakhir >= intval('14') ? '<a href="'.site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/14').'">Method dengan Parameter pada Objek JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            15. <?= $terakhir >= intval('15') ? '<a href="'.site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/15').'">Menggunakan Kata Kunci "this"</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            16. <?= $terakhir >= intval('16') ? '<a href="'.site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/16').'">Halaman Untuk Soal Ke 10</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            17. <?= $terakhir >= intval('17') ? '<a href="'.site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/17').'">Constructor Function</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            18. <?= $terakhir >= intval('18') ? '<a href="'.site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/18').'">Halaman Untuk Soal Ke 11</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            19. <?= $terakhir >= intval('19') ? '<a href="'.site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/19').'">Mengubah Nilai Property pada Objek</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            20. <?= $terakhir >= intval('20') ? '<a href="'.site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/20').'">Halaman Untuk Soal Ke 12</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            21. <?= $terakhir >= intval('21') ? '<a href="'.site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/21').'">Halaman Untuk Soal Ke 13</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            22. <?= $terakhir >= intval('22') ? '<a href="'.site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/22').'">Halaman Untuk Soal Ke 14</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            23. <?= $terakhir >= intval('23') ? '<a href="'.site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/23').'">Halaman Untuk Soal Ke 15</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            24. <?= $terakhir >= intval('24') ? '<a href="'.site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/24').'">Halaman Untuk Soal Ke 16</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            25. <?= $terakhir >= intval('25') ? '<a href="'.site_url('belajar-javascript/teori/function-dan-object-pada-javascript/bagian/25').'">Kesimpulan</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'javascript-6'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Kondisi Dan Perulangan Pada JavaScript</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/1').'">Kondisi (Percabangan) (if, else if, else)</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/2').'">Kondisi (Percabangan) (switch case)</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/3').'">Operator Yang Sering Digunakan Di Percabangan</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/4').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/5').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/6').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/7').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/8').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/9').'">Halaman Untuk Soal Ke 6</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/10').'">Halaman Untuk Soal Ke 7</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            11. <?= $terakhir >= intval('11') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/11').'">Halaman Untuk Soal Ke 8</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            12. <?= $terakhir >= intval('12') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/12').'">Halaman Untuk Soal Ke 9</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            13. <?= $terakhir >= intval('13') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/13').'">Halaman Untuk Soal Ke 10</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            14. <?= $terakhir >= intval('14') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/14').'">Halaman Untuk Soal Ke 11</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            15. <?= $terakhir >= intval('15') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/15').'">Halaman Untuk Soal Ke 12</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            16. <?= $terakhir >= intval('16') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/16').'">Halaman Untuk Soal Ke 13</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            17. <?= $terakhir >= intval('17') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/17').'">Halaman Untuk Soal Ke 14</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            18. <?= $terakhir >= intval('18') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/18').'">Halaman Untuk Soal Ke 15</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            19. <?= $terakhir >= intval('19') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/19').'">Perulangan Pada JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            20. <?= $terakhir >= intval('20') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/20').'">Perulangan for Pada JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            21. <?= $terakhir >= intval('21') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/21').'">Halaman Untuk Soal Ke 16</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            22. <?= $terakhir >= intval('22') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/22').'">Perulangan while Pada JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            23. <?= $terakhir >= intval('23') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/23').'">Perulangan do while Pada JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            24. <?= $terakhir >= intval('24') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/24').'">Halaman Untuk Soal Ke 17</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            25. <?= $terakhir >= intval('25') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/25').'">Halaman Untuk Soal Ke 18</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            26. <?= $terakhir >= intval('26') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/26').'">Perulangan forEach Pada JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            27. <?= $terakhir >= intval('27') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/27').'">Halaman Untuk Soal Ke 19</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            28. <?= $terakhir >= intval('28') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/28').'">Halaman Untuk Soal Ke 20</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            29. <?= $terakhir >= intval('29') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/29').'">Halaman Untuk Soal Ke 21</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            30. <?= $terakhir >= intval('30') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/30').'">Fungsi break dan continue Pada Perulangan</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            31. <?= $terakhir >= intval('31') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/31').'">Halaman Untuk Soal Ke 22</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            32. <?= $terakhir >= intval('32') ? '<a href="'.site_url('belajar-javascript/teori/kondisi-dan-perulangan-pada-javascript/bagian/32').'">Perulangan Bersarang (Nested Loop)</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'javascript-7'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Lebih Banyak Tentang String Di JavaScript</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/1').'">Template Literal atau Template String</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/2').'">Multiple-line String</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/3').'">Expression Interpolation</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/4').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/5').'">Tagged Template Literal</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/6').'">Menghitung Jumlah Karakter pada String</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/7').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/8').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/9').'">Menemukan Letak Index String</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/10').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            11. <?= $terakhir >= intval('11') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/11').'">Menyaring atau Memotong String</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            12. <?= $terakhir >= intval('12') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/12').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            13. <?= $terakhir >= intval('13') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/13').'">Halaman Untuk Soal Ke 6</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            14. <?= $terakhir >= intval('14') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/14').'">Fungsi toLowerCase dan toUpperCase</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            15. <?= $terakhir >= intval('15') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/15').'">Halaman Untuk Soal Ke 7</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            16. <?= $terakhir >= intval('16') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/16').'">Menggabungkan String</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            17. <?= $terakhir >= intval('17') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/17').'">Halaman Untuk Soal Ke 8</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            18. <?= $terakhir >= intval('18') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/18').'">Menghapus Spasi Awal dan Akhir Pada String</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            19. <?= $terakhir >= intval('19') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/19').'">Method startsWith, endsWith & includes</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            20. <?= $terakhir >= intval('20') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/20').'">Halaman Untuk Soal Ke 9</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            21. <?= $terakhir >= intval('21') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/21').'">Halaman Untuk Soal Ke 10</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            22. <?= $terakhir >= intval('22') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/22').'">Halaman Untuk Soal Ke 11</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            23. <?= $terakhir >= intval('23') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/23').'">Halaman Untuk Soal Ke 12</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            24. <?= $terakhir >= intval('24') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/24').'">Halaman Untuk Soal Ke 13</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            25. <?= $terakhir >= intval('25') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/25').'">Halaman Untuk Soal Ke 14</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            26. <?= $terakhir >= intval('26') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/26').'">Mengganti atau Mengubah String</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            27. <?= $terakhir >= intval('27') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/27').'">Halaman Untuk Soal Ke 15</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            28. <?= $terakhir >= intval('28') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/28').'">Method toString()</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            29. <?= $terakhir >= intval('29') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-string-di-javascript/bagian/29').'">Kesimpulan</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'javascript-8'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Lebih Banyak Tentang Array Dan Object Di JS</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/1').'">Mengolah dan Mengelola array di JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/2').'">Method unshift() dan shift()</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/3').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/4').'">Method push() dan pop()</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/5').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/6').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/7').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/8').'">Method concat()</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/9').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/10').'">Method sort()</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            11. <?= $terakhir >= intval('11') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/11').'">Method reverse()</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            12. <?= $terakhir >= intval('12') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/12').'">Halaman Untuk Soal Ke 6</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            13. <?= $terakhir >= intval('13') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/13').'">Method slice()</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            14. <?= $terakhir >= intval('14') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/14').'">Method splice()</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            15. <?= $terakhir >= intval('15') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/15').'">Halaman Untuk Soal Ke 7</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            16. <?= $terakhir >= intval('16') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/16').'">Halaman Untuk Soal Ke 8</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            17. <?= $terakhir >= intval('17') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/17').'">Halaman Untuk Soal Ke 9</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            18. <?= $terakhir >= intval('18') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/18').'">Halaman Untuk Soal Ke 10</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            19. <?= $terakhir >= intval('19') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/19').'">Halaman Untuk Soal Ke 11</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            20. <?= $terakhir >= intval('20') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/20').'">Halaman Untuk Soal Ke 12</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            21. <?= $terakhir >= intval('21') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/21').'">Method indexOf()</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            22. <?= $terakhir >= intval('22') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/22').'">Halaman Untuk Soal Ke 13</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            23. <?= $terakhir >= intval('23') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/23').'">Halaman Untuk Soal Ke 14</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            24. <?= $terakhir >= intval('24') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/24').'">Halaman Untuk Soal Ke 15</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            25. <?= $terakhir >= intval('25') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/25').'">Halaman Untuk Soal Ke 16</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            26. <?= $terakhir >= intval('26') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/26').'">JSON (JavaScript Object Notation)</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            27. <?= $terakhir >= intval('27') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/27').'">Contoh Data Kompleks di JSON</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            28. <?= $terakhir >= intval('28') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/28').'">Halaman Untuk Soal Ke 17</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            29. <?= $terakhir >= intval('29') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/29').'">Halaman Untuk Soal Ke 18</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            30. <?= $terakhir >= intval('30') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-array-dan-object-di-javascript/bagian/30').'">Kesimpulan</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php elseif ($flagModalMenu == 'javascript-9'): ?>
  <div class="modal fade" id="modalMenu" tabindex="-1" role="dialog" aria-labelledby="modalMenuLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalMenuLabel">Lebih Banyak Tentang JavaScript</h5>
        </div>
        <div class="modal-body">
          <p class="mb-1">
            01. <?= $terakhir >= intval('01') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/1').'">Keyword var, let dan const</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            02. <?= $terakhir >= intval('02') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/2').'">Halaman Untuk Soal Ke 1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            03. <?= $terakhir >= intval('03') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/3').'">Halaman Untuk Soal Ke 2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            04. <?= $terakhir >= intval('04') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/4').'">Halaman Untuk Soal Ke 3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            05. <?= $terakhir >= intval('05') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/5').'">Halaman Untuk Soal Ke 4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            06. <?= $terakhir >= intval('06') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/6').'">Penggunaan Tanggal dan Waktu pada JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            07. <?= $terakhir >= intval('07') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/7').'">Halaman Untuk Soal Ke 5</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            08. <?= $terakhir >= intval('08') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/8').'">Penggunaan Tanggal dan Waktu pada JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            09. <?= $terakhir >= intval('09') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/9').'">Macam Gaya Penulisan Fungsi di JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            10. <?= $terakhir >= intval('10') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/10').'">Halaman Untuk Soal Ke 6</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            11. <?= $terakhir >= intval('11') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/11').'">Destructuring Assignment</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            12. <?= $terakhir >= intval('12') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/12').'">Halaman Untuk Soal Ke 7</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            13. <?= $terakhir >= intval('13') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/13').'">Halaman Untuk Soal Ke 8</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            14. <?= $terakhir >= intval('14') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/14').'">Halaman Untuk Soal Ke 9</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            15. <?= $terakhir >= intval('15') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/15').'">Spread Operator</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            16. <?= $terakhir >= intval('16') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/16').'">Halaman Untuk Soal Ke 10</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            17. <?= $terakhir >= intval('17') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/17').'">Halaman Untuk Soal Ke 11</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            18. <?= $terakhir >= intval('18') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/18').'">Mengenal Object "Math" pada JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            19. <?= $terakhir >= intval('19') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/19').'">Fungsi atau Method pada Object "Math" #1</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            20. <?= $terakhir >= intval('20') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/20').'">Halaman Untuk Soal Ke 12</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            21. <?= $terakhir >= intval('21') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/21').'">Fungsi atau Method pada Object "Math" #2</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            22. <?= $terakhir >= intval('22') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/22').'">Halaman Untuk Soal Ke 13</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            23. <?= $terakhir >= intval('23') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/23').'">Fungsi atau Method pada Object "Math" #3</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            24. <?= $terakhir >= intval('24') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/24').'">Fungsi atau Method pada Object "Math" #4</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            25. <?= $terakhir >= intval('25') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/25').'">Halaman Untuk Soal Ke 14</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            26. <?= $terakhir >= intval('26') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/26').'">Halaman Untuk Soal Ke 15</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            27. <?= $terakhir >= intval('27') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/27').'">Halaman Untuk Soal Ke 16</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            28. <?= $terakhir >= intval('28') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/28').'">Halaman Untuk Soal Ke 17</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            29. <?= $terakhir >= intval('29') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/29').'">Halaman Untuk Soal Ke 18</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            30. <?= $terakhir >= intval('30') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/30').'">Halaman Untuk Soal Ke 19</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            31. <?= $terakhir >= intval('31') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/31').'">Mencari Nilai Minimal dan Maksimal</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            32. <?= $terakhir >= intval('32') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/32').'">Rest Parameter</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            33. <?= $terakhir >= intval('33') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/33').'">Halaman Untuk Soal Ke 20</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            34. <?= $terakhir >= intval('34') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/34').'">Operator Assignment</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            35. <?= $terakhir >= intval('35') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/35').'">Halaman Untuk Soal Ke 21</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            36. <?= $terakhir >= intval('36') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/36').'">Halaman Untuk Soal Ke 22</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-1">
            37. <?= $terakhir >= intval('37') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/37').'">Fungsi Rekursif pada JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
          <p class="mb-0">
            38. <?= $terakhir >= intval('38') ? '<a href="'.site_url('belajar-javascript/teori/lebih-banyak-tentang-javascript/bagian/38').'">Mantapyaa Belajar JavaScript</a>' : '<i class="fas fa-lock fa-fw" aria-hidden="true"></i>'; ?>
          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary btn-block" data-dismiss="modal">TUTUP</button>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<button data-target="#modalMenu" data-toggle="modal" class="tombolModalMenu">
  <center>
    <i class="fas fa-list"></i>
  </center>
</button>
<div class="kc_fab_wrapper"></div>
<footer>
  <div class="footer-belajar"><span data-toggle='tooltip' title="All Rights Reserved" style="cursor: default;">&copy; 2019 - <?= date('Y'); ?> Muhammad Saleh Solahudin</span></div>
</footer>
<div class="modal fade" id="pencapaianModal" tabindex="-1" role="dialog" aria-labelledby="pencapaianModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pencapaianModalLabel">Pencapaian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="tutup-pencapaian">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="isi-pencapaian"></div>
      <div class="modal-footer" id="kaki-pencapaian">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Oke, mantap</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="sertifikatModal" tabindex="-1" role="dialog" aria-labelledby="sertifikatModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sertifikatModalLabel">Sertifikat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="tutup-sertifikat">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="isi-sertifikat"></div>
      <div class="modal-footer" id="kaki-sertifikat">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Oke, mantap</button>
      </div>
    </div>
  </div>
</div>