<?php

$heading = 'Sign in';




$data = file_get_contents('php://input');
$config = require('config.php');
$db = new Database($config['database']);

print_r($data);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = [];
    if ($_POST['email']) {
        if (strlen($_POST['password']) > 7) {
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                try {
                    // $email = $_POST["email"];
                    // $password = $_POST["password"];

                    $user = $db->query(
                            'SELECT * FROM users WHERE email = :email AND password = :password ',
                            ['email' => $_POST['email'], 'password' => $_POST['password']]
                        )->fetch();

                    if (isset($user) && $user != false) {
                        unset($_SESSION["user"]);

                        $_SESSION["user"] = $user;
                        
                        echo "<script> alert('done') </script>";

                    } else {

                        $errors['body'] = "credentials are incorrect";
                    }
                } catch (PDOException $error) {

                    print_r("error" . $error->getMessage());
                }
            } else {
                
                $errors['body'] = 'invalid email';
            }
        } else {
            $errors['body'] = 'password too short';
        }
    }
}


require "views/signin.view.php";
