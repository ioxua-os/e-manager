<?php
    include('conf.php');
    function abrirConexao(){
        $conn = mysqli_connect(Configuracoes::NOME_SERVIDOR, Configuracoes::USUARIO_SERVIDOR, Configuracoes::SENHA_SERVIDOR)
            or die ("ERRO: Conexão falhou.");

        mysqli_select_db($conn, Configuracoes::NOME_BANCO) or die ("ERRO: Banco de dados não selecionado.");
        return $conn;
    }
    function fecharConexao($conn){
        mysqli_close($conn);
    }