<?php

function validateTopic($topic)
{
    $errors = array();
    if(empty($topic['name']))
    {
        array_push($errors, 'Topic name is required');
    }
    if(empty($topic['description']))
    {
        array_push($errors, 'Topic description is required');
    }


    /*    $existingTopic = selectOne('topics', ['name' => $topic['name']] );
        if ($existingTopic)

        {
            array_push($errors, 'Topic name already exists');
        }*/
    $existingTopic = selectOne('topics', ['name' => $topic['name']] );
    if ($existingTopic)
    {
        if (isset($post['update-topic']) && $existingTopic['id'] != $topic['id'])
        {
            array_push($errors, 'Topic name already exists');
        }
        if (isset($post['add-topic'] ))
        {
            array_push($errors, 'Topic name already exists');
        }
    }


    return $errors;
}

function validateEmail($email)
{
    $errors = array();
    if(empty($email['name']))
    {
        array_push($errors, 'Name is required');
    }
    if(empty($email['email']))
    {
        array_push($errors, 'Email is required');
    }

    $existingMail = selectOne('newsletter', ['email' => $email['email']] );
    if ($existingMail)
    {
        array_push($errors, 'Email already exists');
    }



    return $errors;

}


