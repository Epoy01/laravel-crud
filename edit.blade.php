@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Share
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('cms.update', $customer->c_id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="fname">First Name:</label>
          <input type="text" class="form-control" name="fname" value={{ $customer->fname }} />
        </div>
        <div class="form-group">
          <label for="mname">Middle Name:</label>
          <input type="text" class="form-control" name="mname" value={{ $customer->mname }} />
        </div>
        <div class="form-group">
          <label for="lname">Last Name:</label>
          <input type="text" class="form-control" name="lname" value={{ $customer->lname }} />
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection
