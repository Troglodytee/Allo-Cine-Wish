<div class="col-12 col-sm-6 col-lg-4 col-xl-3 p-4">
    <a class="text-decoration-none text-dark" href="<?= ROOT_PATH ?>/movie?id=<?= $movie['id'] ?>">
        <img class="mb-1 w-100" src="<?= API_SMALL_IMAGES_PATH.$movie['poster_path'] ?>" alt="Poster de <?= $movie['title'] ?>">
        <p class="mb-1 fs-6">Note : <?= $movie['vote_average'] ?>/10 (<?= $movie['vote_count'] ?> avis)</p>
        <p class="mb-1 fs-6"><?= substr($movie['release_date'], 8) ?>/<?= substr($movie['release_date'], 5, 2) ?>/<?= substr($movie['release_date'], 0, 4) ?></p>
        <p class="mb-0 fs-4 text-center"><?= $movie['title'] ?></p>
    </a>
</div>