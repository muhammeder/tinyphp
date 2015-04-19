<?php
class DashboardController extends Controller {
    
    public function indexAction() {
        $data = array();
        
        $id = $this->app->request->getPrm('id');
        $data['users'] = UserModel::findAll();
        $data['user'] = new UserModel(array('id' => $id));
        
        $this->render('home/dashboard', $data);
    }
    
    public function newUser() {
        $user = new UserModel();
        $user->setData($_POST);
        $user->save();
        
        $this->indexAction();
    }
}