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
?>