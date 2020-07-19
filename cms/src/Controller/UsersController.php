<?php
namespace App\Controller;

class UsersController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
    }

    public function index()
    {
        $users = $this->Paginator->paginate($this->Users->find());
        $this->set(compact('users'));
    }

    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain'   => 'Articles'
        ]);
        $this->set(compact('user'));
    }

    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if($this->request->is(['post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if($this->Users->save($user)) {
                $this->Flash->success(__('Your User has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your user'));
        }

        $this->set(compact('user'));
    }

    public function edit($id = null)
    {
        $user = $this->Users->get($id);
        if($this->request->is(['post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if($this->Users->save($user)) {
                $this->Flash->success(__('Your user email {0} has been updated.', $user->email));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to edit your user'));
        }
        $this->set(compact('user'));
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        if($this->request->is(['post', 'delete'])) {
            $user = $this->Users->get($id);
            if($this->Users->save($user)) {
                $this->Flash->success(__('The {0} user has been deleted.', $user->email));
                $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to delete {0} user.', $user->email));
        }
    }


}