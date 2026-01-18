import './bootstrap';
import './components/modal.js'; // Make modal functions global
import Alpine from 'alpinejs';

// Make Alpine available globally
window.Alpine = Alpine;

// Start Alpine after DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    Alpine.start();
}, { once: true });

// Or use Alpine.start() directly if using Alpine 3+
Alpine.start();
