<?php
require_once('user.php');

$users = new User();

$user_list = $users->get_all_users();

echo '<pre>';
// print_r($user_list);

?>
