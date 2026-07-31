<?php
$contactName = "";
$contactEmail = "";
$contactMessage = "";

$nameError = "";
$emailError = "";
$messageError = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $contactName = trim($_POST["name"] ?? "");
    $contactEmail = trim($_POST["email"] ?? "");
    $contactMessage = trim($_POST["message"] ?? "");

    if ($contactName === "") {
        $nameError = "Name is required.";
    }

    if ($contactEmail === "") {
        $emailError = "Email is required.";
    } elseif (!filter_var($contactEmail, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Please enter a valid email address.";
    }

    if ($contactMessage === "") {
        $messageError = "Message is required.";
    }

    if ($nameError === "" && $emailError === "" && $messageError === "") {
        $successMessage = "The message submitted successfully.";
        $contactName = "";
        $contactEmail = "";
        $contactMessage = "";
    }
}

include "includes/header.php";
?>

<main>
    <section class="about-section">
        <h1>About Campus Events Hub</h1>

        <p>
            The Campus Events Hub website is a website developed to help all university students 
            discover events taking place at the university, such as competitions, trips, and workshops.
        </p>
    </section>

    <section class="team-section">
        <h2>Team Members</h2>
        <ul>
            <li>AWATIF ALHATHWA (LEADER)</li>
            <li>WEJDAN ALSHAHRANI</li>
            <li>SHAHAD ALMUTAWAH</li>
            <li>ASEEL ALERYANI</li>
        </ul>
    </section>

    <section class="contact-section">
        <h2>Contact Us</h2>

        <?php if ($successMessage !== ""): ?>
            <p class="success-message">
                <?= htmlspecialchars($successMessage) ?>
            </p>
        <?php endif; ?>

        <form method="post" action="about.php">
            <div class="form-main">
                <label for="name">Name</label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    value="<?= htmlspecialchars($contactName) ?>"
                >

                <?php if ($nameError !== ""): ?>
                    <span class="error-message">
                        <?= htmlspecialchars($nameError) ?>
                    </span>
                <?php endif; ?>
            </div>

            <div class="form-main">
                <label for="email">Email</label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="<?= htmlspecialchars($contactEmail) ?>"
                >

                <?php if ($emailError !== ""): ?>
                    <span class="error-message">
                        <?= htmlspecialchars($emailError) ?>
                    </span>
                <?php endif; ?>
            </div>

            <div class="form-main">
                <label for="message">Message</label>

                <textarea
                    id="message"
                    name="message"
                    rows="5"
                ><?= htmlspecialchars($contactMessage) ?></textarea>

                <?php if ($messageError !== ""): ?>
                    <span class="error-message">
                        <?= htmlspecialchars($messageError) ?>
                    </span>
                <?php endif; ?>
            </div>

            <button type="submit">Send Message</button>
        </form>
    </section>
</main>

<?php include "includes/footer.php"; ?>