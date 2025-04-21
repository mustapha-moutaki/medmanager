<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>MedManager - Your Trusted Healthcare Partner</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome CDN for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:400,700&display=swap">
  <!-- Animation library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <style>
    body { 
      font-family: 'Inter', sans-serif; 
      scroll-behavior: smooth;
    }
    .fade-in {
      opacity: 0;
      transition: opacity 1s ease-in-out;
    }
    .fade-in.appear {
      opacity: 1;
    }
    .slide-in {
      transform: translateY(50px);
      opacity: 0;
      transition: transform 0.5s ease-out, opacity 0.5s ease-out;
    }
    .slide-in.appear {
      transform: translateY(0);
      opacity: 1;
    }
    .pulse {
      animation: pulse 2s infinite;
    }
    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.05); }
      100% { transform: scale(1); }
    }
    .float {
      animation: float 3s ease-in-out infinite;
    }
    @keyframes float {
      0% { transform: translateY(0px); }
      50% { transform: translateY(-10px); }
      100% { transform: translateY(0px); }
    }
    .rotate-icon {
      transition: transform 0.3s ease;
    }
    .rotate-icon:hover {
      transform: rotate(10deg);
    }
  </style>
</head>
<body class="bg-white min-h-screen">
  <!-- Header -->
  <header class="bg-white w-full py-2 shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-4 flex justify-between items-center text-sm py-1">
      <div class="flex items-center gap-4">
        <div class="flex items-center gap-1">
          <i class="fa-solid fa-phone h-4 w-4 text-blue-600 pulse"></i>
          <span>Emergency: +1(234) 567 890</span>
        </div>
        <div class="hidden md:flex items-center gap-1">
          <i class="fa-solid fa-envelope h-4 w-4 text-blue-600"></i>
          <span>patient.care@MedManager.com</span>
        </div>
      </div>
      <div>
        <span class="text-gray-600">Open 24/7 - Here for You Always</span>
      </div>
    </div>
    <!-- Main Nav -->
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
      <div class="flex items-center">
        <a href="#" class="flex items-center">
          <div class="text-blue-600 font-bold text-2xl">
            Med<span class="text-blue-900">Manager</span>
          </div>
        </a>
      </div>
      <!-- Desktop navigation -->
      <nav class="hidden md:flex items-center gap-6">
        <a href="#" class="font-medium text-blue-600 hover:border-b-2 hover:border-blue-600 transition-all duration-200">Home</a>
        <a href="#about" class="font-medium hover:text-blue-600 hover:border-b-2 hover:border-blue-600 transition-all duration-200">Patient Stories</a>
        <a href="#services" class="font-medium hover:text-blue-600 hover:border-b-2 hover:border-blue-600 transition-all duration-200">Our Care</a>
        <a href="#features" class="font-medium hover:text-blue-600 hover:border-b-2 hover:border-blue-600 transition-all duration-200">Facilities</a>
        <a href="#contact" class="font-medium hover:text-blue-600 hover:border-b-2 hover:border-blue-600 transition-all duration-200">Contact Us</a>
      </nav>
      <div class="flex items-center gap-3">
        <a href="{{ route('login') }}">
          <button class="hidden md:flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors transform hover:scale-105 duration-200">
            <i class="fa-solid fa-right-to-bracket"></i>
            Patient Portal
          </button>
        </a>
        <a href="{{ route('register.create') }}">
          <button class="hidden md:flex items-center gap-2 border border-blue-600 text-blue-600 px-4 py-2 rounded hover:bg-blue-50 transition-colors bg-white transform hover:scale-105 duration-200">
            <i class="fa-solid fa-user-plus"></i>
            New Patient
          </button>
        </a>
        <a href="{{ route('login') }}">
          <button class="hidden md:flex bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transform hover:scale-105 duration-200">Book Appointment</button>
        </a>
        <button class="md:hidden p-2 rounded hover:bg-blue-50">
          <i class="fa-solid fa-bars h-6 w-6"></i>
        </button>
      </div>
    </div>
  </header>

  <!-- Hero Section -->
  <section class="bg-blue-50 py-12 md:py-20 overflow-hidden">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
        <!-- Left -->
        <div class="order-2 md:order-1 fade-in">
          <div class="text-sm text-blue-600 font-medium mb-3 flex items-center animate__animated animate__fadeInUp">
            <span class="inline-block bg-blue-100 px-2 py-1 rounded-md">Compassionate Care, Advanced Technology</span>
          </div>
          <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4 animate__animated animate__fadeInUp animate__delay-1s">
            Your Health is <br>
            Our <span class="text-blue-600">Priority</span>
          </h1>
          <p class="text-gray-600 mb-8 max-w-md animate__animated animate__fadeInUp animate__delay-2s">
            Experience healthcare that truly cares. Our team of specialists uses advanced technology to provide personalized care with a human touch.
          </p>

          <a href="{{ route('login')}}">
             <button class="bg-blue-600 text-white px-8 py-3 rounded font-semibold hover:bg-blue-700 transition-all animate__animated animate__pulse animate__infinite animate__slower">Schedule Consultation</button>
          </a>
         
        </div>
        <!-- Right -->
        <div class="order-1 md:order-2 relative flex justify-center">
          <div class="relative rounded-full bg-white w-72 h-72 md:w-80 md:h-80 lg:w-96 lg:h-96 overflow-hidden shadow-lg float">
            <img src="https://i.pinimg.com/736x/65/c0/83/65c083be05f55430af5959a62b16cd07.jpg" alt="Doctor with patient" class="object-contain h-full w-full" />
          </div>
          <!-- Second overlapping image for illustration -->
          <img src="https://i.pinimg.com/736x/f4/a9/23/f4a9237b30aad3cf0fcd8c407aca84ae.jpg" alt="Medical team" class="absolute -bottom-8 left-10 w-24 h-24 rounded-full object-cover shadow-md border-4 border-white animate__animated animate__bounce animate__delay-2s" />
       
        </div>
      </div>
    </div>
  </section>

  <!-- Features Section -->
  <section class="py-16 bg-white" id="features">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12 slide-in">
        <h2 class="text-3xl font-bold mb-4">Why Patients Choose <span class="text-blue-600">MedManager</span></h2>
        <p class="text-gray-600 max-w-2xl mx-auto">Our hospital combines cutting-edge technology with compassionate care to provide the best healthcare experience for all our patients.</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div class="bg-white p-6 rounded-lg shadow-sm text-center hover:shadow-md transition-shadow slide-in transform hover:scale-105 duration-300">
          <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-4 rotate-icon">
            <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3.332.805-4.5 2.07A5.5 5.5 0 0 0 3 8.5c0 2.29 1.51 4.04 3 5.5l6 5.5 7-6.5z"/></svg>
          </div>
          <h3 class="text-xl font-bold mb-2">Compassionate Care</h3>
          <p class="text-gray-600">We treat every patient with dignity and respect, focusing on your wellbeing and comfort throughout your healthcare journey.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm text-center hover:shadow-md transition-shadow slide-in transform hover:scale-105 duration-300" style="transition-delay: 200ms">
          <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-4 rotate-icon">
            <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
          </div>
          <h3 class="text-xl font-bold mb-2">Transparent Communication</h3>
          <p class="text-gray-600">We keep you informed every step of the way with clear explanations and access to your medical records through our secure patient portal.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-sm text-center hover:shadow-md transition-shadow slide-in transform hover:scale-105 duration-300" style="transition-delay: 400ms">
          <div class="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center mx-auto mb-4 rotate-icon">
            <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19.5 14.5C19.5 14.5 18 17 12 17C6 17 4.5 14.5 4.5 14.5M12 14.5C12 14.5 12 14.5 12 14.5C12 14.5 12 14.5 12 14.5ZM7 9.5C7 8.1193 8.1193 7 9.5 7C10.8807 7 12 8.1193 12 9.5C12 10.8807 10.8807 12 9.5 12C8.1193 12 7 10.8807 7 9.5ZM12 9.5C12 8.1193 13.1193 7 14.5 7C15.8807 7 17 8.1193 17 9.5C17 10.8807 15.8807 12 14.5 12C13.1193 12 12 10.8807 12 9.5Z"/></svg>
          </div>
          <h3 class="text-xl font-bold mb-2">Experienced Specialists</h3>
          <p class="text-gray-600">Our team of board-certified specialists brings decades of experience to provide the highest quality care using the latest medical advancements.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Stats Section with animation -->
  <section class="py-16 bg-white">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <!-- <div class="bg-blue-50 p-6 rounded-lg text-center fade-in transform hover:scale-105 duration-300">
          <div class="text-3xl font-bold mb-2"><span class="text-blue-600 counter" data-target="9800">0</span>+</div>
          <p class="text-gray-600">Satisfied Patients</p>
        </div> -->
        <div class="bg-blue-50 p-6 rounded-lg text-center fade-in transform hover:scale-105 duration-300" style="transition-delay: 200ms">
          <div class="text-3xl font-bold mb-2"><span class="text-blue-600 counter" data-target="35">0</span>+</div>
          <p class="text-gray-600">Specialized Departments</p>
        </div>
        <div class="bg-blue-50 p-6 rounded-lg text-center fade-in transform hover:scale-105 duration-300" style="transition-delay: 400ms">
          <div class="text-3xl font-bold mb-2"><span class="text-blue-600 counter" data-target="120">0</span>+</div>
          <p class="text-gray-600">Dedicated Doctors</p>
        </div>
        <div class="bg-blue-50 p-6 rounded-lg text-center fade-in transform hover:scale-105 duration-300" style="transition-delay: 600ms">
          <div class="text-3xl font-bold mb-2"><span class="text-blue-600 counter" data-target="24">0</span>/7</div>
          <p class="text-gray-600">Emergency Care</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Patient Stories Section -->
  <section class="py-16 bg-gray-50" id="about">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12 slide-in">
        <h2 class="text-3xl font-bold mb-4">Patient <span class="text-blue-600">Success Stories</span></h2>
        <p class="text-gray-600 max-w-2xl mx-auto">Real experiences from patients who found healing and hope at MedManager Hospital.</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div class="relative slide-in">
          <div class="relative rounded-lg overflow-hidden shadow-lg">
            <img src="https://i.pinimg.com/736x/56/86/91/568691dff91597e5a16a53acb3b714dd.jpg" alt="Recovered patient with doctor" class="w-full h-auto object-cover rounded-lg" />
          </div>
          <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-blue-100 rounded-full flex items-center justify-center pulse">
            <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center">
              <svg class="h-12 w-12 text-blue-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3.332.805-4.5 2.07A5.5 5.5 0 0 0 3 8.5c0 2.29 1.51 4.04 3 5.5l6 5.5 7-6.5z"></path></svg>
            </div>
          </div>
        </div>
        <div class="slide-in" style="transition-delay: 300ms">
          <div class="mb-6">
            <span class="text-blue-600 font-medium">Sarah's Recovery Journey</span>
            <h2 class="text-3xl md:text-4xl font-bold mt-2 mb-4">
              "They Didn't Just Treat My Illness, <span class="text-blue-600">They Cared for Me</span>"
            </h2>
            <p class="text-gray-600 mb-6">"After my diagnosis, I was terrified. But from my first day at MedManager, I felt like more than just a patient. Dr. Johnson took the time to explain everything, answer all my questions, and create a treatment plan that worked for my life."</p>
            <p class="text-gray-600 mb-6">"The nursing staff checked on me regularly, remembered my name, and made sure I was comfortable. Thanks to their exceptional care and expertise, I'm now back to my normal life - even better than before!"</p>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
            <div class="flex items-start animate__animated animate__fadeInLeft animate__delay-1s"><svg class="h-5 w-5 text-blue-600 mt-1 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg><div class="ml-3"><h3 class="font-medium">Personalized Care Plans</h3></div></div>
            <div class="flex items-start animate__animated animate__fadeInLeft animate__delay-2s"><svg class="h-5 w-5 text-blue-600 mt-1 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg><div class="ml-3"><h3 class="font-medium">Compassionate Staff</h3></div></div>
            <div class="flex items-start animate__animated animate__fadeInLeft animate__delay-3s"><svg class="h-5 w-5 text-blue-600 mt-1 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg><div class="ml-3"><h3 class="font-medium">Clear Communication</h3></div></div>
            <div class="flex items-start animate__animated animate__fadeInLeft animate__delay-4s"><svg class="h-5 w-5 text-blue-600 mt-1 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"></polyline></svg><div class="ml-3"><h3 class="font-medium">Follow-up Support</h3></div></div>
          </div>
          <div class="flex flex-col sm:flex-row gap-4">
            <a href="#about"><button class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transform hover:scale-105 duration-200">More Patient Stories</button></a>
            <a href="{{ route('login')}}"><button class="border border-blue-600 text-blue-600 px-6 py-2 rounded hover:bg-blue-50 transform hover:scale-105 duration-200">Book Your Appointment</button></a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="py-16 bg-white" id="services">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12 slide-in">
        <h2 class="text-3xl font-bold mb-4">Our <span class="text-blue-600">Specialized Care</span></h2>
        <p class="text-gray-600 max-w-2xl mx-auto">Comprehensive healthcare services delivered by specialists who are leaders in their fields.</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div class="slide-in">
          <div class="mb-6">
            <span class="text-blue-600 font-medium">Patient-Centered Approach</span>
            <h2 class="text-3xl md:text-4xl font-bold mt-2 mb-4">
              Care That Puts <br>
              <span class="text-blue-600">You First</span>
            </h2>
            <p class="text-gray-600 mb-6">
              At MedManager, we believe healthcare should be designed around patients, not the other way around. Our approach combines medical expertise with genuine human connection to deliver care that treats the whole person.
            </p>
          </div>
          <div class="space-y-6 mb-8">
            <div class="fade-in">
              <div class="flex justify-between items-center mb-2">
                <h3 class="font-medium">Patient Satisfaction</h3>
                <span class="text-blue-600 font-semibold">98%</span>
              </div>
              <div class="w-full bg-gray-200 h-2 rounded-full overflow-hidden">
                <div class="bg-blue-600 h-full rounded-full animate-progress" style="width:0%"></div>
              </div>
            </div>
            <div class="fade-in" style="transition-delay: 300ms">
              <div class="flex justify-between items-center mb-2">
                <h3 class="font-medium">Recovery Rate</h3>
                <span class="text-blue-600 font-semibold">94%</span>
              </div>
              <div class="w-full bg-gray-200 h-2 rounded-full overflow-hidden">
                <div class="bg-blue-600 h-full rounded-full animate-progress" style="width:0%"></div>
              </div>
            </div>
          </div>
          <button class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 animate__animated animate__pulse animate__infinite animate__slower">Emergency: +1(234) 567 890</button>
        </div>
        <div class="relative slide-in" style="transition-delay: 300ms">
          <img src="https://i.pinimg.com/736x/2a/18/e5/2a18e5eef76d32c74ea55737767f944f.jpg" alt="Doctor consulting with patient" class="w-full h-auto rounded-lg shadow-lg"/>
          <div class="absolute right-0 top-1/2 transform translate-x-1/4 -translate-y-1/2 bg-white p-6 rounded-lg shadow-lg max-w-xs animate__animated animate__fadeInRight">
            <h3 class="text-xl font-bold mb-4">We're Here When You Need Us</h3>
            <div class="space-y-2 mb-4">
              <div class="flex justify-between">
                <span class="text-gray-600">Weekdays</span>
                <span class="font-medium">24 Hours</span>
              </div>
              <div class="flex justify-between">
                <span class="text-gray-600">Weekends</span>
                <span class="font-medium">24 Hours</span>
              </div>
              <div class="flex justify-between">
                <span class="text-gray-600">Holidays</span>
                <span class="font-medium">24 Hours</span>
              </div>
            </div>
            <button class="bg-blue-600 text-white px-4 py-2 rounded w-full hover:bg-blue-700 transform hover:scale-105 duration-200">Call +1(234) 567 890</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonial Carousel -->
  <section class="py-16 bg-blue-50">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold mb-4">What Our <span class="text-blue-600">Patients Say</span></h2>
        <p class="text-gray-600 max-w-2xl mx-auto">Real testimonials from people who experienced our care.</p>
      </div>
      <div class="max-w-4xl mx-auto">
        <div class="testimonial-carousel">
          <!-- Testimonial 1 -->
          <div class="bg-white p-8 rounded-lg shadow-md mb-8 slide-in">
            <div class="flex items-center mb-4">
              <div class="w-12 h-12 bg-blue-200 rounded-full flex items-center justify-center text-blue-600 font-bold mr-4">JD</div>
              <div>
                <h4 class="font-bold">John Davis</h4>
                <p class="text-gray-600 text-sm">Cardiac Patient</p>
              </div>
              <div class="ml-auto">
                <div class="flex text-yellow-400">★★★★★</div>
              </div>
            </div>
            <p class="text-gray-700">"After my heart attack, I was scared and uncertain about my future. The cardiac team at MedManager not only provided excellent medical care but also guided me through lifestyle changes and rehabilitation. Six months later, I'm back to hiking and enjoying life with my grandchildren."</p>
          </div>
          
          <!-- Testimonial 2 -->
          <div class="bg-white p-8 rounded-lg shadow-md slide-in" style="transition-delay: 200ms">
            <div class="flex items-center mb-4">
              <div class="w-12 h-12 bg-purple-200 rounded-full flex items-center justify-center text-purple-600 font-bold mr-4">ML</div>
              <div>
                <h4 class="font-bold">Maria Lopez</h4>
                <p class="text-gray-600 text-sm">Maternity Patient</p>
              </div>
              <div class="ml-auto">
                <div class="flex text-yellow-400">★★★★★</div>
              </div>
            </div>
            <p class="text-gray-700">"My childbirth experience at MedManager Hospital was simply amazing. Dr. Evans and the labor & delivery nursing team were supportive, attentive, and made sure I was comfortable throughout the process. The birthing suite was beautiful and modern. They even helped my husband feel prepared and involved in the whole journey. Our baby boy is healthy and thriving!"</p>
          </div>
        </div>
        
        <!-- Testimonial Navigation -->
        <div class="flex justify-center mt-6 gap-2">
          <button class="w-3 h-3 rounded-full bg-blue-600"></button>
          <button class="w-3 h-3 rounded-full bg-blue-200 hover:bg-blue-400 transition-colors"></button>
          <button class="w-3 h-3 rounded-full bg-blue-200 hover:bg-blue-400 transition-colors"></button>
        </div>
      </div>
    </div>
  </section>

  <!-- Our Doctors -->
  <section class="py-16 bg-white">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12 slide-in">
        <h2 class="text-3xl font-bold mb-4">Meet Our <span class="text-blue-600">Specialists</span></h2>
        <p class="text-gray-600 max-w-2xl mx-auto">Our team of dedicated healthcare professionals bringing years of expertise to your care.</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        <!-- Doctor 1 -->
        <div class="bg-white rounded-lg overflow-hidden shadow hover:shadow-md transition-shadow slide-in transform hover:scale-105 duration-300">
          <div class="relative">
            <img src="/api/placeholder/300/300" alt="Dr. Michael Johnson" class="w-full h-64 object-cover"/>
            <div class="absolute top-4 right-4 bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs font-medium">
              Chief of Cardiology
            </div>
          </div>
          <div class="p-6">
            <h3 class="font-bold text-xl mb-1">Dr. Michael Johnson</h3>
            <p class="text-gray-600 text-sm mb-4">Cardiology Specialist</p>
            <p class="text-gray-700 text-sm mb-4">Over 15 years of experience in treating complex cardiac conditions using minimally invasive techniques.</p>
            <div class="flex justify-between items-center">
              <div class="flex space-x-2">
                <a href="#" class="text-blue-600 hover:text-blue-800"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-blue-600 hover:text-blue-800"><i class="fab fa-linkedin"></i></a>
              </div>
              <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View Profile →</a>
            </div>
          </div>
        </div>
        
        <!-- Doctor 2 -->
        <div class="bg-white rounded-lg overflow-hidden shadow hover:shadow-md transition-shadow slide-in transform hover:scale-105 duration-300" style="transition-delay: 200ms">
          <div class="relative">
            <img src="/api/placeholder/300/300" alt="Dr. Sarah Evans" class="w-full h-64 object-cover"/>
            <div class="absolute top-4 right-4 bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs font-medium">
              Head of Obstetrics
            </div>
          </div>
          <div class="p-6">
            <h3 class="font-bold text-xl mb-1">Dr. Sarah Evans</h3>
            <p class="text-gray-600 text-sm mb-4">OB/GYN Specialist</p>
            <p class="text-gray-700 text-sm mb-4">Passionate about women's health with expertise in high-risk pregnancies and minimally invasive gynecological procedures.</p>
            <div class="flex justify-between items-center">
              <div class="flex space-x-2">
                <a href="#" class="text-blue-600 hover:text-blue-800"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-blue-600 hover:text-blue-800"><i class="fab fa-linkedin"></i></a>
              </div>
              <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View Profile →</a>
            </div>
          </div>
        </div>
        
        <!-- Doctor 3 -->
        <div class="bg-white rounded-lg overflow-hidden shadow hover:shadow-md transition-shadow slide-in transform hover:scale-105 duration-300" style="transition-delay: 400ms">
          <div class="relative">
            <img src="/api/placeholder/300/300" alt="Dr. Robert Chen" class="w-full h-64 object-cover"/>
            <div class="absolute top-4 right-4 bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs font-medium">
              Neurologist
            </div>
          </div>
          <div class="p-6">
            <h3 class="font-bold text-xl mb-1">Dr. Robert Chen</h3>
            <p class="text-gray-600 text-sm mb-4">Neurology Specialist</p>
            <p class="text-gray-700 text-sm mb-4">Specialized in treating complex neurological disorders with advanced diagnostic techniques and personalized treatment plans.</p>
            <div class="flex justify-between items-center">
              <div class="flex space-x-2">
                <a href="#" class="text-blue-600 hover:text-blue-800"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-blue-600 hover:text-blue-800"><i class="fab fa-linkedin"></i></a>
              </div>
              <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View Profile →</a>
            </div>
          </div>
        </div>
        
        <!-- Doctor 4 -->
        <div class="bg-white rounded-lg overflow-hidden shadow hover:shadow-md transition-shadow slide-in transform hover:scale-105 duration-300" style="transition-delay: 600ms">
          <div class="relative">
            <img src="/api/placeholder/300/300" alt="Dr. Lisa Williams" class="w-full h-64 object-cover"/>
            <div class="absolute top-4 right-4 bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs font-medium">
              Pediatrician
            </div>
          </div>
          <div class="p-6">
            <h3 class="font-bold text-xl mb-1">Dr. Lisa Williams</h3>
            <p class="text-gray-600 text-sm mb-4">Pediatrics Specialist</p>
            <p class="text-gray-700 text-sm mb-4">Devoted to children's health and development with a focus on preventive care and childhood chronic conditions management.</p>
            <div class="flex justify-between items-center">
              <div class="flex space-x-2">
                <a href="#" class="text-blue-600 hover:text-blue-800"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-blue-600 hover:text-blue-800"><i class="fab fa-linkedin"></i></a>
              </div>
              <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View Profile →</a>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center mt-10">
        <a href="#"><button class="border border-blue-600 text-blue-600 px-8 py-3 rounded font-medium hover:bg-blue-50 transform hover:scale-105 duration-200">Meet All Our Specialists</button></a>
      </div>
    </div>
  </section>

  <!-- FAQ Section -->
  <section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12 slide-in">
        <h2 class="text-3xl font-bold mb-4">Frequently <span class="text-blue-600">Asked Questions</span></h2>
        <p class="text-gray-600 max-w-2xl mx-auto">Find answers to common questions about our services, insurance, and appointments.</p>
      </div>
      <div class="max-w-3xl mx-auto">
        <!-- FAQ Item 1 -->
        <div class="mb-6 border-b border-gray-200 pb-6 slide-in">
          <button class="flex justify-between items-center w-full text-left">
            <h3 class="font-semibold text-lg">How do I schedule an appointment?</h3>
            <svg class="w-5 h-5 text-blue-600 transform rotate-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>
          <div class="mt-3">
            <p class="text-gray-600">You can schedule an appointment by calling our central appointment line at +1(234) 567 890, using our online patient portal, or visiting the scheduling desk at our facility. For new patients, we recommend calling directly so we can gather all necessary information for your first visit.</p>
          </div>
        </div>
        
        <!-- FAQ Item 2 -->
        <div class="mb-6 border-b border-gray-200 pb-6 slide-in" style="transition-delay: 200ms">
          <button class="flex justify-between items-center w-full text-left">
            <h3 class="font-semibold text-lg">What insurance plans do you accept?</h3>
            <svg class="w-5 h-5 text-blue-600 transform rotate-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>
          <div class="mt-3">
            <p class="text-gray-600">MedManager accepts most major insurance plans, including Medicare, Medicaid, Blue Cross Blue Shield, Aetna, Cigna, UnitedHealthcare, and many others. We recommend verifying your coverage with our billing department before your appointment to understand any potential out-of-pocket costs.</p>
          </div>
        </div>
        
        <!-- FAQ Item 3 -->
        <div class="mb-6 border-b border-gray-200 pb-6 slide-in" style="transition-delay: 400ms">
          <button class="flex justify-between items-center w-full text-left">
            <h3 class="font-semibold text-lg">What should I bring to my first appointment?</h3>
            <svg class="w-5 h-5 text-blue-600 transform rotate-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>
          <div class="mt-3">
            <p class="text-gray-600">Please bring your photo ID, insurance card, list of current medications (including dosages), medical records or test results from previous providers, and payment for any copays or deductibles. Arriving 15 minutes early allows time to complete any necessary paperwork.</p>
          </div>
        </div>
        
        <!-- FAQ Item 4 -->
        <div class="mb-6 slide-in" style="transition-delay: 600ms">
          <button class="flex justify-between items-center w-full text-left">
            <h3 class="font-semibold text-lg">Do you offer virtual appointments?</h3>
            <svg class="w-5 h-5 text-blue-600 transform rotate-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
            </svg>
          </button>
          <div class="mt-3">
            <p class="text-gray-600">Yes, we offer telemedicine appointments for many types of visits. These secure video consultations allow you to meet with your provider from the comfort of your home. Not all conditions are appropriate for virtual care, so please call us to determine if your situation is suitable for a telehealth appointment.</p>
          </div>
        </div>
      </div>
      <div class="text-center mt-10">
        <a href="#"><button class="bg-blue-600 text-white px-8 py-3 rounded font-medium hover:bg-blue-700 transform hover:scale-105 duration-200">View All FAQs</button></a>
      </div>
    </div>
  </section>

  <!-- Contact & Location -->
  <section id="contact" class="py-16 bg-white">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12 slide-in">
        <h2 class="text-3xl font-bold mb-4">Get in <span class="text-blue-600">Touch</span></h2>
        <p class="text-gray-600 max-w-2xl mx-auto">We're here to answer your questions and help you find the care you need.</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
        <!-- Contact Form -->
        <div class="slide-in">
          <form class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Your Name</label>
                <input type="text" id="name" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="John Doe">
              </div>
              <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                <input type="email" id="email" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="john@example.com">
              </div>
            </div>
            <div>
              <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Subject</label>
              <input type="text" id="subject" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Appointment Request">
            </div>
            <div>
              <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Your Message</label>
              <textarea id="message" rows="5" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="How can we help you?"></textarea>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-8 py-3 rounded font-medium hover:bg-blue-700 transform hover:scale-105 duration-200 w-full">Send Message</button>
          </form>
        </div>
        
        <!-- Location & Info -->
        <div class="slide-in" style="transition-delay: 300ms">
          <div class="bg-blue-50 p-8 rounded-lg h-full">
            <h3 class="text-2xl font-bold mb-6">Contact Information</h3>
            <div class="space-y-6">
              <div class="flex items-start">
                <div class="bg-blue-100 rounded-lg p-3 mr-4">
                  <i class="fa-solid fa-location-dot text-blue-600"></i>
                </div>
                <div>
                  <h4 class="font-semibold mb-1">Our Location</h4>
                  <p class="text-gray-600">123 Healing Way, MedCity, MC 12345</p>
                </div>
              </div>
              <div class="flex items-start">
                <div class="bg-blue-100 rounded-lg p-3 mr-4">
                  <i class="fa-solid fa-phone text-blue-600"></i>
                </div>
                <div>
                  <h4 class="font-semibold mb-1">Phone Numbers</h4>
                  <p class="text-gray-600">Main: +1(234) 567 890</p>
                  <p class="text-gray-600">Emergency: +1(234) 567 911</p>
                </div>
              </div>
              <div class="flex items-start">
                <div class="bg-blue-100 rounded-lg p-3 mr-4">
                  <i class="fa-solid fa-envelope text-blue-600"></i>
                </div>
                <div>
                  <h4 class="font-semibold mb-1">Email</h4>
                  <p class="text-gray-600">patient.care@MedManager.com</p>
                  <p class="text-gray-600">appointments@MedManager.com</p>
                </div>
              </div>
              <div class="flex items-start">
                <div class="bg-blue-100 rounded-lg p-3 mr-4">
                  <i class="fa-solid fa-clock text-blue-600"></i>
                </div>
                <div>
                  <h4 class="font-semibold mb-1">Hours of Operation</h4>
                  <p class="text-gray-600">Emergency Care: 24/7/365</p>
                  <p class="text-gray-600">Outpatient Services: Mon-Fri 8am-8pm</p>
                  <p class="text-gray-600">Weekend Clinics: Sat-Sun 9am-5pm</p>
                </div>
              </div>
            </div>
            <div class="mt-8">
              <h4 class="font-semibold mb-3">Connect With Us</h4>
              <div class="flex space-x-4">
                <a href="#" class="bg-blue-100 w-10 h-10 rounded-full flex items-center justify-center">
                  <i class="fab fa-facebook-f text-blue-600"></i>
                </a>
                <a href="#" class="bg-blue-100 w-10 h-10 rounded-full flex items-center justify-center">
                  <i class="fab fa-twitter text-blue-600"></i>
                </a>
                <a href="#" class="bg-blue-100 w-10 h-10 rounded-full flex items-center justify-center">
                  <i class="fab fa-instagram text-blue-600"></i>
                </a>
                <a href="#" class="bg-blue-100 w-10 h-10 rounded-full flex items-center justify-center">
                  <i class="fab fa-linkedin-in text-blue-600"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Newsletter -->
  <section class="py-16 bg-blue-600 text-white">
    <div class="container mx-auto px-4">
      <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-3xl font-bold mb-4">Stay Updated on Health Tips & News</h2>
        <p class="mb-8">Subscribe to our newsletter for the latest health information, hospital news, and wellness tips.</p>
        <div class="flex flex-col sm:flex-row gap-4 max-w-xl mx-auto">
          <input type="email" placeholder="Your email address" class="flex-1 px-4 py-3 rounded-lg focus:outline-none text-gray-800">
          <button class="bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:bg-blue-50 transition-colors transform hover:scale-105 duration-200">Subscribe</button>
        </div>
        <p class="text-sm mt-4">We respect your privacy. Unsubscribe at any time.</p>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-blue-900 text-white pt-16 pb-8">
    <div class="container mx-auto px-4">
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
        <div>
          <div class="text-xl font-bold mb-6">Med<span class="text-blue-400">Manager</span></div>
          <p class="text-blue-200 mb-6">Providing compassionate care and advanced medical services to our community since 1985.</p>
          <div class="flex space-x-4">
            <a href="#" class="text-blue-200 hover:text-white transition-colors">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="text-blue-200 hover:text-white transition-colors">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="text-blue-200 hover:text-white transition-colors">
              <i class="fab fa-instagram"></i>
            </a>
            <a href="#" class="text-blue-200 hover:text-white transition-colors">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </div>
        <div>
          <h3 class="font-semibold text-lg mb-6">Quick Links</h3>
          <ul class="space-y-3">
            <li><a href="#" class="text-blue-200 hover:text-white transition-colors">About Us</a></li>
            <li><a href="#" class="text-blue-200 hover:text-white transition-colors">Our Specialists</a></li>
            <li><a href="#" class="text-blue-200 hover:text-white transition-colors">Services</a></li>
            <li><a href="#" class="text-blue-200 hover:text-white transition-colors">Patient Portal</a></li>
            <li><a href="#" class="text-blue-200 hover:text-white transition-colors">Insurance & Billing</a></li>
            <li><a href="#" class="text-blue-200 hover:text-white transition-colors">Careers</a></li>
          </ul>
        </div>
        <div>
          <h3 class="font-semibold text-lg mb-6">Our Services</h3>
          <ul class="space-y-3">
            <li><a href="#" class="text-blue-200 hover:text-white transition-colors">Emergency Care</a></li>
            <li><a href="#" class="text-blue-200 hover:text-white transition-colors">Cardiology</a></li>
            <li><a href="#" class="text-blue-200 hover:text-white transition-colors">Neurology</a></li>
            <li><a href="#" class="text-blue-200 hover:text-white transition-colors">Pediatrics</a></li>
            <li><a href="#" class="text-blue-200 hover:text-white transition-colors">Obstetrics & Gynecology</a></li>
            <li><a href="#" class="text-blue-200 hover:text-white transition-colors">Orthopedics</a></li>
          </ul>
        </div>
        <div>
          <h3 class="font-semibold text-lg mb-6">Contact Info</h3>
          <ul class="space-y-3">
            <li class="flex items-start">
              <i class="fa-solid fa-location-dot mt-1 mr-3 text-blue-400"></i>
              <span>123 Healing Way, MedCity, MC 12345</span>
            </li>
            <li class="flex items-start">
              <i class="fa-solid fa-phone mt-1 mr-3 text-blue-400"></i>
              <span>+1(234) 567 890</span>
            </li>
            <li class="flex items-start">
              <i class="fa-solid fa-envelope mt-1 mr-3 text-blue-400"></i>
              <span>patient.care@MedManager.com</span>
            </li>
          </ul>
        </div>
      </div>
      <div class="border-t border-blue-800 pt-8">
        <div class="flex flex-col md:flex-row justify-between items-center">
          <p class="text-blue-200 text-sm">&copy; 2025 MedManager Hospital. All Rights Reserved.</p>
          <div class="flex space-x-6 mt-4 md:mt-0">
            <a href="#" class="text-blue-200 hover:text-white text-sm transition-colors">Privacy Policy</a>
            <a href="#" class="text-blue-200 hover:text-white text-sm transition-colors">Terms of Service</a>
            <a href="#" class="text-blue-200 hover:text-white text-sm transition-colors">Patient Rights</a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Back to Top Button -->
  <button id="backToTop" class="fixed bottom-8 right-8 bg-blue-600 text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg transform hover:scale-110 transition-transform opacity-0 pointer-events-none">
    <i class="fa-solid fa-arrow-up"></i>
  </button>

  <!-- Script for animations and interactions -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Animation on scroll
      const fadeElems = document.querySelectorAll('.fade-in');
      const slideElems = document.querySelectorAll('.slide-in');
      
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('appear');
          }
        });
      }, { threshold: 0.1 });
      
      fadeElems.forEach(el => observer.observe(el));
      slideElems.forEach(el => observer.observe(el));
      
      // Counter animation
      const counters = document.querySelectorAll('.counter');
      const speed = 200; // The lower the faster
      
      counters.forEach(counter => {
        const animate = () => {
          const target = +counter.getAttribute('data-target');
          const count = +counter.innerText.replace(/,/g, '');
          const increment = target / speed;
          
          if (count < target) {
            counter.innerText = Math.ceil(count + increment);
            setTimeout(animate, 1);
          } else {
            counter.innerText = target;
          }
        };
        
        animate();
      });
      
      // Progress bar animation
      document.querySelectorAll('.animate-progress').forEach(progressBar => {
        const endWidth = progressBar.parentElement.previousElementSibling.querySelector('.text-blue-600').innerText;
        progressBar.style.width = endWidth;
      });
      
      // Back to top button
      const backToTopButton = document.getElementById('backToTop');
      
      window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
          backToTopButton.classList.add('opacity-100');
          backToTopButton.classList.remove('opacity-0');
          backToTopButton.classList.remove('pointer-events-none');
        } else {
          backToTopButton.classList.add('opacity-0');
          backToTopButton.classList.remove('opacity-100');
          backToTopButton.classList.add('pointer-events-none');
        }
      });
      
      backToTopButton.addEventListener('click', () => {
        window.scrollTo({
          top: 0,
          behavior: 'smooth'
        });
      });
    });
  </script>
</body>
</html>