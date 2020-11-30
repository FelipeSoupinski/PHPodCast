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
        if($this->request->is(['POST'])){   
            $usuariosTable = TableRegistry::getTableLocator()->get('Usuarios');
            $id = $this->Auth->user('id');
            $usuario = $usuariosTable->get($id);

            $q = implode('|',$this->request->getData());
            $canalTable = TableRegistry::getTableLocator()->get('canais');
            $episodiosTable = TableRegistry::getTableLocator()->get('episodios');
            $channels = $canalTable->pesquisa($q);
            $episodes = $episodiosTable->pesquisa($q);
            
            $i = 0;
            $files = [];
            foreach($episodes as $episodio){
                $files[$i] = '../files'.DS.'canais'.DS.$episodio->canai_id.DS.'episodios'.DS.$episodio->id.DS.$episodio->arquivo;
                $canal = $canalTable->get($episodio->canai_id);
                $episodio->nome_canal = $canal->nome;
                $episodio->imagem_canal = $canal->imagem;
                $i++;
            }
            
            $favoritosTable = TableRegistry::getTableLocator()->get('Favoritos');
            $favoritos = $favoritosTable->getFavoritosByUser($id);

            
            foreach($episodes as $episodio){
                foreach($favoritos as $favorito){
                    if($favorito->episodio_id == $episodio->id){
                        $episodio->favorito = true;
                    }
                }
                if($episodio->favorito != true){
                    $episodio->favorito = false;
                }
            }

            $this->set(compact('channels', 'episodes', 'files', 'usuario'));
        }

    }
}
