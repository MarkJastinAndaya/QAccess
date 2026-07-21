<?php

use App\Core\Database;

try {
    Database::connection();

    $status = "Connected Successfully";
} catch (Throwable $e) {
    $status = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>QAcess</title>
</head>
<body>

<h1>QAcess</h1>

<p><?= htmlspecialchars($status) ?></p>

</body>
</html>