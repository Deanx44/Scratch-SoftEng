<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $timestamp = date("Y-m-d H:i:s");
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $overall_satisfaction = htmlspecialchars($_POST['overall_satisfaction']);
    $feature_feedback = htmlspecialchars($_POST['feature_feedback']);
    $suggestions = htmlspecialchars($_POST['suggestions']);

    $file = fopen('user_testing_feedback.csv', 'a');
    if ($file) {
        fputcsv($file, [$timestamp, $name, $email, $overall_satisfaction, $feature_feedback, $suggestions]);
        fclose($file);
        $message = "Thank you for your feedback!";
        $message_type = "success";
    } else {
        $message = "Error: Unable to open file for writing.";
        $message_type = "error";
    }
} else {
    $message = "";
    $message_type = "";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zorella User Testing Form</title>
    <link rel="stylesheet" href="../CSS/base6.css">
    <link rel="stylesheet" href="../CSS/user6.css">
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #f4f7f6;
            color: #333;
            line-height: 1.6;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #26c6da;
            margin-bottom: 30px;
            font-size: 2.5em;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        input[type="text"],
        input[type="email"],
        textarea,
        select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 1em;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus,
        input[type="email"]:focus,
        textarea:focus,
        select:focus {
            border-color: #26c6da;
            outline: none;
            box-shadow: 0 0 0 3px rgba(38, 198, 218, 0.2);
        }
        textarea {
            resize: vertical;
            min-height: 100px;
        }
        button {
            display: block;
            width: 100%;
            padding: 15px;
            background: linear-gradient(90deg, #26c6da 0%, #ffb88c 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1em;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }
        button:hover {
            background: linear-gradient(90deg, #ffb88c 0%, #26c6da 100%);
            transform: translateY(-2px);
        }
        .message {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            text-align: center;
            font-weight: bold;
        }
        .message.success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .message.error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Zorella User Testing Form</h1>
        <?php if ($message): ?>
            <div class="message <?php echo $message_type; ?>">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>
        <form action="" method="POST">
            <div class="form-group">
                <label for="name">Your Name (Optional):</label>
                <input type="text" id="name" name="name" placeholder="John Doe">
            </div>
            <div class="form-group">
                <label for="email">Your Email (Optional, for follow-up):</label>
                <input type="email" id="email" name="email" placeholder="john.doe@example.com">
            </div>
            <div class="form-group">
                <label for="overall_satisfaction">Overall Satisfaction:</label>
                <select id="overall_satisfaction" name="overall_satisfaction" required>
                    <option value="">-- Select --</option>
                    <option value="5">5 - Very Satisfied</option>
                    <option value="4">4 - Satisfied</option>
                    <option value="3">3 - Neutral</option>
                    <option value="2">2 - Dissatisfied</option>
                    <option value="1">1 - Very Dissatisfied</option>
                </select>
            </div>
            <div class="form-group">
                <label for="feature_feedback">What features did you use, and what was your experience with them?</label>
                <textarea id="feature_feedback" name="feature_feedback" placeholder="e.g., The booking process was smooth, but the search filter was a bit confusing." rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="suggestions">Do you have any suggestions for improvement or new features?</label>
                <textarea id="suggestions" name="suggestions" placeholder="e.g., It would be great to have a 'save for later' option for travel packages." rows="5"></textarea>
            </div>
            <button type="submit">Submit Feedback</button>
        </form>
    </div>
</body>
</html>
