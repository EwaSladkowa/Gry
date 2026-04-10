<!doctype html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gry komputerowe</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <?php
    require 'functions.php';
    $connection = connection();
    ?>
    <header>
        <h1>Ranking gier komputerowych</h1>
    </header>
    <section class="sekcja">
        <aside class="SekcjaLewa">
            <h3>Top 5 gier w tym miesiącu</h3>
            <?php
            
            echo skrypt1();
            close()
            ?>
            <h3>Nasz sklep</h3>
            <a href="http://sklep.gry.pl">Tu kupisz gry</a>
            <h3>Stronę wykonał</h3>
            <p>000000000000</p>
        </aside>

        <main>
            <?php
            echo skrypt2();
            close()
            ?>
        </main>
        <aside class="SekcjaPrawa">
            <h3>Dodaj nową grę</h3>
            <form action="gry.php" method="post">

                <label for="nazwa">nazwa</label>
                <div>
                    <input type="text" name="Nazwa" id="nazwa">
                </div>

                <label for="opis">opis</label>
                <div>
                    <input type="opis" name="Opis" id="opis">
                </div>

                <label for="cena">cena</label>
                <div>
                    <input type="number" name="Cena" id="cena">
                </div>

                <label for="zdjecie">zdjecie</label>
                <div>
                    <input type="text" name="Zdjecie" id="zdjecie">
                </div>

                <button id="button">DODAJ</button>
            </form>
            <?php
            skrypt3();
            ?>
        </aside>
    </section>
    <footer>
        <form action="gry.php" method="post">
            <input type="number" name="footOpis" id="opisFoot">
            <button id="buttonOpis">Pokaż opis</button>

        </form>
        <?php
        echo skrypt4();
        close()
        ?>
    </footer>
</body>

</html>