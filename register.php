<?php
include "data/events.php";

$name = "";
$studentId = "";
$email = "";
$selectedEvent = $_GET["event"] ?? "";

$nameError = "";
$idError = "";
$emailError = "";
$eventError = "";
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $studentId = trim($_POST["student_id"]);
    $email = trim($_POST["email"]);
    $selectedEvent = trim($_POST["event"]);

    if ($name == "") {
        $nameError = "Please enter your name.";
    }

    if ($studentId == "") {
        $idError = "Please enter your student ID.";
    }

    if ($email == "") {
        $emailError = "Please enter your email.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format.";
    }

    if ($selectedEvent == "") {
        $eventError = "Please select an event.";
    }

    if (
    empty($nameError) &&
    empty($idError) &&
    empty($emailError) &&
    empty($eventError)
) {

    $eventTitle = "";

    foreach ($events as $event) {

        if ($event["id"] == $selectedEvent) {
            $eventTitle = $event["title"];
            break;
        }

    }

    $file = fopen("data/registrations.csv", "a");

    fputcsv($file, [
        $name,
        $studentId,
        $email,
        $eventTitle
    ]);

    fclose($file);

    $successMessage = "Registration completed successfully.";

    $name = "";
    $studentId = "";
    $email = "";
    $selectedEvent = "";
}
}

include "includes/header.php";
?>

<main>

<h1>Event Registration</h1>

<?php if ($successMessage != ""): ?>
    <p class="success-message">
        <?= $successMessage; ?>
    </p>
<?php endif; ?>

<form method="post">

<div class="form-register">

<label>Name</label>

<input
type="text"
name="name"
value="<?= htmlspecialchars($name); ?>"
>

<span class="error-message">
<?= $nameError; ?>
</span>

</div>

<div class="form-register">
<label>Student ID</label>
<input
type="text"
name="student_id"
value="<?= htmlspecialchars($studentId); ?>"
>

<span class="error-message">
<?= $idError; ?>
</span>
</div>

<div class="form-register">
<label>Email</label>
<input
type="email"
name="email"
value="<?= htmlspecialchars($email); ?>"
>

<span class="error-message">
<?= $emailError; ?>
</span>
</div>

<div class="form-register">
<label>Select Event</label>
<select name="event">
<option value="">Choose an Event</option>

<?php foreach ($events as $event): ?>
<option
value="<?= $event["id"]; ?>"
<?= ($selectedEvent == $event["id"]) ? "selected" : ""; ?>
>

<?= htmlspecialchars($event["title"]); ?>
</option>

<?php endforeach; ?>
</select>

<span class="error-message">
<?= $eventError; ?>
</span>
</div>

<button type="submit">
Register
</button>
</form>
</main>

<?php include "includes/footer.php"; ?>