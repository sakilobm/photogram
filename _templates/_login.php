<?php

$username = $_POST['email_address'];
$password = $_POST['password'];
$result = validate_credentials($username, $password);

if ($result) {
    ?>
<main class="container">
    <div class="bg-light p-5 rounded mt-3">
        <h1>Login Success</h1>
        <p class="lead">This example is a quick exercise to do basic login with html forms.</p>
    </div>
</main>
<?php
} else {
        ?>


<main class="form-signin">
    <form method="POST" action="login.php">
        <img class="mb-4"
            src="https://t3.ftcdn.net/jpg/04/73/99/10/360_F_473991023_dtwhz2AMNEZDMGoYf2b8pGJZrBcq4xk1.jpg" alt=""
            width="" height="150">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
            <input name="email_address" type="email" class="form-control" id="floatingInput"
                placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">© 2017–2022</p>
    </form>
</main>

<?php
    }
