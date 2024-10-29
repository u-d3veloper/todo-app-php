<?php
function get_tasks($pdo)
{
    $statement = $pdo->query("SELECT * FROM tasks ORDER by id DESC");
    return $statement->fetchAll();
}

function delete_task($pdo, $id)
{
    $statement = $pdo->prepare("DELETE FROM tasks WHERE id = :id");
    $statement->execute(
        [
            'id' => $id
        ]
    );
}
function add_task($pdo, $task_content)
{
    $task = trim($task_content);
    $delay = date('Y-m-d H:i:s');
    $statement = $pdo->prepare("INSERT INTO tasks (name, delay, state) VALUES (:name, :delay, 0)");
    $statement->execute(
        [
            'name' => $task,
            'delay' => $delay
        ]
    );
}
