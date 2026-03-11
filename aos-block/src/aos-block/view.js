import AOS from 'aos';

// This waits for the browser to finish loading the HTML
document.addEventListener( 'DOMContentLoaded', () => {
    AOS.init({
        duration: 1000, 
        once: true,     
    });
});