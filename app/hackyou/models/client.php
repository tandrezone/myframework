<?php
/**
 * @Entity @Table(name="clients")
 **/
class client extends model
{
  /** @Id @Column(type="integer") @GeneratedValue **/
  protected $id;
  /** @Column(type="string") **/
  protected $browser;
  /** @Column(type="string") **/
  protected $ip;
  /** @Column(type="string") **/
  protected $cookies;

  private function getId(){
    return $this->id;
  }
  public function getBrowser(){
    return $this->browser;
  }
  public function getIp(){
    return $this->ip;
  }
  public function getCookies(){
    return $this->cookies;
  }

  public function setBrowser($browser){
    $this->browser->browser;
  }
  public function setIp($ip){
    $this->ip = $ip;
  }
  public function setCookies($cookies){
    $this->cookies = $cookies;
  }

}
