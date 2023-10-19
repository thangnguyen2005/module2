<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style type="text/css">
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f5f5f5;
        }

        .login {
            width: 300px;
            padding: 20px;
            background-color: #fff;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-top: 0;
            margin-bottom: 20px;
            color: #333;
        }

        .login label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        .login input {
            width: 97%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .login input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            cursor: pointer;
        }

        .login input[type="submit"]:hover {
            background-color: #45a049;
        }

        .login .error {
            color: red;
            margin-top: 10px;
            text-align: center;
        }
    </style>

</head>
<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="login">
            <h2>Login</h2>
            <label>
                Username:
                <input type="text" name="username" placeholder="Username" required>
            </label>
            <label>
                Password:
                <input type="password" name="password" placeholder="Password" required>
            </label>
            <input type="submit" value="Sign in">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $password = $_POST["password"];

                if ($username === "admin" && $password === "admin") {
                    echo "<h3>Welcome <span style='color:red'>" . $username . "</span> to the website</h3>";
                } else {
                    echo "<h3 class='error'>Login Error</h3>";
                }
            }
            ?>
        </div>
    </form>
</body>
</html>
