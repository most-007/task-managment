<div id="page-container" class="row">

	<div id="sidebar" class="col-sm-3">

		<div class="actions">

			<ul class="list-group">
				<li class="list-group-item"><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
				<li class="list-group-item"><?php echo $this->Html->link(__('List Users'), array('action' => 'index'), array('class' => '')); ?> </li>
				<li class="list-group-item"><?php echo $this->Html->link(__('List Tasks'), array('controller' => 'tasks', 'action' => 'index'), array('class' => '')); ?> </li>
				<li class="list-group-item"><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add'), array('class' => '')); ?> </li>

			</ul><!-- /.list-group -->

		</div><!-- /.actions -->

	</div><!-- /#sidebar .span3 -->

	<div id="page-content" class="col-sm-9">

		<div class="users view">

			<h2><?php echo __('User'); ?></h2>

			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<tbody>

						</tr>
						<tr>
							<td><strong><?php echo __('Username'); ?></strong></td>
							<td>
								<?php echo h($user['User']['username']); ?>
								&nbsp;

						</tr>
						<tr>
							<td><strong><?php echo __('Type'); ?></strong></td>
							<td>
								<?php echo h($user['User']['type']); ?>
								&nbsp;
							</td>
						</tr>
						<tr>
							<td><strong><?php echo __('Email'); ?></strong></td>
							<td>
								<?php echo h($user['User']['email']); ?>
								&nbsp;
							</td>
						</tr>
				
					</tbody>
				</table><!-- /.table table-striped table-bordered -->
			</div><!-- /.table-responsive -->

		</div><!-- /.view -->





	</div><!-- /#page-content .span9 -->

</div><!-- /#page-container .row-fluid -->