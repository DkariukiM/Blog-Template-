<?php

function validateQuestion($question)
{
    $errors = array();
    if (empty($question['question_id'])) {
        array_push($errors, 'Please Select a question');
    }
    if (empty($question['answer'])) {
        array_push($errors, 'Answer is required');
    }

    $existingUserQuestion = selectOne('security', ['user_id' => $_SESSION['id']]);
    if ($existingUserQuestion) {
        array_push($errors, "You've already set your Security Question");
    }
    return $errors;
}

function validateUpdate($question)
{
    $errors = array();
    if (empty($question['question_id'])) {
        array_push($errors, 'Please Select a question');
    }
    if (empty($question['answer'])) {
        array_push($errors, 'Answer is required');
    }
    return $errors;
}

