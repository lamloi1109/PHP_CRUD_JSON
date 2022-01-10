<?php
function getUsers()
{
    // Lấy data từ file users.json và với option true data trả về dưới dạng mảng
    $users = json_decode(file_get_contents(__DIR__ . '/users.json'), true);
    return $users;
}
function getUsersById($id)
{
    $users = getUsers();
    foreach ($users as $user) {
        if ($user['id'] == $id) {
            return $user;
        }
    }
    return null;
}
function createUsers($data)
{
    $user = getUsers();
    $data['id'] = rand(1000000, 2000000);
    $users[] = $data;
    putJson($users);
    return $data;
}
function updateUsers($data, $id)
{
    $updateUser = [];
    $users = getUsers();
    foreach ($users as $key => $value) {
        if ($value['id'] == $id) {

            $users[$key] = $updateUsers =  array_merge($value, $data);
        }
    }
    // Lưu thay đổi vào file users.json
    putJson($users);
    // Trả về dữ liệu đã update
    return $updateUsers;
}
function deleteUsers($id)
{
}

function uploadImage($file, $user)
{
    if (isset($_FILES['picture']) && $_FILES['picture']['name']) {
        if (!is_dir(__DIR__ . '/images')) {
            mkdir(__DIR__ . '/images');
        }
        // Lấy tên file
        $fileName  = $file['name'];
        // Lấy ra vị trí của '.'
        $dotPosition = strpos($fileName, '.');
        // Cắt ra đuôi của file (ex: .jpg)
        $extension = substr($fileName, $dotPosition + 1);
        // Lưu file vào thư mục /users/images
        move_uploaded_file($file['tmp_name'], __DIR__ . "/images/" . $user['id'] . $extension);
        // THêm extension vào data
        $user['extension'] = $extension;
        updateUsers($user, $user['id']);
    }
}

function putJson($users)
{
    file_put_contents(__DIR__ . '/users.json', json_encode($users, JSON_PRETTY_PRINT));
}
