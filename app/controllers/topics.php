<?php
include (ROOT_PATH . "/app/database/db.php");
include (ROOT_PATH . "/app/helpers/validateTopic.php");
include (ROOT_PATH . "/app/helpers/middleware.php");

//declarations
$table = 'topics';

$topics = selectAll($table);



$id = '';
$name = '';
$description = '';
$errors = array();



//add topic to database
if (isset($_POST['add-topic']))
{
    adminOnly();
    $errors = validateTopic($_POST);

    if (count($errors) === 0 ){

        unset($_POST['add-topic']);
        $_POST['description'] = htmlentities($_POST['description']);

        $topic_id = create($table, $_POST);
        $_SESSION['message'] = 'Topic created successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/dashboard/topics/index.php');
        exit();

    }else
    {
        $name =$_POST['name'];
        $description = $_POST['description'];
    }

}
//fetch by id
if (isset($_GET['id']))
{
    $id = $_GET['id'];
    $topic = selectOne($table, ['id' => $id]);
    $id = $topic['id'];
    $name = $topic['name'];
    $description = $topic['description'];
}

//update script
if (isset($_POST['update-topic']))
{
    adminOnly();
    $errors = validateTopic($_POST);

    if (count($errors) === 0 ){
        $id = $_POST['id'];
        unset($_POST['update-topic'], $_POST['id']);
        $topic_id = update($table, $id , $_POST);
        $_SESSION['message'] = 'Topic updated successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/dashboard/topics/index.php');
        exit();

    }else{
        $id = $_POST['id'];
        $name =$_POST['name'];
        $description = $_POST['description'];
    }
}


//delete topics
if (isset($_GET['del_id']))
{
    adminOnly();
    $id = $_GET['del_id'];
    $count = delete($table,$id);
    $_SESSION['message'] = 'Topic deleted successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/dashboard/topics/index.php');
    exit();
}

//newsletter
if (isset($_POST['newsletter']))
{
    $errors = validateEmail($_POST);

    if (count($errors) === 0)
    {
        unset($_POST['newsletter']);
        $_POST['sub'] = 1;
        $letter_id = create('newsletter', $_POST);

        $_SESSION['message'] = 'Successfully Subscribed to our newsletter.';
        $_SESSION['type'] = 'success';
        header('location:' . BASE_URL . "/index.php#news");
        exit();
/*        dd($_POST);*/
    }


}






