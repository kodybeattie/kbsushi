@if (count($errors))

<div>

<div class="alert-danger custom-alert">
 
  <ul>
      @foreach ($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach

   </ul>
  </div>

 <div>
@endif