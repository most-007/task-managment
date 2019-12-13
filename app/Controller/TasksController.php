<?php
App::uses('AppController', 'Controller');

class TasksController extends AppController
{

/**
 * Scaffold
 *
 * @var mixed
 */
    // public $scaffold;

    public $components = array('Paginator');

    public function index()
    {
        //check user logged in
        if (!$this->Auth->user()) {
            return $this->redirect(array('controller' => 'users', 'action' => 'login'));
        }
     
        $this->set('tasks', $this->Task->find('all', array(
            'conditions' => array(
            'Task.user_id' => $this->Auth->user('id'))),$this->Paginator->paginate()));
        
    }

    public function add()
    {
        
           if ($this->request->is('post')) {
                // print_r( $this->request->data);
                // die();
                $this->Task->create();
    
                $this->request->data['Task']['user_id'] = $this->Auth->user('id');
                
                // var_dump($this->Task->save($this->request->data));
                // die();
                if ($this->Task->save($this->request->data)) {
                    $this->Flash->success(__('The Task has been saved.'));
                    return $this->redirect(array('action' => 'index'));
                } else {
                    $errors = $this->Task->validationErrors;
                    // var_dump($errors); die();
                    $this->Flash->error(__($errors['task'][0] ));
                }
            }
        
    }
    public function edit($id = null)
    {
        if (!$this->Task->exists($id)) {
            throw new NotFoundException(__('Invalid Task'));
        }
        if ($this->request->is(array('post', 'put'))) {
            // $this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
            if ($this->Task->save($this->request->data)) {
                $this->Flash->success(__('The Task has been modified.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('The Task could not be modified. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
            $this->request->data = $this->Task->find('first', $options);
            $this->set('requestData', $this->request->data);
            // var_dump($this->Task->find('first', $options));
            // die();
        }
    }

    public function view($id = null)
    {

        if (!$this->Task->exists($id)) {
            throw new NotFoundException(__('Invalid Task'));
        }
        $options = array('conditions' => array('Task.' . $this->Task->primaryKey => $id));
        $this->set('task', $this->Task->find('first', $options));        

      
    }


    public function delete($id = null)
    {
        if (!$this->Task->exists($id)) {
            throw new NotFoundException(__('Invalid Task'));
        }
        $this->request->allowMethod('post', 'delete');
        if ($this->Task->delete($id)) {
            $this->Flash->success(__('The Task has been deleted.'));
        } else {
            $this->Flash->error(__('The task could not be deleted. Please, try again.'));
        }
        return $this->redirect(array('action' => 'index'));
    }

  
}
