<?php
// index.php - Main Portfolio Page
require 'config.php'; // Load database connection and content
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo get_display_content('title', 'Md. Fazle Rabbi - Professional Portfolio & CV'); ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <header>
        <div class="container">
            <div class="profile-img">
                <i class="fas fa-user"></i> 
            </div>
            <h1><?php echo get_display_content('full_name', 'Md. Fazle Rabbi'); ?></h1>
            <p class="tagline">
                <span class="animated-text" id="animated-text"><?php echo get_display_content('tagline_default', 'Digital Marketing & Web Designer'); ?></span>
            </p>
            <div class="social-links">
                <a href="<?php echo get_display_content('twitter_link', '#'); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="<?php echo get_display_content('linkedin_link', '#'); ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                <a href="<?php echo get_display_content('instagram_link', '#'); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="mailto:<?php echo get_display_content('email', 'fazlerabbi66122@gmail.com'); ?>"><i class="fas fa-envelope"></i></a>
            </div>
        </div>
    </header>

    <nav>
        <div class="container nav-container">
            <div class="logo"><?php echo get_display_content('logo_name', 'Fazle Rabbi'); ?></div>
            <ul class="nav-links">
                <li><a href="#fazle-rabbi">Fazle Rabbi (CV)</a></li>
                <li><a href="#skills">Skills</a></li>
                <li><a href="#projects">Projects</a></li>
                <li><a href="#contact">Contact</a></li>
                <li><a href="admin.php" target="_blank"><i class="fas fa-user-shield"></i> Admin</a></li>
            </ul>
            <div class="menu-toggle">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>

    <section id="fazle-rabbi">
        <div class="container">
            <div class="section-title">
                <h2>Md. Fazle Rabbi - CV</h2>
            </div>
            <div class="cv-content">
                <div class="cv-text">
                    <p><?php echo get_display_content('fazle_rabbi_text_p1', 'Hello! I\'m Md. Fazle Rabbi, a dedicated and detail-oriented quality professional...'); ?></p>
                    <p><?php echo get_display_content('fazle_rabbi_text_p2', 'I\'m also expanding my skills in digital marketing and web design, combining my analytical mindset with creative solutions...'); ?></p>
                    
                    <div class="personal-info">
                        <h3 class="cv-section-title" style="margin-top: 0;">Personal Information</h3>
                        <div class="info-grid">
                            <div class="info-item">
                                <span class="info-label">Full Name:</span>
                                <span class="info-value"><?php echo get_display_content('full_name', 'Md. Fazle Rabbi'); ?></span>
                            </div>
                            <div class="info-item">
                                <span class="info-label">Father's Name:</span>
                                <span class="info-value"><?php echo get_display_content('father_name', 'Md. Badsha Mondol'); ?></span>
                            </div>
                            </div>
                    </div>

                    <h3 class="cv-section-title">Professional Experience</h3>
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-content">
                                <h3>Quality Reporter</h3>
                                <span class="date">2023 – Present | Colossus Apparel Limited</span>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="skills" style="background-color: #f5f7fa;">
        <div class="container">
            <div class="section-title">
                <h2>My Skills</h2>
            </div>
            </div>
    </section>

    <section id="projects">
        <div class="container">
            <div class="section-title">
                <h2>My Projects</h2>
            </div>
            </div>
    </section>

    <section id="contact" style="background-color: #f5f7fa;">
        <div class="container">
            <div class="section-title">
                <h2>Contact Me</h2>
            </div>
            <div class="contact-container">
                <div class="contact-info">
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-phone"></i></div>
                        <div>
                            <h3>Phone</h3>
                            <p><?php echo get_display_content('phone', '+880 1610-842781'); ?></p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                        <div>
                            <h3>Email</h3>
                            <p><?php echo get_display_content('email', 'fazlerabbi66122@gmail.com'); ?></p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div>
                            <h3>Location</h3>
                            <p><?php echo get_display_content('location', 'Dhaka, Bangladesh'); ?></p>
                        </div>
                    </div>
                </div>
                <div class="contact-form">
                    </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-content">
                <p class="signature"><?php echo get_display_content('full_name', 'Md. Fazle Rabbi'); ?></p>
                <p class="copyright">
                    &copy; <span id="current-year"></span> <?php echo get_display_content('full_name', 'Md. Fazle Rabbi'); ?>. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('current-year').textContent = new Date().getFullYear();
            
            // Mobile Menu Toggle (using classes defined in style.css)
            const menuToggle = document.querySelector('.menu-toggle');
            const navLinks = document.querySelector('.nav-links');

            menuToggle.addEventListener('click', () => {
                navLinks.classList.toggle('active');
            });

            // Animated Typing Effect (Optional: keep static or make it more complex with dynamic list from DB)
            // ... (Typewriter JS logic from previous response goes here) ...
            
        });
    </script>
</body>
</html>
