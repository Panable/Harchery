<?php
session_start();

/*
 * Function to check for manager privilege
 */
function privelagedEntry()
{
    if (!isManager()) {
        die("You are not allowed access");
    }
}

/*
 * Function to check for user login
 */
function userEntry()
{
    if (!isLoggedIn()) {
        die("You are not allowed access");
    }
}

/*
 * Function to force admin login for testing purposes
 */
function forceAdminLogin()
{
    setSession('user_id', 99);
    setSession('user_email', "Chelton@gmail.com");
    setSession('user_name', 'Chelton');
    setSession('user_position', 'Manager');
}

/*
 * Function to check if a user is logged in
 */
function isLoggedIn()
{
    return getSession('user_id');
}

/*
 * Function to check if a user is a manager
 */
function isManager()
{
    return getSession('user_position') == 'Manager';
}

/*
 * Function to check if a user is a head chef (TODO: implement)
 */
function isHeadChef()
{
    // TODO: Implementation pending
}

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

/*
 * Function to display a flashed message
 */
function flash($name = '', $message = '', $class = 'alert alert-success')
{
    // Session is empty, yet name and message are provided
    $genNewSession = !empty($name) && !empty($message) && getSession($name);

    $flashTheMessage = empty($message) && !getSession($name);

    if ($genNewSession) {
        generateNewSession($name, $message, $class);
    }

    if ($flashTheMessage) {
        flashMessageFromSessionAndUnset($name);
    }
}

/*
 * Function to generate a new session for a flashed message
 */
function generateNewSession($name, $message, $class)
{
    setSession($name, $message);
    setSession($name . '_class', $class);
}

/*
 * Function to display a flashed message from a session and unset the session
 */
function flashMessageFromSessionAndUnset($name)
{
    $class = !getSession($name . '_class') ? getSession($name . '_class') : '';
    echo '<div class="' . $class . '" id="msg-flash">' . getSession($name) . '</div>';
    unset($_SESSION[$name]);
    unset($_SESSION[$name . '_class']);
}
