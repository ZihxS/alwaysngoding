<?= '<?xml version="1.0" encoding="UTF-8" ?>'; ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/siteindex.xsd">
	<sitemap>
		<loc><?= site_url('sitemap-umum.xml'); ?></loc>
		<lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
	</sitemap>
	<sitemap>
		<loc><?= site_url('sitemap-artikel.xml'); ?></loc>
		<lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
	</sitemap>
	<sitemap>
		<loc><?= site_url('sitemap-diskusi.xml'); ?></loc>
		<lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
	</sitemap>
	<sitemap>
		<loc><?= site_url('sitemap-pengguna.xml'); ?></loc>
		<lastmod><?= $_SERVER['SITEMAP_LASTMOD']; ?></lastmod>
	</sitemap>
</sitemapindex>