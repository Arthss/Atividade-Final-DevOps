<?php

// Array para armazenar as tarefas
$todos = [];

$todos[] = [
    'id' => 1,
    'task' => 'Tarefa teste 1',
];

$todos[] = [
    'id' => 2,
    'task' => 'Tarefa teste 2',
];

$todos[] = [
    'id' => 3,
    'task' => 'Tarefa teste 3',
];

// Verificar se o método da requisição é POST para adicionar uma nova tarefa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obter os dados enviados no corpo da requisição
    $data = json_decode(file_get_contents("php://input"), true);

    // Adicionar a nova tarefa ao array
    $todos[] = [
        'id' => uniqid(),
        'task' => $data['task'],
    ];

    // Responder com os dados da tarefa recém-adicionada
    header('Content-Type: application/json');
    echo json_encode(end($todos));
    echo json_encode($todos);
}

// Verificar se o método da requisição é GET para obter a lista de tarefas
elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Responder com a lista de tarefas em formato JSON
    header('Content-Type: application/json');
    echo json_encode($todos);
}

// Verificar se o método da requisição é DELETE para excluir uma tarefa
elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Obter o ID da tarefa a ser excluída
    $id = $_GET['id'];

    // Iterar sobre as tarefas e remover a correspondente ao ID fornecido
    foreach ($todos as $key => $todo) {
        if ($todo['id'] === $id) {
            unset($todos[$key]);
            break;
        }
    }

    // Responder com uma mensagem de sucesso
    header('Content-Type: application/json');
    echo json_encode(['message' => 'Tarefa excluída com sucesso']);
}

// Se a requisição não corresponder a nenhuma condição acima, retornar 404
else {
    http_response_code(404);
    echo json_encode(['error' => 'Not Found']);
}
