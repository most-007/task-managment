<?php echo $this->Html->css('bootstrapform'); ?>


<div class="wrapper fadeInDown users form">
  <div id="formContent">

    <div class="fadeIn first">

      <h1>Register</h1>
      <br>
    </div>

    <!-- Login Form -->
    <?php echo $this->Form->create('User') ?>
    <fieldset>

      <?php echo $this->Form->input('username', ['class' => 'second']); ?>
      <?php echo $this->Form->input('email', ['class' => 'third', 'style' => 'background-color: #f6f6f6;
    border: none;
    color: #0d0d0d;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: block;
    font-size: 16px;
    margin: auto;
    width: 85%;
    border: 2px solid #f6f6f6;',]); ?>
      <?php echo $this->Form->input('password', ['class' => 'second', 'style' => 'background-color: #f6f6f6;
    border: none;
    color: #0d0d0d;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 5px;
    width: 85%;
	border: 2px solid #f6f6f6;']);

      echo $this->Form->input('Admin', array(
        'type' => 'checkbox','valy'

      ));

      ?>

      <?php echo $this->Form->end(__('Submit')); ?>
    </fieldset>
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="/TaskManagement/users/login">Already a member?</a>
    </div>

  </div>
</div>