<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

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
            $episodio->data = date_format(new \DateTime(), 'Y-m-d');
            $episodio->canai_id = ($this->Episodios->Canais->getCanal($this->Auth->user('id')))->id;
            $episodio->arquivo = $this->Episodios->slugUpload($this->request->getData()['arquivo']['name']);

            if($episodio->canai_id != null){
                if ($this->Episodios->save($episodio)) {
                    $destino = WWW_ROOT."files".DS."canais".DS.$episodio->canai_id.DS."episodios".DS.$episodio->id.DS;
                    $arquivo = $this->request->getData()['arquivo'];
                    $arquivo['name'] = $episodio->arquivo;
                    $this->Episodios->upload($arquivo, $destino);

                    $this->Flash->success(__('Episodio salvo com sucesso.'));
    
                    return $this->redirect(['controller' => 'meucanal']);
                }
                $this->Flash->error(__('Não foi possível salvar episódio. Tente novamente.'));
            } else {
                $this->Flash->error(__('Você ainda não possui um canal. Por favor, crie um primeiro.'));
                return $this->redirect(['controller' => 'Canais', 'action' => 'add']);
            }

        }
        $this->set(compact('episodio'));
    }

    public function lista($id)
    {
        $canalTable = TableRegistry::getTableLocator()->get('Canais');
        $canal = $canalTable->get($id);
        $episodios = $this->Episodios->getEpisodios($id);
        
        $i = 0;
        $files = [];
        foreach($episodios as $episodio){
            $files[$i] = '../../files'.DS.'canais'.DS.$canal->id.DS.'episodios'.DS.$episodio->id.DS.$episodio->arquivo;
            $i++;
        }

        $this->set(compact('episodios', 'canal', 'files'));
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
