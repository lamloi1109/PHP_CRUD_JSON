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
$errors = [
    'name' => "",
    'username' => "",
    'email' => "",
    'phone' => "",
    'website' => ""
];
$isValid = validateUser($user,$errors);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = array_merge($user,$_POST);
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $website = $_POST['website'];
    if ($isValid) {
        $user = createUsers($_POST);
        uploadImage($_FILES['picture'], $user);
        header('Location: ./index.php');
    }
}
?>
<?php include './_form.php' ?>