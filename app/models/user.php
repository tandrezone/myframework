<?php
/**
 * @Entity @Table(name="users")
 **/
class user
{
  /** @Id @Column(type="integer") @GeneratedValue **/
  protected $id;
  /** @Column(type="string") **/
  protected $name;
  /** @Column(type="string") **/
  protected $password;

/**
 * [getId]
 * @return [int]
 */
  public function getId()
  {
      return $this->id;
  }

/**
 * [getName]
 * @return [string]
 */
  public function getName()
  {
    return $this->name;
  }

/**
 * [setName]
 * @param [string] $name
 */
  public function setName($name)
  {
    $this->name = $name;
  }

  public function getPassword(){
    return $this->password;
  }

  public function setPassword($password){
    $this->password = $password;
  }
}
