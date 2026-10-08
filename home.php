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

<body class="bg-zinc-900 flex flex-col min-h-screen gap-10">
    <header class="flex flex-col justify-center items-center lg:justify-start lg:items-stretch lg:flex-row lg:gap-5 lg:pt-8 lg:px-8 pt-3">
        <img src="public/png/tip-logo.png" alt="Tip Logo" class="lg:size-24 size-[90px]">

        <div class="flex flex-col justify-center lg:justify-start lg:items-stretch items-center gap-2 lg:gap-0">
            <h1 class="text-white text-5xl font-semibold">Nex<span class="text-[#fdd201]">Q</span></h1>
            <h2 class="text-white font-semibold hidden lg:block">Queue Notification System</h2>
            <h3 class="text-white font-semibold hidden lg:block">Student Accounting Office</h3>
        </div>

        <!--for the dropdown languages-->

    </header>

    <main class="mx-auto max-w-[1440px] flex-1 p-5 lg:p-0">
        <div class="ticket-info text-white flex flex-col justify-center items-center gap-4">
            <h2 class="text-4xl font-semibold">Hello!</h2>

            <div class="w-full flex flex-col justify-center items-center">
                <h3 class="text-[#fed201]">
                    Your Queue Number
                </h3>
                <div class="w-full border-3 border-[#fed201] flex flex-col justify-center items-center rounded-3xl bg-zinc-900/40">
                    <h1 class="text-[200px] font-bold">
                        <?php echo htmlspecialchars($ticket['ticket_no']); ?>
                    </h1>
                    <h2>Thank you! Please wait for your turn.</h2>
                </div>
            </div>

            <!--<p><strong>Email:</strong> <?php echo htmlspecialchars($ticket['email']); ?></p>-->

            <div class="flex gap-5 flex-col md:flex-row">
                <div class="flex flex-col justify-center items-center border-3 border-[#fed201] p-5 rounded-3xl bg-zinc-900/40">
                    <div class="flex gap-3 items-center">
                        <svg
                            viewBox="0 0 600 600"
                            version="1.1"
                            id="svg9724"
                            sodipodi:docname="people.svg"
                            inkscape:version="1.2.2 (1:1.2.2+202212051550+b0a8486541)"
                            width="40"
                            height="40"
                            xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                            xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:svg="http://www.w3.org/2000/svg">
                            <defs
                                id="defs9728" />
                            <sodipodi:namedview
                                id="namedview9726"
                                pagecolor="#ffffff"
                                bordercolor="#666666"
                                borderopacity="1.0"
                                inkscape:showpageshadow="2"
                                inkscape:pageopacity="0.0"
                                inkscape:pagecheckerboard="0"
                                inkscape:deskcolor="#d1d1d1"
                                showgrid="true"
                                inkscape:zoom="0.84118632"
                                inkscape:cx="319.19207"
                                inkscape:cy="427.37262"
                                inkscape:window-width="1920"
                                inkscape:window-height="1009"
                                inkscape:window-x="0"
                                inkscape:window-y="1080"
                                inkscape:window-maximized="1"
                                inkscape:current-layer="g10449"
                                showguides="true">
                                <inkscape:grid
                                    type="xygrid"
                                    id="grid9972"
                                    originx="0"
                                    originy="0" />
                                <sodipodi:guide
                                    position="-260,300"
                                    orientation="0,-1"
                                    id="guide383"
                                    inkscape:locked="false" />
                                <sodipodi:guide
                                    position="300,520"
                                    orientation="1,0"
                                    id="guide385"
                                    inkscape:locked="false" />
                                <sodipodi:guide
                                    position="240,520"
                                    orientation="0,-1"
                                    id="guide939"
                                    inkscape:locked="false" />
                                <sodipodi:guide
                                    position="220,80"
                                    orientation="0,-1"
                                    id="guide941"
                                    inkscape:locked="false" />
                            </sodipodi:namedview>

                            <g
                                id="g10449"
                                transform="matrix(0.95173205,0,0,0.95115787,13.901174,12.168794)"
                                style="stroke-width:1.05103">
                                <g
                                    id="path10026"
                                    inkscape:transform-center-x="-0.59233046"
                                    inkscape:transform-center-y="-20.347403"
                                    transform="matrix(1.3807551,0,0,1.2700888,273.60014,263.99768)" />
                                <g
                                    id="g11314"
                                    transform="matrix(1.5092301,0,0,1.3955555,36.774048,-9.4503933)"
                                    style="stroke-width:50.6951" />
                                <path
                                    style="color:#fed201;fill:#fed201;stroke-width:1.05103;stroke-linecap:round;stroke-linejoin:round;-inkscape-stroke:none;paint-order:stroke fill markers"
                                    d="m 248.07279,-12.793664 c -72.13241,0 -131.33949,59.250935 -131.33949,131.392074 0,38.92115 17.25502,74.07152 44.45432,98.20884 C 58.500207,254.84854 -14.606185,358.21398 -14.606185,477.846 a 35.037921,35.037921 0 0 0 35.034809,35.03543 H 188.95771 c 6.88866,-25.46243 17.91968,-49.15043 32.45932,-70.0688 H 58.235927 C 73.730605,344.39181 153.38526,271.2598 248.07279,271.2598 c 13.12286,0 25.94065,1.45153 38.35524,4.13353 4.26325,-42.80875 34.59589,-78.30933 74.73011,-90.32371 11.57931,-19.5408 18.25414,-42.27592 18.25414,-66.47121 0,-72.141139 -59.20709,-131.392074 -131.33949,-131.392074 z m 0,70.068794 c 34.24293,0 61.26987,27.028459 61.26987,61.32328 0,34.29482 -27.02694,61.3274 -61.26987,61.3274 -34.24293,0 -61.27192,-27.03258 -61.27192,-61.3274 0,-34.294821 27.02899,-61.32328 61.27192,-61.32328 z"
                                    id="path295" />
                                <path
                                    id="path295-3"
                                    style="color:#fed201;fill:#fed201;stroke-width:1.05103;stroke-linecap:round;stroke-linejoin:round;-inkscape-stroke:none;paint-order:stroke fill markers"
                                    d="m 405.68024,197.47637 c -57.70598,0 -105.07159,47.40151 -105.07159,105.11449 0,31.13694 13.80343,59.25664 35.56289,78.56652 -82.15001,30.43306 -140.63449,113.12556 -140.63449,208.83127 a 28.030337,28.030337 0 0 0 28.0273,28.0278 h 182.11589 182.11452 a 28.030337,28.030337 0 0 0 28.0286,-28.0278 c 0,-95.70539 -58.4835,-178.39795 -140.63307,-208.83127 21.75947,-19.30988 35.56153,-47.42958 35.56153,-78.56652 0,-57.71298 -47.3656,-105.11449 -105.07158,-105.11449 z m 0,56.05559 c 27.39437,0 49.01562,21.62301 49.01562,49.0589 0,27.43588 -21.62125,49.06164 -49.01562,49.06164 -27.39437,0 -49.017,-21.62576 -49.017,-49.06164 0,-27.43589 21.62263,-49.0589 49.017,-49.0589 z m 0,171.18664 c 75.7501,0 139.47372,58.50552 151.86952,137.24226 H 405.68024 253.81075 C 266.2065,483.22412 329.93014,424.7186 405.68024,424.7186 Z" />
                            </g>
                        </svg>
                        <h1 class="text-2xl">NOW SERVING</h1>
                    </div>
                    <div class="text-9xl font-bold text-[#fed201]">
                        <?php echo htmlspecialchars($ticketNo ?? 'No Ticket'); ?>
                    </div>
                </div>

                <div class="flex flex-col justify-center items-center border-3 border-[#fed201] p-5 rounded-3xl bg-zinc-900/40">
                    <div class="flex gap-3 items-center">
                        <svg width="50px" height="50px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 7V12L13.5 14.5M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="#fed201" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <h1 class="text-2xl">ESTIMATED WAIT TIME</h1>
                    </div>
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