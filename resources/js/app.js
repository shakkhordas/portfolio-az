import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// home scripts
document.addEventListener('DOMContentLoaded', function () {

    // mobile menu toggle
    var toggle = document.getElementById('mobile-menu-toggle');
    var menu = document.getElementById('mobile-menu');
    function handleResize() {
        if (window.innerWidth >= 768) {
            menu.classList.add('hidden');
        }
    }
    if (toggle && menu) {
        toggle.addEventListener('click', function () {
            menu.classList.toggle('hidden');
        });
        window.addEventListener('resize', handleResize);
        handleResize();
    }

    // smooth scrolling for nav links (desktop and mobile)
    const navLinks = document.querySelectorAll('nav a[href^="#"], #mobile-menu a[href^="#"]');
    navLinks.forEach(function (link) {
        link.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href').replace('#', '');
            const target = document.getElementById(targetId);
            if (target) {
                e.preventDefault();
                // Get current scroll position and target position
                const startY = window.pageYOffset;
                // Account for fixed nav height (80px)
                const navHeight = 80;
                const endY = target.getBoundingClientRect().top + window.pageYOffset - navHeight;
                const duration = 600;
                let startTime = null;
                function scrollStep(currentTime) {
                    if (!startTime) startTime = currentTime;
                    const timeElapsed = currentTime - startTime;
                    const progress = Math.min(timeElapsed / duration, 1);
                    const ease = 0.5 * (1 - Math.cos(Math.PI * progress)); // easeInOut
                    window.scrollTo(0, startY + (endY - startY) * ease);
                    if (progress < 1) {
                        window.requestAnimationFrame(scrollStep);
                    }
                }
                window.requestAnimationFrame(scrollStep);
                // Hide mobile menu after click
                var menu = document.getElementById('mobile-menu');
                if (menu && window.innerWidth < 768) {
                    menu.classList.add('hidden');
                }
            }
        });
    });

    var slides = document.querySelectorAll('.about-slide');
    var infos = document.querySelectorAll('.about-info');
    var current = 0;
    function showSlide(idx) {
        slides.forEach(function (s, i) {
            s.style.opacity = i === idx ? '1' : '0';
            s.style.zIndex = i === idx ? '2' : '1';
        });
        infos.forEach(function (info, i) { info.style.display = i === idx ? 'block' : 'none'; });
    }
    function nextSlide() {
        current = (current + 1) % slides.length;
        showSlide(current);
    }
    function prevSlide() {
        current = (current - 1 + slides.length) % slides.length;
        showSlide(current);
    }
    slides.forEach(function (slide, idx) {
        var prevBtn = slide.querySelector('#about-prev');
        var nextBtn = slide.querySelector('#about-next');
        if (prevBtn) prevBtn.addEventListener('click', prevSlide);
        if (nextBtn) nextBtn.addEventListener('click', nextSlide);
    });
    setInterval(nextSlide, 4000);
    // Initial absolute positioning for carousel
    var carousel = document.getElementById('about-carousel');
    if (carousel) {
        carousel.style.position = 'relative';
        carousel.style.height = '480px';
        carousel.style.padding = '24px 0';
    }
    // blink animation on toggle sidebar
    var sidebar = document.getElementById('sidebar');
    var blinkText = document.getElementById('home-blink');
    var sidebarOpenBtn = document.getElementById('sidebar-open');
    var sidebarToggleBtn = document.getElementById('sidebar-toggle');
    function openSidebar() {
        sidebar.style.transform = 'translateX(0)';
        sidebarOpenBtn.style.display = 'none';
        if (blinkText) blinkText.style.display = 'none';
    }
    function closeSidebar() {
        sidebar.style.transform = 'translateX(-100%)';
        sidebarOpenBtn.style.display = 'block';
        if (blinkText) blinkText.style.display = '';
    }
    sidebarOpenBtn.addEventListener('click', openSidebar);
    sidebarToggleBtn.addEventListener('click', closeSidebar);
    // Start with sidebar closed
    closeSidebar();
});
window.showExperienceModal = function (id) {
    var modal = document.getElementById('experience-modal-' + id);
    modal.classList.remove('pointer-events-none');
    modal.classList.add('opacity-100');
    modal.classList.remove('opacity-0');
    var inner = modal.querySelector('div');
    inner.classList.remove('scale-95');
    inner.classList.add('scale-100');
}
window.closeExperienceModal = function (id) {
    var modal = document.getElementById('experience-modal-' + id);
    modal.classList.add('opacity-0');
    modal.classList.remove('opacity-100');
    var inner = modal.querySelector('div');
    inner.classList.add('scale-95');
    inner.classList.remove('scale-100');
    setTimeout(function () {
        modal.classList.add('pointer-events-none');
    }, 300);
}
window.showAcademicModal = function (id) {
    var modal = document.getElementById('academic-modal-' + id);
    modal.classList.remove('pointer-events-none');
    modal.classList.add('opacity-100');
    modal.classList.remove('opacity-0');
    var inner = modal.querySelector('div');
    inner.classList.remove('scale-95');
    inner.classList.add('scale-100');
}
window.closeAcademicModal = function (id) {
    var modal = document.getElementById('academic-modal-' + id);
    modal.classList.add('opacity-0');
    modal.classList.remove('opacity-100');
    var inner = modal.querySelector('div');
    inner.classList.add('scale-95');
    inner.classList.remove('scale-100');
    setTimeout(function () {
        modal.classList.add('pointer-events-none');
    }, 300);
}
window.showResearchModal = function (id) {
    var modal = document.getElementById('research-modal-' + id);
    modal.classList.remove('pointer-events-none');
    modal.classList.add('opacity-100');
    modal.classList.remove('opacity-0');
    var inner = modal.querySelector('div');
    inner.classList.remove('scale-95');
    inner.classList.add('scale-100');
}
window.closeResearchModal = function (id) {
    var modal = document.getElementById('research-modal-' + id);
    modal.classList.add('opacity-0');
    modal.classList.remove('opacity-100');
    var inner = modal.querySelector('div');
    inner.classList.add('scale-95');
    inner.classList.remove('scale-100');
    setTimeout(function () {
        modal.classList.add('pointer-events-none');
    }, 300);
}
window.showProjectModal = function (id) {
    var modal = document.getElementById('project-modal-' + id);
    modal.classList.remove('pointer-events-none');
    modal.classList.add('opacity-100');
    modal.classList.remove('opacity-0');
    var inner = modal.querySelector('div');
    inner.classList.remove('scale-95');
    inner.classList.add('scale-100');
}
window.closeProjectModal = function (id) {
    var modal = document.getElementById('project-modal-' + id);
    modal.classList.add('opacity-0');
    modal.classList.remove('opacity-100');
    var inner = modal.querySelector('div');
    inner.classList.add('scale-95');
    inner.classList.remove('scale-100');
    setTimeout(function () {
        modal.classList.add('pointer-events-none');
    }, 300);
}
// Sidebar logic
document.addEventListener('DOMContentLoaded', function () {
    var sidebar = document.getElementById('sidebar');
    var mainContent = document.getElementById('main-content');
    var sidebarOpenBtn = document.getElementById('sidebar-open');
    var sidebarToggleBtn = document.getElementById('sidebar-toggle');

    function openSidebar() {
        sidebar.style.transform = 'translateX(0)';
        sidebarOpenBtn.style.display = 'none';
    }

    function closeSidebar() {
        sidebar.style.transform = 'translateX(-100%)';
        sidebarOpenBtn.style.display = 'block';
    }
    sidebarOpenBtn.addEventListener('click', openSidebar);
    sidebarToggleBtn.addEventListener('click', closeSidebar);
    // Start with sidebar closed
    closeSidebar();
});