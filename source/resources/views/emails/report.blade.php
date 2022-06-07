@component('mail::message')
# Tiêu đề: {{ $title }}

Mô tả: {{ $description }} <br>
Người gửi báo cáo: <b>{{ $user }}</b>

<a href="localhost:3000/detailsVideoPage/{{ $video_id }}">
    @component('mail::button', ['url' => 'localhost:3000/detailsVideoPage/' . $video_id])
    Xem chi tiết bài đăng
    @endcomponent
</a>     

@endcomponent
