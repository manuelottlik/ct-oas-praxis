<?php
require_once __DIR__ . '/vendor/autoload.php';

$apiInstance = new OpenAPI\Client\Api\TasksApi();

try {

    if ($_POST['action'] == "create") {
        $newTask = new OpenAPI\Client\Model\TaskWrite();

        $newTask->setText($_POST['text']);
        $newTask->setDone(0);

        $apiInstance->createTask($newTask);
    } elseif ($_POST['action'] == "update") {
        $task = $apiInstance->getTaskById($_POST['id']);
        $task->setDone(1);

        $apiInstance->updateTask($_POST['id'], $task);

    } elseif ($_POST['action'] == "delete") {
        $apiInstance->deleteTask($_POST['id']);

    }

    $tasks = $apiInstance->getTasks();

} catch (Exception $e) {
    echo $e->getMessage(), PHP_EOL;
}
echo "<center><h2>c't Task Frontend</h2>";
if (count($tasks)) {
    echo "<table>";
    foreach ($tasks as $task) {
        echo "<tr><td>";

        if ($task->getDone()) {
            echo "<strike>";
        }

        echo $task->getText();
        if ($task->getDone()) {
            echo "</strike>";
        }
        echo "</td><td>
        <form action='index.php' method='post'>
            <input type='hidden' name='action' value='update' />
            <input type='hidden' name='id' value='" . $task->getId() . "'/>
            <input type='submit' value='erledigen'>
        </form>";

        echo "</td><td>
        <form action='index.php' method='post'>
            <input type='hidden' name='action' value='delete' />
            <input type='hidden' name='id' value='" . $task->getId() . "'/>
            <input type='submit' value='löschen'>
        </form>";
        echo "</td></tr>";
    }
    echo "</table>";
} else {
    echo "es existieren noch keine Aufgaben";
}

echo "
        <form action='index.php' method='post'>
            <input type='hidden' name='action' value='create' />
            <input type='text' name='text' placeholder='neue Aufgabe'/>
            <input type='submit' value='erstellen'>
        </form>";

echo "</center>";
