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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NexQ - Ticket</title>
    <link rel="stylesheet" href="css/font-family.css">
    <link rel="stylesheet" href="css/body.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-[#0a0a0a] flex flex-col min-h-screen gap-10">
    <header class="flex flex-col justify-center items-center lg:justify-start lg:items-stretch lg:flex-row lg:gap-5 lg:pt-8 lg:px-8 pt-3">
        <img src="public/png/tip-logo.png" alt="Tip Logo" class="lg:size-24 size-[90px]">

        <div class="flex flex-col justify-center lg:justify-start lg:items-stretch items-center gap-2 lg:gap-0">
            <h1 class="text-white text-5xl font-semibold">Nex<span class="text-[#fdd201]">Q</span></h1>
            <h2 class="text-white font-semibold hidden lg:block">Queue Notification System</h2>
            <h3 class="text-white font-semibold hidden lg:block">Student Accounting Office</h3>
        </div>

        <!--for the dropdown languages-->

    </header>

    <main class="mx-auto max-w-[1440px] flex-1">
        <div class="ticket-info text-white flex flex-col justify-center items-center gap-4">
            <h2 class="text-4xl font-semibold">Hello!</h2>

            <div class="w-full flex flex-col justify-center items-center">
                <h3 class="text-[#fed201]">
                    Your Queue Number
                </h3>
                <div class="w-full border-3 border-[#fed201] flex flex-col justify-center items-center p-5 rounded-3xl bg-zinc-900/40">
                    <h1 class="text-[200px] font-bold">
                        <?php echo htmlspecialchars($ticket['ticket_no']); ?>
                    </h1>
                    <h2>Thank you! Please wait for your turn.</h2>
                </div>
            </div>

            <!--<p><strong>Email:</strong> <?php echo htmlspecialchars($ticket['email']); ?></p>-->

            <div class="flex gap-5">
                <div class="flex flex-col justify-center items-center border-3 border-[#fed201] p-5 rounded-3xl bg-zinc-900/40">
                    <h1 class="text-2xl">NOW SERVING</h1>
                    <div class="text-9xl font-bold text-[#fed201]">
                        <?php echo htmlspecialchars($ticketNo ?? 'No Ticket'); ?>
                    </div>
                </div>

                <div class="flex flex-col justify-center items-center border-3 border-[#fed201] p-5 rounded-3xl bg-zinc-900/40">
                    <h1 class="text-2xl">ESTIMATED WAIT TIME</h1>
                    <div class="text-9xl font-bold">
                        <?php
                        date_default_timezone_set('Asia/Manila');

                        $appointment = new DateTime($ticket['appointment_time']);
                        $now = new DateTime();

                        $diff = $now->diff($appointment);

                        if ($appointment > $now) {
                            if ($diff->h > 0) {
                                echo '<span class="text-[#fed201]">' . $diff->h . '</span>';
                                echo '<span class="text-3xl font-medium text-[#fed201]">hr' . ($diff->h > 1 ? 's' : '') . '</span>';

                                if ($diff->i > 0) {
                                    echo '<span class="text-3xl font-medium text-[#fed201]">' . $diff->i . 'min' . ($diff->i > 1 ? 's' : '') . '</span>';
                                }
                            } else {
                                echo '<span class="text-[#fed201]">' . $diff->i . '</span>';
                                echo '<span class="text-3xl font-medium text-[#fed201]">min' . ($diff->i > 1 ? 's' : '') . '</span>';
                            }
                        } else {
                            echo '<span class="text-[#fed201]">0</span>';
                            echo '<span class="text-3xl font-medium text-[#fed201]">mins</span>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex mt-10 gap-4">
            <svg fill="#ffffff" width="50px" height="50px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <title>notice1</title>
                <path d="M15.5 3c-7.456 0-13.5 6.044-13.5 13.5s6.044 13.5 13.5 13.5 13.5-6.044 13.5-13.5-6.044-13.5-13.5-13.5zM15.5 27c-5.799 0-10.5-4.701-10.5-10.5s4.701-10.5 10.5-10.5 10.5 4.701 10.5 10.5-4.701 10.5-10.5 10.5zM15.5 10c-0.828 0-1.5 0.671-1.5 1.5v5.062c0 0.828 0.672 1.5 1.5 1.5s1.5-0.672 1.5-1.5v-5.062c0-0.829-0.672-1.5-1.5-1.5zM15.5 20c-0.828 0-1.5 0.672-1.5 1.5s0.672 1.5 1.5 1.5 1.5-0.672 1.5-1.5-0.672-1.5-1.5-1.5z"></path>
            </svg>

            <div class="text-white">
                <h1>
                    Please keep this page open.
                </h1>
                <h1>
                    You will be notified when it's almost your turn.
                </h1>
            </div>
        </div>
    </main>

    <footer class="md:flex md:justify-between bg-[#fed201] px-8 md:pt-3 md:pb-2">
        <div class="flex gap-1 md:gap-5 md:flex-row flex-col justify-center items-center">
            <img src="public/png/tip-logo.png" alt="Tip Logo" class="size-24">

            <div class="flex flex-col justify-center font-semibold">
                <h2 class="text-center md:text-start">
                    Technological Institute of the Philippines
                </h2>

                <h2 class="text-center md:text-start">
                    Student Accounting Office
                </h2>
            </div>
        </div>

        <div class="lg:flex flex-col justify-center items-end hidden">
            <h1 class="text-5xl font-bold">Nex<span class="text-[#36454F]">Q</span></h1>
            <p class="font-semibold">Smart Queue. Less Wait. Better Experience.</p>
        </div>
    </footer>
</body>

</html>