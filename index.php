<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="love.png" type="image/jpeg">
    <title>bomba</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styl.css">
</head>

<body>

    <nav class="navbar navbar-expand-sm justify-content-center">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#infoModal"><img src="info.png"></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#heartModal"><img src="heart.png"></a>
            </li>
        </ul>
    </nav>
    <br>

    <?php
    function fetch_random_people($limit = 1) {
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "osoby";

        $conn = new mysqli($host, $username, $password, $database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT imie, wiek, opis FROM wszys ORDER BY RAND() LIMIT $limit";
        $result = $conn->query($sql);

        $people = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $people[] = $row;
            }
        } else {
            echo "Brak wyników";
        }

        $conn->close();
        return $people;
    }

    $heart_people = fetch_random_people(3);
    ?>

    <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="infoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="infoModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Znajdź super znajomych<br>
                    Obecnie dostępni użytkownicy : <p id="demo"></p>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="heartModal" tabindex="-1" role="dialog" aria-labelledby="heartModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="heartModalLabel"> Ostatnio polubili cię</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    foreach ($heart_people as $person) {
                        echo '<p>' . $person["imie"] . ' ' . $person["wiek"] . '</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4" id="card-container">
                <?php
                function fetch_random_person() {
                    global $heart_people;
                    if (empty($heart_people)) {
                        $heart_people = fetch_random_people(1);
                    }
                    $person = $heart_people[0];
                    echo '<div class="card mb-4">';
                    echo '<img class="prof" src="user.png">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $person["imie"] . " " . $person['wiek'] . '</h5>';
                    echo '<p class="card-text">' . $person["opis"] . '</p>';
                    echo '</div>';
                    echo '</div>';
                }

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    fetch_random_person();
                } else {
                    fetch_random_person();
                }
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <form method="post" action="">
                    <button type="submit" name="prev" class="btn btn-success"><img src="l.png"></button>
                    <button onclick="dodaj()" type="button" class="btn btn-warning"><img src="s.png"></button>
                    <button type="submit" name="next" class="btn btn-danger"><img src="p.png"></button>
                </form>
            </div>
        </div>
    </div>
    <script>
    function dodaj() {
        alert("Wysłano zaproszenie do znajomych");
    }
    document.getElementById("demo").innerHTML = 10 + Math.floor(Math.random() * 90);
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>