<?php
include 'function/helper.php';
session_start();


$user = [
    'sahinersever' => [
        'eposta' => 'sahin@gmail.com',
        'password' => '123456'
    ],
    'fatmaersever' => [
        'eposta' => 'fatma@gmail.com',
        'password' => '123456'
    ]
];


if (get('islem') == 'giris') {
    $_SESSION['username'] = post('username');
    $_SESSION['password'] = post('password');
    if (!post('username')) {
        $_SESSION['error'] = 'Lütfen Kullanıcı Adınızı Giriniz.';
        header('Location:login.php');
        exit();
    } elseif (!post('password')) {
        $_SESSION['error'] = 'Lütfen şifrenizi giriniz.';
        header('Location:login.php');
        exit();
    } else {

        if (array_key_exists($_SESSION['username'], $user)) {
            if ($user[post('username')]['password'] == post('password')) {
                $_SESSION['login'] = true;
                $_SESSION['username'] = post('username');
                $_SESSION['eposta'] = $user[post('username')]['eposta'];
                header('Location:index.php');

                exit();
            } else {
                $_SESSION['error'] = 'Kullanıcı Bulunamadı!';
                header('Location:login.php');
                exit();
            }


        } else {
            $_SESSION['error'] = 'Kullanıcı Bulunamadı!';
            header('Location:login.php');
            exit();
        }
    }
}

if (get('islem') == 'hakkimda') {
    $hakkimda = post('hakkimda');
    $islem = file_put_contents('./db/' . session('username') . '.txt', htmlspecialchars($hakkimda));
    if ($islem) {
        header('Location:index.php?islem=true');

    } else {
        header('Location:index.php?islem=false');
    }

}

if (get('islem') == 'çıkış') {
    session_destroy();
    session_start();
    $_SESSION['error'] = 'Oturum Sonlandırıldı.';
    header('Location:login.php');
}

if (get('islem') == 'renk') {


    setcookie('color', get('color'), time() + 86400 * 360);

    header('Location:' . $_SERVER['HTTP_REFERER'] ?? 'index.php');


}


?>
