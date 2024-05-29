@props(['title', 'current_page'])
<!-- ======================= Start Page Title ===================== -->
<div class="page-title image-title" style="background-image:url({{ asset('assets/img/banner.jpg') }});">
    <div class="container">
        <div class="page-title-wrap">
        <h2 class="text-capitalize">{{ $title }}</h2>
        <p><a href="{{ route('home') }}" class="theme-cl">Home</a> | <span class="text-capitalize">{{ $current_page }}</span></p>
        </div>
    </div>
</div>
<!-- ======================= End Page Title ===================== -->