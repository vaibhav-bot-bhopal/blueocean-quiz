<?php

// Include config file
include('../includes/connection.inc.php');

// Initialize the session
if (!isset($_SESSION)) {
    header("location: login-view.php");
}
// session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: addCity");
    exit;
}

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
$errors = array();

// Processing form data when form is submitted
if (isset($_POST['submit'])) {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        session_start();
        $errors['usrname'] = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $errors['pass'] = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM user WHERE username = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page
                            header("location: userDetails");
                        } else {
                            // Display an error message if password is not valid
                            session_start();
                            $errors['inpass'] = "The password you entered was not valid.";
                        }
                    }
                } else {
                    // Display an error message if username doesn't exist
                    session_start();
                    $errors['inusr'] = "No account found with that username.";
                }
            } else {
                // echo "Oops! Something went wrong. Please try again later.";
                $errors['msg'] = "Oops! Something went wrong. Please try again later.";
            }

            // more validation here if you wish
            if (count($errors) > 0) {
                $_SESSION['errors'] = $errors;
                header("Location: login-view");
                exit;
            } else {
                // clean up previous validation errors, everything's fine
                unset($_SESSION['errors']);
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($conn);
}
