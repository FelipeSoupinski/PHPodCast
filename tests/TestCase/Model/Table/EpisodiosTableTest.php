<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EpisodiosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EpisodiosTable Test Case
 */
class EpisodiosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EpisodiosTable
     */
    public $Episodios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Episodios',
        'app.Canais',
        'app.Favoritos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Episodios') ? [] : ['className' => EpisodiosTable::class];
        $this->Episodios = TableRegistry::getTableLocator()->get('Episodios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Episodios);

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
