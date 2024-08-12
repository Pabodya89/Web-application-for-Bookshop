<?php

class Sign_Up{

    use Controller;

    public function index()
    {
        $data =[];

        if(isset($_POST['username']))
        {
            $singup_table = new Logins;

            $username = $_POST['username'];
            $email = $_POST['email1'];
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];

            $error = $singup_table->validpassword($password1, $password2, $username, $email);

            if($error)
            {
                $data['error'] = $error;
            }
            else
            {
                $arr2['username'] = $username;

                $result2 = $singup_table->first($arr2);

                if($result2)
                {
                    $data['error'] = "This username is already exist";
                }
                else
                {
                    $hashed_password = password_hash($password2, PASSWORD_DEFAULT);
                    $arr['password'] = $hashed_password;
                    $arr['email'] = $email;
                    $arr['username'] = $username;

                    $singup_table->insert($arr);
                    redirect('login');    
                }
            }         
        }

      $this->view('signup',$data);
    }
}
