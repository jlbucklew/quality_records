<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NcrsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NcrsTable Test Case
 */
class NcrsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NcrsTable
     */
    public $Ncrs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ncrs',
        'app.jobs',
        'app.pictures'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Ncrs') ? [] : ['className' => NcrsTable::class];
        $this->Ncrs = TableRegistry::getTableLocator()->get('Ncrs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ncrs);

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
