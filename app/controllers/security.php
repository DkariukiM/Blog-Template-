<?php
include (ROOT_PATH . "/app/database/db.php");
include (ROOT_PATH . "/app/helpers/validateQuestion.php");
include (ROOT_PATH . "/app/helpers/middleware.php");

$table= 'security';
$errors = array();
$s_question = '';
$answer = '';
$q = '';


//security question
if (isset($_POST['add-question']))
{
    usersOnly();
    $errors = validateQuestion($_POST);

    if (count($errors) ===0)
    {
        $question = selectOne('security_questions',['id' => $_POST['question_id']]);
        $_POST['question'] = $question['question'];
        $_POST['user_id'] = $_SESSION['id'];
        $_POST['username'] = $_SESSION['username'];
        unset($_POST['add-question']);
        $_POST['answer'] = htmlentities($_POST['answer']);
        $_POST['answer'] = password_hash($_POST['answer'], PASSWORD_DEFAULT);


        $topic_id = create($table, $_POST);
        $_SESSION['message'] = 'Security Question set successfully';
        $_SESSION['type'] = 'success';
        header('location: ' . BASE_URL . '/dashboard/settings/index.php');
        exit();
    }else
    {
        $answer = $_POST['answer'];
        $s_question = $_POST['question_id'];

    }
}

//delete question
if (isset($_GET['del_id']))
{
    usersOnly();
    $decode = base64_decode(urldecode($_GET['del_id']));
    $decript_id = (($decode/5678)/123456789);
    $id = $decript_id;
    $count = delete($table,$id);
    $_SESSION['message'] = 'Security Question deleted successfully';
    $_SESSION['type'] = 'success';
    header('location: ' . BASE_URL . '/dashboard/settings/index.php');
    exit();
}




