<h1>Login</h1>

<form action="/login" method="post">
    <input type="text" name="email" id="email">
    <input type="password" name="password" id="password">
    <input type="submit" value="Login">
</form>

<?php if (isset($error)): ?>
    <p><?= $error ?></p>
<?php endif; ?>