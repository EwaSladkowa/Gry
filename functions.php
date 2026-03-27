<?php
function connection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gry";


    return mysqli_connect(hostname: $servername, username: $username, password: $password = "", database: $dbname);
}
function close()
{
    $connection = connection();
    mysqli_close($connection);
}
function skrypt1()
{
    $connection = connection();
    $query1 = "SELECT nazwa,punkty FROM `gry` ORDER BY punkty DESC LIMIT 5;";
    $result1 = mysqli_query($connection, $query1);
    $resultt1 = "";
    while ($a1 = mysqli_fetch_array($result1)) {
        $resultt1 .= "<ul> 
        <li><div class='div'>{$a1['nazwa']}
        <div class='punkty'>
        {$a1['punkty']}
        </div>
        </div>
        </li>
        </ul>";

    }
    return $resultt1;
}

function skrypt2()
{
    $connection = connection();
    $query2 = "SELECT id,nazwa,zdjecie FROM `gry`;";
    $result2 = mysqli_query($connection, $query2);
    $resultt2 = "";
    while ($a2 = mysqli_fetch_array($result2)) {
        $resultt2 .= "
                <section class='sekcjaIMG'>
                    <img src='{$a2['zdjecie']}'' alt='{$a2['nazwa']}' title='{$a2['id']}'>
                    <p>{$a2['nazwa']}</p>
                </section>
            ";

    }
    return $resultt2;
}

function skrypt3()
{
    if (isset($_POST['Nazwa'])) {
        $connection = connection();
        $nazwa = $_POST['Nazwa'];
        $opis = $_POST['Opis'];
        $cena = $_POST['Cena'];
        $zdjecie = $_POST['Zdjecie'];
        $query4 = "INSERT INTO `gry`(`nazwa`, `opis`, `punkty`, `cena`, `zdjecie`) VALUES ('{$nazwa}','{$opis}',{$cena},0,'{$zdjecie}');";
        $result4 = mysqli_query($connection, $query4);
        mysqli_close($connection);
        $_POST = [];
        header("Location: " . $_SERVER['PHP_SELF']);
    }
}

function skrypt4()
{
    if (isset($_POST['footOpis'])) {
        $connection = connection();
        $input = $_POST['footOpis'];
        $query3 = "SELECT nazwa,left(opis,100) opis,punkty,cena FROM `gry` WHERE id = {$input};";
        $result3 = mysqli_query($connection, $query3);
        $resultt3 = "";
        $a3 = mysqli_fetch_array($result3);
        if ($input) {
            $resultt3 = "
                <h2>{$a3['nazwa']}, {$a3['punkty']} punktów, {$a3['cena']} zł</h2>
                <p>{$a3['opis']}</p>
            ";

        }
    }
    return $resultt3;
}
?>