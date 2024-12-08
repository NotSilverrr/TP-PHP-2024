<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Titre de ma page</title>
        <meta name="description" content="Ceci est la description de la page">
    </head>
    <body>
        <h1>Template du back</h1>
        <form method="POST" action="/logout">
            <button type="submit">Logout</button>
        </form>
        <?php include $this->view;?>

    </body>
</html>

