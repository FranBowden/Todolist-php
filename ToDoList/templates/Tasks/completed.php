<h1>Completed Tasks </h1>

<p><?=  $this->Html->link("Back To Tasks", ['action' => 'index'], ['class' => 'button']) ?></p>

<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Created</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($completedTasks as $task): ?>
        <tr>
            <td><?= h($task->title) ?></td>
            <td><?= $task->created->format('Y-m-d') ?></td>
            <td>
                <?= $this->Form->postLink(
                    'Undo',
                    ['action' => 'undo', $task->id],
                    ['confirm' => 'Mark this task as not completed?']
                ) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>