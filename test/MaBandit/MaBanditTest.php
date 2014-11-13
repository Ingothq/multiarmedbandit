<?php

namespace MaBandit\Test;

class MaBanditTest extends \PHPUnit_Framework_TestCase
{

  public function testWithStrategyAssignsValidStrategy()
  {
    $strategy = new \MaBandit\Strategy\EpsilonGreedy();
    $bandit = \MaBandit\MaBandit::withStrategy($strategy);
    $this->assertEquals($strategy, $bandit->getStrategy());
  }

  /**
   * @expectedException \MaBandit\Exception\BadArgumentException
   */
  public function testSetStrategyRaisesOnInvalidStrategy()
  {
    $strategy = new \stdClass();
    $bandit = \MaBandit\MaBandit::withStrategy($strategy);
  }

  public function testWithPersistorAssignsValidPersistor()
  {
    $s = new \MaBandit\Strategy\EpsilonGreedy();
    $p = new \MaBandit\Persistence\ArrayPersistor();
    $bandit = \MaBandit\MaBandit::withStrategy($s)->withPersistor($p);
    $this->assertEquals($p, $bandit->getPersistor());
  }

  /**
   * @expectedException \PHPUnit_Framework_Error
   */
  public function testWithPersistorRaisesOnInvalidStrategy()
  {
    $s = new \MaBandit\Strategy\EpsilonGreedy();
    $p = new \stdClass();
    $bandit = \MaBandit\MaBandit::withStrategy($s)->withPersistor($p);
  }
}
