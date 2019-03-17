@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <div class="container">
    <h1>Contacts</h1><hr/>
  </div>
  <div class="form-group">
    <form action="{{ route('cms.index') }}" method="get">
      <div class="input-group col-sm-12">
        {{ csrf_field() }}
        <a href="{{ route('cms.create')}}" class="btn btn-success ">Add New Record</a>
        <span class="col-sm-4"></span>
        <input  class="form-control" name="search_text" type="text" value="{{isset($_GET['search_text']) ? $_GET['search_text']:''}}" />

        <div class="input-group-prepend">
           <input class="form-control btn btn-primary" type="submit" name="search" value="Search" />
        </div>

      </div>
    </form>

  </div>
  <div class="container">
    <table class="table table-striped table-bordered">
      <thead class="table-primary">
          <tr>
            <td>ID</td>
            <td>First Name</td>
            <td>Middle Name</td>
            <td>Last Name</td>
            <td>Action</td>
          </tr>
      </thead>
      <tbody>
          @foreach($customers['data'] as $cust)
          <tr>
              <td>{{$cust->c_id}}</td>
              <td>{{$cust->fname}}</td>
              <td>{{$cust->mname}}</td>
              <td >{{$cust->lname}}</td>
              <td>
                <form action="{{ route('cms.destroy', $cust->c_id)}}" method="post">
                  <a href="{{ route('cms.edit',$cust->c_id)}}" class="btn btn-primary">Edit</a>
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
              </td>
          </tr>
          @endforeach
          @if(isset($customers['msg']))
              <td colspan="5" class="table-danger" align="center">
                {{$customers['msg']}}
              </td>
          @endif
      </tbody>
    </table>
  {{ $customers['data']->links() }}
  </div>
<div>
@endsection
