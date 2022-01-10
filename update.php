<?php
require __DIR__ . '/users/users.php';
if (!isset($_GET['id'])) {
    include './partials/not_found.php';
    exit;
}
$userId = $_GET['id'];
$user = getUsersById($userId);
if (!$user) {
    include './partials/not_found.php';
    exit;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = updateUsers($_POST, $userId);
    uploadImage($_FILES['picture'], $user);
    header('Location: ./index.php');
}
include './partials/header.php';
?>

           <?php include './_form.php' ?>

<?php include './partials/footer.php'; ?>