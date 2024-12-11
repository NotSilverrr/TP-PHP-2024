<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title??"Titre de ma page";?></title>
        <meta name="description" content="<?php echo $description??"Ceci est la description de la page";?>">
    </head>
    <body>
    <header>
            <nav>
                <ul>
                    <li><a href="/">homepage</a></li>
                    <li><a href="/login">login</a></li>
                    <li><a href="/register">register</a></li>
                </ul>
            </nav>
        </header>
        <main>
        <h1>Template du front</h1>
        <?php include $this->view;?>
        </main>
        <footer></footer>
    </body>
</html>

