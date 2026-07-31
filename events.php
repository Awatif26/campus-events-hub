<?php
include "data/events.php";
include "includes/header.php";
?>

<main>
    <h1>Upcoming Events</h1>

    <section class="events-main">
        <?php foreach ($events as $event): ?>
            <article class="event-div">
                <img
                    src="<?= htmlspecialchars($event["image"]) ?>"
                    alt="<?= htmlspecialchars($event["title"]) ?>"
                >

                <h2><?= htmlspecialchars($event["title"]) ?></h2>

                <p>
                    <strong>Date:</strong>
                    <?= htmlspecialchars($event["date"]) ?>
                </p>

                <p>
                    <strong>Time:</strong>
                    <?= htmlspecialchars($event["time"]) ?>
                </p>

                <p>
                    <strong>Location:</strong>
                    <?= htmlspecialchars($event["location"]) ?>
                </p>

                <p>
                    <?= htmlspecialchars($event["short_description"]) ?>
                </p>

                <a href="event.php?id=<?= $event["id"] ?>">
                    More Details
                </a>
            </article>
        <?php endforeach; ?>
    </section>
</main>

<?php include "includes/footer.php"; ?>