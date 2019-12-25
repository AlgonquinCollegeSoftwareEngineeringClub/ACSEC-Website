<?php

function handleRegisterReturnStatus() {
    if (@$_GET['status'] == "emailalreadyexists")
        echoAlertFailure("Email already exists!");

    if (@$_GET['status'] == "weakpassword")
        echoAlertFailure("Password is too short!");

    // TODO: "no" is undescriptive, find where it's being used and choose a better
    // name.
    if (@$_GET['status'] == "no")
        echoAlertFailure("Error! Username or password is wrong...");

    // TODO: "exit" is undescriptive, find where it's being used and choose a
    // better name. Also the message (exit) tied to it doesn't provide any
    // meaning to the user.
    if (@$_GET['status'] == "exit")
        echoAlertFailure("Exit.");

    if (@$_GET['status'] == "keydoesntexist")
        echoAlertFailure("The given key does not exist!");

    if (@$_GET['status'] == "keyalreadyclaimed")
        echoAlertFailure("The given key has already been claimed!");

    // TODO: Alert message (OK) is not descriptive, find context and provide
    // better infirmation to user.
    if (@$_GET['status'] == "ok")
        echoAlertSuccess("OK");
}

function echoAlertFailure($message) {
    echo '<div class="alert alert-danger">';
    echo $message;
    echo '</div>';
}

function echoAlertSuccess($message) {
    echo '<div class="alert alert-success">';
    echo $message;
    echo '</div>';
}

// EOF