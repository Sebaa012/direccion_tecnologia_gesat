<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $titulo ?? 'DTIC' ?></title>
    <!-- Bootstrap CSS -->
    <style>
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    main {
        flex: 1;
    }
    </style>
    <link href="<?= base_url('css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('css/all.min.css') ?>" rel="stylesheet">
</head>

<body class="bg-light">

    <?php if (session()->get('rol') != null) { ?>
        <?= $this->include('Layout/navbar') ?>
        
    <?php } ?>
   
<main>
        <?= $this->renderSection('content') ?>
    </main>
<?= $this->include('Layout/footer') ?>
    