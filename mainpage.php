<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareConnect - Home Nursing Services</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #0d6efd;
            --secondary: #6c757d;
            --success: #198754;
            --info: #0dcaf0;
            --warning: #ffc107;
            --danger: #dc3545;
            --light: #f8f9fa;
            --dark: #212529;
            --teal: #20c997;
            --indigo: #6610f2;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
            overflow-x: hidden;
        }

        .hero-section {
            background: linear-gradient(135deg, rgba(13, 110, 253, 0.9) 0%, rgba(32, 201, 151, 0.9) 100%),
                url('https://images.unsplash.com/photo-1576091160550-2173dba999ef?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            position: relative;

            min-height: 100vh;
            height: 100vh;
            padding: 0 !important;
            margin: 0 !important;
        }

        .hero-section .container {
            height: 100%;
            display: flex;
            align-items: center;
            /* Vertical center */
            justify-content: center;
            /* Horizontal center */
        }

        .navbar {
            transition: all 0.3s;
        }

        .navbar.scrolled {
            background-color: white !important;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .navbar.scrolled .nav-link {
            color: var(--dark) !important;
        }

        .navbar.scrolled .navbar-brand {
            color: var(--primary) !important;
        }

        .feature-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 28px;
        }

        .service-card {
            transition: all 0.3s;
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }

        .testimonial-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .bg-teal {
            background-color: var(--teal) !important;
        }

        .btn-teal {
            background-color: var(--teal);
            color: white;
        }

        .btn-teal:hover {
            background-color: #1aa179;
            color: white;
        }

        .login-modal .modal-dialog {
            max-width: 400px;
        }

        .login-tabs .nav-link {
            color: var(--dark);
            font-weight: 500;
            border: none;
            padding: 12px 20px;
        }

        .login-tabs .nav-link.active {
            color: var(--primary);
            background-color: transparent;
            border-bottom: 3px solid var(--primary);
        }

        .how-it-works-step {
            position: relative;
            padding-left: 80px;
            margin-bottom: 40px;
        }

        .how-it-works-step-number {
            position: absolute;
            left: 0;
            top: 0;
            width: 60px;
            height: 60px;
            background-color: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: bold;
        }

        footer {
            background-color: #2c3e50;
            color: white;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: color 0.3s;
        }

        footer .contact-us li,
        footer .footer-paragraph {
            color: rgba(255, 255, 255, 0.7);
        }

        .footer-links a:hover {
            color: white;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .social-icon:hover {
            background-color: var(--primary);
            transform: translateY(-3px);
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <i class="fas fa-hand-holding-medical me-2"></i>
                CareConnect
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#how-it-works">How It Works</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Testimonials</a>
                    </li>
                </ul>
                <div class="ms-lg-3 mt-3 mt-lg-0">
                    <button class="btn btn-outline-light me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                    <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h1 class="display-4 fw-bold mb-4">Professional Home Nursing Care When You Need It</h1>
                    <p class="lead mb-4">Connecting patients with qualified nurses for personalized in-home healthcare services.</p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#services" class="btn btn-light btn-lg px-4">Our Services</a>
                        <button class="btn btn-outline-light btn-lg px-4" data-bs-toggle="modal" data-bs-target="#registerModal">Get Started</button>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <img src="https://images.unsplash.com/photo-1588776814546-1ffcf47267a5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="Nurse with patient" class="img-fluid rounded shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5 bg-light">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="text-center p-4">
                        <div class="feature-icon bg-primary bg-opacity-10 text-primary">
                            <i class="fas fa-user-clock"></i>
                        </div>
                        <h3 class="h4">On-Demand Care</h3>
                        <p class="text-muted">Request nursing services whenever you need them, with flexible scheduling options.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center p-4">
                        <div class="feature-icon bg-success bg-opacity-10 text-success">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3 class="h4">Verified Professionals</h3>
                        <p class="text-muted">All nurses are licensed, experienced, and thoroughly vetted by our team.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="text-center p-4">
                        <div class="feature-icon bg-warning bg-opacity-10 text-warning">
                            <i class="fas fa-heartbeat"></i>
                        </div>
                        <h3 class="h4">Personalized Care</h3>
                        <p class="text-muted">Tailored healthcare services designed to meet your specific needs and preferences.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-5">
        <div class="container py-5">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 fw-bold mb-3">Our Services</h2>
                    <p class="lead text-muted">Comprehensive home nursing services to support your health and recovery.</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="service-card card h-100">
                        <img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" class="card-img-top" alt="Wound Care">
                        <div class="card-body">
                            <h3 class="h5 card-title">Wound Care</h3>
                            <p class="card-text text-muted">Professional wound assessment, dressing changes, and management of acute or chronic wounds.</p>
                            <ul class="list-unstyled text-muted">
                                <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i> Post-surgical care</li>
                                <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i> Ulcer management</li>
                                <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i> Burn treatment</li>
                            </ul>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <button class="btn btn-sm btn-outline-primary">Learn More</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="service-card card h-100">
                        <img src="https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" class="card-img-top" alt="Medication Management">
                        <div class="card-body">
                            <h3 class="h5 card-title">Medication Management</h3>
                            <p class="card-text text-muted">Safe administration of medications, injections, and IV therapy in the comfort of your home.</p>
                            <ul class="list-unstyled text-muted">
                                <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i> Oral medications</li>
                                <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i> Insulin injections</li>
                                <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i> IV therapy</li>
                            </ul>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <button class="btn btn-sm btn-outline-primary">Learn More</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="service-card card h-100">
                        <img src="https://images.unsplash.com/photo-1530026186672-2cd00ffc50fe?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" class="card-img-top" alt="Elderly Care">
                        <div class="card-body">
                            <h3 class="h5 card-title">Elderly Care</h3>
                            <p class="card-text text-muted">Compassionate care for seniors including assistance with daily activities and health monitoring.</p>
                            <ul class="list-unstyled text-muted">
                                <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i> Personal care</li>
                                <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i> Mobility assistance</li>
                                <li class="mb-1"><i class="fas fa-check-circle text-success me-2"></i> Companionship</li>
                            </ul>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <button class="btn btn-sm btn-outline-primary">Learn More</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5">
                <a href="#" class="btn btn-primary px-4">View All Services</a>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="py-5 bg-light">
        <div class="container py-5">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 fw-bold mb-3">How CareConnect Works</h2>
                    <p class="lead text-muted">Getting quality home nursing care has never been easier.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="how-it-works-step">
                        <div class="how-it-works-step-number">1</div>
                        <div>
                            <h3 class="h4">Create Your Account</h3>
                            <p class="text-muted">Register as a patient and complete your profile with health information and preferences. Our simple onboarding process takes just a few minutes.</p>
                        </div>
                    </div>

                    <div class="how-it-works-step">
                        <div class="how-it-works-step-number">2</div>
                        <div>
                            <h3 class="h4">Request a Service</h3>
                            <p class="text-muted">Select the type of care you need, choose your preferred date and time, and provide any special instructions for our nurses.</p>
                        </div>
                    </div>

                    <div class="how-it-works-step">
                        <div class="how-it-works-step-number">3</div>
                        <div>
                            <h3 class="h4">Get Matched</h3>
                            <p class="text-muted">Our system matches you with the most qualified available nurse based on your needs, location, and preferences.</p>
                        </div>
                    </div>

                    <div class="how-it-works-step">
                        <div class="how-it-works-step-number">4</div>
                        <div>
                            <h3 class="h4">Receive Care</h3>
                            <p class="text-muted">Your nurse arrives at your home at the scheduled time, provides professional care, and documents the visit in your secure health record.</p>
                        </div>
                    </div>

                    <div class="how-it-works-step">
                        <div class="how-it-works-step-number">5</div>
                        <div>
                            <h3 class="h4">Rate Your Experience</h3>
                            <p class="text-muted">After your visit, provide feedback to help us maintain our high standards of care and improve our services.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" alt="About Us" class="img-fluid rounded shadow-lg">
                </div>
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4">About CareConnect</h2>
                    <p class="lead text-muted mb-4">Bridging the gap between patients and professional nursing care.</p>
                    <p>CareConnect was founded in 2023 with a mission to make quality healthcare accessible to everyone in the comfort of their homes. Our platform connects patients with a network of highly skilled and compassionate nurses who provide personalized care tailored to individual needs.</p>
                    <p>We understand the challenges of accessing healthcare services, especially for those with mobility issues or chronic conditions. That's why we've created a seamless digital experience that puts you in control of your care.</p>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-3 me-3">
                                    <i class="fas fa-user-md"></i>
                                </div>
                                <div>
                                    <h4 class="h6 mb-0">100+ Nurses</h4>
                                    <small class="text-muted">In our network</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-success bg-opacity-10 text-success rounded-circle p-3 me-3">
                                    <i class="fas fa-smile"></i>
                                </div>
                                <div>
                                    <h4 class="h6 mb-0">500+ Patients</h4>
                                    <small class="text-muted">Served monthly</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-5 bg-light">
        <div class="container py-5">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 fw-bold mb-3">What Our Patients Say</h2>
                    <p class="lead text-muted">Hear from people who have experienced our home nursing services.</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="testimonial-card card h-100">
                        <div class="card-body">
                            <div class="d-flex mb-3">
                                <div class="avatar bg-primary bg-opacity-10 text-primary rounded-circle me-3" style="width: 50px; height: 50px;">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0">Sarah Johnson</h5>
                                    <small class="text-muted">Post-Surgical Patient</small>
                                </div>
                            </div>
                            <p class="card-text">"The nurse from CareConnect was incredibly professional and caring after my knee surgery. She made sure I understood all my medications and helped me with my physical therapy exercises."</p>
                            <div class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="testimonial-card card h-100">
                        <div class="card-body">
                            <div class="d-flex mb-3">
                                <div class="avatar bg-success bg-opacity-10 text-success rounded-circle me-3" style="width: 50px; height: 50px;">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0">Michael Brown</h5>
                                    <small class="text-muted">Diabetes Patient</small>
                                </div>
                            </div>
                            <p class="card-text">"As someone with diabetes, having a nurse come to my home for regular check-ups has been life-changing. The convenience and quality of care are unmatched."</p>
                            <div class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="testimonial-card card h-100">
                        <div class="card-body">
                            <div class="d-flex mb-3">
                                <div class="avatar bg-warning bg-opacity-10 text-warning rounded-circle me-3" style="width: 50px; height: 50px;">
                                    <i class="fas fa-user"></i>
                                </div>
                                <div>
                                    <h5 class="mb-0">Emily Davis</h5>
                                    <small class="text-muted">Elderly Care</small>
                                </div>
                            </div>
                            <p class="card-text">"The care my mother receives through CareConnect has given our family peace of mind. The nurses are compassionate and truly go above and beyond."</p>
                            <div class="text-warning">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="display-5 fw-bold mb-4">Ready to Experience Better Home Healthcare?</h2>
                    <p class="lead mb-4">Join thousands of patients who have transformed their healthcare experience with CareConnect.</p>
                    <div class="d-flex flex-wrap justify-content-center gap-3">
                        <button class="btn btn-light btn-lg px-4" data-bs-toggle="modal" data-bs-target="#registerModal">Get Started</button>
                        <a href="#how-it-works" class="btn btn-outline-light btn-lg px-4">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-5">
        <div class="container py-4">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h3 class="h4 text-white mb-4">
                        <i class="fas fa-hand-holding-medical me-2"></i>
                        CareConnect
                    </h3>
                    <p class=" footer-paragraph">Connecting patients with professional nursing care in the comfort of their homes.</p>
                    <div class="d-flex gap-3 mt-4">
                        <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4">
                    <h4 class="h5 text-white mb-4">Quick Links</h4>
                    <ul class="list-unstyled footer-links">
                        <li class="mb-2"><a href="#home">Home</a></li>
                        <li class="mb-2"><a href="#services">Services</a></li>
                        <li class="mb-2"><a href="#how-it-works">How It Works</a></li>
                        <li class="mb-2"><a href="#about">About Us</a></li>
                        <li class="mb-2"><a href="#testimonials">Testimonials</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-4">
                    <h4 class="h5 text-white mb-4">Services</h4>
                    <ul class="list-unstyled footer-links">
                        <li class="mb-2"><a href="#">Wound Care</a></li>
                        <li class="mb-2"><a href="#">Medication Management</a></li>
                        <li class="mb-2"><a href="#">Elderly Care</a></li>
                        <li class="mb-2"><a href="#">Physical Therapy</a></li>
                        <li class="mb-2"><a href="#">Post-Surgical Care</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-4">
                    <h4 class="h5 text-white mb-4">Contact Us</h4>
                    <ul class="list-unstyled text-muted contact-us">
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> 123 Healthcare St, Medical City</li>
                        <li class="mb-2 "><i class="fas fa-phone me-2"></i> (123) 456-7890</li>
                        <li class="mb-2 "><i class="fas fa-envelope me-2"></i> info@careconnect.com</li>
                    </ul>
                </div>
            </div>

            <hr class="my-4 bg-secondary">

            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="small text-muted mb-0">&copy; 2023 CareConnect. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="small text-muted mb-0">Designed with <i class="fas fa-heart text-danger"></i> for better healthcare</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Login Modal -->
    <div class="modal fade login-modal" id="loginModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Login to CareConnect</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs login-tabs border-0 mb-4" id="loginTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="patient-tab" data-bs-toggle="tab" data-bs-target="#patient-login" type="button" role="tab">Patient</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nurse-tab" data-bs-toggle="tab" data-bs-target="#nurse-login" type="button" role="tab">Nurse</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="staff-tab" data-bs-toggle="tab" data-bs-target="#staff-login" type="button" role="tab">Staff</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="loginTabsContent">
                        <div class="tab-pane fade show active" id="patient-login" role="tabpanel">
                            <form>
                                <div class="mb-3">
                                    <label for="patientEmail" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="patientEmail" required>
                                </div>
                                <div class="mb-3">
                                    <label for="patientPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="patientPassword" required>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="rememberPatient">
                                    <label class="form-check-label" for="rememberPatient">Remember me</label>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Login as Patient</button>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="nurse-login" role="tabpanel">
                            <form>
                                <div class="mb-3">
                                    <label for="nurseEmail" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="nurseEmail" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nursePassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="nursePassword" required>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="rememberNurse">
                                    <label class="form-check-label" for="rememberNurse">Remember me</label>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Login as Nurse</button>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="staff-login" role="tabpanel">
                            <form>
                                <div class="mb-3">
                                    <label for="staffEmail" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="staffEmail" required>
                                </div>
                                <div class="mb-3">
                                    <label for="staffPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="staffPassword" required>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="rememberStaff">
                                    <label class="form-check-label" for="rememberStaff">Remember me</label>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Login as Staff</button>
                            </form>
                        </div>
                    </div>

                    <div class="text-center mt-3">
                        <a href="#" class="text-decoration-none">Forgot password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Create Your Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="nav nav-tabs login-tabs border-0 mb-4" id="registerTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="patient-reg-tab" data-bs-toggle="tab" data-bs-target="#patient-reg" type="button" role="tab">Patient</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="nurse-reg-tab" data-bs-toggle="tab" data-bs-target="#nurse-reg" type="button" role="tab">Nurse</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="registerTabsContent">
                        <!-- Patient Registration Form (unchanged) -->
                        <div class="tab-pane fade show active" id="patient-reg" role="tabpanel">
                            <form>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="patientFirstName" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="patientFirstName" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="patientLastName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="patientLastName" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="patientRegEmail" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="patientRegEmail" required>
                                </div>
                                <div class="mb-3">
                                    <label for="patientRegPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="patientRegPassword" required>
                                </div>
                                <div class="mb-3">
                                    <label for="patientConfirmPassword" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="patientConfirmPassword" required>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="agreeTerms">
                                    <label class="form-check-label" for="agreeTerms">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Register as Patient</button>
                            </form>
                        </div>

                        <!-- Updated Nurse Registration Form -->
                        <div class="tab-pane fade" id="nurse-reg" role="tabpanel">
                            <form id="nurseApplicationForm" enctype="multipart/form-data">
                                <!-- Basic Information Section -->
                                <h6 class="mb-3">Basic Information</h6>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="nurseFirstName" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="nurseFirstName" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="nurseLastName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="nurseLastName" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="nurseRegEmail" class="form-label">Email address</label>
                                    <input type="email" class="form-control" id="nurseRegEmail" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nurseRegPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="nurseRegPassword" required>
                                </div>
                                <div class="mb-3">
                                    <label for="nurseConfirmPassword" class="form-label">Confirm Password</label>
                                    <input type="password" class="form-control" id="nurseConfirmPassword" required>
                                </div>

                                <!-- Nurse Application Specific Fields -->
                                <h6 class="mb-3 mt-4">Professional Information</h6>
                                <div class="mb-3">
                                    <label for="nurseGender" class="form-label">Gender</label>
                                    <select class="form-select" id="nurseGender" required>
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nursePicture" class="form-label">Profile Picture</label>
                                    <input type="file" class="form-control" id="nursePicture" accept="image/*" required>
                                    <div class="form-text">Upload a professional profile photo</div>
                                </div>
                                <div class="mb-3">
                                    <label for="nurseCV" class="form-label">CV/Resume (URL or File)</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="nurseCV" placeholder="Or upload file below">
                                        <span class="input-group-text">or</span>
                                        <input type="file" class="form-control" id="nurseCVFile" accept=".pdf,.doc,.docx">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="nurseLanguages" class="form-label">Languages Spoken</label>
                                    <input type="text" class="form-control" id="nurseLanguages" required>
                                    <div class="form-text">Separate languages with commas (e.g., English, French, Arabic)</div>
                                </div>
                                <div class="mb-3">
                                    <label for="syndicateNumber" class="form-label">Syndicate/Nursing License Number</label>
                                    <input type="text" class="form-control" id="syndicateNumber" required>
                                </div>
                                <div class="mb-3">
                                    <label for="specialization" class="form-label">Specialization</label>
                                    <select class="form-select" id="specialization" required>
                                        <option value="">Select Specialization</option>
                                        <option value="General Nursing">General Nursing</option>
                                        <option value="Pediatric Nursing">Pediatric Nursing</option>
                                        <option value="Geriatric Nursing">Geriatric Nursing</option>
                                        <option value="Critical Care Nursing">Critical Care Nursing</option>
                                        <option value="Oncology Nursing">Oncology Nursing</option>
                                        <option value="Other">Other (specify in notes)</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nurseBio" class="form-label">Professional Bio/Notes</label>
                                    <textarea class="form-control" id="nurseBio" rows="3"></textarea>
                                    <div class="form-text">Tell us about your experience and qualifications</div>
                                </div>

                                <!-- Terms and Submission -->
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="nurseAgreeTerms" required>
                                    <label class="form-check-label" for="nurseAgreeTerms">I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a></label>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Apply as Nurse</button>
                            </form>
                        </div>
                    </div>

                    <div class="text-center mt-3">
                        <p class="mb-0">Already have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Initialize tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 70,
                        behavior: 'smooth'
                    });

                    // Close mobile menu if open
                    const navbarCollapse = document.querySelector('.navbar-collapse');
                    if (navbarCollapse.classList.contains('show')) {
                        new bootstrap.Collapse(navbarCollapse).hide();
                    }
                }
            });
        });

        // Form validation for registration
        document.querySelectorAll('#registerModal form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                // In a real app, you would validate and submit to your PHP backend
                alert('Registration form submitted! In a real app, this would be processed by your backend.');
                bootstrap.Modal.getInstance(document.getElementById('registerModal')).hide();
            });
        });

        // Form validation for login
        document.querySelectorAll('#loginModal form').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                // In a real app, you would validate and submit to your PHP backend
                alert('Login form submitted! In a real app, this would be processed by your backend.');
                bootstrap.Modal.getInstance(document.getElementById('loginModal')).hide();
            });
        });


        document.getElementById('nurseApplicationForm').addEventListener('submit', function(e) {
            e.preventDefault();

            // Create FormData object to handle file uploads
            const formData = new FormData(this);

            // Add any additional data you need
            formData.append('action', 'register_nurse');

            // Send the data via AJAX
            fetch('your-backend-endpoint.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Application submitted successfully!');
                        $('#registerModal').modal('hide');
                    } else {
                        alert('Error: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again.');
                });
        });


        
    </script>
</body>

</html>