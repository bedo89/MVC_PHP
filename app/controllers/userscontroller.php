<?php

namespace PHPMVC\Controllers;

use PHPMVC\LIB\Helper;
use PHPMVC\LIB\InputFilter;
use PHPMVC\LIB\Messenger;
use PHPMVC\Models\UserGroupModel;
use PHPMVC\Models\UserModel;

class UsersController extends AbstractController
{
    use InputFilter, Helper;
    private $_createActionRoles = [
        'Username'      => 'req|alphanum|between(3,12)',
        'Password'      => 'req|min(5)|eq_field(CPassword)',
        'CPassword'     => 'req|min(5)',
        'Email'         => 'req|email',
        'CEmail'        => 'req|email',
        'PhoneNumber'   =>'alphanum|max(5)',
        'GroupId'       =>'req|int'
    ];

    public function defaultAction()
    {

        $this->language->load('template.common');
        $this->language->load('users.default');

        $this->_data['users'] = UserModel::getAll();
        $this->_data['groups'] = UserGroupModel::getAll();

        $this->_view();
    }

    public function createAction()
    {
        $this->language->load('template.common');
        $this->language->load('users.create');
        $this->language->load('users.labels');
        $this->language->load('users.messages');
        $this->language->load('validation.errors');


        $this->_data['groups'] = UserGroupModel::getAll();

        if(isset($_POST['submit']) && $this->isValid($this->_createActionRoles, $_POST)){

            $user = new UserModel();
            $user->Username         = $this->filterString($_POST['Username']);
            $user->cryptPassword($_POST['Password']);
            $user->Email            = $this->filterString($_POST['Email']);
            $user->PhoneNumber      = $this->filterString($_POST['PhoneNumber']);
            $user->GroupId          = $this->filterInt($_POST['GroupId']);
            $user->SubscriptionDate = date('Y-m-d');
            $user->LastLogin        = date('Y-m-d H:i:s');
            $user->Status           = 1;

            if($user->save()){
                $this->messenger->add($this->language->get('message_create_success'));
            }else{
                $this->messenger->add($this->language->get('message_create_failed'), Messenger::APP_MESSAGE_ERROR);
            }
            $this->redirect('/users');
        }

        $this->_view();
    }

    public function checkUserExistsAjaxAction()
    {

        header('Content-type: text/plain');
        if(isset($_POST['Username']) and !empty($_POST['Username'])){
            $foundUser = UserModel::userExists($this->filterString($_POST['Username']));
            if($foundUser){
                echo 1;
            }else{
                echo 2;
            }
            //return $foundUser !== false ? true : false;
        }
    }
}