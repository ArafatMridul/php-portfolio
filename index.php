<?php
$hostname = 'localhost:3307';
$username = 'root';
$password = '';
$db = 'portfolio';

$connection = new mysqli($hostname, $username, $password, $db);

if ($connection->connect_error) {
    exit('Connections failure : '.$connection->connect_error);
}

if (isset($_GET['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $insert = "insert into response(name, email, subject, message) value('$name', '$email', '$subject', '$message')";
    $result = $connection->query($insert);
    if (!$result) {
        exit('Insertion failure : '.$connection->error);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./styles/global.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script type="module" src="./js/script.js" defer></script>
</head>

<body class="dark">
    <header>
        <div class="container header">
            <div>
                <a href="./index.php" class="logo">Arafat</a>
            </div>
            <div class="menu_c">
                <div class="theme m_theme">
                    <img src="./assets/icons/moon.svg" alt="">
                </div>
                <div class="menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="nav_container">
                <nav>
                    <ul class="navlinks">
                        <li><a href="#skills">Skills</a></li>
                        <li><a href="#projects">Projects</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </nav>
                <div class="theme">
                    <img src="./assets/icons/moon.svg" alt="">
                </div>
            </div>
            <div class="slide_nav glass">
                <nav>
                    <ul class="slide_links">
                        <li><a href="#skills">Skills</a></li>
                        <li><a href="#projects">Projects</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
        <button id="scrollTopBtn" class="scroll-top-btn">
            <img src="./assets/icons/arrow-dark.svg" alt="">
        </button>
        <section class="hero container">
            <div class="map_container">
                <div class="map" id="map"></div>
            </div>
            <div class="intro">
                <div class="pp">
                    <img src="./assets/pp.jpg" alt="">
                </div>
                <div class="hey">
                    <h1 class="intro_h1">Hey, I'm Arafat. <span class="wave">👋</span></h1>
                    <p class="available"><span class="dot"></span>Available for collaboration.</p>
                </div>
            </div>
            <div class="about">
                <p>
                    An undergrad CSE student at KUET who loves building cool stuff for the web. I emphasize on
                    crafting
                    engaging user experiences with great attention to
                    details.
                </p>
            </div>
            <div>
                <h2 class="s_heading">Skills</h2>
            </div>
            <div class="skills_container">
            </div>
        </section>

        <section id="projects" class="projects container">
            <h2>Projects</h2>
            <div class="projects_container">
                <a href="./projects.php" class="project">
                    <div class="project_img">
                        <img src="./assets//projects/arch.jpg" alt="">
                    </div>
                    <div>
                        <h3 class="project_title">Arch</h3>
                        <p class="project_desc">A responsive and creative architecture themed multipage website.</p>
                    </div>
                </a>
                <a href="./projects.php" class="project">
                    <div>
                        <img src="./assets//projects/planet.jpg" alt="">
                    </div>
                    <div>
                        <h3 class="project_title">Planet Facts</h3>
                        <p class="project_desc">A responsive and creative planet statistics multipage website.</p>
                    </div>
                </a>
            </div>
            <a href="projects.php" class="more">More projects<img src="./assets/icons/arrow-dark.svg" alt=""></a>
        </section>

        <section id="about" class="container timeline">
            <h2>Education</h2>
            <div class="timeline_container">
                <div class="timeline_component timeline_right">
                    <h3>February - 2022</h3>
                </div>
                <div class="timeline_middle">
                    <div class="timeline_point"></div>
                </div>
                <div class="timeline_component timeline_component_bg">
                    <p>Completed HSC</p>
                </div>


                <div class="timeline_component timeline_component_bg">
                    <p>Admitted to Khulna University of engineering and Technology</p>
                </div>
                <div class="timeline_middle">
                    <div class="timeline_point"></div>
                </div>
                <div class="timeline_component timeline_left">
                    <h3>January - 2023</h3>
                </div>


                <div class="timeline_component timeline_right">
                    <h3>January, 2025</h3>
                </div>
                <div class="timeline_middle">
                    <div class="timeline_point"></div>
                </div>
                <div class="timeline_component timeline_component_bg">
                    <p>Completed 2nd year in University</p>
                </div>
            </div>
        </section>

        <section id="contact" class="container contact">
            <h2>Contact</h2>
            <form action="" method="post" class="form">
                <div class="row">
                    <input type="text" name="name" class="name" placeholder="Name" required>
                    <input type="text" name="email" class="email" placeholder="Email" required>
                </div>
                <div>
                    <input type="text" name="subject" class="subject" placeholder="Subject" required>
                </div>
                <div>
                    <textarea name="message" id="message" rows="10" class="message" placeholder="Write a message..."
                        required></textarea>
                </div>
                <button type="submit" name="submit" class="btn">Send <img src="./assets/icons/send-dark.svg" alt=""
                        class="send"></button>
            </form>
        </section>
    </main>
    <footer class="footer container">
        <div class="socials">
            <a href="https://github.com/ArafatMridul" target="_blank" class="social">
                <img src="./assets/icons/github-dark.svg" class="github" alt="">
                <p>Github</p>
            </a>
            <a href="https://www.linkedin.com/in/arafat-mridul-460350243/" target="_blank" class="social">
                <img src="./assets/icons/linkedin-dark.svg" class="linkedin" alt="">
                <p>LinkedIn</p>
            </a>
        </div>
        <div class="dash">
            <div>
                <p class="made">made with</p>
            </div>
            <div>
                <a href="./dashboard/index.php"><img src="./assets/icons/heart-dark.svg" alt="" class="heart"></a>
            </div>
            <div>
                <p class="made">by arafat</p>
            </div>
        </div>
    </footer>
</body>

</html>