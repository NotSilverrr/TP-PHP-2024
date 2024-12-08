<h1>Coucou</h1>

<form action="/register" method="post" style="display: flex; flex-direction: column; max-width: 500px;">
    <label for="firstname">Firstname</label>
    <input type="text" name="firstname" id="firstname">
    <label for="lastname">Lastname</label>
    <input type="text" name="lastname" id="lastname">
    <label for="email">Email</label>
    <input type="text" name="email" id="email">
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    <input type="submit" value="Register">
</form>

<?php if (isset($error)): ?>
    <p><?= $error ?></p>
<?php endif; ?>