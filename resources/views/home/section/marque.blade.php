<!-- Marquee Sponsor -->
<div style="background:#00537a; color:white; padding: 3px;">
    <p style="font-size: 14px; margin: 0;text-align: center">
        <i>INDONESIA MINER 2025 SUPPORTED BY</i>
    </p>
</div>
<div class="marquee marquee-sponsor" id="marquee2025">
    <div class="marquee-content-sponsor">
        {{-- platinum --}}
        <img src="{{ asset('new-home/upload/logo/40.png') }}" alt="Sponsor 1">
        <img src="{{ asset('new-home/upload/logo/53.png') }}" alt="Sponsor 2">
        <img src="{{ asset('new-home/upload/logo/34.png') }}" alt="Sponsor 2">
        <img src="{{ asset('new-home/upload/logo/60.png') }}" alt="Sponsor 2">
        {{-- gold --}}
        <img src="{{ asset('new-home/upload/logo/62.jpeg') }}" alt="Sponsor 3">
        <img src="{{ asset('new-home/upload/logo/9.png') }}" alt="Sponsor 4">
        <img src="{{ asset('new-home/upload/logo/51.png') }}" alt="Sponsor 5">
        <img src="{{ asset('new-home/upload/logo/32.png') }}" alt="Sponsor 6">
        <img src="{{ asset('new-home/upload/logo/56.jpg') }}" alt="Sponsor 6">
        <img src="{{ asset('new-home/upload/logo/65.png') }}" alt="Sponsor 6">
        <img src="{{ asset('new-home/upload/logo/57.jpg') }}" alt="Sponsor 6">
        <img src="{{ asset('new-home/upload/logo/26.png') }}" alt="Sponsor 6">
        <img src="{{ asset('new-home/upload/logo/35.png') }}" alt="Sponsor 6">
        {{-- silver --}}
        <img src="{{ asset('new-home/upload/logo/39.png') }}" alt="Sponsor 7">
        <img src="{{ asset('new-home/upload/logo/33.png') }}" alt="Sponsor 8">
        <img src="{{ asset('new-home/upload/logo/61.png') }}" alt="Sponsor 9">
        <img src="{{ asset('new-home/upload/logo/52.png') }}" alt="Sponsor 10">
        <img src="{{ asset('new-home/upload/logo/54.png') }}" alt="Sponsor 11">
        <img src="{{ asset('new-home/upload/logo/55.png') }}" alt="Sponsor 12">
        <img src="{{ asset('new-home/upload/logo/58.jpg') }}" alt="Sponsor 12">
        <img src="{{ asset('new-home/upload/logo/64.png') }}" alt="Sponsor 12">
    </div>
</div>

<!-- Marquee Exhibitor -->
<div style="background:#00537a; color:white; padding: 3px; margin-top: 20px;">
    <p style="font-size: 14px; margin: 0;text-align: center">
        <i>INDONESIA MINER 2025 EXHIBITOR LIST</i>
    </p>
</div>
<div class="marquee marquee-exhibitor" id="marquee2024">
    <div class="marquee-content-exhibitor">
        @php
            $events_id = 13;
            $exhibitors = DB::table('events_company')
                ->select('company.id', 'company.name as title', 'company.image as image')
                ->leftJoin('company', function ($join) {
                    $join->on('events_company.company_id', '=', 'company.id');
                })
                ->leftJoin('company_video', function ($join) {
                    $join->on('company_video.company_id', '=', 'company.id')->where('company_video.is_main', 1);
                })
                ->where(function ($q) use ($events_id) {
                    if (!empty($events_id)) {
                        $q->where('events_company.events_id', $events_id);
                    }
                    $q->where('events_company.status', 'Active');
                })
                ->where('events_company.exhibition_status', 'On')
                ->orderBy('events_company.sort', 'asc')
                ->get();
        @endphp

        @foreach ($exhibitors as $exhibitor)
            <img src="{{ 'https://indonesiaminer.com/' . $exhibitor->image }}" alt="{{ $exhibitor->title }}"
                class="exhibitor-logo">
        @endforeach
    </div>
</div>
