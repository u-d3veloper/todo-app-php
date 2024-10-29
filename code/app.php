<?php
require 'utils.php';

if (isset($_GET['id'])) {
    delete_task($conn, $_GET['id']);
}
if (isset($_POST['task']) && isset($_POST['task_date'])) {
    add_task($conn, $_POST);
}

?>
<div class="layout d-flex vh-100">
    <div class="container-fluid m-4 p-2 flex-fill">
        <h1>Todo made easy</h1>
        <p> Simple todo app made with <span class="badge text-bg-light">php</span> , <span class="badge text-bg-light">mysql</span>, <span class="badge text-bg-light">docker</span>
        </p>
    </div>
    <div class="container-fluid bg-body-tertiary">
        <form action="#" method="post" class="mb-0">
            <div class="d-flex align-items-center">
                <input type="text" class="form-control m-3 w-50" placeholder="Next task" aria-label="Next-task" name="task">
                <input type="date" class="form-control m-3 w-25" aria-label="Task-date" name="task_date">
                <button class="btn btn-primary h-100 m-3" type="submit">Add</button>
            </div>
        </form>

        <div class="">
            <?php
            $tasks = get_tasks($conn);
            foreach ($tasks as $task) {
            ?>
                <div class="m-3 p-2 d-flex justify-content-between align-items-center w-75 bg-white rounded">
                    <div class="d-flex flex-column">
                        <h5 class="mb-1"><?= htmlspecialchars($task['name']) ?></h5>
                        <p class="mb-0 text-muted"><?= htmlspecialchars($task['delay']) ?></p>
                    </div>
                    <a href="index.php?id=<?= htmlspecialchars($task['id']) ?>" class="btn btn-danger btn-sm">Delete</a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>