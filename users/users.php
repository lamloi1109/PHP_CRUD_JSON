<?php
function getUsers(){
    // Lấy data từ file users.json và với option true data trả về dưới dạng mảng
    $users = json_decode(file_get_contents(__DIR__.'/users.json'), true);
    return $users;
}
function getUsersById($id){
    $users = getUsers();
    foreach($users as $user){
        if($user['id'] == $id){
            return $user;
        }
    }
    return null;
}
function createUsers($data){

}
function updateUsers($data, $id){
    $updateUser = [];
    $users = getUsers();
    foreach($users as $key => $value){
        if($value['id'] == $id){

            $users[$key] = $updateUsers =  array_merge($value,$data);
        }
    }
    // Lưu thay đổi vào file users.json
    file_put_contents(__DIR__.'/users.json',json_encode($users,JSON_PRETTY_PRINT));
    // Trả về dữ liệu đã update
    return $updateUsers;
}
function deleteUsers($id){

}