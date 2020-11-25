<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Pesquisa Controller
 *
 *
 * @method \App\Model\Entity\Pesquisa[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PesquisaController extends AppController
{
    public function search()
    {   
        $q = $this->request->getData();
        var_dump($q);

        
        //$channels = TableRegistry::getTableLocator()->get('canais')->find()->where(['nome LIKE' => '%'.$data.'%']);
        /*$channels = TableRegistry::getTableLocator()->get('canais')->find()->where(function (QueryExpression $exp, Query $q){
            return $exp->like('nome', '%'.$data.'%');
        });
        foreach($data as $q)
        {
            echo $q . "<br/>";
        }
        $this->set(compact('channels'));*/
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $pesquisa = $this->paginate($this->Pesquisa);

        $this->set(compact('pesquisa'));
    }

    /**
     * View method
     *
     * @param string|null $id Pesquisa id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pesquisa = $this->Pesquisa->get($id, [
            'contain' => [],
        ]);

        $this->set('pesquisa', $pesquisa);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pesquisa = $this->Pesquisa->newEntity();
        if ($this->request->is('post')) {
            $pesquisa = $this->Pesquisa->patchEntity($pesquisa, $this->request->getData());
            if ($this->Pesquisa->save($pesquisa)) {
                $this->Flash->success(__('The pesquisa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pesquisa could not be saved. Please, try again.'));
        }
        $this->set(compact('pesquisa'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pesquisa id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pesquisa = $this->Pesquisa->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pesquisa = $this->Pesquisa->patchEntity($pesquisa, $this->request->getData());
            if ($this->Pesquisa->save($pesquisa)) {
                $this->Flash->success(__('The pesquisa has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pesquisa could not be saved. Please, try again.'));
        }
        $this->set(compact('pesquisa'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Pesquisa id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pesquisa = $this->Pesquisa->get($id);
        if ($this->Pesquisa->delete($pesquisa)) {
            $this->Flash->success(__('The pesquisa has been deleted.'));
        } else {
            $this->Flash->error(__('The pesquisa could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
