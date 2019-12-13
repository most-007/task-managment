<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

// $cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo "Task Management"; ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
echo $this->Html->meta('icon');

echo $this->Html->css('cake.generic');
echo $this->Html->css('bootstrap.min');

echo $this->fetch('meta');
echo $this->fetch('css');
echo $this->fetch('script');

echo $this->Html->script('jquery'); // Include jQuery library
echo $this->Html->script('bootstrap.min');

?>

</head>
<body>
	<div id="container">

		<div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">


		</div>
	</div>
	<!-- <?php echo $this->element('sql_dump'); ?> -->
	<?php echo $this->Js->writeBuffer(); // Write cached scripts     ?>
</body>
</html>
