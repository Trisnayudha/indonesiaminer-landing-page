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
        const toastEmailEl = document.getElementById('toastEmailSuccess');
        const toastDetailsEl = document.getElementById('toastDetailsSuccess');
        const toastEmail = new bootstrap.Toast(toastEmailEl, {
            delay: 3000
        });
        const toastDetails = new bootstrap.Toast(toastDetailsEl, {
            delay: 3000
        });

        // 1) Email subscription
        document.querySelectorAll('.js-subscribe-form').forEach(form => {
            form.addEventListener('submit', async e => {
                e.preventDefault();
                const email = form.email_subscribe.value.trim();
                const domain = email.split('@')[1] || '';
                const forbidden = ['gmail.com', 'yahoo.com', 'hotmail.com', 'outlook.com',
                    'live.com'
                ];
                if (forbidden.includes(domain)) {
                    return alert('Please use your company email address.');
                }
                try {
                    const {
                        data
                    } = await axios.post('/email-subscribe', {
                        email
                    });
                    document.getElementById('subscriptionId').value = data.id;
                    form.reset();
                    toastEmail.show(); // tampilkan toast email success
                    new bootstrap.Modal(document.getElementById('trafficSourcesModal'))
                        .show();
                } catch (err) {
                    console.error(err);
                }
            });
        });

        // 2) Clear-all
        document.getElementById('clearAllTraffic').addEventListener('click', e => {
            e.preventDefault();
            document.querySelectorAll('.traffic-checkbox').forEach(cb => cb.checked = false);
        });
        document.getElementById('clearVerticals').addEventListener('click', e => {
            e.preventDefault();
            document.querySelectorAll('.vertical-checkbox').forEach(cb => cb.checked = false);
        });

        // 3) Submit details
        document.getElementById('trafficForm').addEventListener('submit', async e => {
            e.preventDefault();
            const form = e.target;

            const id = form.subscription_id.value;
            const name = form.name.value.trim();
            const company = form.company.value.trim();
            const jobTitle = form.job_title.value.trim();
            const phone = form.phone.value.trim();

            // Ambil semua interest_types
            const interestTypes = Array.from(
                form.querySelectorAll('.interest-checkbox:checked')
            ).map(i => i.value);

            const traffics = Array.from(
                form.querySelectorAll('.traffic-checkbox:checked')
            ).map(i => i.value);

            const verticals = Array.from(
                form.querySelectorAll('.vertical-checkbox:checked')
            ).map(i => i.value);

            // Validasi semua wajib terisi
            if (
                !name ||
                !company ||
                !jobTitle ||
                !phone ||
                !interestTypes.length || // <-- tambahkan ini
                !traffics.length ||
                !verticals.length
            ) {
                return alert(
                    'Please fill all required fields and select at least one interest, one traffic source, and one vertical.'
                );
            }

            try {
                await axios.post('/subscribe-details', {
                    subscription_id: id,
                    name,
                    company,
                    job_title: jobTitle,
                    phone,
                    interest_types: interestTypes, // <-- sertakan interest_types
                    traffics,
                    verticals
                });

                bootstrap.Modal.getInstance(
                    document.getElementById('trafficSourcesModal')
                ).hide();
                toastDetails.show(); // tampilkan toast details success
            } catch (err) {
                console.error(err);
            }
        });
    });
</script>
