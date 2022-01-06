<?php
require __DIR__ . '/users/users.php';
if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $user = getUsersById($userId);
    if (!$user) {
        include './partials/not_found.php';
        exit;
    }
} else {
    include './partials/not_found.php';
    exit;
}
include './partials/header.php';
?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>View User: <i><?php echo $user['name']; ?></i></h3>
        </div>
        <table class="table">
            <tbody>
                <tr>
                    <th>Name: </th>
                    <td><?php echo $user['name'] ?></td>
                </tr>
                <tr>
                    <th>UserName: </th>
                    <td><?php echo $user['username'] ?></td>
                </tr>
                <tr>
                    <th>Email: </th>
                    <td><?php echo $user['email'] ?></td>
                </tr>
                <tr>
                    <th>Website: </th>
                    <td><a target="__blank" href="https://<?php echo $user['website'] ?>"><?php echo $user['website'] ?></td>
                </tr>
                <tr>
                    <th>Phone: </th>
                    <td><?php echo $user['phone'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>


<?php include './partials/footer.php'; ?>