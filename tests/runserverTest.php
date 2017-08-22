<?php

// $ php unish.clean.php --filter=testRunserver

namespace Unish;

/**
 * Tests runserver command
 *
 * @group commands
 */
class RunserverTest extends CommandUnishTestCase {

  function setUp() {
    if (!$this->getSites()) {
      $this->setUpDrupal(1, TRUE);
    }
  }

  function testRunserver() {
    $sites = $this->getSites();
    $root = $this->webroot();
    $options = array(
      'root' => $root,
      'uri' => key($sites),
      'yes' => NULL,
    );

    // This doesn't work because it blocks. We need to spin this off and have
    // a way to kill it after the fact.
    // - No way to run in background.
    // - No way to access private $this->process.
    // - No way to stop running php server from $this->process.
    $this->drush('runserver', [], $options);

//    $homepage = file_get_contents('http://127.0.0.1:8888/');
//    $this->assertContains('</title>', $homepage);

    $this->assertTrue(false);
  }

}
