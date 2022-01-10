<?php
require __DIR__ . '/users/users.php';
include './partials/header.php';
$user = [
    'id' => '',
    'name' => '',
    'username' => '',
    'email' => '',
    'phone' => '',
    'website' => '',
    'name' => '',
];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = createUsers($_POST);
    uploadImage($_FILES['picture'], $user);
    header('Location: ./index.php');
}
?>
<?php include './_form.php' ?>