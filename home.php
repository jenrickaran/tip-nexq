<?php
session_start();

require_once 'app/models/serving.php';

$ticket = $_SESSION['ticket_info'] ?? null;

if (!$ticket) {
    header('Location: index.php');
    exit;
}

$serving = new Serving($conn);
$currentServing = $serving->getAllServings();
$ticketNo = $currentServing['ticket_no'] ?? 'No Ticket';
?>

<?php include 'layout/head.php'; ?>

<body>
    <?php include 'layout/header.php'; ?>

    <main>
        <div class="ticket-info">
            <h2>Hello!</h2>
            <p><strong>Your Queue Number</strong> <?php echo htmlspecialchars($ticket['ticket_no']); ?></p>
            <!--<p><strong>Email:</strong> <?php echo htmlspecialchars($ticket['email']); ?></p>-->
            <p><strong>ESTIMATED WAIT TIME</strong> <?php echo htmlspecialchars($ticket['appointment_time']); ?></p>
            <p><strong>NOW SERVING</strong> <?php echo htmlspecialchars($ticketNo ?? 'No Ticket'); ?></p>
        </div>
    </main>

    <?php include 'layout/footer.php'; ?>
</body>

</html>