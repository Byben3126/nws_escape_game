<?php
    require 'core/class/escape.php';


    if (!isset($_GET['idQuestion'])) {
        if (isset($_SERVER['HTTP_REFERER'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            header('Location: view-new.php');
        }
    }
    

    $question = Escape::getQuestion($_GET['idQuestion']);
    $error = '';
    $success = false;
    if (!$question) {
        if (isset($_SERVER['HTTP_REFERER'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            header('Location: view-new.php');
        }
    }

    if (!empty($_POST["response"])) {
        if (strtolower(trim($_POST["response"])) == strtolower(trim($question['response']))) {
            $error = "Bravo.";
            $success = true;
            Escape::updateQuestion($question['id'], $question['totalResponse'] + 1 , $question['totalSuccessResponse'] + 1);
        }else{
            $error = "Essaie encore";
            Escape::updateQuestion($question['id'], $question['totalResponse'] + 1 , $question['totalSuccessResponse']);
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

    <?php if ($success): ?>
        <h4>Félicitations, vous avez trouvé la réponse de cette énigme</h4>
    <?php else: ?>
        <h4>Énigme #<?php echo htmlspecialchars($question['id']); ?></h4>

        <p>Taux de bonnes réponses : 
            <span>
            <?php 
                if ($question['totalResponse'] != 0) {
                    echo number_format($question['totalSuccessResponse'] / $question['totalResponse'] * 100, 2) . "%";
                } else {
                    echo "N/A"; 
                }
            ?>  
            </span>
        </p>

        <form action="" method="post">
            <p class="question"><?php echo htmlspecialchars($question['question']); ?></p>
            <label>Votre réponse</label>
            <input name="response"/>
            <button>Valider</button>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        </form>
    <?php endif; ?>
</body>
</html>