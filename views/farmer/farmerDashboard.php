<?php
session_start();
if (!isset($_SESSION['user_id'], $_COOKIE['logged_in']) || ($_SESSION['user_type'] ?? '') !== 'farmer') {
    header("Location: ../../views/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../../public/css/style.css?v=<?php echo time(); ?>">
<link rel="icon" href="../../public/images/logo1.png">
<title>Farmer Dashboard</title>
</head>
<body>
<header>
<nav>
    <div class="nav-logo"><h3 class="nav-title"><span>Agri</span>Connect</h3></div>
    <ul>
        <li><a href="../../index.php">Home</a></li>
        <li><a href="../login.php">Login</a></li>
        <li><a href="../../controllers/C_logout.php">Logout</a></li>
    </ul>
</nav>
</header>
<main>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo laboriosam qui aspernatur alias ipsam neque nemo, odio perspiciatis. Quam alias iure possimus temporibus ut debitis expedita placeat. Itaque expedita consectetur tenetur animi excepturi unde, natus tempore nihil, iste quidem eaque ut dicta non cumque ratione! Et repudiandae reprehenderit aliquam quae obcaecati esse dolores doloremque. Voluptate maxime nobis, quis dolorum ea enim maiores consectetur iste similique excepturi architecto illum ullam accusamus reiciendis magnam totam quo nemo eaque quaerat blanditiis adipisci sunt? Rerum magni cum autem dignissimos voluptates consequatur sequi vitae quia nam quod! Saepe, totam! Quasi odio facilis rem soluta in, exercitationem aperiam nemo voluptates, quidem corrupti consequatur fugit ratione molestias expedita praesentium architecto rerum odit nulla quod porro fugiat placeat. Ex ipsam et iste esse tempora dicta architecto quos voluptate libero voluptas enim assumenda voluptatum totam quo qui repudiandae, debitis facilis quidem fugiat! Odit molestias, nisi nulla quas atque quaerat esse corrupti expedita consequuntur ex earum veniam repellat libero nihil assumenda sequi quidem, aspernatur ad reiciendis facere ipsa adipisci incidunt! Illo ea inventore exercitationem incidunt id nostrum numquam expedita sed harum corporis. Commodi suscipit nam tempore deleniti, adipisci accusantium veritatis porro eum non recusandae nemo totam explicabo molestias facilis libero reiciendis ullam quas eligendi id? Veniam natus rem provident inventore eligendi modi vel fugit quod quisquam, quaerat voluptate harum, optio magni officia, consequatur consectetur dolores? Illo perspiciatis, sit veritatis nisi placeat odit quis, ab delectus culpa nihil tempore ratione atque quae tempora modi autem reprehenderit nostrum cum aut molestias et? Autem distinctio aliquid possimus, dignissimos officia, accusantium vitae aspernatur commodi itaque odit incidunt? Earum, et rem. Adipisci possimus est fuga. Consectetur officia minus atque nobis ut asperiores voluptate perferendis aperiam culpa unde recusandae quia in at, est commodi. At pariatur culpa autem vitae! Explicabo animi excepturi, et sunt modi libero voluptas sit, ex necessitatibus aliquam aspernatur tenetur? A fugit delectus voluptatum cumque officiis inventore! Aspernatur, perspiciatis odit laudantium quod asperiores nihil harum rem soluta ut at consequuntur. Totam aut eveniet eaque expedita sit veniam dolores provident doloribus ex esse fugiat error repudiandae, mollitia quos delectus! Ipsam iste pariatur animi ullam sunt quasi. Beatae minima explicabo eos aspernatur incidunt minus aliquid cumque vel ea, ullam nihil ipsum hic! Delectus hic qui sapiente perferendis nemo, iure quis officiis? Placeat repudiandae quae itaque rem optio blanditiis? Facere officiis quos enim, error ipsum nihil quas, debitis nemo, velit illo commodi distinctio eveniet! Corrupti fugiat, iure inventore, tempore possimus nisi quam, amet voluptatem voluptatibus blanditiis dolorem dolore? Impedit inventore officiis accusamus dolorem nihil, modi similique blanditiis aliquam doloribus placeat iste obcaecati corporis minus optio rem atque consequatur repellat quaerat ab non ipsam perspiciatis quibusdam odit! Cum eveniet, officiis aliquam nobis distinctio quis in qui repellendus harum a voluptate architecto alias quos, dicta officia quia odio quibusdam! Ipsum labore et, sapiente natus magnam ducimus? Consectetur, assumenda? Odio modi est ratione laborum incidunt quisquam, delectus aperiam at dolores adipisci. Sed ullam reiciendis similique corporis perferendis. Fuga dolorem pariatur quam et odio hic maxime cumque nisi sapiente consequatur?</p>
    <h1>Welcome, Farmer</h1>
</main>
    <footer class="footer">
        <p>&copy; 2025 AgriConnect. All Rights Reserved.</p>
    </footer>
</body>
</html>
