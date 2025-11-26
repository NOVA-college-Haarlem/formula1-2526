<?php 

require 'database.php';

$sql = "SELECT * FROM constructors";

if(isset($_GET['nationality'])){ //deze checkt of parameter 'nationality' in URL bestaat
    if(!empty($_GET['nationality'])){ //checkt of nationality een waarde heeft
        $nationality = $_GET['nationality'];
        $sql = "SELECT * FROM constructors WHERE nationality = '$nationality' ";
    }
}

$result = mysqli_query($conn, $sql);
$teams = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formula 1 Teams Table</title>
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
            <section>
               <ul>
                   <li>
                       <a href="?nationality=german" class="text-white">German</a>
                   </li>
                   <li>
                       <a href="?nationality=british" class="text-white">British</a>
                   </li>
                   <li>
                       <a href="?nationality=french" class="text-white">French</a>
                   </li>
                   <li>
                       <a href="?nationality=dutch" class="text-white">Dutch</a>
                   </li>
               </ul>
           </section>
            <h2 class="text-3xl md:text-4xl font-bold mb-12 text-center" data-aos="fade-up">Formula 1 Teams</h2>
            <div class="max-w-3xl mx-auto">
                <div class="bg-gray-800 rounded-xl overflow-hidden shadow-xl" data-aos="fade-up">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-700 text-left">
                                    <th class="py-4 px-6">Team Id</th>
                                    <th class="py-4 px-6">Team Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($teams as $team): ?>
                                    <tr class="border-b border-gray-700 hover:bg-gray-750">
                                        <td class="py-4 px-6 font-bold"><?php echo $team['constructorId'] ?></td>
                                        <td class="py-4 px-6"><?php echo $team['name'] ?></td>
                                        <td class="py-4 px-6">
                                            <a href="team-profile.php?team_id=<?php echo $team['constructorId'] ?>">Profiel</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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
            <p class="text-gray-400">Formula 1 teams table example. Not affiliated with Formula 1.</p>
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