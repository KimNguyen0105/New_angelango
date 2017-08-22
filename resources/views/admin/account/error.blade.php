 @if(count($errors) >0)
     <ul style="color: red">
         @foreach($errors->all() as $error)
            {{$error}}</br>
          @endforeach
      </ul>
 @endif