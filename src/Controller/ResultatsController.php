<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Resultats Controller
 *
 * @property \App\Model\Table\ResultatsTable $Resultats
 */
class ResultatsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Evenements', 'Evenements.Categories'],
        		'order'=> ['date DESC']
        ];
        $resultats = $this->paginate($this->Resultats);

        $this->set(compact('resultats'));
        $this->set('_serialize', ['resultats']);
    }

    /**
     * View method
     *
     * @param string|null $id Resultat id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $resultat = $this->Resultats->get($id, [
            'contain' => ['Users', 'Evenements']
        ]);

        $this->set('resultat', $resultat);
        $this->set('_serialize', ['resultat']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $resultat = $this->Resultats->newEntity();
        if ($this->request->is('post')) {
            $resultat = $this->Resultats->patchEntity($resultat, $this->request->data);
            if ($this->Resultats->save($resultat)) {
                $this->Flash->success(__('The resultat has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The resultat could not be saved. Please, try again.'));
            }
        }
        $users = $this->Resultats->Users->find('list', ['order' => ['nom'=>'ASC']]);
        $evenements = $this->Resultats->Evenements->find('list', 
        		['valueField' => function ($row) {
            						return $row['evenement'] . ' - ' . $row['date']. ' - ' . $row['lieu'];
        },'order' => ['date'=>'DESC']]);
        $this->set(compact('resultat', 'users', 'evenements'));
        $this->set('_serialize', ['resultat']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Resultat id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $resultat = $this->Resultats->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $resultat = $this->Resultats->patchEntity($resultat, $this->request->data);
            if ($this->Resultats->save($resultat)) {
                $this->Flash->success(__('The resultat has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The resultat could not be saved. Please, try again.'));
            }
        }
        $users = $this->Resultats->Users->find('list', ['limit' => 200]);
        $evenements = $this->Resultats->Evenements->find('list', ['limit' => 200]);
        $this->set(compact('resultat', 'users', 'evenements'));
        $this->set('_serialize', ['resultat']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Resultat id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $resultat = $this->Resultats->get($id);
        if ($this->Resultats->delete($resultat)) {
            $this->Flash->success(__('The resultat has been deleted.'));
        } else {
            $this->Flash->error(__('The resultat could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
