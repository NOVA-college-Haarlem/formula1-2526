<?php 

require 'database.php';

$sql = "SELECT * FROM circuits";

if(isset($_GET['country'])){ //deze checkt of parameter 'country' in URL bestaat
    if(!empty($_GET['country'])){ //checkt of nationality een waarde heeft
        $country = $_GET['country'];
        $sql = "SELECT * FROM circuits WHERE country = '$country' ";
    }
}

$result = mysqli_query($conn, $sql);
$circuits = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formula 1 Circuits Table</title>
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
         <section>
               <ul>
                   <li>
                       <a href="?country=Germany" class="text-white">Germany</a>
                   </li>
                   <li>
                       <a href="?country=UK" class="text-white">UK</a>
                   </li>
                   <li>
                       <a href="?country=France" class="text-white">France</a>
                   </li>
                   <li>
                       <a href="?country=Netherlands" class="text-white">Netherlands</a>
                   </li>
               </ul>
           </section>
        <div class="container mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold mb-12 text-center" data-aos="fade-up">
                Formula 1 Circuits <?php echo $_GET['country'] ?? ''; ?>
            </h2>
            <div class="max-w-3xl mx-auto">
                <div class="bg-gray-800 rounded-xl overflow-hidden shadow-xl" data-aos="fade-up">
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-700 text-left">
                                    <th class="py-4 px-6">Circuit Id</th>
                                    <th class="py-4 px-6">Circuit Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($circuits)): ?>
                                    <?php foreach($circuits as $circuit): ?>
                                        <tr class="border-b border-gray-700 hover:bg-gray-750">
                                            <td class="py-4 px-6 font-bold"><?php echo $circuit['circuitId'] ?></td>
                                            <td class="py-4 px-6"><?php echo $circuit['name'] ?></td>
                                            <td class="py-4 px-6">
                                                <a href="circuit-profile.php?circuit_id=<?php echo $circuit['circuitId'] ?>">Profiel</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td class="py-4 px-6" colspan="3">No circuits found.</td>
                                    </tr>
                                <?php endif; ?>
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
            <p class="text-gray-400">Formula 1 circuits table example. Not affiliated with Formula 1.</p>
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

