<ul class="nav nav-pills flex-column">
  <li class="nav-item">
    <a class="nav-link {{areActiveURLs(['loans/1'])}}" 
      href="{{url('loans/1')}}">Social Development Loan</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{isActiveURL('loans/2')}}"
      href="{{url('loans/2')}}">Emergency Loan</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{isActiveURL('loans/3')}}" 
      href="{{url('loans/3')}}">EDU Loan</a>
  </li>
</ul>