<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>

<style>

body{
    margin:0;
    font-family:Arial;
    background:#f5f5f5;
}

header{
    background:#1f2937;
    color:white;
    padding:20px;
}

.container{
    width:1100px;
    margin:40px auto;
}

.card{
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
}

a{
    text-decoration:none;
}

.logout{
    display:inline-block;
    margin-top:20px;
}

</style>

</head>

<body>

<header>

<h1>QAcess Dashboard</h1>

</header>

<div class="container">

<div class="card">

<h2>

Welcome,

<?= htmlspecialchars($username) ?>

</h2>

<p>

Authentication completed successfully.

</p>

<hr>

<h3>System Status</h3>

<ul>

<li>✓ Logged In</li>

<li>✓ Database Connected</li>

<li>✓ Session Active</li>

</ul>

<a
class="logout"
href="/QAccess/public/logout">

Logout

</a>

</div>

</div>

</body>

</html>