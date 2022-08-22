<?php

function validateUser( $user)
{
    $errors = array();
    if(empty($user['username']))
    {
        array_push($errors, 'Username is required');
    }
    if(empty($user['email']))
    {
        array_push($errors, 'email is required');
    }
    if(empty($user['password']))
    {
        array_push($errors, 'Password  is required');
    }
    if($user['passwordConf'] !== $_POST['password'] )
    {
        array_push($errors, 'Passwords do not match');
    }
    $existing_username = selectOne('users',['username' => $user['username']]);
    $existingUser = selectOne('users', ['email' => $user['email']] );
    if ($existingUser)
    {
        if (isset($post['update-user-details']) && $existingUser['id'] != $user['id'])
        {
            array_push($errors, 'Email already exists');
        }
        if (isset($post['create-admin'] ))
        {
            array_push($errors, 'Email already exists');
        }
    }
    if ($existing_username)
    {
        if (isset($post['update-user-details']) && $existingUser['id'] != $user['id'])
        {
            array_push($errors, 'Username already exists');
        }
    }


        return $errors;

}


function validateLogin( $user)
{
    $errors = array();
    if(empty($user['username']))
    {
        array_push($errors, 'Username is required');
    }
    if(empty($user['password']))
    {
        array_push($errors, 'Password  is required');
    }
    return $errors;

}

function validateUserUpdate( $user)
{
    $errors = array();
    if(empty($user['username']))
    {
        array_push($errors, 'user name is required');
    }
    if(empty($user['email']))
    {
        array_push($errors, 'email is required');
    }
    if(empty($user['password']))
    {
        array_push($errors, 'Password  is required');
    }
    if(empty($user['passwordConf']))
    {
        array_push($errors, 'Password Confirmation is required');
    }
    if($user['passwordConf'] !== $_POST['password'] )
    {
        array_push($errors, 'Passwords do not match');
    }

    return $errors;

}




