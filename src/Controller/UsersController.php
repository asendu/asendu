<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		$this->Auth->allow(['logout']);
	}
	
	public function logout()
	{
		$this->Flash->success('You are now logged out.');
		return $this->redirect($this->Auth->logout());
	}
	
	public function login()
	{
		if ($this->request->is('post')) {
			$user = $this->Auth->identify();
			if ($user) {
				$this->Auth->setUser($user);
				$session = $this->request->session();
				$session->write('User', $user);
				return $this->redirect($this->Auth->redirectUrl());
			}
			$this->Flash->error('Your username or password is incorrect.');
		}
	}

	/**
	 * mystat method
	 *
	 * @return \Cake\Network\Response|null
	 */
	public function mystat($id= Null){
		$this->loadModel('Resultats');
		if(is_null($id)){
		    $user=$this->request->session()->read('User');
		    $user_id=$user['id'];
		}else{
			$user_id=$id;
		}
		//debug($user);
		//debug($user['id']);
		
		// Resultats du user
		$resultats=$this->Resultats->find()
		        ->where(['user_id'=>$user_id])
			->contain(['Users', 'Evenements', 'Evenements.Categories'])
			->order(['date DESC']);
//				 'fields'=>["TIME_TO_SEC(temps_officiel) as temps_officiel_sec"]
				
		//debug($resultats);
		$nbresultats=$resultats->count();
		
		
		$query = $this->Resultats->find();
		$totaux=$query->select([
				'depenses'=>$query->func()->sum('inscription'),
				'distances'=>$query->func()->sum('Evenements.distance'),
		        'deniveles'=>$query->func()->sum('Evenements.denivele'),
		])
		->contain(['Evenements'])
		->where(['user_id'=>$user_id]);
		
		//debug($total);
		$this->set(compact('user','resultats','nbresultats','totaux'));
	}
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
    	$this->loadModel('Evenements');
    	$this->loadModel('Resultats');
    	$this->paginate = [
    			'order'=> ['nom ASC']
    	];
    	$users = $this->paginate($this->Users);
        foreach($users as $user){
        	$resultats=$this->Resultats->find('all',['conditions'=>['user_id'=>$user->id]]);
        	//debug($resultats);
        }

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Resultats']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
