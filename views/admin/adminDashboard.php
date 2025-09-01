<?php
session_start();
if (!isset($_SESSION['user_id'], $_COOKIE['logged_in']) || ($_SESSION['user_type'] ?? '') !== 'Admin') {
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
<title>Admin Dashboard</title>
</head>
<body>
<header>
<nav>
    <div class="nav-logo"><h3 class="nav-title"><span>Agri</span>Connect</h3></div>
    <ul>
        <li><a href="../../index.php">Home</a></li>
        <li><a href="../login.php">Login page</a></li>
        <li><a href="../../controllers/C_logout.php">Logout</a></li>
    </ul>
</nav>
</header>
<main>
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quo maxime quis, molestiae fugiat consequuntur nobis facilis at, inventore minima rem corporis nemo! Ipsam sit ullam voluptatum aliquid? Rerum inventore quidem nam libero? Ratione, vel. Expedita aut esse, asperiores nostrum dolorum fugiat possimus laborum? Libero asperiores labore veniam porro atque! Commodi possimus consequatur fugiat quisquam aut corporis harum quo cumque, fuga modi. Blanditiis neque eveniet modi asperiores quos quis fuga debitis consequatur harum dolorum magnam reprehenderit atque vitae distinctio voluptas fugiat nulla officia, corporis error assumenda soluta placeat facilis esse veniam. Voluptatibus dicta asperiores iusto sed ut hic quaerat officiis! Eveniet accusamus quaerat laborum laudantium minima, architecto, rem error voluptate modi maiores mollitia dolorum totam, alias sed pariatur dolorem harum atque. Odit repellat quo quas illum vitae praesentium rem nostrum! Commodi dolorum aliquam ex veniam fuga dignissimos. Tenetur ipsam perferendis pariatur! Sit excepturi velit voluptatem delectus tempora atque quas nihil odit, maiores, asperiores, iusto et odio illo. Illo at temporibus sit ad iusto ipsam iste, odio veniam, dolores magnam deleniti dolorem accusantium obcaecati. Quo, autem. Assumenda hic, sit at temporibus sapiente beatae? Autem libero error veniam optio, ullam impedit tempora? Animi rem accusantium non. Numquam nemo dolores maiores mollitia porro laboriosam, a iusto excepturi officia voluptates debitis facilis, eaque reiciendis dicta voluptate itaque sint. Beatae, consequatur. Tempore fugit laborum alias ipsa earum, voluptates ab sit quod quaerat eveniet, esse, cupiditate laboriosam. Quasi numquam adipisci magnam totam cum quia vitae quod quos possimus! Cum pariatur, sit repellat optio laboriosam quam laborum odit eum officia iusto quae iste explicabo exercitationem, nesciunt sequi illo quasi esse, quos culpa odio molestias. Ducimus ab recusandae doloribus optio facere perferendis, fugit quisquam officiis dolores eum explicabo, repellendus deserunt cumque dignissimos nihil fugiat. Eius, debitis, provident natus tempora eligendi non rem tenetur mollitia assumenda sed incidunt neque totam dolorem dolores aliquid veniam, nemo numquam minima quisquam quidem facere earum animi quas iusto! Repudiandae, quas et quod magni, necessitatibus earum assumenda libero odio consequuntur suscipit veritatis? Nam cumque doloribus illum rerum velit deserunt quis, repellat qui, quam facilis dicta fugiat rem nemo illo omnis. Commodi assumenda esse quae, itaque, nihil maxime quibusdam eligendi nisi dolore sequi dolores aliquam molestiae, voluptatum reprehenderit ullam ea. Consequuntur sunt nemo rerum ad accusantium tempore numquam, at possimus minima quia explicabo optio mollitia harum, vitae aliquid quis distinctio voluptates vel, saepe voluptatem. Unde illum, excepturi perferendis placeat assumenda eligendi nemo vitae! Ab natus, quisquam eius maiores, aspernatur delectus repudiandae similique aliquid cupiditate, illo modi exercitationem ea mollitia! Quas, minima beatae. Hic labore modi pariatur odio, eligendi ullam perspiciatis animi expedita officiis? Impedit, dolorum quidem error labore rerum quibusdam, non molestias corrupti ratione magni ipsam. Magni unde est inventore, accusamus hic pariatur architecto doloremque. Ipsum consequatur quas, tempore dolorem et facilis est quibusdam quo dolores nulla fugiat delectus qui doloremque dolor magni laudantium ex officia vel, placeat quae similique, ipsa recusandae! Laborum tempore exercitationem quasi ad, quibusdam asperiores, voluptatibus natus earum debitis fuga eos. Aut saepe non sunt expedita obcaecati voluptate recusandae rerum tempora ipsum? </p>
    <h1>Welcome, Admin</h1>
</main>
</body>
</html>
