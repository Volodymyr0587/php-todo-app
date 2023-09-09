<?php

$todos = [];
if (file_exists('todo.json')) {
    $json = file_get_contents('todo.json');
    $todos = json_decode($json, true);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDo</title>
</head>

<body>
    <form action="newtodo.php" method="post">
        <input type="text" name="todo_name" placeholder="Enter your todo">
        <button>New Todo</button>
    </form>
    <br>
    <?php foreach ($todos as $todoName => $todo): ?>
        <div style="margin-bottom: 20px;">
            <input type="checkbox" <?php echo $todo['comleted'] ? 'checked' : '' ?>>
            <?php echo $todoName ?>
            <form style="display: inline-block;" action="delete.php" method="post">
                <input type="hidden" name="todo_name" value="<?php echo $todoName?>">
                <button>Delete</button>
            </form>
            
        </div>
    <?php endforeach ?>
    
</body>

</html>