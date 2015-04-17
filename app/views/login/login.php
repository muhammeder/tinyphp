<html>
<body>

<h1>Login to Web App</h1>
<?=Form::post('/login', 'POST')?>
<p><input type="text" name="username" value="" placeholder="Username or Email"></p>
<p><input type="password" name="password" value="" placeholder="Password"></p>
<p class="remember_me">
  <label>
    <input type="checkbox" name="remember_me" id="remember_me">
    Remember me on this computer
  </label>
</p>
<p class="submit"><input type="submit" name="commit" value="Login"></p>
<?=Form::end()?>

</body>
</html>