@if (Session::has('status'))
  {!! session('status') !!}
@endif

<form action="checkcode" method="POST">
  {{ csrf_field() }}
  <p>Code: <input name="code"/></p>
  <p>Email: <input name="email"/></p>
  <p>Join Our Mailing List: <input name="mailme" type="checkbox"/></p>
  <p><input type="submit"/></p>
</form>
