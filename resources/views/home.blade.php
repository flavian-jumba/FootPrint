@extends('layouts.app')

@section('content')


{{-- Home Section --}}
<div class="bg-gray-900">
  <header class="absolute inset-x-0 top-0 z-50">
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
        <a href="#" class="text-sm/6 font-semibold text-white">Home</a>
        <a href="#" class="text-sm/6 font-semibold text-white">About</a>
        <a href="#" class="text-sm/6 font-semibold text-white">What we Do</a>
        <a href="#" class="text-sm/6 font-semibold text-white">Join Us Mission</a>
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
                <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base leading-7 font-semibold text-white hover:bg-white/5">Home</a>
                <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base leading-7 font-semibold text-white hover:bg-white/5">About</a>
                <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base leading-7 font-semibold text-white hover:bg-white/5">What We Do</a>
                <a href="#" class="-mx-3 block rounded-lg px-3 py-2 text-base leading-7 font-semibold text-white hover:bg-white/5">Join Us</a>
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
      });
    </script>
  </header>

  <div class="relative isolate px-6 pt-14 lg:px-8">
    <div aria-hidden="true" class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
      <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="relative left-[calc(50%-11rem)] aspect-1155/678 w-144.5 -translate-x-1/2 rotate-30 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-288.75"></div>
    </div>
    <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
      <div class="hidden sm:mb-8 sm:flex sm:justify-center">
        <div class="relative rounded-full px-3 py-1 text-sm/6 text-gray-400 ring-1 ring-white/10 hover:ring-white/20">
          Announcing our next round of funding. <a href="#" class="font-semibold text-indigo-400"><span aria-hidden="true" class="absolute inset-0"></span>Read more <span aria-hidden="true">&rarr;</span></a>
        </div>
      </div>
      <div class="text-center">
        <h1 class="text-5xl font-semibold tracking-tight text-balance text-white sm:text-7xl">Empowering the next generation,one footprint at a time</h1>
        <p class="mt-8 text-lg font-medium text-pretty text-gray-400 sm:text-xl/8">Footprints of Hope empowers Kenya's girls, youth, and women with resources, education, and support for resilient futures.</p>
        <div class="mt-10 flex items-center justify-center gap-x-6">
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

<div class="relative isolate overflow-hidden bg-gray-900 px-6 py-24 sm:py-32 lg:overflow-visible lg:px-0">
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
    <div class="lg:col-span-2 lg:col-start-1 lg:row-start-1 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
      <div class="lg:pr-4">
        <div class="lg:max-w-lg">
          <p class="text-base/7 font-semibold text-indigo-400">About Us</p>
          <h1 class="mt-2 text-4xl font-semibold tracking-tight text-pretty text-white sm:text-5xl">Who we are</h1>
          <p class="mt-6 text-xl/8 text-gray-300">Get a clear understanding of us and what drives us to our mission</p>
        </div>
      </div>
    </div>
    <div class="-mt-12 -ml-12 p-12 lg:sticky lg:top-4 lg:col-start-2 lg:row-span-2 lg:row-start-1 lg:overflow-hidden">
      <img src="{{ asset('images/one.png') }}" alt="" class="w-3xl max-w-none rounded-xl bg-gray-800 shadow-xl ring-1 ring-white/10 sm:w-228" />
    </div>
    <div class="lg:col-span-2 lg:col-start-1 lg:row-start-2 lg:mx-auto lg:grid lg:w-full lg:max-w-7xl lg:grid-cols-2 lg:gap-x-8 lg:px-8">
      <div class="lg:pr-4">
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
<div class="bg-gray-900 py-24 sm:py-32">
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-2xl text-center">
      <p class="text-base font-semibold leading-7 text-indigo-400">Our Programs</p>
      <h1 class="mt-2 text-4xl font-bold tracking-tight text-white sm:text-5xl">On a mission to empower communities</h1>
      <p class="mt-6 text-lg leading-8 text-gray-300">We create sustainable programs designed to address the specific needs of girls, youth, and women in our communities.</p>
    </div>
    <section class="mx-auto mt-16 grid max-w-7xl grid-cols-1 gap-x-8 gap-y-16 sm:gap-y-20 lg:grid-cols-2">
      <div class="lg:pr-8">
        <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Our Impact Areas</h2>
        <p class="mt-6 text-base leading-7 text-gray-300">Through our targeted programs, we focus on menstrual hygiene, education support, vocational training, and mental health awareness to create lasting change in our communities.</p>
        <p class="mt-6 text-base leading-7 text-gray-300">Each of our initiatives is designed with community input and implemented with local partnerships to ensure sustainability and maximum impact for those we serve.</p>
      </div>
      <div class="grid grid-cols-2 gap-4 sm:gap-6">
        <div class="grid grid-rows-2 gap-4 sm:gap-6">
          <!-- Program 1: Teenage Mother Support Program -->
          <div class="group relative overflow-hidden rounded-lg">
            <img src="{{ asset('images/a.png') }}" alt="Teenage Mother Support Program" class="h-full w-full object-cover object-center transition-all duration-300 group-hover:scale-105">
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
          <div class="group relative overflow-hidden rounded-lg sm:relative sm:top-8">
            <img src="{{ asset('images/b.png') }}" alt="Socio-Economic Empowerment Program" class="h-full w-full object-cover object-center transition-all duration-300 group-hover:scale-105">
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
          <div class="group relative overflow-hidden rounded-lg sm:relative sm:top-8">
            <img src="{{ asset('images/c.png') }}" alt="Nhanga Sessions for Mental Health" class="h-full w-full object-cover object-center transition-all duration-300 group-hover:scale-105">
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
          <div class="group relative overflow-hidden rounded-lg">
            <img src="{{ asset('images/d.png') }}" alt="Community Mobilization Program" class="h-full w-full object-cover object-center transition-all duration-300 group-hover:scale-105">
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
      <div class="lg:col-span-2">
        <p class="text-base font-semibold leading-7 text-white">Our Impact</p>
        <hr class="mt-2 border-gray-700">
        <dl class="mt-10 grid grid-cols-2 gap-x-8 gap-y-12 sm:grid-cols-4">
          <div>
            <dt class="text-sm font-medium leading-6 text-gray-400">People Reached</dt>
            <dd class="mt-2 text-3xl font-bold leading-10 tracking-tight text-white">15K+</dd>
          </div>
          <div>
            <dt class="text-sm font-medium leading-6 text-gray-400">Communities</dt>
            <dd class="mt-2 text-3xl font-bold leading-10 tracking-tight text-white">12</dd>
          </div>
          <div>
            <dt class="text-sm font-medium leading-6 text-gray-400">Programs Completed</dt>
            <dd class="mt-2 text-3xl font-bold leading-10 tracking-tight text-white">50+</dd>
          </div>
          <div>
            <dt class="text-sm font-medium leading-6 text-gray-400">Partners</dt>
            <dd class="mt-2 text-3xl font-bold leading-10 tracking-tight text-white">25</dd>
          </div>
        </dl>
      </div>
    </section>
  </div>
</div>
@endsection
