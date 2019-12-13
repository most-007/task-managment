<!-- <h1>Task Index</h1> -->
<h2><?php echo __('Tasks'); ?></h2>
<div id="sidebar" class="col-sm-3 well sidebar-nav">

<div class="actions">

    <ul class="list-group nav nav-list">
    <?php if (AuthComponent::user('type') == 'admin'): ?>
    <li class="list-group-item"><?php echo $this->Html->link(__('List Users'), array( 'controller'=>'users','action' => 'index'), array('class' => '')); ?></li>
    <li class="list-group-item"><?php echo $this->Html->link(__('New User'), array( 'controller'=>'users','action' => 'AddUser'), array('class' => '')); ?></li>
		
    <?php endif?>
        <li class="list-group-item"><?php echo $this->Html->link(__('List Tasks'), array( 'action' => 'index'), array('class' => '')); ?></li>
        <li class="list-group-item"><?php echo $this->Html->link(__('New Task'), array( 'action' => 'add'), array('class' => '')); ?></li>
      
    </ul><!-- /.list-group -->

</div><!-- /.actions -->

</div><!-- /#sidebar .col-sm-3 -->
<div id="page-content" class="col-sm-9">

<div class="users index">

    

    <div class="table-responsive">
        <table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th><?php echo $this->Paginator->sort('task'); ?></th>
                   
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
            </thead>
            <tbody>
<?php foreach ($tasks as $task): ?>
<tr>
<td><?php echo h($task['Task']['task']); ?>&nbsp;</td>

<td class="actions">
    <?php echo $this->Html->link(__('View'), array('action' => 'view', $task['Task']['id']), array('class' => 'btn btn-primary btn-xs')); ?>
    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $task['Task']['id']), array('class' => 'btn btn-info btn-xs')); ?>
    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $task['Task']['id']), array('class' => 'btn btn-danger btn-xs'), __('Are you sure you want to delete # %s?', $task['Task']['id'])); ?>
</td>
</tr>
<?php endforeach;?>
            </tbody>
        </table>
    </div><!-- /.table-responsive -->

    <p><small>
        <?php
echo $this->Paginator->counter(array(
'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'),
));
?>
    </small></p>

    <ul class="pagination">
        <?php
echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
?>
    </ul><!-- /.pagination -->

</div><!-- /.index -->

</div><!-- /#page-content .col-sm-9 -->