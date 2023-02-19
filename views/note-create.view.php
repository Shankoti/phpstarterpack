<?php require('partials/head.php') ?>
<?php require('partials/nav.php') ?>
<?php require('partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <form method="POST">
        <label for="body">Description</label>
        <div>
            <textarea  name="body"></textarea>
            </div>
            <p>
                <button type="submit">Add</button>

            </p>

        </form>
        <h1><?= $_POST['body'] != null ? $_POST['body'] : "" ?> </h1>
        <?php if(isset($errors['body'])) : ?>
            <p class="text-red-500"><?= $errors['body'] ?></p>
            <?php endif ; ?>
    </div>
</main>

<?php require('partials/footer.php') ?>
