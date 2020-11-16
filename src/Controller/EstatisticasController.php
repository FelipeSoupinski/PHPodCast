<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Estatisticas Controller
 *
 * @property \App\Model\Table\EstatisticasTable $Estatisticas
 *
 * @method \App\Model\Entity\Estatistica[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EstatisticasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Canais'],
        ];
        $estatisticas = $this->paginate($this->Estatisticas);

        $this->set(compact('estatisticas'));
    }

    /**
     * View method
     *
     * @param string|null $id Estatistica id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $estatistica = $this->Estatisticas->get($id, [
            'contain' => ['Canais'],
        ]);

        $this->set('estatistica', $estatistica);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $estatistica = $this->Estatisticas->newEntity();
        if ($this->request->is('post')) {
            $estatistica = $this->Estatisticas->patchEntity($estatistica, $this->request->getData());
            if ($this->Estatisticas->save($estatistica)) {
                $this->Flash->success(__('The estatistica has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estatistica could not be saved. Please, try again.'));
        }
        $canais = $this->Estatisticas->Canais->find('list', ['limit' => 200]);
        $this->set(compact('estatistica', 'canais'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Estatistica id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $estatistica = $this->Estatisticas->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $estatistica = $this->Estatisticas->patchEntity($estatistica, $this->request->getData());
            if ($this->Estatisticas->save($estatistica)) {
                $this->Flash->success(__('The estatistica has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The estatistica could not be saved. Please, try again.'));
        }
        $canais = $this->Estatisticas->Canais->find('list', ['limit' => 200]);
        $this->set(compact('estatistica', 'canais'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Estatistica id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $estatistica = $this->Estatisticas->get($id);
        if ($this->Estatisticas->delete($estatistica)) {
            $this->Flash->success(__('The estatistica has been deleted.'));
        } else {
            $this->Flash->error(__('The estatistica could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
