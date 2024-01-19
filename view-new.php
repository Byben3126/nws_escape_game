<?php
require 'core/class/escape.php';

$error = [
    "question" => "",
    "response" => "",
];

// Initialiser les valeurs des champs
$questionValue = "";
$responseValue = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["question"])) {
        $question = $_POST["question"];
        if (empty($question)) {
            $error["question"] = "La question ne peut pas être vide.";
        }
        $questionValue = $question;
        
    } else {
        $error["question"] = "Le champ question est obligatoire.";
    }

    if (isset($_POST["response"])) {
        $response = $_POST["response"];
        if (empty($response)) {
            $error["response"] = "La réponse ne peut pas être vide.";
        }
            
        $responseValue = $response;
        
    } else {
        $error["response"] = "Le champ réponse est obligatoire.";
    }

    if (empty($error["response"]) and empty($error["question"])) {
        if (Escape::createQuestion($_POST["question"], $_POST["response"])) {
            $questionValue = "";
            $responseValue = "";
            $error["response"] = "L'enigme a bien été ajouté.";
        }else{
            $error["response"] = "Echec de la souvegarde.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
        <a href="view-list.php">Liste enigmes</a>
        <a href="view-new.php">Ajouter enigmes</a>
    </nav>

    <form action="" method="post">
        <h4>Nouvelle énigme</h4>
        <label>Énigme</label>
        <textarea name="question"><?php echo htmlspecialchars($questionValue); ?></textarea>
        <p class="error"><?php echo $error["question"]; ?></p>

        <label>Réponse</label>
        <input name="response" value="<?php echo htmlspecialchars($responseValue); ?>">
        <p class="error"><?php echo $error["response"]; ?></p>
        <button>Valider</button>
    </form>
   
</body>
</html>
