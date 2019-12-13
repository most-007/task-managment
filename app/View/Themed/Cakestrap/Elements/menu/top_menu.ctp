<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button><!-- /.navbar-toggle -->
		<?php echo $this->Html->Link('L-One Task System', '/tasks', array('class' => 'navbar-brand')); ?>
	</div><!-- /.navbar-header -->
	<div class="collapse navbar-collapse navbar-ex1-collapse">
	<?php if (AuthComponent::user('id')): ?>
		<ul class="nav navbar-nav pull-right">
			<li><a href="#">Logged in as: <b><?php echo AuthComponent::user('username')?></b></a></li>
			<li class="active"><a href="/SurveyManagement/users/logout">Logout</a></li>

		</ul><!-- /.nav navbar-nav -->
		<?php endif;?>
	</div><!-- /.navbar-collapse -->
</nav><!-- /.navbar navbar-default -->
