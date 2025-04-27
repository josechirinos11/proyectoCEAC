document.addEventListener('DOMContentLoaded', function() {
  const menuToggle = document.querySelector('.menu-toggle');
  const navLinks = document.querySelector('.navLinks');
  
  // Verificar si los elementos existen
  if (menuToggle && navLinks) {
    // Manejar clic en el botón de menú
    menuToggle.addEventListener('click', function(e) {
      e.preventDefault(); // Prevenir comportamiento predeterminado
      navLinks.classList.toggle('active');
      
      // Cambiar el texto del botón según estado
      if (navLinks.classList.contains('active')) {
        menuToggle.innerHTML = '&times;'; // X para cerrar
        document.body.style.overflow = 'hidden'; // Evitar scroll
      } else {
        menuToggle.innerHTML = '&#9776;'; // Hamburguesa para abrir
        document.body.style.overflow = ''; // Restaurar scroll
      }
    });
    
    // Cerrar menú al hacer clic en un enlace
    const navLinksItems = document.querySelectorAll('.navLink');
    navLinksItems.forEach(link => {
      link.addEventListener('click', function() {
        navLinks.classList.remove('active');
        menuToggle.innerHTML = '&#9776;';
        document.body.style.overflow = '';
      });
    });
  }
});
