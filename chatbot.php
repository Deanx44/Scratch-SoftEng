<?php
header('Content-Type: application/json');

try {
    // Read JSON input
    $input = json_decode(file_get_contents("php://input"), true);

    if (!isset($input['message']) || trim($input['message']) === '') {
        echo json_encode(["status" => "error", "reply" => "No message received."]);
        exit;
    }

    $msg = escapeshellarg($input['message']);
    $pythonPath = "python";  // Change to full path to python.exe if needed
    $scriptPath = "C:\\xampp\\htdocs\\Isla de Cuyo Travel Ease\\HTML\\chat_model.py";

    // Run Python script
    $command = "$pythonPath $scriptPath $msg";
    $output = shell_exec($command);

    if ($output === null || trim($output) === "") {
        throw new Exception("Empty output from Python script.");
    }

    // Return JSON with chatbot reply
    echo json_encode([
        "status" => "success",
        "reply" => trim($output)
    ]);
} catch (Exception $e) {
    // Return fallback JSON if something goes wrong
    echo json_encode([
        "status" => "error",
        "reply" => "Oops! Something went wrong."
    ]);
}
?>