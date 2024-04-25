<?php
session_start();

/*
 * Function to unset a session variable
 */
function unsetSession($key)
{
    unset($_SESSION[$key]);
}

/*
 * Function to set a session variable
 */
function setSession($key, $value)
{
    $_SESSION[$key] = $value;
}

/*
 * Function to get the value of a session variable
 */
function getSession($key)
{
    if (empty($_SESSION[$key])) {
        return false;
    }

    return $_SESSION[$key];
}

function status_msg($msg)
{
    setSession('statusMsg', $msg);    
    redirect('status');
}
