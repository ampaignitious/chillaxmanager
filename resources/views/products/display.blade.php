  {{-- This is the section displaying the date and time --}}
  <ul class="list-group list-group-horizontal">
    <li class="list-group-item flex-fill justify-content-between align-items-start">
     <p></p> 
    </li>
    <li class="list-group-item flex-fill justify-content-between align-items-start">
    <p class="fw-bold">DATE:<span style="margin-left:10px;"><?php echo date("y-m-d")?></span></p>
    </li>
    <li class="list-group-item  justify-content-between align-items-start">
    <p class="fw-bold text-danger">Time:<span style="padding-left:10px;"><?php 
      date_default_timezone_set('Asia/Kolkata');
      echo $runningTime =date('h:i:s');
     ?></span></p>
    </li>
  </ul>

  {{-- end of the the section displaying the date and time --}}