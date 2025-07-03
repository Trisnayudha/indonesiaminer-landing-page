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
      // … existing DOMContentLoaded handler …

      // TYPEWRITER EFFECT
      function typeWriter(el, speed = 40) {
          const text = el.textContent;
          el.textContent = '';
          let i = 0;
          const timer = setInterval(() => {
              el.textContent += text.charAt(i);
              i++;
              if (i >= text.length) clearInterval(timer);
          }, speed);
      }

      document.addEventListener('DOMContentLoaded', () => {
          const tw = document.querySelector('.typewriter');
          if (tw) typeWriter(tw, 40);
      });
  </script>


  <script>
      // deadline input (format DD/MM/YYYY)
      const deadlineInput = "12/07/2025";

      function parseDMY(dmy) {
          const [day, month, year] = dmy.split("/").map(Number);
          return new Date(year, month - 1, day, 0, 0, 0).getTime();
      }
      const btDeadline = parseDMY(deadlineInput);

      function updateBottomBar() {
          const diff = btDeadline - Date.now();
          if (diff <= 0) {
              ['days', 'hours', 'minutes', 'seconds'].forEach(id =>
                  document.getElementById(`bt-${id}`).innerText = "00"
              );
              return;
          }
          const days = Math.floor(diff / (1000 * 60 * 60 * 24));
          const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          const mins = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
          const secs = Math.floor((diff % (1000 * 60)) / 1000);

          document.getElementById('bt-days').innerText = String(days).padStart(2, '0');
          document.getElementById('bt-hours').innerText = String(hours).padStart(2, '0');
          document.getElementById('bt-minutes').innerText = String(mins).padStart(2, '0');
          document.getElementById('bt-seconds').innerText = String(secs).padStart(2, '0');
      }

      setInterval(updateBottomBar, 1000);
      updateBottomBar();

      document.addEventListener('DOMContentLoaded', () => {
          const sections = document.querySelectorAll('.lazy-section');

          // fungsi untuk fetch dan inject HTML
          const loadSection = container => {
              const url = container.dataset.url;
              fetch(url)
                  .then(r => {
                      if (!r.ok) throw new Error('Failed to load');
                      return r.text();
                  })
                  .then(html => {
                      container.innerHTML = html;
                      // jika butuh inisialisasi ulang (jarallax, plugins, reCAPTCHA, dsb.)
                      if (typeof jarallax === 'function') {
                          jarallax(container.querySelectorAll('[data-jarallax]'));
                      }
                  })
                  .catch(console.error);
          };

          if ('IntersectionObserver' in window) {
              const io = new IntersectionObserver((entries, obs) => {
                  entries.forEach(e => {
                      if (e.isIntersecting) {
                          loadSection(e.target);
                          obs.unobserve(e.target);
                      }
                  });
              }, {
                  rootMargin: '200px'
              });

              sections.forEach(s => io.observe(s));
          } else {
              // fallback: load semua langsung
              sections.forEach(loadSection);
          }
      });
  </script>
