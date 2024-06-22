<?php
ob_start();
require_once '../vendor/autoload.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://cdn.discordapp.com/attachments/1089470162601771028/1252112063984304168/Screenshot_2024-06-17_120555-modified.png?ex=667107bb&is=666fb63b&hm=699303144cbd9c9390c8583b0aac80ec8c891bfc33752b9a86595362cd26293d&" type="image/x-icon">
    <title>BACKEND WEB</title>
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="../output.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>
<body>
    <?php require_once 'partials/header.php'; ?>
    <main>
        <?php
        if (isset($_SESSION['error'])) {
            echo '<div role="alert" class="rounded border-s-4 border-red-500 bg-red-50 p-4 fixed z-50 right-2 bottom-2">
                    <strong class="block font-medium text-red-800">' . htmlspecialchars($_SESSION['error']['title']) . '</strong>
                    <p class="mt-2 text-sm text-red-700">' . htmlspecialchars($_SESSION['error']['message']) . '</p>
                  </div>';
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
            echo '<div role="alert" class="rounded border-s-4 border-green-500 bg-green-50 p-4 fixed z-50 right-2 bottom-2">
                    <strong class="block font-medium text-green-800">' . htmlspecialchars($_SESSION['success']['title']) . '</strong>
                    <p class="mt-2 text-sm text-green-700">' . htmlspecialchars($_SESSION['success']['message']) . '</p>
                  </div>';
            unset($_SESSION['success']);
        }
        $router = require_once '../routes/index.php';
        ?>
    </main>
    <?php require_once 'partials/footer.php'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="app.js"></script>
</body>
</html>
<?php
ob_end_flush();
?>
