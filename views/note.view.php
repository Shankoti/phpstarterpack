<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
    <p class="mb-6">
    <a href="/notes" class="text-blue-500 hover:underline ">go back...</a>
    </p>
    <p><?= htmlspecialchars($note['body'])  ?></p>

    <form class="mt-6 text-blue-500" method="POST">
        <inpu name="id" type="hidden" value="<?= $note['id']?>" >
        <button type="submit">Delete</button>
    </form>
    </div>
</main>

<?php require('partials/footer.php') ?>
