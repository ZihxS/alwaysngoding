<?php foreach (['google-site-verification' => 'GOOGLE_SITE_VERIFICATION', 'msvalidate.01' => 'BING_SITE_VERIFICATION'] as $name => $key): ?>
  <?php $verification_token = ang_env_value($key); ?>
  <?php if ($verification_token !== ''): ?>
    <meta name="<?= $name; ?>" content="<?= htmlspecialchars($verification_token, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8'); ?>">
  <?php endif; ?>
<?php endforeach; ?>
