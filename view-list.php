<?php
    require 'core/class/escape.php';
   

    if (isset($_GET['sort']) and $_GET['sort'] == "ASC") {
      
        $questions = Escape::getQuestions("ASC");
        
    }else{
        $questions = Escape::getQuestions("DESC");
    }
 

    if (!$questions) {
        $questions = [];
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
    <h4>Liste enigmes</h4>
    <form action="" method="get">
        <select name="sort">
            <option value="">--Triée par--</option>
            <option value="DESC">Triée par taux de reussite descroissant</option>
            <option value="ASC">Triée par taux de reussite croissant</option>
        </select>
        <button>Valider</button>
    </form>
    <ul>
        <?php foreach ($questions as $question): ?>
            <li>
                <label class="question"><?php echo htmlspecialchars($question['question']); ?></label>
                <p class="response"><?php echo htmlspecialchars($question['response']); ?></p>
                <p>taux de bonne reponse : 
                    <span>
                    <?php 
                        if ($question['totalResponse'] != 0) {
                            echo number_format($question['totalSuccessResponse'] / $question['totalResponse'] * 100,2) . "%";
                        } else {
                            echo "N/A"; 
                        }
                    ?>  
                    </span>
                </p>
                <button><a href="delete-question.php?idQuestion=<?php echo $question['id']; ?>">Supprimer</a></button>
                <a href="view-question.php?idQuestion=<?php echo $question['id']; ?>" target="_blank">Liens vers l'enigme</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>