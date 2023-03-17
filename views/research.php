<section class="py-5">
    <h1 class="mb-5 text-center"><?= $response['total_results'] ?> Résultats pour la recherche "<?= $_GET['research'] ?>"</h1>
    <div class="row mb-5">
        <?= $movies ?>
    </div>
    <?= $pagination ?>
</section>