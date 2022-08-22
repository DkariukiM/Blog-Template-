<?php
include (ROOT_PATH . "/app/database/db.php");
include (ROOT_PATH . "/app/helpers/validatePost.php");
include (ROOT_PATH . "/app/helpers/middleware.php");

$table = 'posts';
$errors = array();
$topics = selectAll('topics');


$posts = getPostsAdmin();
$id = '';
$title = '';
$body = '';
$topic_id = '';
$published = '';
$comment = '';


$id = '';
$title = '';
$body = '';
$topic_id = '';
$published = '';

//create post
if (isset($_POST['create-post']))
{
    adminOnly();
    //dd($_FILES['image']['name']);
    $errors = validatePost($_POST);

    if (!empty($_FILES['image']['name']))
    {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/img/" . $image_name;

        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        if ($result)
        {
            $_POST['image'] = $image_name;

        }else
        {
            array_push($errors, "failed to upload image");
        }
    }else
    {
        array_push($errors, "post image required");
    }

    if (count($errors) === 0){
        unset($_POST['create-post']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['username'] = $_SESSION['username'];
        $_POST['published'] = isset($_POST['published']) ? 1 : 0;
        $_POST['body'] = htmlentities($_POST['body']);
        $post_id = create($table, $_POST);

        $_SESSION['message'] = 'Post created successfully';
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . "/dashboard/posts/index.php");
        exit();
    }else
    {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $topic_id = $_POST['topic_id'];
        $published = isset($_POST['published']) ? 1 : 0;



    }
   /* $_POST['user_id'] = $_SESSION['id'];
    $_POST['username'] = $_SESSION['username'];
    dd($_FILES);*/

}

//grab details for editing
if (isset($_GET['id']))
{
    $post = selectOne($table,['id' => $_GET['id']]);

    $id = $post['id'];
    $title = $post['title'];
    $body = $post['body'];
    $topic_id = $post['topic_id'] ;
    $published = $post['published'];

}


//delete post
if (isset($_GET['del_id']))
{
    adminOnly();
    $count = delete($table, $_GET['del_id']);
    $_SESSION['message'] = 'Post deleted successfully';
    $_SESSION['type'] = 'success';
    header('location:' . BASE_URL . "/dashboard/posts/index.php");
    exit();

}

//publish and unpublish posts

if (isset($_GET['published']) && isset($_GET['p_id']) )
{
    adminOnly();
    $published = $_GET['published'];
    $p_id = $_GET['p_id'];

    //..update published field on the post and set a success message
    $count = update($table, $p_id, ['published' => $published]);
    $_SESSION['message'] = 'Post publish state changed!!';
    $_SESSION['type'] = 'success';
    header('location:' . BASE_URL . "/dashboard/posts/index.php");
    exit();
}

//update post
if (isset($_POST['update-post']))
{
    adminOnly();
    $errors = validatePost($_POST);
    if (!empty($_FILES['image']['name']))
    {
        $image_name = time() . '_' . $_FILES['image']['name'];
        $destination = ROOT_PATH . "/assets/img/" . $image_name;

        $result = move_uploaded_file($_FILES['image']['tmp_name'], $destination);

        if ($result)
        {
            $_POST['image'] = $image_name;

        }else
        {
            array_push($errors, "failed to upload image");
        }
    }else
    {
        array_push($errors, "post image required");
    }

    if (count($errors) === 0){
        $id = $_POST['id'];

        unset($_POST['update-post'], $_POST['id']);
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['published'] = isset($_POST['published']) ? 1 : 0;
        $_POST['body'] = htmlentities($_POST['body']);
        $post_id = update($table,$id, $_POST);

        $_SESSION['message'] = 'Post updated successfully';
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . "/dashboard/posts/index.php");
        exit();
    }else
    {

        $title = $_POST['title'];
        $body = $_POST['body'];
        $topic_id = $_POST['topic_id'];
        $published = isset($_POST['published']) ? 1 : 0;
    }


}



