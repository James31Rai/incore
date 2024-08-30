<?php require base_path('views/partials/header.php') ?>

<?php require base_path('views/partials/nav.php') ?>

<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <?php
        if ($_SESSION['user'] ?? false) {
            echo '<p>Welcome ' . $_SESSION['user']['name'] . '</p>';
        } else {
            echo '<p>Hello, Welcome to Home page.</p>';
            echo '<a href="/login" class="text-blue-500 underline">LogIn</a>';
        }
        ?>
    </div>
</main>

<?php require base_path('views/partials/footer.php') ?>