<?php $google_analytics_id = ang_env_value('GOOGLE_ANALYTICS_ID'); ?>
<?php if ($google_analytics_id !== ''): ?>
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?= rawurlencode($google_analytics_id); ?>"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', <?= json_encode($google_analytics_id, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>);
  </script>
<?php endif; ?>
