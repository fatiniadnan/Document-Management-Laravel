@if(session('succes'))
<div class="alert alert-success" role="alert">
    {{session('succes')}}
  </div>
@endif

@if(session('error'))
<div class="alert alert-danger" role="alert">
    {{session('error')}}
  </div>
@endif

@if(session('status'))
<div class="alert alert-success" role="alert">
  {{session('status')}}
</div>
@endif