@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add Customer
  </div>
  <div class="card-body">
      <form method="post" action="{{ route('cms.store') }}">
          <div class="form-group">
              @csrf
              <label for="fname">First Name:</label>
              <input type="text" id="fname" class="form-control {{$errors->all()&&$errors->first('fname') ? 'border border-danger':''}}" name="fname" value="{{ old('fname') }}" onkeydown="" />
              <p id="err_fname" class="text-danger">{{$errors->all() ? $errors->first('fname'):""}}</font>
          </div>
          <div class="form-group">
              @csrf
              <label for="mname">Middle Name:</label>
              <input type="text" class="form-control {{$errors->all()&&$errors->first('mname') ? 'border border-danger':''}}" name="mname" value="{{ old('mname') }}"/>
              <p class="text-danger">{{$errors->all() ? $errors->first('mname'):""}}</p>
          </div>
          <div class="form-group">
              @csrf
              <label for="lname">Last Name:</label>
              <input type="text" class="form-control {{$errors->all()&&$errors->first('lname') ? 'border border-danger':''}}" name="lname" value="{{ old('lname') }}"/>
              <p class="text-danger">{{$errors->all() ? $errors->first('lname'):""}}</p>
          </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
<script type="text/javascript">
  function check(){
  }
</script>
@endsection
