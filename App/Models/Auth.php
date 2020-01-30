<?php
namespace App\models;
use Delight\Auth\Auth;

class registration
{


    public function registr($email,$password)
    {
        require '../../vendor/autoload.php';



        $pdo = new PDO("mysql:host=localhost; dbname=ch35098_egor", "ch35098_egor", "m0t0r0la");

        $auth = new Auth($pdo);

      
        try {
            $userId = $auth->register($email, $password, null, function ($selector, $token) {
                echo 'Send ' . $selector . ' and ' . $token . ' to the user (e.g. via email)';
            });

            echo 'We have signed up a new user with the ID ' . $userId;
        } catch
                 (\Delight\Auth\InvalidEmailException $e) {
            echo 'Invalid email address';
        } catch (\Delight\Auth\InvalidPasswordException $e) {
            echo 'Invalid password';
        } catch (\Delight\Auth\UserAlreadyExistsException $e) {
            echo 'User already exists';
        } catch (\Delight\Auth\TooManyRequestsException $e) {
            echo 'Too many requests';
        }
    }
}