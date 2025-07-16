<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>about</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<style>
    section{
        display: block;
        width: 86%;
        margin: auto;
    }
        .about-sec {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            padding: 20px;
            
        }
        .about-sec img {
            border-radius: 50%;
            margin-bottom: 15px;
        }
        .about-sec p {
            font-size: 18px;
            color: white;
            line-height: 1.6;
            max-width: 800px;
            margin: 0px auto;
        }
        .about-sec p strong {
            color: #007acc;
        }
        @media (min-width: 1080px) {
            .about-sec {
                flex-direction: row;
                gap: 30px;
            }
            .about-sec img {
                margin-bottom: 0;
            }
            .about-sec p {
                text-align: left;
            }
        }
</style>
<body>
    <nav>
        <div class="logo">
            <img src="images/WhatsApp Image 2025-04-05 at 15.36.16_0b1f2f03.jpg" height="60px" width="200px" alt="error">
        </div>
        <ul id="menuList">
            <li><a href="home.php"><i class="bi bi-house"></i>Home</a></li>
            <li><a href="about.php"><i class="bi bi-info-circle"></i>About</a></li>
            <li><a href="contact.php"><i class="bi bi-envelope"></i>Contact</a></li>
            <li><a href="login.php"><i class="bi bi-person"></i>Sign in</a></li>
        </ul>
        <div class="menu-icon">
                <i class="bi bi-list" onclick="menu()"></i>
        </div>
    </nav>
    <section class="about-sec">
        <div>
            <img src="images/WhatsApp Image 2025-04-02 at 21.41.35_535d3dfa.jpg" height="300px" width="300px" alt="error">
        </div>
        <div>
            <p>
                Welcome to <strong>The Notes Hub</strong>, the ultimate destination for all your note-taking and organization needs. 
                We understand that ideas and information are the building blocks of progress, and that is why we designed a platform 
                to make capturing, organizing, and accessing your notes simpler than ever.<br><br>
                Whether you are a student striving for academic excellence, a professional juggling multiple projects, or a creative 
                individual capturing sparks of inspiration, The Notes Hub is here to support you. Our user-friendly tools ensure that 
                your notes are always accessible, well-organized, and ready to share, whenever you need them.<br><br>
                At The Notes Hub, we are more than just a platform—we are your partner in productivity. Our mission is to empower you 
                with the tools to stay on top of your tasks, turn your ideas into reality, and achieve your goals with ease.<br><br>
                Join the <strong>The Notes Hub</strong> community and take your note-taking experience to the next level. 
                Lets create, collaborate, and conquer challenges together!
            </p>
        </div>
    </section>
    <script src="script.js"></script>
</body>
</html>