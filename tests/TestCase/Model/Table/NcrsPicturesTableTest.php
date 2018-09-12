<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NcrsPicturesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NcrsPicturesTable Test Case
 */
class NcrsPicturesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NcrsPicturesTable
     */
    public $NcrsPictures;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ncrs_pictures',
        'app.ncrs',
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
        $config = TableRegistry::getTableLocator()->exists('NcrsPictures') ? [] : ['className' => NcrsPicturesTable::class];
        $this->NcrsPictures = TableRegistry::getTableLocator()->get('NcrsPictures', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NcrsPictures);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
