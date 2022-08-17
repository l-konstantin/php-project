<?php
require_once '../vendor/autoload.php';

function registerEmail()
{
    try {
        $config = include "db.php";
        $pdo = new PDO("mysql:host=$config->host; dbname=$config->database", $config->username, $config->password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);

        $query = "select * from users where email = '{$email}'";
        $select_from_users = $pdo->prepare($query);
        $select_from_users->execute();
        $user_email = $select_from_users->fetchAll();

        if (!empty($user_email)) {
            $user_id = $user_email[0]['id'];
            $message = "Email уже существует!";
        } else {
            $query = "insert into users (name, email, phone) values ('$name', '$email', '$phone')";
            $insert_user = $pdo->prepare($query);
            $insert_user->execute();
            $user_id = $pdo->lastInsertId();
            $message = "Регистрация прошла успешно!";

            $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
                ->setUsername('laravel.vue777@gmail.com')
                ->setPassword('RjkktrwbzGfrtnjd23!');

            //$transport = new Swift_SendmailTransport('/usr/sbin/sendmail -bs');

            $mailer = new Swift_Mailer($transport);

            $message_send = new Swift_Message('Заказ продуктов');
            $message_send->setSubject('Test message');
            $message_send->setFrom(['laravel.vue777@gmail.com' => "Name"]);
            $message_send->setTo($email, 'receiver name');
            $message_send->addCc($email, 'receiver');
            $message_send->addBcc($email, 'rece');
                
            $result = $mailer->send($message_send);    
        }
        echo $message;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}
registerEmail();
