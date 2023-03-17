<!DOCTYPE html>
<html lang="fr">
<head>
    <?php require_once(DOCUMENT_ROOT.'/views/head.php') ?>
</head>
<body>
    <header class="d-flex align-items-center p-4 bg-dark text-light">
        <?php require_once(DOCUMENT_ROOT.'/views/header.php') ?>
    </header>
    <main class="container-fluid p-5 bg-light text-dark">
        <?= $mainContent ?>
    </main>
    <footer class="p-4 bg-dark text-light">
        <?php require_once(DOCUMENT_ROOT.'/views/footer.php') ?>
    </footer>
</body>
</html>