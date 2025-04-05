<?php


class Calories_Counter_Model {

    public function calculate_total_calories($fitness_calories, $match_calories, $workout_calories) {
        // Ensure the inputs are numeric
        if (!is_numeric($fitness_calories) || !is_numeric($match_calories) || !is_numeric($workout_calories)) {
            throw new InvalidArgumentException("All inputs must be numeric.");
        }

        // Calculate the total calories
        $total_calories = $fitness_calories + $match_calories + $workout_calories;

        return $total_calories;
    }
}

?>