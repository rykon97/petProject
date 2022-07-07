<?php
include './include/login-validate.php';

if(isset($_POST['password']) && isset($_POST['password_repeat'])){
    if($_POST['password'] === $_POST['password_repeat'] && !empty($_POST['password'])){
        if(isset($_POST['login']) && isset($_POST['password'])){

            $File = fopen('users.json', 'r');
            $users = fread($File, filesize('users.json'));
            fclose($File);

            $users = json_decode($users, true);

            $register = true;

            foreach($users['data'] as $user){
                if($user['login'] === $_POST['login']){
                    echo 'Такой логин уже существует, создайте другой';
                    $register = false;
                    break;
                }   
            }

            if($register) {
                setcookie('Name',$_POST['login']);
                setcookie('Password',$_POST['password']);

                $users['data'][] = [
                    'login' => $_POST['login'],
                    'password' => $_POST['password']
                ];
                $users = json_encode($users);

                $File = fopen('users.json', 'w+');
                $users = fwrite($File, $users);
                fclose($File);

                header('Location: ./cabinet.php');
            }
        }    
    }
    else{
        echo "Пароль пуст или пошёл нахуй";
    }
}

?>
<form action="./register.php" method="post">
    <input type="text" placeholder="Login" name="login"/>
    <input type="password" placeholder="Password" name="password"/>
    <input type="password" placeholder="Rereat password" name="password_repeat"/>
    <button type="submit">Зарегестрироваться</button>
</form>