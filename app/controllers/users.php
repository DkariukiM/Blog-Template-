<?php
include (ROOT_PATH . "/app/database/db.php");
include (ROOT_PATH . "/app/helpers/validateUser.php");
include (ROOT_PATH . "/app/helpers/middleware.php");

$table = 'users';

$users = selectAll($table);


$errors = array();
$username = '';
$password = '';
$email = '';
$passwordConf = '';
$description = '';
$user_id = '';



function loginUser($user)
{
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['admin'] = $user['admin'];
    $_SESSION['su_admin'] = $user['su_admin'];
    $_SESSION['assigned_image'] = $user['assigned_image'];

    $_SESSION['message'] = 'You are now logged in';
    $_SESSION['type'] = 'success';

    header('location: ' .BASE_URL . '/dashboard/dashboard.php');

    exit();
}


if(isset($_POST['register-btn']) || isset($_POST['create-admin']))
{
    $errors = validateUser($_POST);
    if(count($errors) === 0){
        unset($_POST['register-btn'], $_POST['passwordConf'], $_POST['create-admin']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);


        if (isset($_POST['admin']))
        {
            $_POST['admin'] = 1;
            $user_id = create($table,$_POST);
            $_SESSION['message'] = 'Admin User Created successfully!';
            $_SESSION['type'] = 'success';
            header('location:' . BASE_URL . "/admin/users/index.php");
            exit();

        }else
        {
            $_POST['admin'] = 0;
            $_POST['su_admin'] = 0;
            $_POST['assigned_image'] = 0;
            $_POST['image'] = 'r';

            $user_id = create($table,$_POST);
            $user = selectOne($table,['id' => $user_id]);
            //log user in
            loginUser($user);

        }


    }else
    {
        $username = $_POST['username'] ;
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConf = $_POST['passwordConf'];
        $admin = isset($_POST['admin']) ? 1 : 0;

    }

}

//LOGIN CODE
if (isset($_POST['login-btn']))
{
    $errors = validateLogin($_POST);

    if (count($errors) === 0)
    {
        $user = selectOne($table,['username' => $_POST['username']]);

        if ($user && password_verify($_POST['password'], $user['password']))
        {
            //login user, redirect
            loginUser($user);

        }else
        {
            array_push($errors, 'Invalid Username or Password');
        }
    }

    $username = $_POST['username'];
    $password = $_POST['password'];


}


//update individual information
if (isset($_POST['update-user-details']))
{
    $errors = validateUser($_POST);
        if (!empty($_FILES['image']['name']))
        {
            $image_name =time() . '_' . $_FILES['image']['name'];
            $destination = ROOT_PATH . "/assets/img/" . $image_name;

            $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

            if ($result)
            {
                $_POST['image'] = $image_name;
                $_POST['assigned_image'] = 1;
            }else
            {
                array_push($errors,'failed to upload the Profile Image');

            }
        }else
        {
            $_POST['image'] = '';
            $_POST['assigned_image'] = 0;

        }
        if (count($errors) === 0)
        {

            $id = $_POST['id'];
            unset($_POST['update-user-details'], $_POST['id'],$_POST['passwordConf']);
            $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $_POST['description'] = htmlentities($_POST['description']);
            $user_id = update($table, $id, $_POST);
            $_SESSION['message'] = 'User Details Updated Successfully';
            $_SESSION['type'] = 'success';
            header('location:' . BASE_URL . "/dashboard/user/view.php");
            exit();

        }else
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $passwordConf = $_POST['passwordConf'];
            $description = $_POST['description'];
        }
        /*    dd($_POST);*/

}

//update information
if (isset($_POST['update-user']))
{
    $errors = validateUser($_POST);
    if (!empty($_FILES['image']['name']))
    {
        $image_name =time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/img/" . $image_name;

        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        if ($result)
        {
            $_POST['image'] = $image_name;
            $_POST['assigned_image'] = 1;
        }else
        {
            array_push($errors,'failed to upload the Profile Image');

        }
    }else
    {
        $_POST['image'] = '';
        $_POST['assigned_image'] = 0;

    }
    if (count($errors) === 0)
    {

        $id = $_POST['id'];
        unset($_POST['update-user'], $_POST['id'],$_POST['passwordConf']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $_POST['description'] = htmlentities($_POST['description']);
        $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;
        $user_id = update($table, $id, $_POST);
        $_SESSION['message'] = 'User Details Updated Successfully';
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . "/dashboard/user/index.php");
        exit();

    }else
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $passwordConf = $_POST['passwordConf'];
        $description = $_POST['description'];
        $admin = isset($_POST['admin']) ? 1 : 0;
    }
    /*    dd($_POST);*/

}

//add user
if (isset($_POST['add-user']))
{
    $errors = validateUser($_POST);
    if (!empty($_FILES['image']['name']))
    {
        $image_name =time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/img/" . $image_name;

        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        if ($result)
        {
            $_POST['image'] = $image_name;
            $_POST['assigned_image'] = 1;
        }else
        {
            array_push($errors,'failed to upload the Profile Image');

        }
    }else
    {
        $_POST['image'] = '';
        $_POST['assigned_image'] = 0;

    }
    if (count($errors) === 0)
    {
        unset($_POST['add-user'],$_POST['passwordConf']);
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $_POST['description'] = htmlentities($_POST['description']);
        $_POST['admin'] = isset($_POST['admin']) ? 1 : 0;
        $user_id = create($table,$_POST);
        $_SESSION['message'] = 'User Created successfully!';
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . "/dashboard/user/index.php");
        exit();

    }else
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $passwordConf = $_POST['passwordConf'];
        $description = $_POST['description'];
        $admin = isset($_POST['admin']) ? 1 : 0;
    }

    /*    dd($_POST);*/

}


//edit  user by ID
if (isset($_GET['id']))
{
    $user = selectOne($table, ['id' => $_GET['id']]);
    $user_id = $user['id'];
    $username = $user['username'] ;
    $email = $user['email'];
    $admin = $user['admin'];
    $description = $user['description'];
}
//delete admin user function
if (isset($_GET['del_id']))
{
    su_adminOnly();
    $count = delete($table, $_GET['del_id']);
    $_SESSION['message'] = 'User Deleted successfully!';
    $_SESSION['type'] = 'success';
    header('location:' . BASE_URL . "/dashboard/user/index.php");
    exit();
}


