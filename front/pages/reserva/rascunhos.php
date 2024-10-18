<?php
$data_atual = new DateTime(); // Cria um objeto DateTime com a data e hora atuais
$data_atual = $data_atual ->format('Y-m-d');
echo $data_atual ,"<br>"; // Exibe: 2024-10-16

// Define o fuso horário
date_default_timezone_set('America/Sao_Paulo'); // Ajuste para seu fuso horário, se necessário

// Obtém a hora atual
$hora_atual = date('H:i'); // Formato 24 horas
echo "Hora atual: $hora_atual"; // Exibe a hora atual
/*
forma de verificar o dia nome do dia apenas em ingles
if ($dados[3] == "sunday") {
echo"hoje é quarta";
    }
 */
/*
ver quantas mesas tem disponivel
$sql_code = "SELECT count(id_client) total from reserva where id_client = 0;"; 
$sql_query = $mysqli -> query($sql_code) or die("voce simplismente nao existe");
$variavel = $sql_query->fetch_assoc();
echo"<h2 class=\"total_reserva\"> faça sua reserva<h2/>";
echo"<h3 class=\"total_reserva\"> no momento temos<h3/> ",$variavel["total"]," mesas ";

excluir
$sql_code = "UPDATE reserva SET id_client = 0, horario = null , data_reserva = null , quantidade = 0 , dias = null WHERE id_client = {$id} LIMIT 1;";
reservar               
$sql_code = "UPDATE reserva SET id_client = {$dados[4]}, horario = '{$dados[0]}', data_reserva = '{$dados[1]}', quantidade = {$dados[2]}, dias = '{$dados[3]}' WHERE id_client = 0 LIMIT 1;";
                                */
?>