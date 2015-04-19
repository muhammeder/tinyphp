<html>

<body>
Merhaba <?=Auth::getUserName()?> <br />

<h1>New User</h1>
<?=Form::post('/', 'POST')?>
<p><?=Form::input(array('type' => 'hidden', 'name' => 'id', 'value' => $user->id))?></p>
<p><?=Form::input(array('type' => 'text', 'name' => 'username', 'value' => $user->username, 'placeholder' => 'Username'))?></p>
<p><?=Form::input(array('type' => 'password', 'name' => 'password', 'value' => '', 'placeholder' => 'Password'))?></p>
<p class="submit"><input type="submit" value="Save"></p>
<?=Form::end()?>

<table border="1">
    <th>ID</th>
    <th>Name</th>
    <th>Actions</th>
<?php foreach ($users as $u) : ?>
    <tr>
        <td><?=$u->id?></td>
        <td><?=$u->username?></td>
        <td>
            <?=Html::a('Edit', '/?id=' . $u->id)?>, 
            <?=Html::a('Delete', '/delete?id=' . $u->id)?>
        </td>
    </tr>
<?php endforeach; ?>
</table>

</body>

</html>