<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrderDetailsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrderDetailsTable Test Case
 */
class OrderDetailsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\OrderDetailsTable
     */
    public $OrderDetails;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.order_details'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('OrderDetails') ? [] : ['className' => 'App\Model\Table\OrderDetailsTable'];
        $this->OrderDetails = TableRegistry::get('OrderDetails', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OrderDetails);

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
}
