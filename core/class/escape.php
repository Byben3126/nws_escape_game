<?php

require 'database.php';

Class Escape {

    public static function createQuestion($question, $response) {
        try {
            $pdo = Database::connect(); 
            $request = $pdo->prepare("INSERT INTO `questions` (question, response) VALUES (:question, :response)");
            
            $request->bindParam(':question', $question);
            $request->bindParam(':response', $response);
    
            $request->execute();
            Database::disconnect();
            return true; // Retournez l'ID du nouveau contact inséré
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function getQuestion($id) {
        $pdo= Database::connect(); 
        $request = $pdo->prepare("SELECT * FROM `questions` WHERE `id` = $id LIMIT 1");
        $request->execute();
        $contacts = $request->fetchAll(PDO::FETCH_ASSOC);
        Database::disconnect();

        if (count($contacts) == 1) {
            return $contacts[0];
        }
        return false;
    }

    public static function getQuestions($sort = "DESC") {
        $pdo= Database::connect(); 
        $request = $pdo->prepare("SELECT * FROM `questions` WHERE true ORDER BY totalSuccessResponse / totalResponse ". $sort );
        $request->execute();
        $questions = $request->fetchAll(PDO::FETCH_ASSOC);
        Database::disconnect();

        if (count($questions) > 0) {
            return $questions;
        }
        return false;
    }

    public static function deleteQuestion($id) {
        try {
            $pdo= Database::connect(); 
            $request = $pdo->prepare("DELETE FROM `questions` WHERE id = $id");
            $request->execute();
            Database::disconnect();
        } catch (\Throwable $th) {
            return false;
        }
        return true;
    }
    
    public static function updateQuestion($id, $totalResponse , $totalSuccessResponse) {
        try {
            $pdo = Database::connect(); 
            $request = $pdo->prepare("UPDATE `questions` SET totalResponse = '$totalResponse', totalSuccessResponse = '$totalSuccessResponse' WHERE id = '$id'");

            $request->execute();
            Database::disconnect();
        } catch (\Throwable $th) {
            return false;
        }
        return true;
    }
}