<?php

function renderTemplate($name, $array) {
    extract($array);

    ob_start();
    include $name;
    echo ob_get_clean();
}

$File = fopen('users.json', 'r');
$users = fread($File, filesize('users.json'));
fclose($File);
$users = json_decode($users, true)['data'];

renderTemplate('template.html', [
    'users' => $users
]);

