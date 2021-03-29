<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">
    <title>Coba GraphQL</title>
</head>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
</script>
<?php

$json = file_get_contents("http://localhost:4000/graphql?query={movies{id,title,genre,released_year,author}}");
$json = utf8_encode($json);
$result = json_decode($json, true);
$movies = $result["data"]["movies"];
?>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Coba Baca GraphQL</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link" aria-current="page" href="index.php">Read</a>
            </div>
        </div>
    </div>
</nav>

<div class="container">
    <h1>Movies</h1>
    <a href="http://localhost:4000/graphql" target="_blank" class="btn btn-primary mt-1 mb-1">GraphiQL</a>
    
        <table class="table table-striped display" id="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Genre</th>
                    <th>Tahun rilis</th>
                    <th>Author</th>
                </tr>
            </thead>
            <tbody>
            <?php  
            // echo '<pre>' , var_dump($movies) , '</pre>';
                foreach ($movies as $row) {
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['title'] ?></td>
                        <td><?php echo $row['genre'] ?></td>
                        <td><?php echo $row['released_year'] ?></td>
                        <td><?php echo $row['author']; ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
</div>
</body>

</html>