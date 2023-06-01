<?php

// Verifica se a requisição é do tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados enviados pelo formulário
    $nome = $_POST['NOME'];
    $email = $_POST['EMAIL'];
    $cpf = $_POST['CPF'];
    $telefone = $_POST['TELEFONE'];
    $receber = isset($_POST['RECEBER']) ? true : false;

    // Cria um array com os dados recebidos
    $dados = array(
        'NOME' => $nome,
        'EMAIL' => $email,
        'CPF' => $cpf,
        'TELEFONE' => $telefone,
        'RECEBER' => $receber
    );

    // Caminho do arquivo JSON onde os dados serão armazenados
    $caminhoArquivo = 'dados.json';

    // Lê o conteúdo atual do arquivo JSON
    $jsonAtual = file_get_contents($caminhoArquivo);

    // Decodifica o JSON em um array associativo
    $dadosAtuais = json_decode($jsonAtual, true);

    // Adiciona os novos dados ao array existente
    $dadosAtuais[] = $dados;

    // Codifica o array atualizado em JSON
    $jsonAtualizado = json_encode($dadosAtuais);

    // Salva o JSON atualizado no arquivo
    file_put_contents($caminhoArquivo, $jsonAtualizado);

    // Retorna uma resposta indicando sucesso
    echo json_encode(array('message' => 'Dados armazenados com sucesso'));
}
?>