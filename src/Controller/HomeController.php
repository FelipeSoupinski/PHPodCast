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

        $this->set(compact('canais'));
    }

}
