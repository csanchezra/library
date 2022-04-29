@extends('layouts.plantilla')
@section('title','Add book')
@section('content')


<style media="screen">
.center {
  margin: auto;
  width: 60%;
  padding: 10px;
}
</style>

<div class="content center">
  <form action="{{route('book-store')}}" method="POST">
      @csrf
    <div class="module">

      <div class="control-group">
          <label class="control-label">Title Of Book</label>
          <div class="controls">
              <input type="text" name="title" placeholder="Enter the title of the book here..." class="span8">
          </div>
      </div>

      <div class="control-group">
          <label class="control-label">Author Name</label>
          <div class="controls">
              <input type="text" name="author" placeholder="Enter the name of author for the book here..." class="span8">
          </div>
      </div>

      <div class="control-group">
          <label class="control-label" for="basicinput">Description of Book</label>
          <div class="controls">
              <textarea class="span8" name="description"  rows="5" placeholder="Enter few lines about the book here"></textarea>
          </div>
      </div>

      <div class="control-group">
          <label class="control-label" for="basicinput">Category</label>
          <div class="controls">
              <select tabindex="1" name="category_id" class="span8">
                  @foreach($categories_list as $category)
                      <option value="{{ $category->id }}">{{ $category->category }}</option>
                  @endforeach
              </select>
          </div>
      </div>

      <div class="control-group">
          <label class="control-label">Number of issues</label>
          <div class="controls">
              <input type="number" name="number" placeholder="How many issues are there?" class="span8">
          </div>
      </div>
      <div class="control-group">
          <div class="controls">
              <button type="submit" class="btn btn-inverse" name="addbooks">Add Books</button>
          </div>
      </div>
    </div>
</div>
</form>
@endsection
