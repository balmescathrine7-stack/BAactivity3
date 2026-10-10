<?php
$pageTitle = 'EcoCoins | Login';

$email = '';
$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    // Validate email using a regular expression.
    if ($email === '') {
        $errors['email'] = 'Please enter your email address.';
    } elseif (!preg_match(
        '/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/',
        $email
    )) {
        $errors['email'] = 'Please enter a valid email address.';
    }

    // Validate password.
    if ($password === '') {
        $errors['password'] = 'Please enter your password.';
    } elseif (strlen($password) < 8) {
        $errors['password'] = 'Password must be at least 8 characters.';
    }

    if (empty($errors)) {
        $success = 'Validation successful! Your input passed the checks. Database login is not configured yet.';
    }
}

include 'includes/header.php';
?>

<main class="auth-page">
    <div class="container-fluid min-vh-100">
        <div class="row min-vh-100">

            <div class="col-lg-6 d-none d-lg-flex auth-image-section">
                <div class="auth-overlay"></div>

                <div class="auth-content text-white">
                    <div class="mb-4">
                        <i class="bi bi-recycle display-3"></i>
                    </div>

                    <h1 class="fw-bold display-5">Welcome to EcoCoins</h1>

                    <p class="lead">
                        Recycle today, earn EcoPoints, and help build
                        a cleaner community.
                    </p>

                    <div class="d-flex gap-3 mt-4">
                        <div>
                            <i class="bi bi-recycle fs-3"></i>
                            <p class="small mt-2 mb-0">Recycle</p>
                        </div>

                        <div>
                            <i class="bi bi-star fs-3"></i>
                            <p class="small mt-2 mb-0">Earn Points</p>
                        </div>

                        <div>
                            <i class="bi bi-gift fs-3"></i>
                            <p class="small mt-2 mb-0">Get Rewards</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 d-flex align-items-center justify-content-center">
                <div class="auth-card">

                    <div class="text-center mb-4">
                        <div class="brand-icon mx-auto mb-3">
                            <i class="bi bi-recycle"></i>
                        </div>

                        <h2 class="fw-bold mb-1">Welcome Back!</h2>
                        <p class="text-muted">Login to your EcoCoins account</p>
                    </div>

                    <?php if ($success !== ''): ?>
                        <div class="alert alert-success">
                            <?= htmlspecialchars($success) ?>
                        </div>
                    <?php endif; ?>

                    <form id="loginForm" method="POST" action="login.php" novalidate>

                        <div class="mb-3">
                            <label for="email" class="form-label">
                                Email Address
                            </label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-envelope"></i>
                                </span>

                                <input
                                    type="text"
                                    class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>"
                                    id="email"
                                    name="email"
                                    placeholder="Enter your email"
                                    value="<?= htmlspecialchars($email) ?>"
                                >
                            </div>

                            <?php if (isset($errors['email'])): ?>
                                <div class="text-danger small mt-1">
                                    <?= htmlspecialchars($errors['email']) ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                Password
                            </label>

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-lock"></i>
                                </span>

                                <input
                                    type="password"
                                    class="form-control <?= isset($errors['password']) ? 'is-invalid' : '' ?>"
                                    id="password"
                                    name="password"
                                    placeholder="Enter your password"
                                >
                            </div>

                            <?php if (isset($errors['password'])): ?>
                                <div class="text-danger small mt-1">
                                    <?= htmlspecialchars($errors['password']) ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    id="remember"
                                    name="remember"
                                >
                                <label class="form-check-label small" for="remember">
                                    Remember me
                                </label>
                            </div>

                            <a href="#" class="small text-success">
                                Forgot Password?
                            </a>
                        </div>

                        <button type="submit" class="btn btn-success w-100 py-2">
                            <i class="bi bi-box-arrow-in-right me-1"></i>
                            Login
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <p class="text-muted mb-0">
                            Don't have an account?
                            <a href="register.php" class="text-success fw-semibold">
                                Register here
                            </a>
                        </p>
                    </div>

                    <div class="text-center mt-3">
                        <a href="index.php"
                           class="text-decoration-none text-muted small">
                            <i class="bi bi-arrow-left"></i>
                            Back to Home
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

<script>
$(function () {
    $("#loginForm").validate({
        rules: {
            email: { required: true, email: true },
            password: { required: true, minlength: 8 }
        },
        messages: {
            email: {
                required: "Please enter your email address.",
                email: "Please enter a valid email address."
            },
            password: {
                required: "Please enter your password.",
                minlength: "Password must be at least 8 characters."
            }
        },
        errorElement: "div",
        errorClass: "text-danger small mt-1",
        errorPlacement: function (error, element) {
            if (element.parent(".input-group").length) {
                error.insertAfter(element.parent(".input-group"));
            } else {
                error.insertAfter(element);
            }
        }
    });
});
</script>

<?php include 'includes/footer.php'; ?>
