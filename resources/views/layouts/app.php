<?php

declare(strict_types=1);

if (!isset($content)) {
    exit('Content view not found.');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

<?php require BASE_PATH . '/resources/views/layouts/navbar.php'; ?>

</head>

<body>

<?php require BASE_PATH . '/resources/views/layouts/sidebar.php'; ?>

<div class="main-wrapper">

    <?php require $content; ?>

</div>

<?php require BASE_PATH . '/resources/views/layouts/footer.php'; ?>

</body>

</html>