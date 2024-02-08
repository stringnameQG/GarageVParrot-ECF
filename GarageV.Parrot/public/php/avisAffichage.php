<?php
function requeteAvis(int $infos = 0) {
    $nombreAvis = $infos;
    $pdo = new PDO('mysql:host=localhost;dbname=garagevparrot', 'root', '');
    $statement = $pdo->prepare(
        "SELECT name,first_name,comment,score 
        FROM `view` 
        WHERE active=1 
        ORDER BY id 
        LIMIT 3 OFFSET :nombreAvis
        ");
    $statement->bindValue(':nombreAvis', $nombreAvis, PDO::PARAM_INT);

    if ($statement->execute()) {
        $view = $statement->fetch(PDO::FETCH_ASSOC);
        $view = json_encode($view);
        return $view;
    } else {
        return "error";
    }
}
?>