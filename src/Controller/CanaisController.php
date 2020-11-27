<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Canais Controller
 *
 * @property \App\Model\Table\CanaisTable $Canais
 *
 * @method \App\Model\Entity\Canai[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CanaisController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Usuarios'],
        ];
        $canais = $this->paginate($this->Canais);

        $this->set(compact('canais'));
    }

    /**
     * View method
     *
     * @param string|null $id Canai id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $canai = $this->Canais->get($id, [
            'contain' => ['Usuarios', 'Episodios', 'Estatisticas'],
        ]);

        $this->set('canai', $canai);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if($this->Canais->getCanal($this->Auth->user('id')) == null) {

            $canai = $this->Canais->newEntity();
            if ($this->request->is('post')) {
                $canai = $this->Canais->patchEntity($canai, $this->request->getData());
                $canai->usuario_id = $this->Auth->user('id');
                
                $imgUpload = $this->request->getData()['imagem'];
                $imgUpload['name'] = $this->Canais->slugUploadImgRed($imgUpload['name']);

                $canai->imagem = $imgUpload['name'];
                
                if ($this->Canais->save($canai)) {
                    $destino = WWW_ROOT . "files" . DS . "canais" . DS . $canai->id . DS;
                    $this->Canais->uploadImgRed($imgUpload, $destino, 270, 270);
                    
                    $this->Flash->success(__('Canal salvo com sucesso.'));

                    return $this->redirect(['action' => 'meucanal']);
                }
                $this->Flash->error(__('Não foi possivel salvar canal. Tente novamente.'));
  
            }
            $usuarios = $this->Canais->Usuarios->find('list', ['limit' => 200]);
            $this->set(compact('canai', 'usuarios'));

        } else {
            $this->Flash->error(__('Você já possui um canal.'));

            return $this->redirect(['action' => 'index']);
        }
    }

    /**
     * Edit method
     *
     * @param string|null $id Canai id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $canai = $this->Canais->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $canai = $this->Canais->patchEntity($canai, $this->request->getData());
            if ($this->Canais->save($canai)) {
                $this->Flash->success(__('The canai has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The canai could not be saved. Please, try again.'));
        }
        $usuarios = $this->Canais->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('canai', 'usuarios'));
    }

    public function meucanal()
    {
        $canai = $this->Canais->getCanal($this->Auth->user('id'));

        if($canai == null) {
            $this->Flash->error(__('Você ainda não possui um canal.'));

            return $this->redirect(['controller' => 'Canais', 'action' => 'add']);
        }

        $episodiosTable = TableRegistry::getTableLocator()->get('Episodios');
        $episodios = $episodiosTable->getEpisodios($canai->id);

        $this->set(compact('canai', 'episodios'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Canai id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $canai = $this->Canais->get($id);
        if ($this->Canais->delete($canai)) {
            $this->Flash->success(__('Canal deletado.'));
        } else {
            $this->Flash->error(__('O canal não pode ser deletado. Tente novamente.'));
        }

        return $this->redirect(['action' => 'meucanal']);
    }
}