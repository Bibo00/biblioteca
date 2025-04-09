<?php
class Login extends Controller
{
    public function index()
    {
        $this->view('login');
    }

    private function check()
    {
        $user = new User;

        $email = $_POST['email'];
        $psw = password_hash($_POST['psw'], PASSWORD_BCRYPT);
        $appLogin = ['email' => $email, 'psw' => $psw];

        $ris = $user->where($appLogin);
        if(count($ris) == 1)
            return $info = ['logged' => true, 'IdU' => $ris['IdU']];
        else
            return $info = ['logged' => false];
    }

    public function accesso()
    {
        $info = $this->check();
        if($info['logged'] == true)
        {
            $_SESSION['IdU'] = $info['IdU'];
            return json_encode(true);
        }
        else
            return json_encode(false);
    }
}