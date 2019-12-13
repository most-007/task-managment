
<?php
echo $this->Html->css('bootstrapform');

?>


<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <!-- <img src="./avatar.png" id="icon" alt="User Icon" /> -->
	  <h1>Login</h1>
	  <br>
    </div>

    <!-- Login Form -->
    <?php echo $this->Form->create('User') ?>
<fieldset>
      <!-- <input type="text" id="username" class="fadeIn second" name="username" placeholder="username">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="password"> -->
	  <?php echo $this->Form->input('username', ['class'=>'second']); ?>
	  <?php echo $this->Form->input('password', ['class'=>'second', 'style' => 'background-color: ##2a2e2f;
    border: none;
    color: #0d0d0d;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 5px;
    width: 85%;
    border: 2px solid ##2a2e2f;']); ?>

	  <?php echo $this->Form->end(__('Login')); ?>
</fieldset>
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="/TaskManagement/users/register">Register now!</a>
    </div>

  </div>
</div>
