document.addEventListener("DOMContentLoaded", function() {
    const gallery = document.getElementById('lightgallery');
    if (gallery) {
        lightGallery(gallery, {
            speed: 500,        // animation speed
            licenseKey: '0000-0000-000-0000', // LightGallery free open-source key
            selector: 'a'      // selects the links inside the gallery
        });
    }
});