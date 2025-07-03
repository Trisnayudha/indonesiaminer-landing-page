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
