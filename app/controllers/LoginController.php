<?php
class LoginController extends Controller {
    // GET
    public function loginAction() {
        //echo 'this is login of LoginController';
        $this->render('login/login');
    }
    
    // POST
    public function loginPostAction() {
        //print_r($_POST);
        //die();
        
        global $app;
        $username = $app->request->getPrm('username');
        $password = $app->request->getPrm('password');
        
        $user = UserModel::find($username, $password);
        if (!$user)
            $this->data['error'] = 'Username or Password is not correct!';
            $this->render('login/login');
        if (Auth::login($user->id, $user->username, $user->roles)) {
            UrlHelper::redirect("/");
        }
    }
    
}