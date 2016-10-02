<?php
    function abrirConexao(){
        $servidor='localhost';
        $usuario='root';
        $senha='';
        $conn = mysqli_connect($servidor, $usuario, $senha) or die ("ERRO: Conexão falhou.");
        mysqli_select_db($conn, 'bdemanager') or die ("ERRO: Não selecionou o banco de dados.");
        return $conn;
    }
    function fecharConexao($conn){
        mysqli_close($conn);
    }