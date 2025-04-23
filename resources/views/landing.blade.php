<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskIt - Smart Productivity Solution</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- AOS Animation Library -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
            color: #333;
            overflow-x: hidden;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Poppins', sans-serif;
        }
        .navbar {
            padding: 15px 0;
            background-color: rgba(255, 255, 255, 0.95);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.6rem;
            color: #2575fc;
        }
        .nav-link {
            font-weight: 500;
            color: #333;
            margin: 0 12px;
            transition: color 0.3s;
        }
        .nav-link:hover {
            color: #2575fc;
        }
        .hero {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            padding: 160px 0 120px;
            position: relative;
            overflow: hidden;
        }
        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-image: url("/api/placeholder/1600/900");
            background-size: cover;
            opacity: 0.15;
            mix-blend-mode: overlay;
        }
        .hero-content {
            position: relative;
            z-index: 2;
        }
        .hero h1 {
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 20px;
            color: white;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }
        .hero p {
            font-size: 1.35rem;
            opacity: 0.95;
            color: white;
            max-width: 600px;
            margin: 0 auto 30px;
        }
        .hero-image {
            position: relative;
            margin-top: 30px;
            border-radius: 10px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            transform: perspective(1000px) rotateX(5deg);
        }
        .btn-custom {
            padding: 12px 36px;
            font-size: 1.1rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            background: linear-gradient(to right, #2575fc, #6a11cb);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(to right, #1e5fcb, #5a0daa);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        .btn-outline-light:hover {
            background-color: white;
            color: #2575fc;
            transform: translateY(-3px);
        }

        .features {
            padding: 120px 0;
            background-color: #f8f9fa;
        }
        .section-heading {
            text-align: center;
            margin-bottom: 70px;
        }
        .section-heading h2 {
            font-weight: 700;
            font-size: 2.8rem;
            margin-bottom: 15px;
            background: linear-gradient(to right, #2575fc, #6a11cb);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
        }
        .section-heading p {
            font-size: 1.2rem;
            color: #6c757d;
            max-width: 700px;
            margin: 0 auto;
        }
        .feature-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            background-color: #ffffff;
            height: 100%;
            overflow: hidden;
        }
        .feature-card:hover {
            transform: translateY(-12px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
        .feature-icon {
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            margin-bottom: 25px;
        }
        .feature-icon.blue {
            background: linear-gradient(135deg, #2575fc, #6a11cb);
        }
        .feature-icon.green {
            background: linear-gradient(135deg, #28a745, #20c997);
        }
        .feature-icon.orange {
            background: linear-gradient(135deg, #fd7e14, #ffc107);
        }
        .feature-icon i {
            font-size: 2.5rem;
            color: white;
        }
        .feature-card h5 {
            font-weight: 600;
            font-size: 1.4rem;
            margin-bottom: 15px;
        }
        .feature-card p {
            color: #6c757d;
            font-size: 1rem;
        }
        
        .testimonials {
            padding: 120px 0;
            background-color: #fff;
        }
        .testimonial-card {
            background-color: #fff;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }
        .testimonial-avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 20px;
        }
        .testimonial-name {
            font-weight: 600;
            margin-bottom: 5px;
        }
        .testimonial-position {
            color: #6c757d;
            font-size: 0.9rem;
        }
        .testimonial-content {
            margin-top: 20px;
            font-style: italic;
            color: #555;
        }
        
        .cta {
            background: linear-gradient(135deg, #28a745, #20c997);
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }
        .cta::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-image: url("/api/placeholder/1600/800");
            background-size: cover;
            opacity: 0.1;
        }
        .cta-content {
            position: relative;
            z-index: 2;
        }
        .cta h2 {
            font-size: 3rem;
            font-weight: 700;
            color: white;
            margin-bottom: 20px;
        }
        .cta p {
            font-size: 1.3rem;
            color: rgba(255, 255, 255, 0.9);
            margin-bottom: 30px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        footer {
            background-color: #111827;
            color: #ccc;
            padding: 80px 0 20px;
        }
        .footer-heading {
            color: white;
            font-weight: 600;
            font-size: 1.2rem;
            margin-bottom: 25px;
        }
        .footer-link {
            display: block;
            color: #aaa;
            margin-bottom: 12px;
            transition: color 0.3s;
            text-decoration: none;
        }
        .footer-link:hover {
            color: white;
        }
        .footer-social i {
            font-size: 1.5rem;
            margin-right: 15px;
            color: #aaa;
            transition: color 0.3s;
        }
        .footer-social i:hover {
            color: white;
        }
        .footer-bottom {
            padding-top: 40px;
            margin-top: 40px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Task<span class="text-primary">It</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                   
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-primary btn-custom" href="{{ route('signup') }}">Sign Up</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 text-center text-lg-start hero-content" data-aos="fade-right">
                    <h1>Work Smarter with TaskIt</h1>
                    <p>The ultimate task management solution that brings clarity to your workflow and boosts productivity.</p>
                    <div class="d-flex gap-3 flex-wrap justify-content-center justify-content-lg-start">
                        <a href="{{ route('signup') }}" class="btn btn-light btn-custom">Start for Free</a>
                        <a href="#features" class="btn btn-outline-light btn-custom">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">
                    <div class="hero-image">
                        <img src="https://projectsly.com/images/blog/employee-task-management-system.png?v=1686553999071005322" alt="TaskIt Dashboard" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="features">
        <div class="container">
            <div class="section-heading" data-aos="fade-up">
                <h2>Elevate Your Productivity</h2>
                <p>Discover why thousands of professionals choose TaskIt to stay organized and accomplish more.</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card p-4">
                        <div class="feature-icon blue">
                            <i class="bi bi-kanban"></i>
                        </div>
                        <h5>Intuitive Task Management</h5>
                        <p>Create, organize, and prioritize tasks with our drag-and-drop interface. Customize workflows that adapt to your style.</p>
                        <img src="/api/placeholder/350/200" alt="Task Management" class="img-fluid rounded mt-3">
                    </div>
                </div>
                
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card p-4">
                        <div class="feature-icon green">
                            <i class="bi bi-calendar-week"></i>
                        </div>
                        <h5>Smart Calendar Integration</h5>
                        <p>Seamlessly sync with your calendar apps to visualize deadlines and schedule tasks in an integrated timeline view.</p>
                    </div>
                </div>
                
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card p-4">
                        <div class="feature-icon orange">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <h5>Performance Analytics</h5>
                        <p>Track your productivity with beautiful data visualizations that help you identify patterns and improve efficiency.</p>
                    </div>
                </div>
           
        </div>
    </section>

    
    <!-- Call-to-Action Section -->
    <section class="cta text-center">
        <div class="container cta-content" data-aos="zoom-in">
            <h2>Ready to Transform Your Workflow?</h2>
            <p>Join over 50,000 professionals who've elevated their productivity with TaskIt. Start free and upgrade when you need more.</p>
            <a href="{{ route('signup') }}" class="btn btn-light btn-custom px-5">Start Your Free Trial</a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <a class="h3 text-white mb-4 d-block">Task<span class="text-primary">It</span></a>
                    <p class="text-muted mb-4">TaskIt helps professionals and teams organize work, boost productivity, and achieve more with less stress.</p>
                    <div class="footer-social">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-4 mb-5 mb-lg-0">
                    <h5 class="footer-heading">Product</h5>
                    <a href="#" class="footer-link">Features</a>
                    <a href="#" class="footer-link">Pricing</a>
                    <a href="#" class="footer-link">Integrations</a>
                    <a href="#" class="footer-link">Updates</a>
                </div>
                
                <div class="col-lg-2 col-md-4 mb-5 mb-lg-0">
                    <h5 class="footer-heading">Resources</h5>
                    <a href="#" class="footer-link">Blog</a>
                    <a href="#" class="footer-link">Guides</a>
                    <a href="#" class="footer-link">Help Center</a>
                    <a href="#" class="footer-link">Community</a>
                </div>
                
                <div class="col-lg-2 col-md-4 mb-5 mb-lg-0">
                    <h5 class="footer-heading">Company</h5>
                    <a href="#" class="footer-link">About Us</a>
                    <a href="#" class="footer-link">Careers</a>
                    <a href="#" class="footer-link">Contact Us</a>
                    <a href="#" class="footer-link">Press Kit</a>
                </div>
                
                <div class="col-lg-2">
                    <h5 class="footer-heading">Legal</h5>
                    <a href="#" class="footer-link">Terms of Service</a>
                    <a href="#" class="footer-link">Privacy Policy</a>
                    <a href="#" class="footer-link">Security</a>
                    <a href="#" class="footer-link">Cookies</a>
                </div>
            </div>
            
            <div class="footer-bottom text-center">
                <p>&copy; {{ date('Y') }} TaskIt. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS Animation Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    
    <script>
        // Initialize AOS
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: true
            });
        });
    </script>
</body>
</html>