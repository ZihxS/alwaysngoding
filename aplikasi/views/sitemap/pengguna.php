<?= '<?xml version="1.0" encoding="UTF-8" ?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
	<url>
    <loc><?= site_url("anggota/semua"); ?></loc>
    <lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
    <priority>0.3</priority>
    <changefreq>hourly</changefreq>
  </url>
	<?php foreach ($data as $hasil): ?>
    <url>
      <loc><?= str_replace(' ', '', site_url("anggota/{$hasil->nama_pengguna}")); ?></loc>
      <lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
      <priority>0.2</priority>
      <changefreq>hourly</changefreq>
    </url>
    <url>
      <loc><?= str_replace(' ', '', site_url("anggota/{$hasil->nama_pengguna}/artikel")); ?></loc>
      <lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
      <priority>0.2</priority>
      <changefreq>hourly</changefreq>
    </url>
    <url>
      <loc><?= str_replace(' ', '', site_url("anggota/{$hasil->nama_pengguna}/diskusi")); ?></loc>
      <lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
      <priority>0.2</priority>
      <changefreq>hourly</changefreq>
    </url>
    <url>
      <loc><?= str_replace(' ', '', site_url("anggota/{$hasil->nama_pengguna}/lowongan-kerja")); ?></loc>
      <lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
      <priority>0.2</priority>
      <changefreq>hourly</changefreq>
    </url>
    <?php if ($hasil->level == 'anggota'): ?>
      <url>
        <loc><?= str_replace(' ', '', site_url("anggota/{$hasil->nama_pengguna}/pencapaian")); ?></loc>
        <lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
        <priority>0.2</priority>
        <changefreq>hourly</changefreq>
      </url>
      <url>
        <loc><?= str_replace(' ', '', site_url("anggota/{$hasil->nama_pengguna}/sertifikat")); ?></loc>
        <lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
        <priority>0.2</priority>
        <changefreq>hourly</changefreq>
      </url>
    <?php endif; ?>
	<?php endforeach; ?>
</urlset>