<?php
session_start();

if(isset($_COOKIE['Name']) && isset($_COOKIE['Password'])){

    $File = fopen('users.json', 'r');
    $users = fread($File, filesize('users.json'));
    fclose($File);

    $users = json_decode($users, true);

    $login = false;

    foreach($users['data'] as $user){
        if($user['login'] === $_COOKIE['Name']){
            if($user['password'] === $_COOKIE['Password']){
                $login = true;

                if($_SERVER['REQUEST_URI'] === '/login.php' || $_SERVER['REQUEST_URI'] === '/register.php'){
                    header('Location: ./cabinet.php');
                }

            }
            break;
        }   
    }
    if(!$login){
        setcookie('Name','', -1);
        setcookie('Password','', -1);

        header('Location: ./login.php');
    }
}