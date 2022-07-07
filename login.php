<?php
include './include/login-validate.php';

if(isset($_POST['csrf']) && $_SESSION['key'] !== $_POST['csrf']) {
    echo 'Не правильный ключ! Повторите запрос';
}

if(isset($_POST['login']) && isset($_POST['password'])){
    $File = fopen('users.json', 'r');
    $users = fread($File, filesize('users.json'));
    fclose($File);

    $users = json_decode($users, true);

    $login = false;

    foreach($users['data'] as $user){
        if($user['login'] === $_POST['login']){
            if($user['password'] === $_POST['password']){
                $login = true;

                setcookie('Name',$_POST['login']);
                setcookie('Password',$_POST['password']);
                
                header('Location: ./cabinet.php');
            }
            break;
        }   
    }     
    
    if(!$login){
        echo 'Логин или пароль не правельный';
    }

    

}

print_r($_SESSION);

$key = md5(time().'hellowrodl passwod'.rand(100000000, 999999999));
$_SESSION['key'] = $key;
?>

<form action="./login.php" method="post">
    <input type="hidden" name="csrf" value="<?=$key?>"/>
    <input type="text" name="login"/>
    <input type="password" name="password"/>
    <button type="submit">Отправить</button>
</form>

<?php
print_r($_SESSION);
?>