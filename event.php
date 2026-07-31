<?php
include "data/events.php";
include "includes/header.php";

$selectedEvent = null;
if (isset($_GET["id"])) {
    $eventId = (int) $_GET["id"];
    foreach ($events as $event) {
        if ($event["id"] == $eventId) {
            $selectedEvent = $event;
            break;
        }
    }
}
?>

<main>
<?php if ($selectedEvent): ?>
<section class="event-details">
    <img
        src="<?= htmlspecialchars($selectedEvent["image"]); ?>"
        alt="<?= htmlspecialchars($selectedEvent["title"]); ?>"
    >
    <h1><?= htmlspecialchars($selectedEvent["title"]); ?></h1>
    <p><strong class="event-strong">Category:</strong> <?= htmlspecialchars($selectedEvent["category"]); ?></p>
    <p><strong class="event-strong">Date:</strong> <?= htmlspecialchars($selectedEvent["date"]); ?></p>
    <p><strong class="event-strong">Time:</strong> <?= htmlspecialchars($selectedEvent["time"]); ?></p>
    <p><strong class="event-strong">Location:</strong> <?= htmlspecialchars($selectedEvent["location"]); ?></p>
    <p><?= htmlspecialchars($selectedEvent["description"]); ?></p>

    <a class="register-btn"
       href="register.php?event=<?= $selectedEvent["id"]; ?>">
        Register Now
    </a>

</section>

<?php else: ?>
<h2>Event not found.</h2>
<p> The requested event does not exist.
</p>

<?php endif; ?>
</main>
<?php include "includes/footer.php"; ?>