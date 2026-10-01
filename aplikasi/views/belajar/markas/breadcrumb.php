<nav aria-label="breadcrumb" id="__init__" class="nav-breadcrumb nav-mt-10">
  <div class="container">
    <ol class="breadcrumb breadcrumb-belajar" id="__init__">
      <li class="breadcrumb-item"><a href="<?= site_url('belajar'); ?>">Belajar</a></li>
      <li class="breadcrumb-item">
        <a href="<?= site_url("belajar-${bahasa}/teori"); ?>">
          <?= str_replace('Php','PHP',str_replace('Css','CSS',str_replace('Html','HTML',str_replace('Teori ','',$label)))); ?>
        </a>
      </li>
      <li class="breadcrumb-item active" aria-current="page"><?= $x; ?></li>
    </ol>
  </div>
</nav>