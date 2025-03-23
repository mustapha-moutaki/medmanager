<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MediCare Hospital - Excellence in Healthcare</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0ea5e9',
                        secondary: '#64748b',
                        accent: '#38bdf8',
                        success: '#10b981',
                        dark: '#1e293b',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        /* Additional custom styles that can't be easily done with Tailwind */
        .gradient-bg {
            background: linear-gradient(90deg, #0ea5e9 0%, #38bdf8 100%);
        }
        
        .hero-bg {
            background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65)), url('https://images.unsplash.com/photo-1504439468489-c8920d796a29?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
        }
        
        .image-gallery {
            display: grid;
            grid-template-columns: repeat(8, 1fr);
            grid-template-rows: repeat(8, 5vw);
            grid-gap: 15px;
        }
        
        .gallery-item-1 {
            grid-column-start: 1;
            grid-column-end: 3;
            grid-row-start: 1;
            grid-row-end: 3;
        }
        
        .gallery-item-2 {
            grid-column-start: 3;
            grid-column-end: 5;
            grid-row-start: 1;
            grid-row-end: 3;
        }
        
        .gallery-item-3 {
            grid-column-start: 5;
            grid-column-end: 9;
            grid-row-start: 1;
            grid-row-end: 6;
        }
        
        .gallery-item-4 {
            grid-column-start: 1;
            grid-column-end: 5;
            grid-row-start: 3;
            grid-row-end: 6;
        }
        
        .gallery-item-5 {
            grid-column-start: 1;
            grid-column-end: 5;
            grid-row-start: 6;
            grid-row-end: 9;
        }
        
        .gallery-item-6 {
            grid-column-start: 5;
            grid-column-end: 9;
            grid-row-start: 6;
            grid-row-end: 9;
        }
    </style>
</head>
<body class="font-sans bg-gray-50 text-gray-800">
    <!-- Top Bar -->
    <div class="bg-primary text-white py-2 text-sm">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between">
                <div class="flex flex-col sm:flex-row mb-2 md:mb-0">
                    <span class="flex items-center mr-6 mb-2 sm:mb-0">
                        <i class="fas fa-phone-alt mr-2"></i> (123) 456-7890
                    </span>
                    <span class="flex items-center">
                        <i class="fas fa-envelope mr-2"></i> info@medicare-hospital.com
                    </span>
                </div>
                <div class="flex flex-col sm:flex-row">
                    <span class="flex items-center mr-6 mb-2 sm:mb-0">
                        <i class="fas fa-map-marker-alt mr-2"></i> 123 Healthcare Blvd
                    </span>
                    <span class="flex items-center">
                        <i class="fas fa-clock mr-2"></i> Open 24/7
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-20">
                <a href="#" class="flex items-center text-primary text-2xl font-bold">
                    <i class="fas fa-heartbeat mr-2"></i>MediCare
                </a>
                
                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-600 focus:outline-none">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="#" class="py-2 px-3 text-primary font-medium">Home</a>
                    <a href="#services" class="py-2 px-3 text-gray-600 hover:text-primary transition duration-300">Services</a>
                    <a href="#doctors" class="py-2 px-3 text-gray-600 hover:text-primary transition duration-300">Doctors</a>
                    <a href="#gallery" class="py-2 px-3 text-gray-600 hover:text-primary transition duration-300">Gallery</a>
                    <a href="#" class="py-2 px-3 text-gray-600 hover:text-primary transition duration-300">About</a>
                    <a href="#contact" class="py-2 px-3 text-gray-600 hover:text-primary transition duration-300">Contact</a>
                </div>
                
                <div class="hidden md:flex items-center space-x-3">
                    <a href="{{route('login')}}" class="py-2 px-4 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition duration-300">Login</a>
                    <a href="{{route('register.create')}}" class="py-2 px-4 border border-primary text-primary rounded-lg hover:bg-primary hover:text-white transition duration-300">Register</a>
                    <a href="#appointment" class="py-2 px-6 bg-primary text-white rounded-lg shadow-lg hover:bg-accent transition duration-300 transform hover:-translate-y-1">Appointment</a>
                </div>
            </div>
            
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden hidden bg-white pb-4">
                <a href="#" class="block py-2 px-4 text-primary font-medium">Home</a>
                <a href="#services" class="block py-2 px-4 text-gray-600 hover:text-primary">Services</a>
                <a href="#doctors" class="block py-2 px-4 text-gray-600 hover:text-primary">Doctors</a>
                <a href="#gallery" class="block py-2 px-4 text-gray-600 hover:text-primary">Gallery</a>
                <a href="#" class="block py-2 px-4 text-gray-600 hover:text-primary">About</a>
                <a href="#contact" class="block py-2 px-4 text-gray-600 hover:text-primary">Contact</a>
                <div class="mt-3 space-y-2 px-4">
                    <button class="w-full py-2 border border-gray-300 rounded-lg text-gray-700">Login</button>
                    <button class="w-full py-2 border border-primary text-primary rounded-lg">Register</button>
                    <a href="#appointment" class="block w-full py-2 text-center bg-primary text-white rounded-lg">Appointment</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-bg text-white py-32">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">Your Health Is Our Top Priority</h1>
            <p class="text-xl md:text-2xl max-w-3xl mx-auto mb-10 opacity-90">MediCare Hospital provides exceptional healthcare services with state-of-the-art facilities and a team of highly qualified medical professionals.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#appointment" class="py-4 px-8 bg-primary text-white rounded-lg shadow-lg hover:bg-accent transition duration-300 transform hover:-translate-y-1 font-medium text-lg">Book Appointment</a>
                <a href="#services" class="py-4 px-8 bg-transparent border-2 border-white rounded-lg hover:bg-white hover:text-primary transition duration-300 font-medium text-lg">Our Services</a>
            </div>
        </div>
    </section>

    <!-- Stats Section (New) -->
    <section class="py-10 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                <div class="p-6">
                    <div class="text-primary text-4xl font-bold mb-2">15+</div>
                    <div class="text-gray-600">Years Experience</div>
                </div>
                <div class="p-6">
                    <div class="text-primary text-4xl font-bold mb-2">50+</div>
                    <div class="text-gray-600">Specialist Doctors</div>
                </div>
                <div class="p-6">
                    <div class="text-primary text-4xl font-bold mb-2">10k+</div>
                    <div class="text-gray-600">Happy Patients</div>
                </div>
                <div class="p-6">
                    <div class="text-primary text-4xl font-bold mb-2">15+</div>
                    <div class="text-gray-600">Medical Departments</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Our Medical Services</h2>
                <div class="w-24 h-1 bg-primary mx-auto mb-6"></div>
                <p class="max-w-3xl mx-auto text-gray-600">We provide a wide range of medical services to ensure you receive the best care for all your health needs.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-500 hover:-translate-y-2 hover:shadow-xl">
                    <div class="p-8">
                        <div class="w-16 h-16 bg-primary/10 text-primary rounded-lg flex items-center justify-center mb-6">
                            <i class="fas fa-user-md text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Expert Doctors</h3>
                        <p class="text-gray-600 mb-4">Our hospital is staffed with highly qualified and experienced medical professionals dedicated to providing exceptional care.</p>
                        <a href="#" class="text-primary font-medium inline-flex items-center">
                            Learn More <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Service 2 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-500 hover:-translate-y-2 hover:shadow-xl">
                    <div class="p-8">
                        <div class="w-16 h-16 bg-primary/10 text-primary rounded-lg flex items-center justify-center mb-6">
                            <i class="fas fa-procedures text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Emergency Care</h3>
                        <p class="text-gray-600 mb-4">We provide 24/7 emergency services with rapid response teams ready to handle all medical emergencies.</p>
                        <a href="#" class="text-primary font-medium inline-flex items-center">
                            Learn More <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Service 3 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-500 hover:-translate-y-2 hover:shadow-xl">
                    <div class="p-8">
                        <div class="w-16 h-16 bg-primary/10 text-primary rounded-lg flex items-center justify-center mb-6">
                            <i class="fas fa-hospital text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Modern Facilities</h3>
                        <p class="text-gray-600 mb-4">Our hospital is equipped with state-of-the-art facilities and the latest medical technology for accurate diagnosis and treatment.</p>
                        <a href="#" class="text-primary font-medium inline-flex items-center">
                            Learn More <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Service 4 (New) -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-500 hover:-translate-y-2 hover:shadow-xl">
                    <div class="p-8">
                        <div class="w-16 h-16 bg-primary/10 text-primary rounded-lg flex items-center justify-center mb-6">
                            <i class="fas fa-heartbeat text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Cardiology</h3>
                        <p class="text-gray-600 mb-4">Comprehensive care for heart conditions with advanced diagnostic and treatment options by experienced cardiologists.</p>
                        <a href="#" class="text-primary font-medium inline-flex items-center">
                            Learn More <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Service 5 (New) -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-500 hover:-translate-y-2 hover:shadow-xl">
                    <div class="p-8">
                        <div class="w-16 h-16 bg-primary/10 text-primary rounded-lg flex items-center justify-center mb-6">
                            <i class="fas fa-brain text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Neurology</h3>
                        <p class="text-gray-600 mb-4">Expert neurological care for disorders of the brain, spine, and nervous system with cutting-edge treatment approaches.</p>
                        <a href="#" class="text-primary font-medium inline-flex items-center">
                            Learn More <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Service 6 (New) -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-500 hover:-translate-y-2 hover:shadow-xl">
                    <div class="p-8">
                        <div class="w-16 h-16 bg-primary/10 text-primary rounded-lg flex items-center justify-center mb-6">
                            <i class="fas fa-tooth text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Dental Care</h3>
                        <p class="text-gray-600 mb-4">Complete dental services including preventive care, restorative treatments, cosmetic procedures, and dental surgery.</p>
                        <a href="#" class="text-primary font-medium inline-flex items-center">
                            Learn More <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action (New) -->
    <section class="py-20 gradient-bg text-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="mb-8 md:mb-0 text-center md:text-left">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Need Emergency Medical Care?</h2>
                    <p class="text-xl opacity-90">Our emergency department is available 24/7 for all medical emergencies.</p>
                </div>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="tel:123-456-7890" class="py-4 px-8 bg-white text-primary rounded-lg shadow-lg hover:bg-gray-100 transition duration-300 text-center font-medium">
                        <i class="fas fa-phone-alt mr-2"></i> Call Now
                    </a>
                    <a href="#appointment" class="py-4 px-8 bg-transparent border-2 border-white rounded-lg hover:bg-white hover:text-primary transition duration-300 text-center font-medium">Book Appointment</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Doctors Section -->
    <section id="doctors" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Our Specialized Doctors</h2>
                <div class="w-24 h-1 bg-primary mx-auto mb-6"></div>
                <p class="max-w-3xl mx-auto text-gray-600">Meet our team of experienced and dedicated medical professionals.</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Doctor 1 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg group">
                    <div class="relative overflow-hidden h-72">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Dr. Michael Johnson" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end justify-center pb-6">
                            <div class="flex space-x-3">
                                <a href="#" class="w-8 h-8 bg-white text-primary rounded-full flex items-center justify-center hover:bg-primary hover:text-white transition duration-300">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="w-8 h-8 bg-white text-primary rounded-full flex items-center justify-center hover:bg-primary hover:text-white transition duration-300">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="w-8 h-8 bg-white text-primary rounded-full flex items-center justify-center hover:bg-primary hover:text-white transition duration-300">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="text-xl font-bold mb-1">Dr. Michael Johnson</h4>
                        <p class="text-primary font-medium mb-3">Cardiologist</p>
                        <p class="text-gray-600 text-sm">Specialized in heart diseases with over 15 years of experience in cardiovascular treatments.</p>
                    </div>
                </div>
                
                <!-- Doctor 2 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg group">
                    <div class="relative overflow-hidden h-72">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Dr. Sarah Williams" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end justify-center pb-6">
                            <div class="flex space-x-3">
                                <a href="#" class="w-8 h-8 bg-white text-primary rounded-full flex items-center justify-center hover:bg-primary hover:text-white transition duration-300">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="w-8 h-8 bg-white text-primary rounded-full flex items-center justify-center hover:bg-primary hover:text-white transition duration-300">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="w-8 h-8 bg-white text-primary rounded-full flex items-center justify-center hover:bg-primary hover:text-white transition duration-300">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="text-xl font-bold mb-1">Dr. Sarah Williams</h4>
                        <p class="text-primary font-medium mb-3">Neurologist</p>
                        <p class="text-gray-600 text-sm">Expert in treating neurological disorders with advanced diagnostic and therapeutic approaches.</p>
                    </div>
                </div>
                
                <!-- Doctor 3 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg group">
                    <div class="relative overflow-hidden h-72">
                        <img src="https://randomuser.me/api/portraits/men/65.jpg" alt="Dr. Robert Chen" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end justify-center pb-6">
                            <div class="flex space-x-3">
                                <a href="#" class="w-8 h-8 bg-white text-primary rounded-full flex items-center justify-center hover:bg-primary hover:text-white transition duration-300">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="w-8 h-8 bg-white text-primary rounded-full flex items-center justify-center hover:bg-primary hover:text-white transition duration-300">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="w-8 h-8 bg-white text-primary rounded-full flex items-center justify-center hover:bg-primary hover:text-white transition duration-300">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="text-xl font-bold mb-1">Dr. Robert Chen</h4>
                        <p class="text-primary font-medium mb-3">Orthopedic Surgeon</p>
                        <p class="text-gray-600 text-sm">Specializes in orthopedic surgeries and treatment of musculoskeletal conditions.</p>
                    </div>
                </div>
                
                <!-- Doctor 4 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg group">
                    <div class="relative overflow-hidden h-72">
                        <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Dr. Emily Rodriguez" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end justify-center pb-6">
                            <div class="flex space-x-3">
                                <a href="#" class="w-8 h-8 bg-white text-primary rounded-full flex items-center justify-center hover:bg-primary hover:text-white transition duration-300">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="w-8 h-8 bg-white text-primary rounded-full flex items-center justify-center hover:bg-primary hover:text-white transition duration-300">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="w-8 h-8 bg-white text-primary rounded-full flex items-center justify-center hover:bg-primary hover:text-white transition duration-300">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="text-xl font-bold mb-1">Dr. Emily Rodriguez</h4>
                        <p class="text-primary font-medium mb-3">Pediatrician</p>
                        <p class="text-gray-600 text-sm">Dedicated to providing comprehensive healthcare for children from infancy through adolescence.</p>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <a href="#" class="py-3 px-8 border-2 border-primary text-primary rounded-lg hover:bg-primary hover:text-white transition duration-300 inline-block font-medium">View All Doctors</a>
            </div>
        </div>
    </section>

    <!-- Image Gallery (New) -->
    <section id="gallery" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Our Facility Gallery</h2>
                <div class="w-24 h-1 bg-primary mx-auto mb-6"></div>
                <p class="max-w-3xl mx-auto text-gray-600">Take a virtual tour of our state-of-the-art facilities and medical center.</p>
            </div>
            
            <div class="image-gallery">
                <figure class="gallery-item-1">
                    <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Hospital Lobby" class="w-full h-full object-cover rounded-lg shadow-md">
                </figure>
                
                <figure class="gallery-item-2">
                    <img src="https://images.unsplash.com/photo-1504439468489-c8920d796a29?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Medical Equipment" class="w-full h-full object-cover rounded-lg shadow-md">
                </figure>
                
                <figure class="gallery-item-3">
                    <img src="https://images.unsplash.com/photo-1538108149393-fbbd81895907?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Hospital Ward" class="w-full h-full object-cover rounded-lg shadow-md">
                </figure>
                
                <figure class="gallery-item-4">
                    <img src="https://images.unsplash.com/photo-1516574187841-cb9cc2ca948b?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Operating Room" class="w-full h-full object-cover rounded-lg shadow-md">
                </figure>
                
                <figure class="gallery-item-5">
                    <img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Laboratory" class="w-full h-full object-cover rounded-lg shadow-md">
                </figure>
                
                <figure class="gallery-item-6">
                    <img src="https://images.unsplash.com/photo-1571772996211-2f02974f18fa?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Waiting Area" class="w-full h-full object-cover rounded-lg shadow-md">
                </figure>
            </div>
        </div>
    </section>

    <!-- Testimonials Section (New) -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">What Our Patients Say</h2>
                <div class="w-24 h-1 bg-primary mx-auto mb-6"></div>
                <p class="max-w-3xl mx-auto text-gray-600">Hear from our patients about their experiences with our healthcare services.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-gray-50 rounded-xl p-8 shadow-lg">
                    <div class="text-primary mb-4">
                        <i class="fas fa-quote-left text-3xl opacity-50"></i>
                    </div>
                    <p class="text-gray-600 italic mb-6">The care I received at MediCare Hospital was exceptional. The staff was attentive, the doctors were knowledgeable, and the facilities were top-notch. I couldn't have asked for better care.</p>
                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/women/33.jpg" alt="Patient" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h5 class="font-bold">Elizabeth Parker</h5>
                            <p class="text-gray-500 text-sm">Cardiac Patient</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 2 -->
                <div class="bg-gray-50 rounded-xl p-8 shadow-lg">
                    <div class="text-primary mb-4">
                        <i class="fas fa-quote-left text-3xl opacity-50"></i>
                    </div>
                    <p class="text-gray-600 italic mb-6">I was nervous about my surgery, but the medical team at MediCare was so supportive and professional. They explained everything clearly and made me feel comfortable throughout the process.</p>
                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/men/52.jpg" alt="Patient" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h5 class="font-bold">David Thompson</h5>
                            <p class="text-gray-500 text-sm">Orthopedic Patient</p>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial 3 -->
                <div class="bg-gray-50 rounded-xl p-8 shadow-lg">
                    <div class="text-primary mb-4">
                        <i class="fas fa-quote-left text-3xl opacity-50"></i>
                    </div>
                    <p class="text-gray-600 italic mb-6">The pediatric department at MediCare Hospital is amazing. The doctors and nurses were so gentle and caring with my child. They turned a stressful situation into a positive experience.</p>
                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/women/82.jpg" alt="Patient" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h5 class="font-bold">Sophia Martinez</h5>
                            <p class="text-gray-500 text-sm">Parent of Patient</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Appointment Section -->
    <section id="appointment" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="flex flex-col md:flex-row">
                    <!-- Form Section -->
                    <div class="w-full md:w-3/5 p-8 md:p-12">
                        <h3 class="text-2xl md:text-3xl font-bold mb-6">Book an Appointment</h3>
                        <p class="text-gray-600 mb-8">Fill out the form below to schedule an appointment with one of our specialists.</p>
                        
                        <form>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label for="name" class="block text-gray-700 font-medium mb-2">Full Name</label>
                                    <input type="text" id="name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary" placeholder="John Doe">
                                </div>
                                <div>
                                    <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                                    <input type="email" id="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary" placeholder="john@example.com">
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label for="phone" class="block text-gray-700 font-medium mb-2">Phone Number</label>
                                    <input type="tel" id="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary" placeholder="(123) 456-7890">
                                </div>
                                <div>
                                    <label for="date" class="block text-gray-700 font-medium mb-2">Preferred Date</label>
                                    <input type="date" id="date" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary">
                                </div>
                            </div>
                            
                            <div class="mb-6">
                                <label for="department" class="block text-gray-700 font-medium mb-2">Department</label>
                                <select id="department" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary">
                                    <option value="">Select Department</option>
                                    <option value="cardiology">Cardiology</option>
                                    <option value="neurology">Neurology</option>
                                    <option value="orthopedics">Orthopedics</option>
                                    <option value="pediatrics">Pediatrics</option>
                                    <option value="dental">Dental Care</option>
                                    <option value="general">General Medicine</option>
                                </select>
                            </div>
                            
                            <div class="mb-6">
                                <label for="message" class="block text-gray-700 font-medium mb-2">Additional Information</label>
                                <textarea id="message" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary" placeholder="Please provide any additional information about your condition..."></textarea>
                            </div>
                            
                            <button type="submit" class="w-full py-4 px-6 bg-primary text-white font-medium rounded-lg shadow-lg hover:bg-accent transition duration-300">Book Appointment</button>
                        </form>
                    </div>
                    
                    <!-- Info Section -->
                    <div class="w-full md:w-2/5 bg-primary p-8 md:p-12 text-white">
                        <h3 class="text-2xl md:text-3xl font-bold mb-6">Contact Information</h3>
                        <p class="mb-8 opacity-90">Have questions about our services? Contact us using the information below.</p>
                        
                        <div class="space-y-6">
                            <div class="flex items-start">
                                                                  <div class="mr-4 mt-1">
                                    <i class="fas fa-map-marker-alt text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold mb-1">Address</h4>
                                    <p class="opacity-90">123 Healthcare Blvd, Medical District<br>New York, NY 10001</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="mr-4 mt-1">
                                    <i class="fas fa-phone-alt text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold mb-1">Phone</h4>
                                    <p class="opacity-90">(123) 456-7890 (Main)<br>(123) 456-7891 (Emergency)</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="mr-4 mt-1">
                                    <i class="fas fa-envelope text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold mb-1">Email</h4>
                                    <p class="opacity-90">info@medicare-hospital.com<br>appointments@medicare-hospital.com</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="mr-4 mt-1">
                                    <i class="fas fa-clock text-xl"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold mb-1">Working Hours</h4>
                                    <p class="opacity-90">
                                        Monday - Friday: 8:00 AM - 8:00 PM<br>
                                        Saturday: 9:00 AM - 5:00 PM<br>
                                        Sunday: 10:00 AM - 4:00 PM<br>
                                        Emergency: 24/7
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Frequently Asked Questions</h2>
                <div class="w-24 h-1 bg-primary mx-auto mb-6"></div>
                <p class="max-w-3xl mx-auto text-gray-600">Find answers to common questions about our hospital and services.</p>
            </div>
            
            <div class="max-w-4xl mx-auto">
                <!-- FAQ Item 1 -->
                <div class="mb-6 border border-gray-200 rounded-lg overflow-hidden">
                    <button class="faq-toggle w-full flex justify-between items-center p-5 bg-white hover:bg-gray-50 text-left">
                        <span class="font-medium text-lg">What insurance plans do you accept?</span>
                        <i class="fas fa-chevron-down text-primary transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden p-5 pt-0 border-t border-gray-200">
                        <p class="text-gray-600">We accept most major insurance plans, including Medicare, Medicaid, Blue Cross Blue Shield, Aetna, Cigna, and UnitedHealthcare. Please contact our billing department or your insurance provider to verify coverage before your appointment.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 2 -->
                <div class="mb-6 border border-gray-200 rounded-lg overflow-hidden">
                    <button class="faq-toggle w-full flex justify-between items-center p-5 bg-white hover:bg-gray-50 text-left">
                        <span class="font-medium text-lg">How do I schedule an appointment?</span>
                        <i class="fas fa-chevron-down text-primary transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden p-5 pt-0 border-t border-gray-200">
                        <p class="text-gray-600">You can schedule an appointment by calling our main number at (123) 456-7890, using our online appointment form, or visiting our reception desk in person. We recommend scheduling routine appointments at least 2-3 weeks in advance.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 3 -->
                <div class="mb-6 border border-gray-200 rounded-lg overflow-hidden">
                    <button class="faq-toggle w-full flex justify-between items-center p-5 bg-white hover:bg-gray-50 text-left">
                        <span class="font-medium text-lg">What should I bring to my first appointment?</span>
                        <i class="fas fa-chevron-down text-primary transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden p-5 pt-0 border-t border-gray-200">
                        <p class="text-gray-600">Please bring your photo ID, insurance card, a list of current medications, medical records from previous providers if available, and any referral forms if required. Arriving 15 minutes early to complete paperwork is recommended for new patients.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 4 -->
                <div class="mb-6 border border-gray-200 rounded-lg overflow-hidden">
                    <button class="faq-toggle w-full flex justify-between items-center p-5 bg-white hover:bg-gray-50 text-left">
                        <span class="font-medium text-lg">Do you offer telehealth appointments?</span>
                        <i class="fas fa-chevron-down text-primary transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden p-5 pt-0 border-t border-gray-200">
                        <p class="text-gray-600">Yes, we offer telehealth appointments for many types of consultations and follow-up visits. These virtual appointments allow you to connect with your doctor from the comfort of your home. Please call our office to determine if your case is appropriate for telehealth.</p>
                    </div>
                </div>
                
                <!-- FAQ Item 5 -->
                <div class="mb-6 border border-gray-200 rounded-lg overflow-hidden">
                    <button class="faq-toggle w-full flex justify-between items-center p-5 bg-white hover:bg-gray-50 text-left">
                        <span class="font-medium text-lg">How can I access my medical records?</span>
                        <i class="fas fa-chevron-down text-primary transition-transform duration-300"></i>
                    </button>
                    <div class="faq-content hidden p-5 pt-0 border-t border-gray-200">
                        <p class="text-gray-600">You can access your medical records through our patient portal, which is available 24/7. Alternatively, you can submit a written request to our Medical Records Department. We typically process these requests within 3-5 business days.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog/News Section -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Latest News & Articles</h2>
                <div class="w-24 h-1 bg-primary mx-auto mb-6"></div>
                <p class="max-w-3xl mx-auto text-gray-600">Stay updated with the latest healthcare news, medical advancements, and hospital updates.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Blog Post 1 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg">
                    <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Medical Research" class="w-full h-52 object-cover">
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <span class="mr-4"><i class="far fa-calendar-alt mr-2"></i> Mar 15, 2025</span>
                            <span><i class="far fa-user mr-2"></i> Dr. Williams</span>
                        </div>
                        <h3 class="text-xl font-bold mb-3">New Advancements in Cardiac Treatment Technology</h3>
                        <p class="text-gray-600 mb-4">Discover the latest innovations in cardiac care and how they're improving patient outcomes at MediCare Hospital.</p>
                        <a href="#" class="text-primary font-medium inline-flex items-center">
                            Read More <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Blog Post 2 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg">
                    <img src="https://images.unsplash.com/photo-1505751172876-fa1923c5c528?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Preventive Care" class="w-full h-52 object-cover">
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <span class="mr-4"><i class="far fa-calendar-alt mr-2"></i> Mar 10, 2025</span>
                            <span><i class="far fa-user mr-2"></i> Dr. Johnson</span>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Preventive Healthcare: Why Regular Check-ups Matter</h3>
                        <p class="text-gray-600 mb-4">Learn about the importance of preventive healthcare and how regular check-ups can help detect health issues early.</p>
                        <a href="#" class="text-primary font-medium inline-flex items-center">
                            Read More <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Blog Post 3 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-lg">
                    <img src="https://images.unsplash.com/photo-1530026186672-2cd00ffc50fe?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Mental Health" class="w-full h-52 object-cover">
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <span class="mr-4"><i class="far fa-calendar-alt mr-2"></i> Mar 5, 2025</span>
                            <span><i class="far fa-user mr-2"></i> Dr. Rodriguez</span>
                        </div>
                        <h3 class="text-xl font-bold mb-3">Mental Health Awareness: Breaking the Stigma</h3>
                        <p class="text-gray-600 mb-4">Explore the importance of mental health awareness and the resources available at MediCare Hospital.</p>
                        <a href="#" class="text-primary font-medium inline-flex items-center">
                            Read More <i class="fas fa-arrow-right ml-2 text-sm"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-12">
                <a href="#" class="py-3 px-8 border-2 border-primary text-primary rounded-lg hover:bg-primary hover:text-white transition duration-300 inline-block font-medium">View All Articles</a>
            </div>
        </div>
    </section>

  

    <!-- Map Section -->
    <div class="w-full h-96 bg-gray-300 relative">
        <!-- Placeholder for Google Maps -->
        <div class="absolute inset-0 flex items-center justify-center bg-gray-200">
            <p class="text-gray-500 text-lg font-medium">Google Maps Integration Here</p>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white pt-16 pb-6">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <!-- Column 1 -->
                <div>
                    <a href="#" class="flex items-center text-white text-2xl font-bold mb-6">
                        <i class="fas fa-heartbeat mr-2"></i>MediCare
                    </a>
                    <p class="text-gray-400 mb-6">MediCare Hospital is dedicated to providing exceptional healthcare services with compassion and excellence.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary transition duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary transition duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary transition duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary transition duration-300">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Column 2 -->
                <div>
                    <h4 class="text-xl font-bold mb-6">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-primary transition duration-300">Home</a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-primary transition duration-300">Services</a></li>
                        <li><a href="#doctors" class="text-gray-400 hover:text-primary transition duration-300">Doctors</a></li>
                        <li><a href="#appointment" class="text-gray-400 hover:text-primary transition duration-300">Appointments</a></li>
                        <li><a href="#gallery" class="text-gray-400 hover:text-primary transition duration-300">Gallery</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-primary transition duration-300">Contact</a></li>
                    </ul>
                </div>
                
                <!-- Column 3 -->
                <div>
                    <h4 class="text-xl font-bold mb-6">Departments</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-primary transition duration-300">Cardiology</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition duration-300">Neurology</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition duration-300">Orthopedics</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition duration-300">Pediatrics</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition duration-300">Dental Care</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition duration-300">Laboratory</a></li>
                    </ul>
                </div>
                
                <!-- Column 4 -->
                <div>
                    <h4 class="text-xl font-bold mb-6">Working Hours</h4>
                    <ul class="space-y-3">
                        <li class="flex justify-between">
                            <span class="text-gray-400">Monday - Friday:</span>
                            <span class="text-white">8:00 AM - 8:00 PM</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-400">Saturday:</span>
                            <span class="text-white">9:00 AM - 5:00 PM</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-400">Sunday:</span>
                            <span class="text-white">10:00 AM - 4:00 PM</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-400">Emergency:</span>
                            <span class="text-primary">24/7</span>
                        </li>
                    </ul>
                    <div class="mt-6">
                        <p class="text-gray-400">Holiday hours may vary. Please check our social media or call ahead for updates on holiday schedules.</p>
                    </div>
                    <div class="mt-8">
                        <h5 class="text-lg font-semibold mb-3">Book an Appointment</h5>
                        <a href="#contact" class="inline-block bg-primary hover:bg-primary-dark text-white py-2 px-4 rounded transition duration-300">Schedule Now</a>
                    </div>
                </div>
            </div>
            <!-- Divider -->
            <div class="border-t border-gray-700 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 text-sm mb-4 md:mb-0">
                        &copy; 2025 MediCare Hospital. All rights reserved.
                    </p>
                    <div class="flex flex-col md:flex-row md:items-center space-y-2 md:space-y-0 md:space-x-6">
                        <a href="#" class="text-gray-400 hover:text-primary text-sm transition duration-300">Privacy Policy</a>
                        <a href="#" class="text-gray-400 hover:text-primary text-sm transition duration-300">Terms of Service</a>
                        <a href="#" class="text-gray-400 hover:text-primary text-sm transition duration-300">Sitemap</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <a href="#" class="back-to-top fixed bottom-6 right-6 w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white shadow-lg opacity-0 invisible transition-all duration-300">
        <i class="fas fa-chevron-up"></i>
    </a>

    <!-- JavaScript for Back to Top Button -->
    <script>
        // Back to top button functionality
        const backToTopButton = document.querySelector('.back-to-top');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.add('opacity-100', 'visible');
                backToTopButton.classList.remove('opacity-0', 'invisible');
            } else {
                backToTopButton.classList.add('opacity-0', 'invisible');
                backToTopButton.classList.remove('opacity-100', 'visible');
            }
        });

        backToTopButton.addEventListener('click', (e) => {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
</body>
</html>
            
