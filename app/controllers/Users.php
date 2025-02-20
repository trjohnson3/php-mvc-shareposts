<?php
    class Users extends Controller {
        public function __construct() {
            
        }

        public function register() {
            //Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                //Process the form
                //Sanitize POST data (all strings)
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //Init data
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                //Validate Email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email.';
                }
                //Validate Name
                if(empty($data['name'])) {
                    $data['name_err'] = 'Please enter name.';
                }
                //Validate Password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password.';
                } else if(strlen($data['password']) < 6) {
                    $data['password_err'] = 'Password must be at least 6 characters.';
                }
                //Validate Confirm Password
                if(empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Please confirm password.';
                } else if($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = 'Passwords must match';
                }

                //Check that errors are empty
                if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err'])
                && empty($data['confirm_password_err'])) {
                    //Form has been validated
                    die('success');
                } else {
                    //Load view with errors
                    $this->view('users/register', $data);
                }


            } else {
                //Init data
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                //Load the form
                $this->view('users/register', $data);
            }
        }

        public function login() {
            //Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                //Process the form
                //Sanitize POST data (all strings)
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //Init data
                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => ''
                ];

                //Validate Email
                if(empty($data['email'])) {
                    $data['email_err'] = 'Please enter email.';
                }
                //Validate Password
                if(empty($data['password'])) {
                    $data['password_err'] = 'Please enter password.';
                } else if(strlen($data['password']) < 6) {
                    $data['password_err'] = 'Password must be at least 6 characters.';
                }

                //Check that errors are empty
                if(empty($data['email_err']) && empty($data['password_err'])) {
                    //Form has been validated
                    die('success');
                } else {
                    //Load view with errors
                    $this->view('users/login', $data);
                }


            } else {
                //Init data
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => ''
                ];

                //Load the form
                $this->view('users/login', $data);
            }
        }
    }