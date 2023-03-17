<a class="m-0 fs-3 text-decoration-none text-light" href="<?= ROOT_PATH ?>/home">Allo Cine Wish</a>
<form class="d-flex m-0 px-5" action="<?= ROOT_PATH ?>/research" method="GET">
    <input class="me-1 border border-1 rounded border-dark px-3 py-2" name="research" type="text" maxlength="<?= MAX_RESEARCH_LENGTH ?>" placeholder="Rechercher un film..." required>
    <input class="border border-1 rounded border-dark px-3 py-2 bg-secondary text-light" type="submit" value="Rechercher">
</form>