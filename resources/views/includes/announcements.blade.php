@foreach($announcements as $announcement)
<div class="d-flex">
  <img src="{{asset('images/blinkingNEW.gif')}}" alt="Announcement GIF"
  style="width:40px;">
  @if($announcement->hasMedia('announcement_files'))
  <a href="{{route('announcements.download', ['announcement' => $announcement->id])}}" 
    class="d-block ml-2 text-uppercase">{{$announcement->title}}</a>
  @else  
  <div class="ml-2 text-uppercase">{{$announcement->title}}</div>
  @endif
</div>
@endforeach
