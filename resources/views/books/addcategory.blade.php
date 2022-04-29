@extends('layouts.plantilla')
@section('title','Add category')
@section('content')

  {{-- <script src="{{asset('static/scripts/jquery-1.9.1.min.js') }}" type="text/javascript"></script>
  <script src="{{asset('static/scripts/jquery-ui-1.10.1.custom.min.js') }}" type="text/javascript"></script>
  <script src="{{asset('static/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
  <script src="{{asset('static/scripts/underscore-min.js') }}" type="text/javascript"></script> --}}



<style media="screen">
.center {
  margin: auto;
  width: 60%;
  padding: 10px;
}
</style>

<div class="content center">
  <form action="{{route('category-store')}}" method="POST">
      @csrf
    <div class="module">
        <div class="module-head">
            <h3>Add Books Category</h3>
        </div>
        <div class="module-body">
            <form class="form-horizontal row-fluid">
                <div class="control-group">
                    <label class="control-label">Category</label>
                    <div class="controls">
                        <input type="text" id="category" name="category" value="{{old('category')}}">
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-inverse" id="addbookcategory">Add Books</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</form>
@endsection
