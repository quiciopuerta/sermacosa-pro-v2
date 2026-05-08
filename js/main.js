/**
 * SERMACOSA PRO V2 - Main JavaScript
 */

(function () {
	'use strict';

	// ── Hamburger Menu ──────────────────────────────────────────
	const menuToggle = document.querySelector('.menu-toggle');
	const mainNav    = document.querySelector('.main-navigation');
	const body       = document.body;

	if (menuToggle && mainNav) {
		menuToggle.addEventListener('click', function () {
			const expanded = this.getAttribute('aria-expanded') === 'true';
			this.setAttribute('aria-expanded', String(!expanded));
			mainNav.classList.toggle('nav-open');
			this.classList.toggle('is-active');
			
			// Toggle body scroll
			if (!expanded) {
				body.style.overflow = 'hidden';
			} else {
				body.style.overflow = '';
			}
		});
	}

	// Close nav when a link is clicked (mobile)
	document.querySelectorAll('.main-navigation a').forEach(link => {
		link.addEventListener('click', () => {
			if (mainNav && mainNav.classList.contains('nav-open')) {
				mainNav.classList.remove('nav-open');
				if (menuToggle) {
					menuToggle.classList.remove('is-active');
					menuToggle.setAttribute('aria-expanded', 'false');
					body.style.overflow = '';
				}
			}
		});
	});

	// ── Smooth scroll ───────────────────────────────────────────
	document.querySelectorAll('a[href^="#"]').forEach(anchor => {
		anchor.addEventListener('click', function (e) {
			const href   = this.getAttribute('href');
			const target = href && href !== '#' ? document.querySelector(href) : null;
			if (target) {
				e.preventDefault();
				target.scrollIntoView({ behavior: 'smooth' });
			}
		});
	});

	// ── Animated Counter ────────────────────────────────────────
	function animateCounter(el) {
		const target   = parseInt(el.dataset.target, 10);
		const duration = 1800;
		const step     = Math.ceil(target / (duration / 16));
		let   current  = 0;

		const suffix = el.dataset.suffix || '';
		const timer  = setInterval(() => {
			current += step;
			if (current >= target) {
				current = target;
				clearInterval(timer);
			}
			el.textContent = current.toLocaleString() + suffix;
		}, 16);
	}

	// ── Intersection Observer ───────────────────────────────────
	const observerOptions = { threshold: 0.15 };

	const fadeObserver = new IntersectionObserver((entries) => {
		entries.forEach(entry => {
			if (entry.isIntersecting) {
				entry.target.classList.add('animate-in');
				fadeObserver.unobserve(entry.target);
			}
		});
	}, observerOptions);

	document.querySelectorAll('.fade-up').forEach(el => fadeObserver.observe(el));

	// Counter observer — triggers only once
	const counterObserver = new IntersectionObserver((entries) => {
		entries.forEach(entry => {
			if (entry.isIntersecting) {
				animateCounter(entry.target);
				counterObserver.unobserve(entry.target);
			}
		});
	}, observerOptions);

	document.querySelectorAll('.stat-number[data-target]').forEach(el => {
		el.textContent = '0';
		counterObserver.observe(el);
	});

	// ── Active nav link ─────────────────────────────────────────
	const currentURL = window.location.href;
	document.querySelectorAll('.main-navigation a').forEach(link => {
		if (link.href === currentURL) link.classList.add('current-menu-item');
	});

	// ── Sticky Header ──────────────────────────────────────────
	const mainHeader = document.querySelector('.main-header');
	window.addEventListener('scroll', () => {
		if (window.scrollY > 100) {
			mainHeader.classList.add('header-scrolled');
		} else {
			mainHeader.classList.remove('header-scrolled');
		}
	});

	// ── WooCommerce qty guard ────────────────────────────────────
	document.querySelectorAll('.qty').forEach(input => {
		input.addEventListener('change', function () {
			if (this.value < 1) this.value = 1;
		});
	});

	// ── Swiper Hero Initialization ──────────────────────────────
	if (typeof Swiper !== 'undefined') {
		const heroSwiper = new Swiper('.hero-swiper', {
			loop: true,
			autoplay: {
				delay: 5000,
				disableOnInteraction: false,
			},
			effect: 'fade',
			fadeEffect: {
				crossFade: true
			},
			pagination: {
				el: '.swiper-pagination',
				clickable: true,
			},
			navigation: {
				nextEl: '.swiper-button-next',
				prevEl: '.swiper-button-prev',
			},
		});
	}

	// ── AJAX Form Handling ─────────────────────────────────────
	const contactForm = document.querySelector('.contact-form');
	if (contactForm) {
		contactForm.addEventListener('submit', function (e) {
			e.preventDefault();
			
			const form = this;
			const submitBtn = form.querySelector('button[type="submit"]');
			const originalBtnText = submitBtn.innerHTML;
			const formData = new FormData(form);
			
			// Show loading state
			submitBtn.disabled = true;
			submitBtn.innerHTML = '<span class="loading-spinner"></span> ENVIANDO...';
			
			formData.append('action', 'sermacosa_contact');
			formData.append('nonce', sermacosa_ajax.nonce);
			
			fetch(sermacosa_ajax.url, {
				method: 'POST',
				body: formData
			})
			.then(response => response.json())
			.then(data => {
				if (data.success) {
					form.innerHTML = `<div class="form-success animate-in">${data.data}</div>`;
				} else {
					alert(data.data || 'Error al enviar el formulario.');
					submitBtn.disabled = false;
					submitBtn.innerHTML = originalBtnText;
				}
			})
			.catch(error => {
				console.error('Error:', error);
				alert('Error de conexión. Por favor, inténtalo de nuevo.');
				submitBtn.disabled = false;
				submitBtn.innerHTML = originalBtnText;
			});
		});
	}

	console.log('SERMACOSA PRO V2 — loaded ✓');
})();
