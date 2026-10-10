<?php
$pageTitle = 'EcoCoins | Register';

$name = '';
$email = '';
$contact = '';
$address = '';
$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $contact = trim($_POST['contact'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';
    $terms = isset($_POST['terms']);

    // Name: letters, spaces, apostrophes, and hyphens.
    if ($name === '') {
        $errors['name'] = 'Please enter your full name.';
    } elseif (!preg_match("/^[\p{L}][\p{L} .'-]{1,}$/u", $name)) {
        $errors['name'] = 'Enter a valid name using letters only.';
    }

    // Email address.
    if ($email === '') {
        $errors['email'] = 'Please enter your email address.';
    } elseif (!preg_match(
        '/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/',
        $email
    )) {
        $errors['email'] = 'Please enter a valid email address.';
    }

    // Philippine mobile number: 09 followed by 9 digits.
    if ($contact === '') {
        $errors['contact'] = 'Please enter your contact number.';
    } elseif (!preg_match('/^09[0-9]{9}$/', $contact)) {
        $errors['contact'] = 'Enter a valid 11-digit number starting with 09.';
    }

    // Address.
    if ($address === '') {
        $errors['address'] = 'Please enter your address.';
    } elseif (strlen($address) < 5) {
        $errors['address'] = 'Address must be at least 5 characters.';
    }

    // Password.
    if ($password === '') {
        $errors['password'] = 'Please create a password.';
    } elseif (strlen($password) < 8) {
        $errors['password'] = 'Password must be at least 8 characters.';
    }

    // Confirm password.
    if ($confirmPassword === '') {
        $errors['confirm_password'] = 'Please confirm your password.';
    } elseif ($password !== $confirmPassword) {
        $errors['confirm_password'] = 'Passwords do not match.';
    }

    // Terms checkbox.
    if (!$terms) {
        $errors['terms'] = 'Please agree to the Terms and Conditions.';
    }

    if (empty($errors)) {
        $success = 'Registration form validated successfully! Database saving is not configured yet.';
    }
}

include 'includes/header.php';
?>

<main class="auth-page">
    <div class="container-fluid min-vh-100">
        <div class="row min-vh-100">

            <div class="col-lg-6 d-none d-lg-flex auth-image-section">
                <div class="auth-content text-white">

                    <div class="mb-4">
                        <i class="bi bi-person-plus display-3"></i>
                    </div>

                    <h1 class="fw-bold display-5">Join EcoCoins</h1>

                    <p class="lead">
                        Start recycling, earn EcoPoints, and contribute
                        to a cleaner barangay.
                    </p>

                    <div class="mt-4">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-qr-code fs-3 me-3"></i>
                            <div>
                                <h6 class="mb-0">Get Your Personal QR Code</h6>
                                <small>Use it when recycling.</small>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-star fs-3 me-3"></i>
                            <div>
                                <h6 class="mb-0">Earn EcoPoints</h6>
                                <small>Get points from recyclable materials.</small>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <i class="bi bi-gift fs-3 me-3"></i>
                            <div>
                                <h6 class="mb-0">Redeem Rewards</h6>
                                <small>Use your points for available rewards.</small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-6 d-flex align-items-center justify-content-center">
                <div class="auth-card register-card">

                    <div class="text-center mb-4">
                        <div class="brand-icon mx-auto mb-3">
                            <i class="bi bi-recycle"></i>
                        </div>

                        <h2 class="fw-bold mb-1">Create Account</h2>
                        <p class="text-muted">Join EcoCoins today</p>
                    </div>

                    <?php if ($success !== ''): ?>
                        <div class="alert alert-success">
                            <?= htmlspecialchars($success) ?>
                        </div>
                    <?php endif; ?>

                    <form id="registerForm" method="POST" action="register.php" novalidate>

                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-person"></i>
                                </span>
                                <input type="text"
                                       class="form-control"
                                       id="name"
                                       name="name"
                                       placeholder="Enter your full name"
                                       value="<?= htmlspecialchars($name) ?>">
                            </div>
                            <?php if (isset($errors['name'])): ?>
                                <div class="text-danger small mt-1">
                                    <?= htmlspecialchars($errors['name']) ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <input type="text"
                                       class="form-control"
                                       id="email"
                                       name="email"
                                       placeholder="Enter your email"
                                       value="<?= htmlspecialchars($email) ?>">
                            </div>
                            <?php if (isset($errors['email'])): ?>
                                <div class="text-danger small mt-1">
                                    <?= htmlspecialchars($errors['email']) ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact Number</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-telephone"></i>
                                </span>
                                <input type="text"
                                       class="form-control"
                                       id="contact"
                                       name="contact"
                                       placeholder="09XXXXXXXXX"
                                       value="<?= htmlspecialchars($contact) ?>">
                            </div>
                            <?php if (isset($errors['contact'])): ?>
                                <div class="text-danger small mt-1">
                                    <?= htmlspecialchars($errors['contact']) ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-geo-alt"></i>
                                </span>
                                <textarea class="form-control"
                                          id="address"
                                          name="address"
                                          rows="2"
                                          placeholder="Enter your barangay address"><?= htmlspecialchars($address) ?></textarea>
                            </div>
                            <?php if (isset($errors['address'])): ?>
                                <div class="text-danger small mt-1">
                                    <?= htmlspecialchars($errors['address']) ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-lock"></i>
                                </span>
                                <input type="password"
                                       class="form-control"
                                       id="password"
                                       name="password"
                                       placeholder="Create a password">
                            </div>
                            <?php if (isset($errors['password'])): ?>
                                <div class="text-danger small mt-1">
                                    <?= htmlspecialchars($errors['password']) ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">
                                Confirm Password
                            </label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-shield-lock"></i>
                                </span>
                                <input type="password"
                                       class="form-control"
                                       id="confirm_password"
                                       name="confirm_password"
                                       placeholder="Confirm your password">
                            </div>
                            <?php if (isset($errors['confirm_password'])): ?>
                                <div class="text-danger small mt-1">
                                    <?= htmlspecialchars($errors['confirm_password']) ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input"
                                       type="checkbox"
                                       id="terms"
                                       name="terms"
                                       <?= isset($_POST['terms']) ? 'checked' : '' ?>>

                                <label class="form-check-label small" for="terms">
                                    I agree to the EcoCoins
                                    <a href="#" class="text-success">
                                        Terms and Conditions
                                    </a>
                                </label>
                            </div>

                            <?php if (isset($errors['terms'])): ?>
                                <div class="text-danger small mt-1">
                                    <?= htmlspecialchars($errors['terms']) ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <button type="submit" class="btn btn-success w-100 py-2">
                            <i class="bi bi-person-plus me-1"></i>
                            Create Account
                        </button>

                    </form>

                    <div class="text-center mt-4">
                        <p class="text-muted mb-0">
                            Already have an account?
                            <a href="login.php" class="text-success fw-semibold">
                                Login here
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
    $("#registerForm").validate({
        rules: {
            name: { required: true, minlength: 2 },
            email: { required: true, email: true },
            contact: {
                required: true,
                digits: true,
                minlength: 11,
                maxlength: 11
            },
            address: { required: true, minlength: 5 },
            password: { required: true, minlength: 8 },
            confirm_password: {
                required: true,
                equalTo: "#password"
            },
            terms: { required: true }
        },
        messages: {
            name: {
                required: "Please enter your full name.",
                minlength: "Name must be at least 2 characters."
            },
            email: {
                required: "Please enter your email address.",
                email: "Please enter a valid email address."
            },
            contact: {
                required: "Please enter your contact number.",
                digits: "Please enter numbers only.",
                minlength: "Contact number must be 11 digits.",
                maxlength: "Contact number must be 11 digits."
            },
            address: {
                required: "Please enter your address.",
                minlength: "Address must be at least 5 characters."
            },
            password: {
                required: "Please create a password.",
                minlength: "Password must be at least 8 characters."
            },
            confirm_password: {
                required: "Please confirm your password.",
                equalTo: "Passwords do not match."
            },
            terms: {
                required: "Please agree to the Terms and Conditions."
            }
        },
        errorElement: "div",
        errorClass: "text-danger small mt-1",
        errorPlacement: function (error, element) {
            if (element.parent(".input-group").length) {
                error.insertAfter(element.parent(".input-group"));
            } else if (element.is(":checkbox")) {
                error.insertAfter(element.closest(".form-check"));
            } else {
                error.insertAfter(element);
            }
        }
    });
});
</script>

<?php include 'includes/footer.php'; ?>
