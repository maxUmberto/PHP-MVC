<?php

//Importa os arquivos necessários para o código
require_once 'app/Core/Core.php';

require_once 'lib/Database/Connection.php';

require_once 'app/Controller/HomeController.php';
require_once 'app/Controller/ErroController.php';

require_once 'app/Model/Postagem.php';

//Pega o que está no arquivo estrutura.html e salva na variável template
$template = file_get_contents('app/Template/estrutura.html');

//ob_start pega todos os dados de saída e guarda em buffer
ob_start();
    $core = new Core;
    //Chama a função start no objeto Core passando o que está na url como parâmetro
    $core->start($_GET);

    //Pega o retorno do buffer e armazena na variável saída
    $saida = ob_get_contents();
//esvazia o buffer e o encerra, nenhuma saída é enviada
ob_end_clean();

//Seguinte, nesse caso vamos procurar a ocorrencia de {{area_dinamica}} na nossa página estrura.html que está salvo na
//variável $template e substitui pelo o que recebemos e está salvo na variável $saida
$templatePronto = str_replace('{{area_dinamica}}', $saida, $template);

echo $templatePronto;