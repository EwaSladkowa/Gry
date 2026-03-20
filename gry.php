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
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gry";

    $connection = mysqli_connect(hostname: $servername, username: $username, password: $password = "", database: $dbname);
    ?>
    <header>
        <h1>Ranking gier komputerowych</h1>
    </header>
    <section class="sekcja">
        <aside class="SekcjaLewa">
            <h3>Top 5 gier w tym miesiącu</h3>
            <?php
            $connection = mysqli_connect(hostname: $servername, username: $username, password: $password = "", database: $dbname);
            $query1 = "SELECT nazwa,punkty FROM `gry` ORDER BY punkty DESC LIMIT 5;";
            $result1 = mysqli_query($connection, $query1);
            while ($a1 = mysqli_fetch_array($result1)) {
                echo "
            <ul>
                <li><div class='div'>{$a1['nazwa']}<div class='punkty'>{$a1['punkty']}</div></div></li>
            </ul>
            ";

            }
            mysqli_close($connection);
            ?>
            <h3>Nasz sklep</h3>
            <a href="http://sklep.gry.pl">Tu kupisz gry</a>
            <h3>Stronę wykonał</h3>
            <p>000000000000</p>
        </aside>

        <main>
            <?php
            $connection = mysqli_connect(hostname: $servername, username: $username, password: $password = "", database: $dbname);
            $query2 = "SELECT id,nazwa,zdjecie FROM `gry`;";
            $result2 = mysqli_query($connection, $query2);
            while ($a2 = mysqli_fetch_array($result2)) {
                echo "
                <section class='sekcjaIMG'>
                    <img src='{$a2['zdjecie']}'' alt='{$a2['nazwa']}' title='{$a2['id']}'>
                    <p>{$a2['nazwa']}</p>
                </section>
            ";

            }
            mysqli_close($connection);
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
            if (isset($_POST['Nazwa'])) {
                $connection = mysqli_connect(hostname: $servername, username: $username, password: $password = "", database: $dbname);
                $nazwa = $_POST['Nazwa'];
                $opis = $_POST['Opis'];
                $cena = $_POST['Cena'];
                $zdjecie = $_POST['Zdjecie'];
                $query4 = "INSERT INTO `gry`(`nazwa`, `opis`, `punkty`, `cena`, `zdjecie`) VALUES ('{$nazwa}','{$opis}',{$cena},0,'{$zdjecie}');";
                $result4 = mysqli_query($connection, $query4);
                mysqli_close($connection);
                $_POST=[];
                header("Location: ".$_SERVER['PHP_SELF']);
            }
            ?>
        </aside>
    </section>
    <footer>
        <form action="gry.php" method="post">
            <input type="text" name="footOpis" id="opisFoot">
            <button id="buttonOpis">Pokaż opis</button>

        </form>
        <?php
        if (isset($_POST['footOpis'])) {
            $connection = mysqli_connect(hostname: $servername, username: $username, password: $password = "", database: $dbname);
            $input = $_POST['footOpis'];
            $query3 = "SELECT nazwa,left(opis,100) opis,punkty,cena FROM `gry` WHERE id = {$input};";
            $result3 = mysqli_query($connection, $query3);
            $a3 = mysqli_fetch_array($result3);
            if ($input) {
                echo "
                <h2>{$a3['nazwa']}, {$a3['punkty']} punktów, {$a3['cena']} zł</h2>
                <p>{$a3['opis']}</p>
            ";
            }

            mysqli_close($connection);
        } ?>
    </footer>
</body>

</html>