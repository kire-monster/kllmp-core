<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Login</title>
<link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/assets/css/bootstrap-darkly.min.css">
<style>
html,
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: -webkit-box;
  display: flex;
  -ms-flex-align: center;
  -ms-flex-pack: center;
  -webkit-box-align: center;
  align-items: center;
  -webkit-box-pack: center;
  justify-content: center;
  padding-top: 40px;
  padding-bottom: 40px;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

</style>
</head>
<body>

    <form class="form-signin" method="POST" action="/index.php/login/val">
      <h1 class="h3 mb-3 font-weight-normal">Login</h1>
      <label class="sr-only">Email</label>
      <input type="email" name="usr" class="form-control" placeholder="Email" required autofocus>
      <br>
      <label class="sr-only">Password</label>
      <input type="password" name="pwd" class="form-control" placeholder="Password" required>
      <br>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

      <br>
      <div class="checkbox mb-3">
        <a href="/">Regresar</a>
      </div>
    </form>

</body>
</html>
