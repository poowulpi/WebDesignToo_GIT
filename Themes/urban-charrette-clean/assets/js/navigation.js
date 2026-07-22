document.addEventListener('DOMContentLoaded', function() {
	const toggle = document.querySelector('.site-header__toggle');
	const navigation = document.querySelector('.site-header__navigation');

	if (toggle && navigation) {
		toggle.addEventListener('click', function() {
			const isOpen = navigation.classList.contains('is-open');
			navigation.classList.toggle('is-open');
			this.setAttribute('aria-expanded', !isOpen);
		});

		// Close menu when clicking on a link
		const navLinks = navigation.querySelectorAll('a');
		navLinks.forEach(link => {
			link.addEventListener('click', function() {
				navigation.classList.remove('is-open');
				toggle.setAttribute('aria-expanded', 'false');
			});
		});
	}
});
