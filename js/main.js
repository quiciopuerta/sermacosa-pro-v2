/**
 * SERMACOSA PRO V2 - Main JavaScript
 */

(function() {
	'use strict';

	// Mobile menu toggle
	const menuToggle = document.querySelector('.menu-toggle');
	const mainNav = document.querySelector('.main-navigation');

	if (menuToggle && mainNav) {
		menuToggle.addEventListener('click', function() {
			mainNav.classList.toggle('active');
		});
	}

	// Smooth scroll for anchor links
	document.querySelectorAll('a[href^="#"]').forEach(anchor => {
		anchor.addEventListener('click', function(e) {
			const href = this.getAttribute('href');
			if (href && href !== '#') {
				const target = document.querySelector(href);
				if (target) {
					e.preventDefault();
					target.scrollIntoView({ behavior: 'smooth' });
				}
			}
		});
	});

	// Product quantity selector
	const qtyInputs = document.querySelectorAll('.qty');
	qtyInputs.forEach(input => {
		input.addEventListener('change', function() {
			if (this.value < 1) this.value = 1;
		});
	});

	// Close mobile menu when link is clicked
	const navLinks = document.querySelectorAll('.main-navigation a');
	navLinks.forEach(link => {
		link.addEventListener('click', function() {
			if (mainNav) {
				mainNav.classList.remove('active');
			}
		});
	});

	// Add active class to current menu item
	const currentURL = window.location.href;
	navLinks.forEach(link => {
		if (link.href === currentURL) {
			link.classList.add('current-menu-item');
		}
	});

	console.log('SERMACOSA PRO V2 - Theme loaded successfully');
})();
