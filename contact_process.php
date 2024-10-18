<?php
// Database credentials
$servername = "localhost"; // XAMPP usually uses 'localhost'
$username = "root";        // Default username for XAMPP
$password = "";            // Default password for XAMPP (usually empty)
$dbname = "coca_cola_data"; // Ensure this matches the database name you created

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture and sanitize form data
    $name = $conn->real_escape_string($_POST['inputName']);
    $email = $conn->real_escape_string($_POST['inputEmail']);
    $phone = $conn->real_escape_string($_POST['inputPhone']);
    $subject = $conn->real_escape_string($_POST['inputSubject']);
    $message = $conn->real_escape_string($_POST['inputMessage']);
    $agreement = isset($_POST['inputAgreement']) ? 1 : 0; // Checkbox: 1 if checked, 0 if not
    
    // Insert form data into the database
    $sql = "INSERT INTO contacts (name, email, phone, subject, message, agreement) VALUES ('$name', '$email', '$phone', '$subject', '$message', '$agreement')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Thank you, your message has been submitted successfully!');
                window.location.href = 'index.html'; // Redirect to home page
              </script>";
        // Optionally redirect to a thank you page or show a success message
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
}
?>