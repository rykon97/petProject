<?php
if(!isset($_COOKIE['Name']) && !isset($_COOKIE['Password'])){
    header('Location: ./login.php');
}