<?php
include (ROOT_PATH . "/app/database/db.php");
include (ROOT_PATH . "/app/helpers/validateMessage.php");
include (ROOT_PATH . "/app/helpers/middleware.php");

$table = 'messages';
$admins = selectAll('users', ['admin' => 1]);


$errors = array();
$subject = '';
$user_id = '';
$body = '';


if (isset($_POST['add-message']))
{
    $errors = validateMessage($_POST);
    if (count($errors) === 0)
    {
        unset($_POST['add-message']);
        $recepient = selectOne('users', ['id' => $_POST['recipient_id']]);

        $_POST['recipient_name'] = $recepient['username'];
        $_POST['viewed'] = 0;
        $_POST['body'] = htmlentities($_POST['body']);
        $post_id = create($table, $_POST);

        $_SESSION['message'] = 'Message sent successfully';
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . "/dashboard/messages/index.php");
        exit();
    }


}

