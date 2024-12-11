<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Titre de ma page</title>
        <meta name="description" content="Ceci est la description de la page">
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="/backoffice">backoffice</a></li>
                    <?php 
                    $user = new \App\Core\User();
                    if ($user->isLogged()):
                    ?>
                    <li>
                        <form method="POST" action="/logout">
                            <button type="submit">Logout</button>
                        </form>
                    </li>
                    <?php else: ?>
                    <li><a href="/login">login</a></li>
                    <li><a href="/register">register</a></li>
                    <?php endif ?>
                </ul>
            </nav>
        </header>
        <main>
        <h1>Template du back</h1>
        
        <?php include $this->view;?>
        </main>
        <footer></footer>
    </body>
</html>

