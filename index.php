<?php
require __DIR__.'/users/users.php';
$users = getUsers();
include './partials/header.php';
?>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name </th>
                <th>UserName </th>
                <th>Email </th>
                <th>Phone </th>
                <th>Website </th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td>
                        <?php if( isset($user['extension'])):?>
                            <img src="<?php echo  "users/images/".$user['id'].".".$user['extension'] ?>" alt="" width="50px" height="50px">
                        <?php endif; ?>
                    </td>
                    <td><?php echo $user['name'] ?></td>
                    <td><?php echo $user['username'] ?></td>
                    <td><?php echo $user['email'] ?></td>
                    <td><?php echo $user['phone'] ?></td>
                    <td><a target="__blank" href="https://<?php echo $user['website'] ?>"><?php echo $user['website'] ?></a> </td>
                    <td>
                        <a href="view.php?id=<?php echo $user['id'] ?>" class="btn btn-sm btn-outline-info">View</a>
                        <a href="update.php?id=<?php echo $user['id'] ?>" class="btn btn-sm btn-outline-secondary">Update</a>
                        <a href="delete.php?id=<?php echo $user['id'] ?>" class="btn btn-sm btn-outline-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?php include './partials/footer.php'; ?>