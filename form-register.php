<!DOCTYPE html>

<html lang="en">

<head>
    <link rel="stylesheet" href="form-login.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
</head>

<body>
<div class="login">
    <h2 class="login-header">Register</h2>
    <form action="register.php" method="post" class="login-container">

<p>
    <input type="text" name="username" placeholder="Username" ></input>
</p>
   <p>
    <input type="password" name="password" placeholder="Password" id="myInput" ></input>
    <br>
    <input id="check" type="checkbox" onclick="myFunction()">Show Password</input>
    <br>
    <br>
    <label for="level" ></label>
        <select name="level" class="hai">
            <option value="admin">Admin</option>
            <option value="pembeli">Peminjam</option>
        </select>
    
    <br>
    <input type="submit" value="simpan" onclick="return validasiLogin()">
</p>
<p id="regis">Sudah Punya Akun?  <a href="form-login.php" >Login</a></p>

   </form>
    </div>

    <script>

      function myFunction() {

    var x = document.getElementById("myInput");

    if (x.type === "password") {

        x.type = "text";

    } else {

        x.type = "password";

    }

}
    </script>
</body>
</html>