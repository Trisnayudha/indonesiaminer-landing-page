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
            autoplay: false, // tell Plyr to start playback
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

<script>
    document.querySelectorAll('#packageTabs button[data-bs-toggle="tab"]')
        .forEach(btn => {
            btn.addEventListener('shown.bs.tab', e => {
                const indicator = document.getElementById('tabIndicator');
                // 0 untuk Exhibition (index ke-0), 1 untuk Sponsorship
                const idx = Array.from(btn.parentElement.parentElement.children)
                    .filter(n => n.tagName !== 'DIV') // abaikan elemen indicator
                    .indexOf(btn.parentElement);
                // geser indicator
                indicator.style.left = (idx * 50) + '%';

                // ubah warna
                if (btn.id === 'exhibit-tab') {
                    indicator.style.background = 'rgb(232,180,75)'; // kuning
                } else {
                    indicator.style.background = '#00537a'; // biru
                }
            });
        });
</script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Ambil SEMUA form yang mau di-ajax–post
        const forms = document.querySelectorAll('.js-subscribe-form');

        forms.forEach(form => {
            form.addEventListener('submit', async e => {
                e.preventDefault();

                const email = form.email_subscribe.value.trim();
                const domain = email.split('@')[1] || '';
                const banned = ['gmail.com', 'yahoo.com', 'hotmail.com', 'outlook.com',
                    'live.com'
                ];

                if (banned.includes(domain)) {
                    return alert('Please use your company email address.');
                }

                try {
                    await axios.post('/exhibition/email-subscribe', {
                        email
                    });
                    form.reset();

                    // Setelah sukses, munculkan modal trafficSourcesModal
                    const modal = new bootstrap.Modal(
                        document.getElementById('trafficSourcesModal')
                    );
                    modal.show();

                } catch (err) {
                    console.error('Subscribe failed', err);
                    // bisa tambahkan UI error tanpa alert
                }
            });
        });

        // form di dalam modal juga via class
        const trafficForm = document.querySelector('.traffic-form');
        trafficForm.addEventListener('submit', e => {
            e.preventDefault();
            const data = new FormData(trafficForm);

            axios.post('/exhibition/traffic', {
                    sources: data.getAll('sources[]')
                })
                .then(() => {
                    // tutup modal
                    bootstrap.Modal.getInstance(
                        document.querySelector('.traffic-modal')
                    ).hide();
                })
                .catch(console.error);
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const clearLink = document.getElementById('clearAllTraffic');
        clearLink.addEventListener('click', e => {
            e.preventDefault();
            // pilih semua checkbox dengan kelas traffic-checkbox dan uncheck
            document.querySelectorAll('.traffic-checkbox')
                .forEach(cb => cb.checked = false);
        });
        document.getElementById('clearVerticals').addEventListener('click', e => {
            e.preventDefault();
            document.querySelectorAll('.vertical-checkbox')
                .forEach(chk => chk.checked = false);
        });
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const modalEl = document.getElementById('trafficSourcesModal');
        const bsModal = new bootstrap.Modal(modalEl);
        bsModal.show(); // selalu munculkan modal tiap reload
    });
</script>
