<?php
if (!isset($_SESSION)) {
    session_start();
}
include('loginProcess.php');
include('../includes/connection.inc.php');
include('includes/login-header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-6  offset-lg-4 offset-md-3">
            <div class="card mt-5 mb-5" style="background-color: #E8E8E8;">
                <div class="logo text-center mt-4">
                    <img src='../img/logo/mptfslogo.png' alt='MPTFS Logo' width='80' height='80' class="img-fluid" style="opacity:1;">
                </div>

                <div class="card-body">
                    <div class='h4 text-center text-dark'>Login</div>
                    <p class='text-center'>Please fill in your credentials to login.</p>
                    <form action="loginProcess.php" method="POST">
                        <div class="form-group <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value="<?php echo isset($_POST["username"]) ? $_POST["username"] : ''; ?>" placeholder="Enter Your Username">
                            <span class="help-block text-danger" style="font-weight: 600;">
                                <?php
                                if (isset($_SESSION['errors']['usrname'])) {
                                    echo $_SESSION['errors']['usrname'];
                                    unset($_SESSION['errors']['usrname']);
                                } else if (isset($_SESSION['errors']['inusr'])) {
                                    echo $_SESSION['errors']['inusr'];
                                    unset($_SESSION['errors']['inusr']);
                                }
                                ?>
                            </span>
                        </div>
                        <div class="form-group <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Your Password">
                            <span class="help-block text-danger" style="font-weight: 600;">
                                <?php
                                if (isset($_SESSION['errors']['pass'])) {
                                    echo $_SESSION['errors']['pass'];
                                    unset($_SESSION['errors']['pass']);
                                } else if (isset($_SESSION['errors']['inpass'])) {
                                    echo $_SESSION['errors']['inpass'];
                                    unset($_SESSION['errors']['inpass']);
                                }
                                ?>
                            </span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-primary" value="Login">
                        </div>
                        <!-- s<p>Don't have an account? <a href="#">Sign up now</a>.</p> -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>