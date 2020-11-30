<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Event\Event;

class HomeController extends AppController
{

    public function home()
    {
        $canaisTable = TableRegistry::getTableLocator()->get('Canais');
        $canais = $canaisTable->find('all');

        $usuariosTable = TableRegistry::getTableLocator()->get('Usuarios');
        $id = $this->Auth->user('id');
        $usuario = $usuariosTable->get($id);

        $favoritosTable = TableRegistry::getTableLocator()->get('Favoritos');
        $favoritos = $favoritosTable->getFavoritosByUser($id);

        $episodiosTable = TableRegistry::getTableLocator()->get('Episodios');

        foreach($favoritos as $favorito){
            $ep = $episodiosTable->get($favorito->episodio_id);
            $canal = $canaisTable->get($ep->canai_id);
            $favorito->canai_id = $ep->canai_id;
            $favorito->nome_canal = $canal->nome;
            $favorito->imagem_canal = $canal->imagem;
            $favorito->nome_episodio = $ep->titulo;
            $favorito->arquivo = $ep->arquivo;
        }

        $i = 0;
        $files = [];
        foreach($favoritos as $favorito){
            $files[$i] = './files'.DS.'canais'.DS.$favorito->canai_id.DS.'episodios'.DS.$favorito->episodio_id.DS.$favorito->arquivo;
            $i++;
        }

        $this->set(compact('canais', 'usuario', 'files', 'favoritos'));
    }

}
