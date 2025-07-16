<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The NotesHub : Home</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   <style>
    body {
        margin: 0;
        padding: 0;
        font-family: sans-serif;
        background-image: url('https://img.freepik.com/free-photo/edge-yellow-wall-pencils-paper-rat-clips-clocks-lie-chaotically-beautifully_197531-12536.jpg?semt=ais_hybrid&w=740'); /* Replace with your image path */
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-position: center;
    }

    .article img {
        max-width: 100%;
        height: auto;
    }

    /* Carousel container */
    .carousel {
        position: relative;
        overflow: hidden;
        width: 100%;
        max-width: 600px;
        margin: auto;
        height: auto;
    }

    .carousel-slides {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }

    .slide {
        min-width: 100%;
    }

    .dots {
        text-align: center;
        margin: 10px;
    }

    .dot {
        height: 10px;
        width: 10px;
        margin: 5px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        cursor: pointer;
    }

    .active {
        background-color: #717171;
    }

    .animation {
        display: block;
        margin-top: 40px;
    }

    img {
        display: block;
        width: 80%;
        margin: auto;
    }

    .article {
        display: flex;
        justify-content: center;
        align-self: center;
        padding: 3px 20px;
        margin: 10px 10px;
        flex-wrap: wrap;
        color: #fff;
        font-family: sans-serif;
        font-size: large;
    }

    button {
        background-color: #04AA6D;
        color: white;
        padding: 12px 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        z-index: 1;
    }

    button a {
        text-decoration: none;
        color: white;
        font-size: medium;
        font-weight: 400;
        padding: 9px;
    }

    button:hover {
        background-color: #04AA6D;
        filter: brightness(0.8);
    }
</style>

</head>
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
<div class="animation">
<div class="carousel">
    <div class="carousel-slides">
        <div class="slide"><img src="images/WhatsApp Image 2025-04-02 at 21.41.35_535d3dfa.jpg" alt="Slide 1"></div>
        <div class="slide"><img src="images/WhatsApp Image 2025-04-04 at 22.29.41_a7bcf5b3.jpg" alt="Slide 2"></div>
        <div class="slide"><img src="images/WhatsApp Image 2025-04-04 at 22.42.12_e02b8bae.jpg" alt="Slide 3"></div>
        <div class="slide"><img src="images/WhatsApp Image 2025-04-04 at 22.42.12_e02b8bae.jpg" alt="Slide 4"></div>
        <div class="slide"><img src="images/WhatsApp Image 2025-04-04 at 22.49.42_c5f59ca8.jpg" alt="Slide 5"></div>
        <div class="slide"><img src="images/WhatsApp Image 2025-04-05 at 15.36.16_0b1f2f03.jpg" alt="Slide 6"></div>
    </div>
</div>
<div class="dots">
    <span class="dot active"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
</div>
</div>
<article class="article">
    <!-- <h1></h1> -->
    <div class="article" id="img">
        <p class="article">To keep connected with us please register with your personal info</p>
    </div>
</article>
<article class="article">
    <button> 
        <a href="register.php">Register now</a>
    </button>
</article>
<footer>
    <div>
        <h3>Designed And Developed By Lakshay saini</h3>
    </div>
</footer>
<script src="script.js"></script>
    <script>
    const slides = document.querySelector('.carousel-slides');
    const dots = document.querySelectorAll('.dot');
    let index = 0;
    function showSlide(i) {
        index = i;
        const offset = -i * 100;
        slides.style.transform = `translateX(${offset}%)`;
        dots.forEach(dot => dot.classList.remove('active'));
        dots[i].classList.add('active');
    }
    function nextSlide() {
        index = (index + 1) % dots.length;
        showSlide(index);
    }
    setInterval(nextSlide, 3000); // Automatically switches slides every 3 seconds
    dots.forEach((dot, i) => {
        dot.addEventListener('click', () => showSlide(i));
    });
    </script>
</body>
</html>