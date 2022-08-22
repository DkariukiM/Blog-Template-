<?php

function usersOnly($redirect = '/index.php')
{
    if (empty($_SESSION['id']))
    {
        $_SESSION['message'] = 'Access Denied. You need to log in first';
        $_SESSION['type'] = 'error';
        header('location: ' . BASE_URL . $redirect);
        exit();


    }
}
function validComment()
{
    global $c_id;
    if (empty($_SESSION['id']))
    {
        $_SESSION['message'] = 'You need to log in first.';
        $_SESSION['type'] = 'error';
        header('location: ' . BASE_URL . "/single.php?id=$c_id#comment-div");
        exit();


    }
}

function adminOnly($redirect = '/dashboard/dashboard.php')
{
    if (empty($_SESSION['id']) || empty($_SESSION['admin']))
    {
        $_SESSION['message'] = 'You are not authorized';
        $_SESSION['type'] = 'error';
        header('location: ' . BASE_URL . $redirect);
        exit();


    }
}
function su_adminOnly($redirect = '/dashboard/dashboard.php')
{
    if (empty($_SESSION['id']) || empty($_SESSION['su_admin']))
    {
        $_SESSION['message'] = 'Access Denied. You are not authorized';
        $_SESSION['type'] = 'error';
        header('location: ' . BASE_URL . $redirect);
        exit();


    }
}

function guestsOnly($redirect = '/index.php')
{
    if (isset($_SESSION['id']))
    {
        header('location: ' . BASE_URL . $redirect);
        exit();
    }
}


