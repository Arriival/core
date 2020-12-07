<html>
<body>
<?php
echo Form::open(array('url' => route('file.store'), 'files' => 'true'));
echo Form::file('avatar');
echo Form::submit('ok');
echo Form::close();
?>
</body>
</html>