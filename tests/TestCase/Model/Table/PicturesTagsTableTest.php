<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PicturesTagsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PicturesTagsTable Test Case
 */
class PicturesTagsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PicturesTagsTable
     */
    public $PicturesTags;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pictures_tags',
        'app.pictures',
        'app.tags'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PicturesTags') ? [] : ['className' => PicturesTagsTable::class];
        $this->PicturesTags = TableRegistry::getTableLocator()->get('PicturesTags', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PicturesTags);

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
