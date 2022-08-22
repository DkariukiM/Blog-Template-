<?php

function validateMessage($post)
{
    $errors = array();
    if(empty($post['subject']))
    {
        array_push($errors, 'Subject is required');
    }
    if(empty($post['body']))
    {
        array_push($errors, 'Body is required');
    }
    if(empty($post['recipient_id']))
    {
        array_push($errors, 'Please Select a User');
    }
    return $errors;
}








