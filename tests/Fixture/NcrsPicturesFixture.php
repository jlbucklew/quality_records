<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * NcrsPicturesFixture
 *
 */
class NcrsPicturesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'ncr_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'picture_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'picture_id' => ['type' => 'index', 'columns' => ['picture_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['ncr_id', 'picture_id'], 'length' => []],
            'ncrs_pictures_ibfk_1' => ['type' => 'foreign', 'columns' => ['ncr_id'], 'references' => ['ncrs', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'ncrs_pictures_ibfk_2' => ['type' => 'foreign', 'columns' => ['picture_id'], 'references' => ['pictures', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'ncr_id' => 1,
                'picture_id' => 1
            ],
        ];
        parent::init();
    }
}
