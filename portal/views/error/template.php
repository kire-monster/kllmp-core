<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
<html>
<head>
<meta charset="utf-8">
<title>
    <?= isset($code_error)?"$code_error - ":null ?><?= isset($titulo)?$titulo:null ?>

</title>
</head>
<body>
<h1>
    <?= isset($titulo)?$titulo:null ?>

</h1>
<div>
    <?= isset($error)?$error:null ?>

</div>
</body>
</html>