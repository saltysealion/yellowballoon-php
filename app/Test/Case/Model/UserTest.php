<?php
App::uses('User', 'Model');

/**
 * User Test Case
 *
 */
class UserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.user',
		'app.message'
	);

  /**
   * setUp method
   *
   * @return void
   */
    public function setUp() {
      parent::setUp();
      $this->User = ClassRegistry::init('User');
    }

  /**
   * teardown method
   *
   * @return void
   */
    public function tearDown() {
      unset($this->User);

      parent::tearDown();
    }

    public function testInvalidEmail() {
        $this->User->create(array('email' => 'notvalid'));

        $this->assertEquals($this->User->validates(), false);
    }

    public function testValidEmail() {
        $this->User->create(array('email' => 'hello@yellowballoon.com'));

        $this->assertEquals($this->User->validates(), true);
    }
}
