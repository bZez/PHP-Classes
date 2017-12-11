<?php
class user
{
  private $_name;
  private $_monycks;
  private $_skill;

  public function __construct($name,$amount,$skill) {
    $this->setName($name);
    $this->setMonycks($amount);
    $this->setSkill($skill);
  }

  function setName($name)
  {
    $this->_name = $name;
  }

  public function getName()
  {
    echo $this->_name;
  }

  function setMonycks($amount)
  {
    $this->_monycks = $amount;
  }

  public function getMonycks()
  {
    echo $this->_monycks;
  }

  function setSkill($skill)
  {
    $this->_skill = $skill;
  }

  public function getSkill()
  {
    if(!$this->_skill) {
      $this->_skill = 'Unskilled';
    }
    echo $this->_skill;
  }

  public function get($what=null)
  {
    if (!$what) {
      echo '<b>';
      $this->getName();
      echo '</b>';
      echo '<br>';
      $this->getMonycks();
      echo '<br>';
      $this->getSkill();
      echo '<br>';
    } else if ($what === 'name') {
      $this->getName();
    }
    else if ($what === 'monycks') {
      $this->getMonycks();
    }
    else if ($what === 'skill') {
      $this->getSkill();
    }
  }

  public function credit($receiver,$amount)
  {
    $receiver->_monycks += $amount;
    $this->_monycks -= $amount;
  }

}
