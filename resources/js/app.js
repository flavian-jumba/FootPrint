import './bootstrap';

// Import AOS library and its CSS
import AOS from 'aos';
import 'aos/dist/aos.css';

// Initialize AOS
document.addEventListener('DOMContentLoaded', () => {
    // Initialize AOS animations
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: false,
        mirror: true
    });
    
    // Counter animation for statistics
    const counters = document.querySelectorAll('.counter');
    if (counters.length > 0) {
        const counterObserver = new IntersectionObserver(function(entries, observer) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.getAttribute('data-target'));
                    let count = 0;
                    const updateCount = () => {
                        const increment = target / 50; // Adjust speed here
                        if (count < target) {
                            count += increment;
                            // Format for thousands
                            counter.innerText = target > 1000 ? 
                                Math.ceil(count).toLocaleString() + '+' : 
                                Math.ceil(count) + (target > 30 ? '+' : '');
                            setTimeout(updateCount, 30);
                        } else {
                            counter.innerText = target > 1000 ? 
                                target.toLocaleString() + '+' : 
                                target + (target > 30 ? '+' : '');
                        }
                    };
                    updateCount();
                    observer.unobserve(counter);
                }
            });
        }, {
            root: null,
            rootMargin: '0px',
            threshold: 0.1
        });
        
        counters.forEach(counter => {
            counterObserver.observe(counter);
        });
    }
    
    // Enhance scroll behavior for large screens
    if (window.innerWidth > 768) {
        const sections = document.querySelectorAll('section, div[id]');
        const navLinks = document.querySelectorAll('nav a[href^="#"]');
        
        // Highlight active nav item on scroll
        window.addEventListener('scroll', () => {
            let current = '';
            sections.forEach(section => {
                if (!section.id) return;
                const sectionTop = section.offsetTop;
                if (window.pageYOffset >= sectionTop - 150) {
                    current = section.getAttribute('id');
                }
            });
            
            navLinks.forEach(link => {
                link.classList.remove('text-indigo-400');
                const href = link.getAttribute('href');
                if (href === `#${current}`) {
                    link.classList.add('text-indigo-400');
                }
            });
        });
    }
});
