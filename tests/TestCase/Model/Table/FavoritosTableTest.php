<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FavoritosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FavoritosTable Test Case
 */
class FavoritosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FavoritosTable
     */
    public $Favoritos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Favoritos',
        'app.Episodios',
        'app.Usuarios',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Favoritos') ? [] : ['className' => FavoritosTable::class];
        $this->Favoritos = TableRegistry::getTableLocator()->get('Favoritos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Favoritos);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
