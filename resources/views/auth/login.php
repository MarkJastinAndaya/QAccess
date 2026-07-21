<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - QAcess</title>

    <style>

        body{
            font-family:Arial,sans-serif;
            background:#f5f5f5;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .card{
            width:380px;
            background:white;
            padding:30px;
            border-radius:10px;
            box-shadow:0 5px 20px rgba(0,0,0,.1);
        }

        h1{
            margin-top:0;
        }

        input{
            width:100%;
            padding:12px;
            margin-bottom:15px;
            box-sizing:border-box;
        }

        button{
            width:100%;
            padding:12px;
            cursor:pointer;
        }

        .error{
            color:red;
            margin-bottom:15px;
        }

    </style>

</head>
<body>

<div class="card">

<h1>QAcess Login</h1>

<?php if(!empty($error)): ?>

<div class="error">

<?= htmlspecialchars($error) ?>

</div>

<?php endif; ?>

<form method="post" action="/QAccess/public/login">

<input
type="text"
name="login"
placeholder="Username or Email"
required>

<input
type="password"
name="password"
placeholder="Password"
required>

<button type="submit">

Login

</button>

</form>

</div>

</body>
</html>