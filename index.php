<?php
$pageTitle = 'EcoCoins | Home';
include 'includes/header.php';
include 'includes/navbar.php';
?>

<main>
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row min-vh-100 align-items-center">
                <div class="col-lg-7 hero-content">

                    <span class="badge bg-success-subtle text-success px-3 py-2 mb-3">
                        Barangay Pinagkawitan Recycling Program
                    </span>

                    <h1 class="display-3 fw-bold">
                        Recycle Today,
                        <span class="text-success">Earn EcoPoints!</span>
                    </h1>

                    <p class="lead text-secondary mt-3">
                        Help keep our barangay clean by properly disposing
                        recyclable materials and earn EcoPoints as a reward.
                    </p>

                    <div class="mt-4">
                        <a href="register.php" class="btn btn-success btn-lg px-4 me-2">
                            Get Started <i class="bi bi-arrow-right"></i>
                        </a>

                        <a href="#how-it-works" class="btn btn-outline-success btn-lg px-4">
                            Learn More
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <section id="about" class="py-5">
        <div class="container py-5">

            <div class="text-center mb-5">
                <p class="text-success fw-semibold mb-1">ABOUT ECOCOINS</p>
                <h2 class="fw-bold">Recycling Made Rewarding</h2>

                <p class="text-secondary mx-auto section-text">
                    EcoCoins is a web-based recycling reward system
                    designed for barangay residents.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card feature-card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                                <i class="bi bi-recycle"></i>
                            </div>
                            <h5 class="fw-bold">Recycle</h5>
                            <p class="text-secondary">
                                Submit recyclable materials such as
                                plastic bottles, cans, and paper.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card feature-card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                                <i class="bi bi-coin"></i>
                            </div>
                            <h5 class="fw-bold">Earn EcoPoints</h5>
                            <p class="text-secondary">
                                Earn points based on the type and
                                quantity of recyclable materials.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card feature-card border-0 shadow-sm h-100">
                        <div class="card-body text-center p-4">
                            <div class="feature-icon">
                                <i class="bi bi-gift"></i>
                            </div>
                            <h5 class="fw-bold">Get Rewards</h5>
                            <p class="text-secondary">
                                Redeem available barangay rewards
                                using your accumulated EcoPoints.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section id="how-it-works" class="py-5 bg-light">
        <div class="container py-5">

            <div class="text-center mb-5">
                <p class="text-success fw-semibold mb-1">HOW IT WORKS</p>
                <h2 class="fw-bold">Start Recycling in 4 Easy Steps</h2>
            </div>

            <div class="row g-4">
                <?php
                $steps = [
                    ['Register', 'Create your EcoCoins account.'],
                    ['Submit', 'Bring your recyclable materials to the barangay.'],
                    ['Earn', 'Receive EcoPoints from your recyclable materials.'],
                    ['Redeem', 'Redeem available rewards using your EcoPoints.']
                ];

                foreach ($steps as $index => $step):
                    ?>
                    <div class="col-md-6 col-lg-3">
                        <div class="step-card text-center">
                            <div class="step-number">
                                <?= $index + 1 ?>
                            </div>

                            <h5 class="fw-bold">
                                <?= htmlspecialchars($step[0]) ?>
                            </h5>

                            <p class="text-secondary">
                                <?= htmlspecialchars($step[1]) ?>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>
    </section>

    <section class="cta-section py-5">
        <div class="container text-center py-5">

            <h2 class="fw-bold text-white">
                Ready to Start Recycling?
            </h2>

            <p class="text-white-50">
                Join EcoCoins and help make our barangay cleaner.
            </p>

            <a href="register.php" class="btn btn-light btn-lg px-5">
                Create an Account
            </a>

        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>