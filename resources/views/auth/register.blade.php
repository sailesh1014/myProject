<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <h2>Sign Up</h2>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Handle the form submission here
        // Example: simple validation

        $firstName = $_POST['first_name'] ?? '';
        $lastName = $_POST['last_name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $passwordConfirmation = $_POST['password_confirmation'] ?? '';
        $termsAccepted = isset($_POST['terms_and_conditions']);

        // Basic validation checks
        if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($passwordConfirmation)) {
            echo "<p style='color:red;'>All fields are required.</p>";
        } elseif ($password !== $passwordConfirmation) {
            echo "<p style='color:red;'>Passwords do not match.</p>";
        } elseif (!$termsAccepted) {
            echo "<p style='color:red;'>You must agree to the Terms and Conditions.</p>";
        } else {
            // Process the form (e.g., save to the database)
            echo "<p style='color:green;'>Registration successful!</p>";

            // Here, you could add your database insert logic, hashing the password, etc.
        }
    }
    ?>

    <form action="" method="POST">
        <!-- First Name -->
        <label for="first_name">First Name:</label><br>
        <input type="text" id="first_name" name="first_name" required><br><br>

        <!-- Last Name -->
        <label for="last_name">Last Name:</label><br>
        <input type="text" id="last_name" name="last_name" required><br><br>

        <!-- Email -->
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <!-- Password -->
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <!-- Confirm Password -->
        <label for="password_confirmation">Confirm Password:</label><br>
        <input type="password" id="password_confirmation" name="password_confirmation" required><br><br>

        <!-- Terms and Conditions -->
        <label>
            <input type="checkbox" name="terms_and_conditions" required> I agree to the Terms and Conditions
        </label><br><br>

        <!-- Submit Button -->
        <button type="submit">Sign Up</button>
    </form>
</body>
</html>
