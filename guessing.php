<?php

function createAnswer() {
    return rand(1, 100);
}

function checkAnswer($answer, $guess) {
    if ($guess > $answer) {
        return "too high";
    } else if ($guess < $answer) {
        return "too low";
    } else {
        return "Ding Ding Ding!";
    }
 }

 function chooseDifficulty($difficulty) {
    switch($difficulty) {
        case 1:
        case "easy":
            return $max_guesses = 12;
            break;
        case 2:
        case "medium":
            return $max_guesses = 9;
            break;
        case 3:
        case "hard":
            return $max_guesses = 6;
            break;
        default:
            return $max_guesses = 12;
            break;
    }
}

function playGame($difficulty) {
    $answer = createAnswer();
    $max_guesses = chooseDifficulty($difficulty);
    $guesses = 0;
    $guess = 0;
    while ($guesses < $max_guesses) {
        echo "Enter your guess: ";
        $guess = floatval(trim(fgets(STDIN)));
        $guesses++;
        $result = checkAnswer($answer, $guess);
        echo $result . "\n";
        if($result === "Ding Ding Ding!") {
            echo "You win!\n";
            echo "It took you $guesses guesses\n";
            break;
        } else {
            echo "You have " . ($max_guesses - $guesses) . " guesses left\n";
        }
    }
    echo "The answer was $answer\n";
    echo "Better luck next time!\n";
}

echo "Welcome to the guessing game!\n";
echo "The rules of the game are as follows:\n";
echo "1. I will think of a number between 1 and 100.\n";
echo "2. You will try to guess that number.\n";
echo "3. If your guess is too low, I will say 'too low'.\n";
echo "4. If your guess is too high, I will say 'too high'.\n";
echo "5. If your guess is correct, I will say 'Ding Ding Ding!'.\n";
echo "6. You have a limited number of guesses to figure out my number.\n";
echo "7. If you do not guess the number in the allotted guesses, you lose.\n";
echo "8. If you guess the number in the allotted guesses, you win.\n";
echo "9. Good luck!\n";
echo "Please choose a difficulty: 1.Easy (12 chances)\n2.Medium (9 chances)\n3.Hard (6 chances)\n";
$difficulty = trim(fgets(STDIN));
playGame($difficulty);



    