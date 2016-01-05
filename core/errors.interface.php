<?php
  Interface errorInterface{
    function __construct();
    static function set($error);
    /**
     * [add add error]
     * @param [string] $name     [nome do erro]
     * @param [string] $errormsg [mensagem do erro]
     * @param [int] $type     [tipo de erro,
     * 1-erro fatal, pára a execução,
     * 2-erro exec, nao executa o comando, mas nao para a execuçao
     * 3-erro aviso, apenas avisa e continua normalmente
     * 4-erro notice, apenas informaçao
     * 5-erro sucess, aviso de sucesso]
     */
    public function add($name,$errormsg, $type);
    /**
     * [show mostra erros guardados]
     * @return [type] [description]
     */
    public function show();
  }
?>
