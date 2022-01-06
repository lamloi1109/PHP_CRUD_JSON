<?php
require __DIR__ . './users.php';
if(!isset($_GET['id'])){
    include './partials/not_found.php';
    exit;
}
$userId = $_GET['id'];
$user = getUsersById($userId);
if(!$user){
    include './partials/not_found.php';
    exit;
}
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    updateUsers($_POST, $userId);
    header('Location: ./index.php');
}
include './partials/header.php';
?>
<div class="container">
    <div class="card">
        <div class="card-header">
        <h3>Update user: <i><?php echo $user['name']; ?></i></h3>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="<?php echo $user['name'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>UserName</label>
                    <input type="text" name="username" value="<?php echo $user['username'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" value="<?php echo $user['email'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" value="<?php echo $user['phone'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Website</label>
                    <input type="text" name="website" value="<?php echo $user['website'] ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="picture">
                </div>
                <button class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
<?php include './partials/footer.php'; ?>