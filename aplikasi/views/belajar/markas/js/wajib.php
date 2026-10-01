<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="<?= base_url('perpustakaan/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<?php if ($sa): ?>
	<script src="<?= base_url('perpustakaan/bsb/plugins/sweetalert/sweetalert.min.js'); ?>"></script>
<?php endif; ?>
<?php if ($s): ?>
	<script src="<?= base_url('perpustakaan/slip/slip.js'); ?>"></script>
<?php endif; ?>
<?php if ($p): ?>
	<script src="<?= base_url('perpustakaan/prism/prism.js'); ?>"></script>
<?php endif; ?>
<script src="<?= base_url('perpustakaan/fab/fab.min.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/aplikasi/website.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/aplikasi/belajar.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/socket/socket.io.js'); ?>"></script>
<script src="<?= base_url('perpustakaan/aplikasi/app.js'); ?>"></script>
<script>
	const __ip__ = "<?= $this->ang->ambil_alamat_ip(); ?>";
  const __np__ = "<?= $this->session->ang_nama_pengguna; ?>";
  <?php if ($_SERVER['CI_ENV'] == 'development'): ?>
  	let sckt = io.connect(<?= json_encode($_SERVER['ANG_SOCKET'], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>);
	<?php else: ?>
		<?php if ($_SERVER['ANG_SOCKET'] != $_ENV['ANG_SOCKET_TRANSPORT_POLLING_URL']): ?>
			let sckt = io.connect(`<?= $_SERVER['ANG_SOCKET']; ?>`);
		<?php else: ?>
			let sckt = io.connect(`<?= $_SERVER['ANG_SOCKET']; ?>`, {transports: ['polling']});
		<?php endif; ?>
	<?php endif; ?>
</script>
