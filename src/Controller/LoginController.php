<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Event\Event;

class LoginController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['register', 'recover']);
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {                   
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__('Login ou senha incorreto.'));
            }
        }
    }

    public function logout()
    {
        $this->Flash->success(__('Deslogado com sucesso.'));
        return $this->redirect($this->Auth->logout());
    }

    public function register()
    {
        $usuarioTable = TableRegistry::getTableLocator()->get('Usuarios');
        $usuario = $usuarioTable->newEntity();

        if ($this->request->is('post')) {
            $usuario = $usuarioTable->patchEntity($usuario, $this->request->getData());
           
            if ($usuarioTable->save($usuario)) {
                $this->Flash->success(__('Usuário criado com sucesso.'));
                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error(__('Não foi possível criar usuário.'));
            }
        }
        $this->set(compact('usuario'));
    }

    public function recover()
    {

    }

}
