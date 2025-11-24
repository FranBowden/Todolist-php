<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Task> $tasks
 */
?>


<?= $this->Html->link('View Completed Tasks', ['action' => 'completed'], ['class' => 'button']) ?>

<div class="tasks index content">

  <?= $this->Html->link(__('New Task'), ['action' => 'add'], ['class' => 'button float-right']) ?>
  <h3><?= __('Current Tasks') ?></h3>
  <div class="table-responsive">
    <table>
      <thead>
        <tr>
          <th><?= $this->Paginator->sort('id') ?></th>
          <th><?= $this->Paginator->sort('title') ?></th>
          <th><?= $this->Paginator->sort('is_completed') ?></th>
          <th><?= $this->Paginator->sort('priority') ?></th>
          <th><?= $this->Paginator->sort('created') ?></th>
          <th class="actions"><?= __('Actions') ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($tasks as $task): ?>
          <tr>
            <td><?= $this->Number->format($task->id) ?></td>
            <td><?= h($task->title) ?></td>
            <td><?= h($task->is_completed) ?></td>
            <td>
              <?php
              switch ($task->priority) {
                case 'high':
                  $color = 'red';
                  break;
                case 'medium':
                  $color = 'orange';
                  break;
                case 'low':
                  $color = 'green';
                  break;
              }
              ?>
              <span style="color:<?= $color ?>; font-weight:bold;">
                <?= ucfirst($task->priority) ?>
              </span>
            </td>

            <td><?= h($task->created) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('View'), ['action' => 'view', $task->id]) ?>
              <?= $this->Html->link(__('Edit'), ['action' => 'edit', $task->id]) ?>
              <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $task->id],
                [
                  'method' => 'delete',
                  'confirm' => __('Are you sure you want to delete # {0}?', $task->id),
                ]
              ) ?>

              <?= $this->Form->postLink(
                'Mark Done',
                ['action' => 'complete', $task->id]
              ) ?>

            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="paginator">
    <ul class="pagination">
      <?= $this->Paginator->first('<< ' . __('first')) ?>
      <?= $this->Paginator->prev('< ' . __('previous')) ?>
      <?= $this->Paginator->numbers() ?>
      <?= $this->Paginator->next(__('next') . ' >') ?>
      <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
  </div>
</div>