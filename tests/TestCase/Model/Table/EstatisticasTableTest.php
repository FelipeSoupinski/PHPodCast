<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EstatisticasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EstatisticasTable Test Case
 */
class EstatisticasTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EstatisticasTable
     */
    public $Estatisticas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Estatisticas',
        'app.Canais',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Estatisticas') ? [] : ['className' => EstatisticasTable::class];
        $this->Estatisticas = TableRegistry::getTableLocator()->get('Estatisticas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Estatisticas);

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
