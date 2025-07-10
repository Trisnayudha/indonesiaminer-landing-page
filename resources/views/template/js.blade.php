  <!-- Bootstrap 5.3 JS bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- intl-tel-input CSS 已在 <head> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js"></script>

  <!-- 初始化 ITI -->
  <script defer>
      document.addEventListener('DOMContentLoaded', function() {
          const phoneInput = document.querySelector('#phone');
          if (!phoneInput) return;

          const iti = intlTelInput(phoneInput, {
              initialCountry: 'id',
              utilsScript: 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js'
          });

          // Validate & format sebelum submit
          const form = document.querySelector('#form-interest');
          form.addEventListener('submit', function(e) {
              if (!iti.isValidNumber()) {
                  e.preventDefault();
                  alert('Please enter a valid phone number');
                  phoneInput.focus();
              } else {
                  phoneInput.value = iti.getNumber();
              }
          });
      });
  </script>
  <script>
      document.addEventListener('DOMContentLoaded', () => {
          const overlay = document.getElementById('mobileMenuOverlay');
          const menuEl = document.getElementById('navMenuMobile');

          // Saat panel akan dibuka
          menuEl.addEventListener('show.bs.collapse', () => {
              overlay.classList.add('show');
          });

          // Saat panel tertutup
          menuEl.addEventListener('hide.bs.collapse', () => {
              overlay.classList.remove('show');
          });

          // Klik di area overlay juga tutup menu
          overlay.addEventListener('click', () => {
              const bsCollapse = bootstrap.Collapse.getInstance(menuEl);
              bsCollapse.hide();
          });
      });
      document.addEventListener('DOMContentLoaded', () => {
          const btn = document.querySelector('.navbar-toggler');
          const overlay = document.getElementById('mobileMenuOverlay');
          const menuEl = document.getElementById('navMenuMobile');
          const closeBtn = document.querySelector('.mobile-close');

          function openMenu() {
              menuEl.classList.add('show');
              overlay.classList.add('show');
          }

          function closeMenu() {
              menuEl.classList.remove('show');
              overlay.classList.remove('show');
          }

          btn.addEventListener('click', openMenu);
          closeBtn.addEventListener('click', closeMenu);
          overlay.addEventListener('click', closeMenu);
      });
  </script>
  <script>
      document.addEventListener('DOMContentLoaded', () => {
          // ambil semua tombol toggle submenu
          document.querySelectorAll('.submenu-toggle').forEach(btn => {
              btn.addEventListener('click', e => {
                  e.preventDefault();
                  const li = btn.closest('.has-submenu');
                  // tutup submenu lain (opsional)
                  document.querySelectorAll('.has-submenu.open').forEach(openLi => {
                      if (openLi !== li) openLi.classList.remove('open');
                  });
                  // toggle submenu ini
                  li.classList.toggle('open');
              });
          });
      });
  </script>
  <script>
      document.addEventListener('DOMContentLoaded', function() {
          const nav = document.querySelector('.custom-navbar');
          if (!nav) return;
          const SCROLL_THRESHOLD = 50; // pixels scrolled before we flip

          window.addEventListener('scroll', () => {
              if (window.scrollY > SCROLL_THRESHOLD) {
                  nav.classList.add('scrolled');
              } else {
                  nav.classList.remove('scrolled');
              }
          });
      });
  </script>
