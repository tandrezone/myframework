<?php

Interface controllerInterface{
/**
 * [__construct Construtor da funcao base de controllador]
 * @param EntityManager $em [objecto da orml doctrine, aqui devemos fazer a injecçao de dependencias]
 */
  public function __construct(EntityManager $em, $path);
  /**
   * [access Funcao que corre antes de ser executada a funcao target do sistema de routing]
   * @param  [string] $functionName [Nome da funcao que vai ser executada do target]
   * @param  [user] $me           [objecto user das minhas defeniçoes]
   * @return [boolean]               [True para executar a funçao target, false para mostrar erro de falta de permissoes, futuramente poderá executar comandos (ex: ir para a pagina de login se estiver logout e precisar de estar logado para abrir route)]
   */
  public function access($functionName, $me);
}
