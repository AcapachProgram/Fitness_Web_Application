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

// Example usage
$fitness_calories = 500; // Example fitness calories
$match_calories = 300; // Example match calories
$workout_calories = 200; // Example workout calories
$workout_calories = 500;

$calories_counter = new Calories_Counter_Model();
$calories_counter->calculate_total_calories($fitness_calories, $match_calories, $workout_calories);
// Output the result
$total_calories = $calories_counter->calculate_total_calories($fitness_calories, $match_calories, $workout_calories);
echo "Total Calories: " . $total_calories . "\n"; // Output: Total Calories: 1000


?>