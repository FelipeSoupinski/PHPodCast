<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Episodios Controller
 *
 * @property \App\Model\Table\EpisodiosTable $Episodios
 *
 * @method \App\Model\Entity\Episodio[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EpisodiosController extends AppController
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
        $episodios = $this->paginate($this->Episodios);

        $this->set(compact('episodios'));
    }

    /**
     * View method
     *
     * @param string|null $id Episodio id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $episodio = $this->Episodios->get($id, [
            'contain' => ['Canais', 'Favoritos'],
        ]);

        $this->set('episodio', $episodio);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $episodio = $this->Episodios->newEntity();
        if ($this->request->is('post')) {
            $episodio = $this->Episodios->patchEntity($episodio, $this->request->getData());
            if ($this->Episodios->save($episodio)) {
                $this->Flash->success(__('The episodio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The episodio could not be saved. Please, try again.'));
        }
        $canais = $this->Episodios->Canais->find('list', ['limit' => 200]);
        $this->set(compact('episodio', 'canais'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Episodio id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $episodio = $this->Episodios->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $episodio = $this->Episodios->patchEntity($episodio, $this->request->getData());
            if ($this->Episodios->save($episodio)) {
                $this->Flash->success(__('The episodio has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The episodio could not be saved. Please, try again.'));
        }
        $canais = $this->Episodios->Canais->find('list', ['limit' => 200]);
        $this->set(compact('episodio', 'canais'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Episodio id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $episodio = $this->Episodios->get($id);
        if ($this->Episodios->delete($episodio)) {
            $this->Flash->success(__('The episodio has been deleted.'));
        } else {
            $this->Flash->error(__('The episodio could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
