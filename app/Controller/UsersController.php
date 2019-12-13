<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController
{

/**
 * Components
 *
 * @var array
 */
    public $components = array('Paginator');

    public function beforeFilter()
    {
        $this->Auth->allow('register');
    }

    public function login()
    {

        if ($this->Auth->login()) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        if ($this->request->is('post')) {

            $this->Session->setFlash('Invalid Username or Password!');
        }
    }

    public function logout()
    {
        $this->Auth->logout();
        return $this->redirect(array('action' => 'login'));
    }
/**
 * index method
 *
 * @return void
 */
    public function index()
    {
        if (!$this->Auth->user()) {
            return $this->redirect(array('controller' => 'users', 'action' => 'login'));
        }
         //check user type admin
         if (!in_array($this->Auth->user('type'), ['admin'])) {
            //  die('not admin');
            return $this->redirect(array('controller' => 'tasks', 'action' => 'index'));
           
        }

        if (!$this->Auth->user('id')) {
            return $this->redirect(array('action' => 'register'));
        }
      
        $this->User->recursive = 0;
        $this->set('users', $this->Paginator->paginate());
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function view($id = null)
    {
		if ($this->Auth->user('type') == 'normal') {
            return $this->redirect(array('controller' => 'tasks', 'action' => 'index'));
        }
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $this->set('user', $this->User->find('first', $options));
    }

/**
 * add method
 *
 * @return void
 */
    public function register()
    {
        if ($this->request->is('post')) {

            $this->User->create();

            // pr($this->request->data);
            // return;

            //hash password
            $this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);

            $this->request->data['User']['type'] = $this->request->data['User']['Admin'] ? "admin" : "normal";

            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }

        //if already logged in, redirect to home
        if ($this->Auth->user()) {
            return $this->redirect(array('action' => 'index'));

        }
    }

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function edit($id = null)
    {
        if (!in_array($this->Auth->user('type'), ['admin'])) {
            return $this->redirect(array('controller' => 'tasks', 'action' => 'index'));
        }
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
    }

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
    public function delete($id = null)
    {
        if (!in_array($this->Auth->user('type'), ['admin'])) {
            return $this->redirect(array('controller' => 'tasks', 'action' => 'index'));
        }
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->User->delete($id)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

    public function AddUser(){
        if (!in_array($this->Auth->user('type'), ['admin'])) {
            return $this->redirect(array('controller' => 'tasks', 'action' => 'index'));
        }
        if ($this->request->is('post')) {
            // print_r( $this->request->data);
            // die();
            $this->User->create();

            // pr($this->request->data);
            // return;
     
            //hash password
            // $this->request->data['User']['username'] = "normal";
            $this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);

            $this->request->data['User']['type'] = "normal";

            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }

        //if already logged in, redirect to home
        // if ($this->Auth->user()) {
        //     return $this->redirect(array('action' => 'index'));

        // }
    }
}
