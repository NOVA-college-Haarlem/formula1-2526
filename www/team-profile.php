<?php

require 'database.php';

$id = $_GET['team_id'];

$sql  = "SELECT * FROM constructors WHERE constructorId = $id";
$result = mysqli_query($conn, $sql);
$team = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <span src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #e10600 0%, #000000 100%);
        }
    </style>
</head>
<body class="bg-gray-900 text-white">
    <?php include 'navbar.php'; ?>
    <section class="py-20 bg-gray-900">
        <div class="container mx-auto px-6">
            <div class="max-w-2xl mx-auto">
                <div class="bg-gray-800 rounded-xl overflow-hidden shadow-xl p-8" data-aos="fade-up">
                    <div class="flex flex-col items-center">
                        <h2 class="text-3xl md:text-4xl font-bold mb-6 text-center" data-aos="fade-up">
                            <?php echo $team['name'] ?>
                        </h2>
                        <div>
                            <img src="images/<?php echo $team['image'] ?>" alt="">
                        </div>
                        <div class="w-full">
                            <div class="mb-4 flex items-center">
                                <span class="font-bold w-32">Nationality:</span>
                                <span><?php echo $team['nationality'] ?></span>
                            </div>
                            <div class="mb-4 flex items-center">
                                <span class="font-bold w-32">Wikipedia:</span>
                                <a href="<?php echo $team['url'] ?>" target="_blank" class="text-red-500 underline">Profile Link</a>
                            </div>
                        </div>
                        <a href="teams.php" class="mt-8 inline-block bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded transition duration-200">Ga terug</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="bg-black py-12">
        <div class="container mx-auto px-6">
            <div class="flex items-center space-x-2 mb-4">
                <i data-feather="flag" class="text-red-600"></i>
                <span class="text-xl font-bold bg-gradient-to-r from-red-600 to-red-400 bg-clip-text text-transparent">F1 PULSE</span>
            </div>
            <p class="text-gray-400">Formula 1 team profile example. Not affiliated with Formula 1.</p>
            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-500">
                <p>© 2024 F1 Pulse. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <script>
        AOS.init({ duration: 800, easing: 'ease-in-out', once: true });
        feather.replace();
    </script>
</body>
</html>