<html>
<body>

<h1>Login to Web App</h1>
<?=Form::post('/login', 'POST')?>
<p><?=Form::input(array('type' => 'text', 'name' => 'username', 'value' => '', 'placeholder' => 'Username'))?></p>
<p><?=Form::input(array('type' => 'password', 'name' => 'password', 'value' => '', 'placeholder' => 'Password'))?></p>
<p class="remember_me">
  <label>
    <?=Form::input(array('type' => 'checkbox', 'name' => 'remember_me', 'id' => 'remember_me'))?>
    Remember me on this computer
  </label>
</p>
<p class="submit"><input type="submit" value="Login"></p>
<?=Form::end()?>

</body>
</html>