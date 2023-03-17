<section class="py-5">
    <h1 class="mb-5 text-center"><?= $movie['title'] ?></h1>
    <div class="m-auto mb-5" style="width: fit-content;">
        <img class="max-vw-100" style="max-height: 75vh;" src="<?= API_ORIGINAL_IMAGES_PATH.$movie['poster_path'] ?>" alt="Poster de <?= $movie['title'] ?>">
    </div>
    <h2 class="mb-3 text-center">Synopsis :</h2>
    <p class="mb-5 fs-4"><?= $movie['overview'] ?></p>
    <h2 class="mb-3 text-center">Date de sortie :</h2>
    <p class="mb-5 fs-2 text-center"><?= substr($movie['release_date'], 8) ?>/<?= substr($movie['release_date'], 5, 2) ?>/<?= substr($movie['release_date'], 0, 4) ?></p>
    <h2 class="mb-3 text-center">Note :</h2>
    <p class="mb-5 fs-2 text-center"><?= $movie['vote_average'] ?>/10 (<?= $movie['vote_count'] ?> avis)</p>
    <h2 class="mb-3 text-center">Genres :</h2>
    <div class="d-flex flex-wrap gap-3 justify-content-center">
        <?php
            foreach ($movie['genres'] as $genre) {
                if (key_exists($genre['id'], GENRE_COLORS)) {$color = GENRE_COLORS[$genre['id']];}
                else {$color = ['ffffff', '000000'];}
                echo <<<END
                    <span class="border border-1 rounded border-dark px-2 py-1 fs-4" style="background-color: #{$color[0]}; color: #{$color[1]};">{$genre['name']}</span>
                END;
            }
        ?>
    </div>
</section>