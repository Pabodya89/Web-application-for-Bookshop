<?php 

class Logins
{
    use Model;

    protected $table = 'login';

	public function validpassword($password1, $password2, $username, $email)
	{
		if($username == '')
		{
			return "username is required";
		}
		if($email == '')
		{
			return "Email is required";
		}
		if($password1== '')
		{
			return "Password is required";
		}
		if($password2== '')
		{
			return "Please enter password again";
		}
		

		if($password1 != $password2)
		{
			return "Password does not match";
		}
		if(strlen($password1) < 8){
			return "Password must be at least 8 characters long.";
		}
		if(!preg_match('/[a-z]/',$password1)  || !preg_match('/[A-Z]/',$password1)){
			return "Password must include lower or upper case characters.";
		}
		if(!preg_match('/\d/', $password1)){
			return "password must include at least one number.";
		}
		if(!preg_match('/[^a-zA-Z\d]/', $password1)){
			return "Password must include at least one special character.";
		}
		return null;
	}


	public function login_validate($username , $password)
	{
		if($username == '')
		{
			return "Username is required";
		}
		if($password == '')
		{
			return "Password is required";
		}
		return null;
	}
}
