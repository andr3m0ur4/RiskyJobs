<?php  

// Incluir as configurações, ajudantes e classes

require 'config/config.php';
require 'helpers/database.php';
require 'helpers/helpers.php';
require 'models/RiskyJob.php';
require 'models/DALRiskyJob.php';

// Criar um	objeto da classe DAL

$dal = new DALRiskyJob ( $con );

// Verificar qual arquivo (rota) deve ser usado	para tratar	a requisição

$rota = 'search';	// Rota padrão

if ( isset ( $_GET['rota'] ) OR isset ( $_GET['usersearch'] ) ) {
	$rota = ( string ) ( $_GET['rota'] ?? 'search' );
} else {
	$rota = 'search.html';
}

// Incluir o arquivo que vai tratar	a requisição

if ( is_file ( "controllers/{$rota}.php" ) ) {
	require "controllers/{$rota}.php";
} else if ( is_file ( "views/{$rota}" ) ) {
	require "views/{$rota}";
} else {
	echo 'Rota não encontrada';
}
