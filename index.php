<?php
include "data/events.php";
include "includes/header.php";
?>

<main class="main-index">
<h1>Welcome To Our Center!</h1>
<p>This website was developed to help students discover and register for all campus events.</p>

<h2>Upcoming Events</h2>
<section class="events-main">
    <?php
    $upcomingEvents = array_slice($events, 0, 2);

    foreach ($upcomingEvents as $event):
    ?>
        <div class="event-div">
            <img
                src="<?= htmlspecialchars($event["image"]) ?>"
                alt="<?= htmlspecialchars($event["title"]) ?>"
            >
            <h3><?= htmlspecialchars($event["title"]) ?></h3>
            <p><?= htmlspecialchars($event["date"]) ?></p>
            <a href="event.php?id=<?= $event["id"] ?>"> More Details </a>
        </div>

    <?php endforeach; ?>
</section>

<p>
    <a class="view-events-btn" href="events.php">
        View All Events
    </a>
</p>

</main>
<?php include "includes/footer.php"; ?>