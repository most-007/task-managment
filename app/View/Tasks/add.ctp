<!-- <h1> Add Task</h1> -->
<div id="sidebar" class="col-sm-3 well sidebar-nav">
	<div class="actions">

		<ul class="list-group nav nav-list">
			<li class="list-group-item"><?php echo $this->Html->link(__('List Tasks'), array('action' => 'index'), array('class' => '')); ?></li>

		</ul><!-- /.list-group -->

	</div><!-- /.actions -->
</div>
<div id="sidebar" class="col-sm-9 ">
	

	
	<form role="form" action="" method="post">
		<div class="row">


			<div class="col-md-6">
				<label for="task">Enter new task :</label>
				<div class="form-group">
					<input type="text" name="Task[task]" id="task" class="form-control input-sm" placeholder="task..">
				</div>
				<label for="description">Description:</label>
				<div class="form-group">
					<textarea name="Task[description]" id="description" class="form-control input-sm" placeholder="Task description..">

					</textarea>
				</div>
				<input type="submit" value="Add" class="btn btn-info btn-block">
			</div>


		</div>
	</form>

	
</div>