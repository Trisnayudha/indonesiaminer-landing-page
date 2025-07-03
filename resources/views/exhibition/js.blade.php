@if (session('success'))
    <script>
        swal({
            title: 'THANK YOU',
            text: "{{ session('success') }}",
            icon: "success",
            customClass: {
                content: 'custom-swal-text'
            }
        });
    </script>
@endif

@if (session('error'))
    <script>
        swal({
            title: 'Error',
            text: "{{ session('error') }}",
            icon: "error",
            customClass: {
                content: 'custom-swal-text'
            }
        });
    </script>
@endif
<script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const player = new Plyr('#player', {
            autoplay: true, // tell Plyr to start playback
            muted: false, // ensure audio is on
            loop: {
                active: true
            }, // keep looping
            controls: [
                'play-large', // big central Play button
                'play', // Play/pause toggle
                'progress', // scrub bar
                'current-time',
                'mute',
                'volume',
                'fullscreen'
            ]
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // init ITI on each phone input
        const itiExhibit = window.intlTelInput(
            document.querySelector('#phoneExhibit'), {
                initialCountry: 'id',
                separateDialCode: true,
                utilsScript: 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js'
            }
        );
        const itiSponsor = window.intlTelInput(
            document.querySelector('#phoneSponsor'), {
                initialCountry: 'id',
                separateDialCode: true,
                utilsScript: 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js'
            }
        );

        // on submit, replace value with full E.164 number
        document.querySelector('#exhibitForm').addEventListener('submit', function(e) {
            this.querySelector('input[name="phone"]').value = itiExhibit.getNumber();
        });
        document.querySelector('#sponsorForm').addEventListener('submit', function(e) {
            this.querySelector('input[name="phone_sponsor"]').value = itiSponsor.getNumber();
        });
    });
</script>
