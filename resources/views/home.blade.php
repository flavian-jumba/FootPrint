@extends('layouts.app')

@section('content')

{{-- Add AOS CSS library for scroll animations (via Vite) --}}
@vite(['resources/css/app.css', 'resources/js/app.js'])

{{-- Home Section --}}
<div id="home" class="bg-gray-900">
  <header id="navbar" class="fixed inset-x-0 top-0 z-50 transition-all duration-300 bg-transparent">
    <nav aria-label="Global" class="flex items-center justify-between p-6 lg:px-8">
      <div class="flex lg:flex-1">
        <a href="#" class="-m-1.5 p-1.5">
          <span class="sr-only">Your Company</span>
          <img src="{{ asset('images/logo.png') }}" alt="" class="h-8 w-auto" />
        </a>
      </div>
      <div class="flex lg:hidden">
        <button type="button" command="show-modal" commandfor="mobile-menu" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-200">
          <span class="sr-only">Open main menu</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
            <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
          </svg>
        </button>
      </div>
      <div class="hidden lg:flex lg:gap-x-12">
        <a href="#home" class="text-sm/6 font-semibold text-white scroll-smooth">Home</a>
        <a href="#about" class="text-sm/6 font-semibold text-white scroll-smooth">About</a>
        <a href="#programs" class="text-sm/6 font-semibold text-white scroll-smooth">What we Do</a>
        <a href="#testimonials" class="text-sm/6 font-semibold text-white scroll-smooth">Testimonials</a>
        <a href="#contact" class="text-sm/6 font-semibold text-white scroll-smooth">Join Us</a>
      </div>
      <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        <a href="#" class="rounded-md bg-indigo-500 px-3.5 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Contact Us</a>
      </div>
    </nav>
    <!-- Mobile menu dialog -->
    <div id="mobile-menu-container" class="relative lg:hidden">
      <div id="mobile-menu" class="hidden fixed inset-0 z-50">
        <div class="fixed inset-0 bg-black/30" id="mobile-menu-backdrop"></div>
        <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-gray-900 p-6 sm:max-w-sm sm:ring-1 sm:ring-gray-100/10">
          <div class="flex items-center justify-between">
            <a href="#" class="-m-1.5 p-1.5">
              <span class="sr-only">Your Company</span>
              <img src="{{ asset('images/logo.png') }}" alt="" class="h-8 w-auto" />
            </a>
            <button type="button" id="close-mobile-menu" class="-m-2.5 rounded-md p-2.5 text-gray-200">
              <span class="sr-only">Close menu</span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="h-6 w-6">
                <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </button>
          </div>
          <div class="mt-6 flow-root">
            <div class="-my-6 divide-y divide-white/10">
              <div class="space-y-2 py-6">
                <a href="#home" class="-mx-3 block rounded-lg px-3 py-2 text-base leading-7 font-semibold text-white hover:bg-white/5">Home</a>
                <a href="#about" class="-mx-3 block rounded-lg px-3 py-2 text-base leading-7 font-semibold text-white hover:bg-white/5">About</a>
                <a href="#programs" class="-mx-3 block rounded-lg px-3 py-2 text-base leading-7 font-semibold text-white hover:bg-white/5">What We Do</a>
                <a href="#testimonials" class="-mx-3 block rounded-lg px-3 py-2 text-base leading-7 font-semibold text-white hover:bg-white/5">Testimonials</a>
                <a href="#contact" class="-mx-3 block rounded-lg px-3 py-2 text-base leading-7 font-semibold text-white hover:bg-white/5">Join Us</a>
              </div>
              <div class="py-6">
                <a href="#" class="block rounded-md bg-indigo-500 px-4 py-2.5 text-base font-semibold text-white shadow-sm hover:bg-indigo-400">Contact Us</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const openMenuBtn = document.querySelector('[command="show-modal"]');
        const closeMenuBtn = document.getElementById('close-mobile-menu');
        const mobileMenu = document.getElementById('mobile-menu');
        const backdrop = document.getElementById('mobile-menu-backdrop');
        
        // Mobile menu functionality
        if (openMenuBtn && mobileMenu) {
          openMenuBtn.addEventListener('click', function() {
            mobileMenu.classList.remove('hidden');
          });
        }
        
        if (closeMenuBtn && mobileMenu) {
          closeMenuBtn.addEventListener('click', function() {
            mobileMenu.classList.add('hidden');
          });
        }
        
        if (backdrop && mobileMenu) {
          backdrop.addEventListener('click', function() {
            mobileMenu.classList.add('hidden');
          });
        }
        
        // Sticky navbar functionality
        const navbar = document.getElementById('navbar');
        let lastScrollTop = 0;
        
        // Get the position of the About section to use as trigger point
        const aboutSection = document.querySelector('.about-section');
        const aboutSectionTop = aboutSection ? aboutSection.offsetTop - 100 : 500; // Default fallback if section not found
        
        window.addEventListener('scroll', function() {
          const scrollTop = window.scrollY;
          
          // Add or remove classes based on scroll position
          if (scrollTop === 0) {
            // At the very top of page - fully transparent
            navbar.classList.remove('bg-gray-900/90', 'backdrop-blur-sm', 'shadow-md');
          } else if (scrollTop >= aboutSectionTop) {
            // When scrolled to About section or beyond, always show navbar with background
            navbar.classList.add('bg-gray-900/90', 'backdrop-blur-sm', 'shadow-md');
            navbar.classList.remove('translate-y-[-100%]');
          } else if (scrollTop > 10) {
            // Between top and About section - transparent with slight blur effect
            navbar.classList.add('bg-gray-900/50', 'backdrop-blur-sm');
            navbar.classList.remove('bg-gray-900/90', 'shadow-md');
          }
          
          lastScrollTop = scrollTop;
        });
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
          anchor.addEventListener('click', function (e) {
            e.preventDefault();
            
            // Close mobile menu if open
            if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
              mobileMenu.classList.add('hidden');
            }
            
            // Get the target element
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            
            if (targetElement) {
              // Calculate position to scroll to (with offset for fixed header)
              const headerOffset = 80; // Adjust based on your header height
              const elementPosition = targetElement.getBoundingClientRect().top;
              const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
              
              // Smooth scroll to target
              window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
              });
            }
          });
        });
      });
    </script>
  </header>

  <div class="relative isolate px-6 pt-14 lg:px-8">
    <div aria-hidden="true" class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
      <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="relative left-[calc(50%-11rem)] aspect-1155/678 w-144.5 -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-288.75"></div>
    </div>
    <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
      <div class="hidden sm:mb-8 sm:flex sm:justify-center" data-aos="fade-down" data-aos-delay="100">
        <div class="relative rounded-full px-3 py-1 text-sm/6 text-gray-400 ring-1 ring-white/10 hover:ring-white/20">
          Announcing our next round of funding. <a href="#" class="font-semibold text-indigo-400"><span aria-hidden="true" class="absolute inset-0"></span>Read more <span aria-hidden="true">&rarr;</span></a>
        </div>
      </div>
      <div class="text-center">
        <h1 class="text-5xl font-semibold tracking-tight text-balance text-white sm:text-7xl" data-aos="fade-up" data-aos-delay="200">Empowering the next generation,one footprint at a time</h1>
        <p class="mt-8 text-lg font-medium text-pretty text-gray-400 sm:text-xl/8" data-aos="fade-up" data-aos-delay="300">Footprints of Hope empowers Kenya's girls, youth, and women with resources, education, and support for resilient futures.</p>
        <div class="mt-10 flex items-center justify-center gap-x-6" data-aos="fade-up" data-aos-delay="400">
          <a href="#" class="rounded-md bg-indigo-500 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Get started</a>
          <a href="#" class="text-sm/6 font-semibold text-white">Learn more <span aria-hidden="true">→</span></a>
        </div>
      </div>
    </div>
    <div aria-hidden="true" class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]">
      <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="relative left-[calc(50%+3rem)] aspect-1155/678 w-144.5 -translate-x-1/2 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-288.75"></div>
    </div>
  </div>
</div>


{{-- About section --}}

<div id="about" class="relative isolate overflow-hidden bg-gray-900 px-6 py-24 sm:py-32 lg:overflow-visible lg:px-0 about-section">
  <div class="absolute inset-0 -z-10 overflow-hidden">
    <svg aria-hidden="true" class="absolute top-0 left-[max(50%,25rem)] h-256 w-512 -translate-x-1/2 mask-[radial-gradient(64rem_64rem_at_top,white,transparent)] stroke-gray-800">
      <defs>
        <pattern id="e813992c-7d03-4cc4-a2bd-151760b470a0" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
          <path d="M100 200V.5M.5 .5H200" fill="none" />
        </pattern>
      </defs>
      <svg x="50%" y="-1" class="overflow-visible fill-gray-800/50">
        <path d="M-100.5 0h201v201h-201Z M699.5 0h201v201h-201Z M499.5 400h201v201h-201Z M-300.5 600h201v201h-201Z" stroke-width="0" />
      </svg>
      <rect width="100%" height="100%" fill="url(#e813992c-7d03-4cc4-a2bd-151760b470a0)" stroke-width="0" />
    </svg>
  </div>
  <div class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 lg:mx-0 lg:max-w-none lg:grid-cols-2 lg:items-start lg:gap-y-10">
    <div class="lg:col-span-2 lg:col-start-1 lg:row-start-1 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8" data-aos="fade-right">
      <div class="lg:pr-4">
        <div class="lg:max-w-lg">
          <p class="text-base/7 font-semibold text-indigo-400">About Us</p>
          <h1 class="mt-2 text-4xl font-semibold tracking-tight text-pretty text-white sm:text-5xl">Who we are</h1>
          <p class="mt-6 text-xl/8 text-gray-300">Get a clear understanding of us and what drives us to our mission</p>
        </div>
      </div>
    </div>
    <div class="-mt-12 -ml-12 p-12 lg:sticky lg:top-4 lg:col-start-2 lg:row-span-2 lg:row-start-1 lg:overflow-hidden" data-aos="fade-left" data-aos-delay="100">
      <img loading="lazy" src="{{ asset('images/one.png') }}" alt="" class="w-3xl max-w-none rounded-xl bg-gray-800 shadow-xl ring-1 ring-white/10 sm:w-228" />
    </div>
    <div class="lg:col-span-2 lg:col-start-1 lg:row-start-2 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
      <div class="lg:pr-4" data-aos="fade-up">
        <div class="max-w-xl text-base/7 text-gray-400 lg:max-w-lg">
          <p>Founded in 2019 in Busia, Kenya, Footprints of Hope Foundation is a community-based organization focused on empowering girls, youth, and women. We address key social issues including menstrual hygiene, sexual and reproductive health, children's rights, socio-economic empowerment, and mental health through compassionate and action-driven programs.</p>
          <ul role="list" class="mt-8 space-y-8 text-gray-400">
            <li class="flex gap-x-3">
              <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="mt-1 size-5 flex-none text-indigo-400">
                <path d="M5.5 17a4.5 4.5 0 0 1-1.44-8.765 4.5 4.5 0 0 1 8.302-3.046 3.5 3.5 0 0 1 4.504 4.272A4 4 0 0 1 15 17H5.5Zm3.75-2.75a.75.75 0 0 0 1.5 0V9.66l1.95 2.1a.75.75 0 1 0 1.1-1.02l-3.25-3.5a.75.75 0 0 0-1.1 0l-3.25 3.5a.75.75 0 1 0 1.1 1.02l1.95-2.1v4.59Z" clip-rule="evenodd" fill-rule="evenodd" />
              </svg>
              <span><strong class="font-semibold text-white">Our Vision</strong> To create a community where every girl, youth, and woman can achieve their potential and contribute positively, free from discrimination and socioeconomic barriers.</span>
            </li>
            <li class="flex gap-x-3">
              <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="mt-1 size-5 flex-none text-indigo-400">
                <path d="M10 1a4.5 4.5 0 0 0-4.5 4.5V9H5a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2v-6a2 2 0 0 0-2-2h-.5V5.5A4.5 4.5 0 0 0 10 1Zm3 8V5.5a3 3 0 1 0-6 0V9h6Z" clip-rule="evenodd" fill-rule="evenodd" />
              </svg>
              <span><strong class="font-semibold text-white">Our Mission</strong> We aim to empower the girl child and teenage mothers in rural Kenya through education, mental health support, and socioeconomic programs that foster independence and dignity.</span>
            </li>
            {{-- <li class="flex gap-x-3">
              <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="mt-1 size-5 flex-none text-indigo-400">
                <path d="M4.632 3.533A2 2 0 0 1 6.577 2h6.846a2 2 0 0 1 1.945 1.533l1.976 8.234A3.489 3.489 0 0 0 16 11.5H4c-.476 0-.93.095-1.344.267l1.976-8.234Z" />
                <path d="M4 13a2 2 0 1 0 0 4h12a2 2 0 1 0 0-4H4Zm11.24 2a.75.75 0 0 1 .75-.75H16a.75.75 0 0 1 .75.75v.01a.75.75 0 0 1-.75.75h-.01a.75.75 0 0 1-.75-.75V15Zm-2.25-.75a.75.75 0 0 0-.75.75v.01c0 .414.336.75.75.75H13a.75.75 0 0 0 .75-.75V15a.75.75 0 0 0-.75-.75h-.01Z" clip-rule="evenodd" fill-rule="evenodd" />
              </svg>
              <span><strong class="font-semibold text-white">Database backups.</strong> Ac tincidunt sapien vehicula erat auctor pellentesque rhoncus. Et magna sit morbi lobortis.</span>
            </li> --}}
          </ul>
          {{-- <p class="mt-8">Et vitae blandit facilisi magna lacus commodo. Vitae sapien duis odio id et. Id blandit molestie auctor fermentum dignissim. Lacus diam tincidunt ac cursus in vel. Mauris varius vulputate et ultrices hac adipiscing egestas. Iaculis convallis ac tempor et ut. Ac lorem vel integer orci.</p>
          <h2 class="mt-16 text-2xl font-bold tracking-tight text-white">No server? No problem.</h2>
          <p class="mt-6">Id orci tellus laoreet id ac. Dolor, aenean leo, ac etiam consequat in. Convallis arcu ipsum urna nibh. Pharetra, euismod vitae interdum mauris enim, consequat vulputate nibh. Maecenas pellentesque id sed tellus mauris, ultrices mauris. Tincidunt enim cursus ridiculus mi. Pellentesque nam sed nullam sed diam turpis ipsum eu a sed convallis diam.</p> --}}
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Our Programs  --}}
<div id="programs" class="bg-gray-900 py-24 sm:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-2xl text-center" data-aos="fade-up">
      <p class="text-base font-semibold leading-7 text-indigo-400">Our Programs</p>
      <h1 class="mt-2 text-4xl font-bold tracking-tight text-white sm:text-5xl">On a mission to empower communities</h1>
      <p class="mt-6 text-lg leading-8 text-gray-300">We create sustainable programs designed to address the specific needs of girls, youth, and women in our communities.</p>
    </div>
    <section class="mx-auto mt-16 grid max-w-7xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:grid-cols-2">
      <div class="lg:pr-8" data-aos="fade-right">
        <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Our Impact Areas</h2>
        <p class="mt-6 text-base leading-7 text-gray-300">Through our targeted programs, we focus on menstrual hygiene, education support, vocational training, and mental health awareness to create lasting change in our communities.</p>
        <p class="mt-6 text-base leading-7 text-gray-300">Each of our initiatives is designed with community input and implemented with local partnerships to ensure sustainability and maximum impact for those we serve.</p>
      </div>
      <div class="grid grid-cols-2 gap-4 sm:gap-6" data-aos="fade-left">
        <div class="grid grid-rows-2 gap-4 sm:gap-6">
          <!-- Program 1: Teenage Mother Support Program -->
          <div class="group relative overflow-hidden rounded-lg" data-aos="zoom-in" data-aos-delay="100">
            <img loading="lazy" src="{{ asset('images/a.png') }}" alt="Teenage Mother Support Program" class="h-full w-full object-cover object-center transition-all duration-300 group-hover:scale-105">
            <div class="absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-black/80 via-black/50 to-transparent p-4 opacity-0 transition-all duration-300 group-hover:opacity-100">
              <h3 class="text-lg font-bold text-pink-400">Teenage Mother Support Program</h3>
              <p class="text-sm text-white">Resources and support for young mothers to continue education and develop skills.</p>
              <a href="#" class="mt-2 inline-flex items-center text-sm font-medium text-pink-300 hover:text-pink-200">
                Learn more
                <svg class="ml-1 h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                </svg>
              </a>
            </div>
          </div>
          
          <!-- Program 2: Socio-Economic Empowerment -->
          <div class="group relative overflow-hidden rounded-lg sm:relative sm:top-8" data-aos="zoom-in" data-aos-delay="200">
            <img loading="lazy" src="{{ asset('images/b.png') }}" alt="Socio-Economic Empowerment Program" class="h-full w-full object-cover object-center transition-all duration-300 group-hover:scale-105">
            <div class="absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-black/80 via-black/50 to-transparent p-4 opacity-0 transition-all duration-300 group-hover:opacity-100">
              <h3 class="text-lg font-bold text-pink-400">Socio-Economic Empowerment</h3>
              <p class="text-sm text-white">Business development, skill training, and financial resources for women and youth.</p>
              <a href="#" class="mt-2 inline-flex items-center text-sm font-medium text-pink-300 hover:text-pink-200">
                Learn more
                <svg class="ml-1 h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                </svg>
              </a>
            </div>
          </div>
        </div>
        
        <div class="grid grid-rows-2 gap-4 sm:gap-6">
          <!-- Program 3: Nhanga Sessions for Mental Health -->
          <div class="group relative overflow-hidden rounded-lg sm:relative sm:top-8" data-aos="zoom-in" data-aos-delay="300">
            <img loading="lazy" src="{{ asset('images/c.png') }}" alt="Nhanga Sessions for Mental Health" class="h-full w-full object-cover object-center transition-all duration-300 group-hover:scale-105">
            <div class="absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-black/80 via-black/50 to-transparent p-4 opacity-0 transition-all duration-300 group-hover:opacity-100">
              <h3 class="text-lg font-bold text-pink-400">Nhanga Sessions for Mental Health</h3>
              <p class="text-sm text-white">Safe spaces and professional counseling for emotional wellbeing and mental health.</p>
              <a href="#" class="mt-2 inline-flex items-center text-sm font-medium text-pink-300 hover:text-pink-200">
                Learn more
                <svg class="ml-1 h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                </svg>
              </a>
            </div>
          </div>
          
          <!-- Program 4: Community Mobilization -->
          <div class="group relative overflow-hidden rounded-lg" data-aos="zoom-in" data-aos-delay="400">
            <img loading="lazy" src="{{ asset('images/d.png') }}" alt="Community Mobilization Program" class="h-full w-full object-cover object-center transition-all duration-300 group-hover:scale-105">
            <div class="absolute inset-0 flex flex-col justify-end bg-gradient-to-t from-black/80 via-black/50 to-transparent p-4 opacity-0 transition-all duration-300 group-hover:opacity-100">
              <h3 class="text-lg font-bold text-pink-400">Community Mobilization</h3>
              <p class="text-sm text-white">Collective action for health education, social awareness, and sustainable development.</p>
              <a href="#" class="mt-2 inline-flex items-center text-sm font-medium text-pink-300 hover:text-pink-200">
                Learn more
                <svg class="ml-1 h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="lg:col-span-2" data-aos="fade-up">
        <p class="text-base font-semibold leading-7 text-white">Our Impact</p>
        <hr class="mt-2 border-gray-700">
        <dl class="mt-10 grid grid-cols-2 gap-x-8 gap-y-12 sm:grid-cols-4">
          <div data-aos="fade-up" data-aos-delay="100" class="counter-wrapper">
            <dt class="text-sm font-medium leading-6 text-gray-400">People Reached</dt>
            <dd class="mt-2 text-3xl font-bold leading-10 tracking-tight text-white counter" data-target="15000">0</dd>
          </div>
          <div data-aos="fade-up" data-aos-delay="200" class="counter-wrapper">
            <dt class="text-sm font-medium leading-6 text-gray-400">Communities</dt>
            <dd class="mt-2 text-3xl font-bold leading-10 tracking-tight text-white counter" data-target="12">0</dd>
          </div>
          <div data-aos="fade-up" data-aos-delay="300" class="counter-wrapper">
            <dt class="text-sm font-medium leading-6 text-gray-400">Programs Completed</dt>
            <dd class="mt-2 text-3xl font-bold leading-10 tracking-tight text-white counter" data-target="50">0</dd>
          </div>
          <div data-aos="fade-up" data-aos-delay="400" class="counter-wrapper">
            <dt class="text-sm font-medium leading-6 text-gray-400">Partners</dt>
            <dd class="mt-2 text-3xl font-bold leading-10 tracking-tight text-white counter" data-target="25">0</dd>
          </div>
        </dl>
      </div>
    </section>
  </div>
</div>

{{-- Testimonials --}}
<div id="testimonials" class="relative bg-gray-900 py-24 sm:py-32">
  <div class="relative mx-auto max-w-7xl px-6 lg:px-8">
    <!-- Purple gradient background effect -->
    <div aria-hidden="true" class="absolute inset-0 -z-10 overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-b from-indigo-900/30 via-gray-900 to-gray-900"></div>
    </div>
    
    <!-- Section header -->
    <div class="mx-auto max-w-2xl text-center mb-16">
      <p class="text-base font-semibold leading-7 text-indigo-400">Testimonials</p>
      <h2 class="mt-2 text-4xl font-bold tracking-tight text-white sm:text-5xl">We have worked with<br>thousands of amazing people</h2>
    </div>
    
    <!-- Testimonials grid -->
    <div class="mx-auto grid max-w-7xl grid-cols-1 gap-x-8 gap-y-10 sm:grid-cols-2 lg:grid-cols-3">
      <!-- Testimonial 1 -->
      <div class="rounded-2xl bg-gray-800/50 p-6 shadow-xl ring-1 ring-white/10" data-aos="fade-up">
        <p class="text-sm leading-6 text-gray-300">"Footprints of Hope has transformed our community. Their support for teenage mothers has given hope and new beginnings to many young women who previously had limited options."</p>
        <div class="mt-6 flex items-center gap-x-4">
          <div class="flex h-10 w-10 items-center justify-center rounded-full bg-pink-600 text-white font-bold">
            JK
          </div>
          <div>
            <div class="text-sm font-semibold leading-6 text-white">Jane Kamau</div>
            <div class="text-xs text-gray-400">@janekamau</div>
          </div>
        </div>
      </div>
      
      <!-- Testimonial 2 -->
      <div class="rounded-2xl bg-gray-800/50 p-6 shadow-xl ring-1 ring-white/10" data-aos="fade-up" data-aos-delay="100">
        <p class="text-sm leading-6 text-gray-300">"The mental health sessions completely changed my life. Having a safe space to discuss challenges and receive professional support has been invaluable for my emotional well-being."</p>
        <div class="mt-6 flex items-center gap-x-4">
          <div class="flex h-10 w-10 items-center justify-center rounded-full bg-indigo-600 text-white font-bold">
            MO
          </div>
          <div>
            <div class="text-sm font-semibold leading-6 text-white">Michael Ochieng</div>
            <div class="text-xs text-gray-400">@michaelochieng</div>
          </div>
        </div>
      </div>
      
      <!-- Testimonial 3 -->
      <div class="rounded-2xl bg-gray-800/50 p-6 shadow-xl ring-1 ring-white/10 sm:col-span-2 lg:col-span-1" data-aos="fade-up" data-aos-delay="200">
        <p class="text-sm leading-6 text-gray-300">"Thanks to the business training and financial resources provided by Footprints of Hope, I now run a successful small business that supports my family. Their belief in me gave me the confidence to pursue entrepreneurship."</p>
        <div class="mt-6 flex items-center gap-x-4">
          <div class="flex h-10 w-10 items-center justify-center rounded-full bg-emerald-600 text-white font-bold">
            FW
          </div>
          <div>
            <div class="text-sm font-semibold leading-6 text-white">Faith Wanjiku</div>
            <div class="text-xs text-gray-400">@faithwanjiku</div>
          </div>
        </div>
      </div>
      
      <!-- Testimonial 4 -->
      <div class="rounded-2xl bg-gray-800/50 p-6 shadow-xl ring-1 ring-white/10" data-aos="fade-up" data-aos-delay="300">
        <p class="text-sm leading-6 text-gray-300">"The community mobilization initiatives have united our village in addressing health challenges. Together we've made significant progress in improving sanitation and health education."</p>
        <div class="mt-6 flex items-center gap-x-4">
          <div class="flex h-10 w-10 items-center justify-center rounded-full bg-blue-600 text-white font-bold">
            TM
          </div>
          <div>
            <div class="text-sm font-semibold leading-6 text-white">Thomas Mwangi</div>
            <div class="text-xs text-gray-400">@thomasmwangi</div>
          </div>
        </div>
      </div>
      
      <!-- Testimonial 5 -->
      <div class="rounded-2xl bg-gray-800/50 p-6 shadow-xl ring-1 ring-white/10" data-aos="fade-up" data-aos-delay="400">
        <p class="text-sm leading-6 text-gray-300">"As a partner organization, we've seen firsthand the dedication and impact of Footprints of Hope. Their holistic approach to empowerment creates lasting change that extends beyond individuals to entire communities."</p>
        <div class="mt-6 flex items-center gap-x-4">
          <div class="flex h-10 w-10 items-center justify-center rounded-full bg-amber-600 text-white font-bold">
            SN
          </div>
          <div>
            <div class="text-sm font-semibold leading-6 text-white">Sarah Ndegwa</div>
            <div class="text-xs text-gray-400">@sarahndegwa</div>
          </div>
        </div>
      </div>
      
      <!-- Testimonial 6 -->
      <div class="rounded-2xl bg-gray-800/50 p-6 shadow-xl ring-1 ring-white/10 sm:col-span-2 lg:col-span-1" data-aos="fade-up" data-aos-delay="500">
        <p class="text-sm leading-6 text-gray-300">"The educational scholarships provided to young mothers like me made it possible to continue my education despite the challenges of early parenthood. I'm now pursuing my dream of becoming a nurse to help others in my community."</p>
        <div class="mt-6 flex items-center gap-x-4">
          <div class="flex h-10 w-10 items-center justify-center rounded-full bg-purple-600 text-white font-bold">
            LO
          </div>
          <div>
            <div class="text-sm font-semibold leading-6 text-white">Lucy Otieno</div>
            <div class="text-xs text-gray-400">@lucyotieno</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Patners Section --}}
<div class="bg-gray-900 py-24 sm:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <h2 class="text-center text-lg/8 font-semibold text-white">Supported by the world’s most innovative teams</h2>
    <div class="mx-auto mt-10 grid max-w-lg grid-cols-4 items-center gap-x-8 gap-y-10 sm:max-w-xl sm:grid-cols-6 sm:gap-x-10 lg:mx-0 lg:max-w-none lg:grid-cols-5">
      <img width="158" height="48" src="https://tailwindcss.com/plus-assets/img/logos/158x48/transistor-logo-white.svg" alt="Transistor" class="col-span-2 max-h-12 w-full object-contain lg:col-span-1" />

      <img width="158" height="48" src="https://tailwindcss.com/plus-assets/img/logos/158x48/reform-logo-white.svg" alt="Reform" class="col-span-2 max-h-12 w-full object-contain lg:col-span-1" />

      <img width="158" height="48" src="https://tailwindcss.com/plus-assets/img/logos/158x48/tuple-logo-white.svg" alt="Tuple" class="col-span-2 max-h-12 w-full object-contain lg:col-span-1" />

      <img width="158" height="48" src="https://tailwindcss.com/plus-assets/img/logos/158x48/savvycal-logo-white.svg" alt="SavvyCal" class="col-span-2 max-h-12 w-full object-contain sm:col-start-2 lg:col-span-1" />

      <img width="158" height="48" src="https://tailwindcss.com/plus-assets/img/logos/158x48/statamic-logo-white.svg" alt="Statamic" class="col-span-2 col-start-2 max-h-12 w-full object-contain sm:col-start-auto lg:col-span-1" />
    </div>
  </div>
</div>

{{-- Contact Us --}}

<div id="contact" class="isolate bg-gray-900 px-6 py-24 sm:py-32 lg:px-8">
  <div aria-hidden="true" class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
    <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="relative left-1/2 -z-10 aspect-1155/678 w-144.5 max-w-none -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-20 sm:left-[calc(50%-40rem)] sm:w-288.75"></div>
  </div>
  <div class="mx-auto max-w-2xl text-center">
    <h2 class="text-4xl font-semibold tracking-tight text-balance text-white sm:text-5xl">Get Intouch With Us</h2>
    {{-- <p class="mt-2 text-lg/8 text-gray-400">Aute magna irure deserunt veniam aliqua magna enim voluptate.</p> --}}
  </div>
  <form action="#" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
    <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
      <div>
        <label for="first-name" class="block text-sm/6 font-semibold text-white">First name</label>
        <div class="mt-2.5">
          <input id="first-name" type="text" name="first-name" autocomplete="given-name" class="block w-full rounded-md bg-white/5 px-3.5 py-2 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500" />
        </div>
      </div>
      <div>
        <label for="last-name" class="block text-sm/6 font-semibold text-white">Last name</label>
        <div class="mt-2.5">
          <input id="last-name" type="text" name="last-name" autocomplete="family-name" class="block w-full rounded-md bg-white/5 px-3.5 py-2 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500" />
        </div>
      </div>
      <div class="sm:col-span-2">
        <label for="company" class="block text-sm/6 font-semibold text-white">Company</label>
        <div class="mt-2.5">
          <input id="company" type="text" name="company" autocomplete="organization" class="block w-full rounded-md bg-white/5 px-3.5 py-2 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500" />
        </div>
      </div>
      <div class="sm:col-span-2">
        <label for="email" class="block text-sm/6 font-semibold text-white">Email</label>
        <div class="mt-2.5">
          <input id="email" type="email" name="email" autocomplete="email" class="block w-full rounded-md bg-white/5 px-3.5 py-2 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500" />
        </div>
      </div>
      <div class="sm:col-span-2">
        <label for="phone-number" class="block text-sm/6 font-semibold text-white">Phone number</label>
        <div class="mt-2.5">
          <div class="flex rounded-md bg-white/5 outline-1 -outline-offset-1 outline-white/10 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-500">
            <div class="grid shrink-0 grid-cols-1 focus-within:relative">
              <select id="country" name="country" autocomplete="country" aria-label="Country" class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-transparent py-2 pr-7 pl-3.5 text-base text-gray-400 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6">
                <option>US</option>
                <option>KE</option>
                <option>EU</option>
                <option>EU</option>
              </select>
              <svg viewBox="0 0 16 16" fill="currentColor" data-slot="icon" aria-hidden="true" class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-400 sm:size-4">
                <path d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" />
              </svg>
            </div>
            <input id="phone-number" type="text" name="phone-number" placeholder="123-456-7890" class="block min-w-0 grow bg-transparent py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-500 focus:outline-none sm:text-sm/6" />
          </div>
        </div>
      </div>
      <div class="sm:col-span-2">
        <label for="message" class="block text-sm/6 font-semibold text-white">Message</label>
        <div class="mt-2.5">
          <textarea id="message" name="message" rows="4" class="block w-full rounded-md bg-white/5 px-3.5 py-2 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500"></textarea>
        </div>
      </div>
      <div class="flex gap-x-4 sm:col-span-2">
        <div class="flex h-6 items-center">
          <div class="group relative inline-flex w-8 shrink-0 rounded-full bg-white/5 p-px inset-ring inset-ring-white/10 outline-offset-2 outline-indigo-500 transition-colors duration-200 ease-in-out has-checked:bg-indigo-500 has-focus-visible:outline-2">
            <span class="size-4 rounded-full bg-white shadow-xs ring-1 ring-gray-900/5 transition-transform duration-200 ease-in-out group-has-checked:translate-x-3.5"></span>
            <input id="agree-to-policies" type="checkbox" name="agree-to-policies" aria-label="Agree to policies" class="absolute inset-0 appearance-none focus:outline-hidden" />
          </div>
        </div>
        <label for="agree-to-policies" class="text-sm/6 text-gray-400">
          By selecting this, you agree to our
          <a href="#" class="font-semibold whitespace-nowrap text-indigo-400">privacy policy</a>.
        </label>
      </div>
    </div>
    <div class="mt-10">
      <button type="submit" class="block w-full rounded-md bg-indigo-500 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-xs hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Let's talk</button>
    </div>
  </form>
</div>

{{-- Footer --}}
<footer class="bg-[#0a1628] text-gray-300">
  <div class="mx-auto max-w-7xl px-6 py-12 md:py-16">
    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5">
      <!-- Solutions Column -->
      <div>
        <h2 class="text-lg font-semibold text-white mb-6">Solutions</h2>
        <ul class="space-y-4">
          <li><a href="#" class="text-gray-400 hover:text-white transition duration-150">Programs</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition duration-150">Partnerships</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition duration-150">Community Outreach</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition duration-150">Education Support</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition duration-150">Mentorship</a></li>
        </ul>
      </div>

      <!-- Support Column -->
      <div>
        <h2 class="text-lg font-semibold text-white mb-6">Support</h2>
        <ul class="space-y-4">
          <li><a href="#" class="text-gray-400 hover:text-white transition duration-150">Get Involved</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition duration-150">Resources</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition duration-150">FAQs</a></li>
        </ul>
      </div>

      <!-- Company Column -->
      <div>
        <h2 class="text-lg font-semibold text-white mb-6">Company</h2>
        <ul class="space-y-4">
          <li><a href="#" class="text-gray-400 hover:text-white transition duration-150">About Us</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition duration-150">Blog</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition duration-150">Team</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition duration-150">News</a></li>
        </ul>
      </div>

      <!-- Legal Column -->
      <div>
        <h2 class="text-lg font-semibold text-white mb-6">Legal</h2>
        <ul class="space-y-4">
          <li><a href="#" class="text-gray-400 hover:text-white transition duration-150">Terms of service</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition duration-150">Privacy policy</a></li>
          <li><a href="#" class="text-gray-400 hover:text-white transition duration-150">Cookie policy</a></li>
        </ul>
      </div>

      <!-- Newsletter Column -->
      <div class="lg:col-span-1 sm:col-span-2 md:col-span-3">
        <h2 class="text-lg font-semibold text-white mb-3">Subscribe to our newsletter</h2>
        <p class="text-gray-400 mb-5">The latest news, articles, and resources, sent to your inbox weekly.</p>
        <form class="flex flex-col sm:flex-row gap-3">
          <div class="flex-grow">
            <input 
              type="email" 
              placeholder="Enter your email" 
              class="bg-white/5 border border-gray-700 rounded-md px-4 py-2.5 w-full text-white placeholder:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
              required
            >
          </div>
          <button 
            type="submit" 
            class="bg-indigo-600 hover:bg-indigo-500 text-white font-medium px-5 py-2.5 rounded-md transition duration-150"
          >
            Subscribe
          </button>
        </form>
      </div>
    </div>

    <!-- Bottom Bar -->
    <div class="mt-12 pt-8 border-t border-gray-800">
      <div class="flex flex-col md:flex-row justify-between items-center">
        <p class="text-gray-400 text-sm mb-4 md:mb-0">© 2024 Footprints of Hope Foundation. All rights reserved.</p>
        <div class="flex space-x-6">
          <a href="#" class="text-gray-400 hover:text-white transition duration-150">
            <span class="sr-only">Facebook</span>
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
            </svg>
          </a>
          <a href="#" class="text-gray-400 hover:text-white transition duration-150">
            <span class="sr-only">Instagram</span>
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
            </svg>
          </a>
          <a href="#" class="text-gray-400 hover:text-white transition duration-150">
            <span class="sr-only">Twitter</span>
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
            </svg>
          </a>
          {{-- <a href="#" class="text-gray-400 hover:text-white transition duration-150"> --}}
            <span class="sr-only">GitHub</span>
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
            </svg>
          </a>
          <a href="#" class="text-gray-400 hover:text-white transition duration-150">
            <span class="sr-only">YouTube</span>
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path fill-rule="evenodd" d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z" clip-rule="evenodd" />
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>
</footer>

{{-- AOS animations are now loaded via app.js through Vite --}}
@endsection
