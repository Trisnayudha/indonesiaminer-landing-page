@extends('template.index')
@section('title', 'Indonesia Miner : Exhibition')
@section('header-bg', 'bg-light')

@section('content')
    <div style="position: relative; margin-top:60px;">
        <div class="one withsmallpadding ppb_header" style="text-align:center; padding:60px 0 60px 0;" id="speaker-page">
            <div class="container">
                <h2 class="ppb_title" style="text-align:center; color:black">CONFERENCE OR EVENT SCHEDULE</h2>
            </div>
        </div>

        <div class="ppb_speaker_classic one nopadding">
            <div class="program-schedule-container">
                <!-- Tabs untuk Conference, Workshop, Miners Talk -->
                <div class="program-day-tabs">
                    <ul class="nav nav-tabs" id="type-tabs">
                        <li>
                            <a href="#" data-type="conference">
                                <strong>Conference</strong><br>
                            </a>
                        </li>
                        <li>
                            <a href="#" data-type="workshop">
                                <strong>Workshop</strong><br>
                            </a>
                        </li>
                        <li>
                            <a href="#" data-type="miners_talk">
                                <strong>Miners Talk</strong><br>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Tabs Hari -->
                <div class="program-hall-tabs">
                    <ul class="nav nav-tabs" id="day-tabs">
                        <li><a href="#" data-day="1">Day 1</a></li>
                        <li><a href="#" data-day="2">Day 2</a></li>
                        <li><a href="#" data-day="3">Day 3</a></li>
                    </ul>
                </div>

                <div class="tab-content" id="tab-content">
                    <!-- Konten akan diisi oleh JavaScript -->
                </div>
            </div>
        </div>
    </div>
@endsection

@push('head')
    <style>
        #wrapper.transparent .top_bar:not(.scroll) #menu_wrapper div .nav>li>a,
        #wrapper.transparent .top_bar:not(.scroll) #logo_right_button a#mobile_nav_icon,
        #logo_wrapper .social_wrapper ul li a {
            color: black !important;
        }
    </style>
    @include('home.home-css')
@endpush

@push('bottom')
    @include('home.home-script')
    <!-- Tambahkan jQuery jika belum ada -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Kode JavaScript untuk AJAX -->
    <script>
        $(document).ready(function() {
            // Fungsi untuk mengambil parameter query dari URL
            function getQueryParams() {
                var params = {};
                var queryString = window.location.search.substring(1);
                var vars = queryString.split("&");
                for (var i = 0; i < vars.length; i++) {
                    var pair = vars[i].split("=");
                    params[decodeURIComponent(pair[0])] = decodeURIComponent(pair[1] || "");
                }
                return params;
            }

            // Ambil parameter query
            var queryParams = getQueryParams();
            var currentType = queryParams.schedule || 'conference';
            var currentDay = queryParams.date ? queryParams.date.replace('day', '') : '1';

            // Set active class pada tabs berdasarkan parameter query
            $('#type-tabs li a').each(function() {
                if ($(this).data('type') === currentType) {
                    $(this).parent().addClass('active');
                } else {
                    $(this).parent().removeClass('active');
                }
            });

            $('#day-tabs li a').each(function() {
                if ($(this).data('day') === currentDay) {
                    $(this).parent().addClass('active');
                } else {
                    $(this).parent().removeClass('active');
                }
            });

            // Saat halaman dimuat, ambil data untuk tipe dan hari dari parameter query
            loadCalendar(currentType);

            // Event listener untuk perubahan tipe
            $('#type-tabs li a').click(function(e) {
                e.preventDefault();
                var selectedType = $(this).data('type');

                if (currentType !== selectedType) {
                    currentType = selectedType;

                    // Update URL tanpa reload halaman
                    updateQueryStringParam('schedule', currentType);

                    // Set active class
                    $('#type-tabs li').removeClass('active');
                    $(this).parent().addClass('active');

                    // Hapus konten sebelumnya
                    $('#tab-content').empty();

                    // Muat schedule untuk tipe dan hari yang dipilih
                    loadSchedule(currentType, currentDay);
                }
            });

            // Event listener untuk perubahan hari
            $('#day-tabs li a').click(function(e) {
                e.preventDefault();
                var selectedDay = $(this).data('day');

                if (currentDay !== selectedDay) {
                    currentDay = selectedDay;

                    // Update URL tanpa reload halaman
                    updateQueryStringParam('date', 'day' + currentDay);

                    // Set active class
                    $('#day-tabs li').removeClass('active');
                    $(this).parent().addClass('active');

                    // Hapus konten sebelumnya
                    $('#tab-content').empty();

                    // Muat schedule untuk tipe dan hari yang dipilih
                    loadSchedule(currentType, currentDay);
                }
            });

            function loadCalendar(type) {
                // Tidak perlu menampilkan loading di sini
                // Langsung muat schedule untuk tipe dan hari saat ini
                loadSchedule(type, currentDay);
            }

            function loadSchedule(type, day) {
                var calendarUrl = '';
                var idParam = '12'; // Sesuaikan jika perlu

                // Tentukan URL kalender berdasarkan tipe
                if (type === 'conference') {
                    calendarUrl = '{{ url('/calendar/schedule') }}?id=' + idParam;
                } else if (type === 'workshop') {
                    calendarUrl = '{{ url('/calendar/workshop') }}?id=' + idParam;
                } else if (type === 'miners_talk') {
                    calendarUrl = '{{ url('/calendar/ministage') }}?id=' + idParam;
                }

                // Ambil data kalender tanpa loading
                $.ajax({
                    url: calendarUrl,
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 1) {
                            var calendar = response.item;
                            // Cari tanggal berdasarkan hari yang dipilih
                            var selectedDate = null;
                            $.each(calendar, function(index, dayData) {
                                var dayNumber = index + 1;
                                if (dayNumber == day) {
                                    selectedDate = dayData.date;
                                }
                            });

                            if (selectedDate) {
                                // Muat schedule untuk tanggal yang dipilih
                                fetchSchedule(type, selectedDate);
                            } else {
                                $('#tab-content').html('<p>No schedules available for this day.</p>');
                            }
                        } else {
                            Swal.fire('Error', 'Failed to retrieve calendar data.', 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error', 'An error occurred while fetching calendar data.', 'error');
                    }
                });
            }

            function fetchSchedule(type, date) {
                var scheduleUrl = '';

                if (type === 'conference') {
                    scheduleUrl = '{{ url('/schedule') }}?date=' + date;
                } else if (type === 'workshop') {
                    scheduleUrl = '{{ url('/workshop') }}?date=' + date;
                } else if (type === 'miners_talk') {
                    scheduleUrl = '{{ url('/ministage') }}?date=' + date;
                }

                // Tampilkan swal loading hanya di sini
                Swal.fire({
                    title: 'Please wait...',
                    html: 'Fetching exclusive updates...',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                $.ajax({
                    url: scheduleUrl,
                    method: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        // Tutup swal loading
                        Swal.close();

                        if (response.status === 1) {
                            var schedules = response.item;
                            // Render schedules
                            renderSchedules(schedules);
                        } else {
                            $('#tab-content').html('<p>No schedules available for this date.</p>');
                        }
                    },
                    error: function() {
                        // Tutup swal loading
                        Swal.close();
                        Swal.fire('Error', 'An error occurred while fetching schedule data.', 'error');
                    }
                });
            }

            function renderSchedules(schedules) {
                var tabContent = $('#tab-content');
                tabContent.empty();

                if (schedules.length === 0) {
                    tabContent.html('<p>No schedules available for this date.</p>');
                    return;
                }

                var sessionInfo = $('<div>', {
                    class: 'session-info'
                });

                $.each(schedules, function(index, schedule) {
                    var accordionItem = $('<div>', {
                        class: 'accordion__item'
                    });

                    // Accordion Heading
                    var accordionHeading = $('<div>', {
                        class: 'accordion__heading',
                        role: 'heading'
                    });

                    var accordionButton = $('<div>', {
                        class: 'accordion__button',
                        'aria-expanded': 'false',
                        click: function() {
                            toggleAccordion($(this));
                        }
                    });

                    // Author Images
                    var authorMulti = $('<div>', {
                        class: 'author author-multi'
                    });

                    if (schedule.speaker.length > 0) {
                        $.each(schedule.speaker, function(i, speaker) {
                            var img = $('<img>', {
                                title: speaker.name,
                                alt: 'Author',
                                src: speaker.image
                            });
                            authorMulti.append(img);
                        });
                    }

                    // Schedule Info
                    var scheduleInfo = $('<div>', {
                        class: 'schedule-info'
                    });
                    var h3 = $('<h3>').text(schedule.name);

                    var ul = $('<ul>');

                    if (schedule.speaker.length > 0) {
                        var liSpeaker = $('<li>').html('<i class="icofont-user-suited"></i> By ');
                        $.each(schedule.speaker, function(i, speaker) {
                            var span = $('<span>').text(speaker.name);
                            liSpeaker.append(span);
                            if (i !== schedule.speaker.length - 1) {
                                liSpeaker.append(', ');
                            }
                        });
                        ul.append(liSpeaker);
                    }

                    var liTime = $('<li>').html('<i class="icofont-wall-clock"></i> ' + schedule
                        .time_start + ' - ' + schedule.time_end);
                    ul.append(liTime);

                    scheduleInfo.append(h3).append(ul);

                    accordionButton.append(authorMulti).append(scheduleInfo);
                    accordionHeading.append(accordionButton);

                    // Accordion Panel
                    var accordionPanel = $('<div>', {
                        class: 'accordion__panel',
                        style: 'display: none; text-align:left'
                    });

                    var desc = $('<p>').html(schedule.desc);
                    accordionPanel.append(desc);

                    var locationDiv = $('<div>', {
                        class: 'row h-100 align-items-center'
                    });
                    var colDiv = $('<div>', {
                        class: 'col-lg-6 col-md-7'
                    });
                    var locationInfo = $('<div>', {
                        class: 'location'
                    }).html('<b>Location:</b> ' + schedule.location);
                    colDiv.append(locationInfo);
                    locationDiv.append(colDiv);
                    accordionPanel.append(locationDiv);

                    // Speaker Grid
                    if (schedule.speaker.length > 0) {
                        var speakerGrid = $('<div>', {
                            class: 'speaker-grid'
                        });

                        $.each(schedule.speaker, function(i, speaker) {
                            var speakerItem = $('<div>', {
                                class: 'speaker-item'
                            });
                            var speakerInner = $('<div>', {
                                class: 'speaker-inner'
                            });
                            var speakerThumb = $('<div>', {
                                class: 'speaker-thumb'
                            }).append($('<img>', {
                                src: speaker.image,
                                alt: 'speaker'
                            }));

                            var speakerContent = $('<div>', {
                                class: 'speaker-content'
                            });

                            var spkrContentTitle = $('<div>', {
                                class: 'spkr-content-title d-flex flex-wrap justify-content-between'
                            });

                            var speakerInfos = $('<div>', {
                                class: 'speaker-infos'
                            }).append($('<h5>').text(speaker.name)).append($('<p>').text(speaker
                                .position));

                            spkrContentTitle.append(speakerInfos);

                            if (speaker.company) {
                                var speakerCompLogo = $('<div>', {
                                    class: 'speaker-comp-logo'
                                }).append($('<img>', {
                                    src: speaker.company,
                                    alt: 'spkr-company'
                                }));
                                spkrContentTitle.append(speakerCompLogo);
                            }

                            var spkrContentDetails = $('<div>', {
                                class: 'spkr-content-details'
                            });
                            spkrContentDetails.append($('<p>').html(speaker.desc));

                            var socialIcons = $('<ul>', {
                                class: 'social-icons'
                            });

                            if (speaker.linkedin) {
                                var liLinkedIn = $('<li>').append($('<a>', {
                                    href: speaker.linkedin
                                }).append($('<i>', {
                                    class: 'fa-brands fa-linkedin'
                                })));
                                socialIcons.append(liLinkedIn);
                            }
                            if (speaker.twitter) {
                                var liTwitter = $('<li>').append($('<a>', {
                                    href: speaker.twitter
                                }).append($('<i>', {
                                    class: 'fa-brands fa-twitter'
                                })));
                                socialIcons.append(liTwitter);
                            }
                            if (speaker.instagram) {
                                var liInstagram = $('<li>').append($('<a>', {
                                    href: speaker.instagram
                                }).append($('<i>', {
                                    class: 'fa-brands fa-instagram'
                                })));
                                socialIcons.append(liInstagram);
                            }

                            spkrContentDetails.append(socialIcons);

                            speakerContent.append(spkrContentTitle).append(spkrContentDetails);

                            speakerInner.append(speakerThumb).append(speakerContent);
                            speakerItem.append(speakerInner);
                            speakerGrid.append(speakerItem);
                        });

                        accordionPanel.append(speakerGrid);
                    }

                    accordionItem.append(accordionHeading).append(accordionPanel);
                    sessionInfo.append(accordionItem);
                });

                var tabPane = $('<div>', {
                    class: 'tab-pane active'
                });
                tabPane.append(sessionInfo);

                tabContent.html(tabPane);
            }

            function toggleAccordion(element) {
                var panel = element.closest('.accordion__item').find('.accordion__panel');
                if (panel.is(':visible')) {
                    panel.slideUp();
                    element.attr('aria-expanded', 'false');
                } else {
                    panel.slideDown();
                    element.attr('aria-expanded', 'true');
                }
            }

            // Fungsi untuk memperbarui parameter query tanpa reload halaman
            function updateQueryStringParam(key, value) {
                var baseUrl = [location.protocol, '//', location.host, location.pathname].join('');
                var urlQueryString = document.location.search;
                var newParam = key + '=' + value;
                var params = '?' + newParam;

                // Jika parameter query sudah ada
                if (urlQueryString) {
                    var keyRegex = new RegExp('([?&])' + key + '[^&]*');

                    if (urlQueryString.match(keyRegex) !== null) {
                        // Jika parameter sudah ada, gantikan nilainya
                        params = urlQueryString.replace(keyRegex, "$1" + newParam);
                    } else {
                        // Jika parameter belum ada, tambahkan
                        params = urlQueryString + '&' + newParam;
                    }
                }

                window.history.replaceState({}, "", baseUrl + params);
            }
        });
    </script>
@endpush
