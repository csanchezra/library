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
  <form >
    @csrf
    <div class="module">
      <div class="module-head">
        <h3>Add image</h3>
      </div>
      <div class="module-body">
        <form class="form-horizontal row-fluid">
          <div class="control-group">
            <label class="control-label">Category</label>
            <div class="controls">
              <label for="role">Profile Picture :<span class="danger">*</span> </label>
              <input type="file" class="form-control" id="file" name="file">
            </div>
          </div>

          <div class="control-group">
            <div class="controls">
              <button type="button" class="btn btn-inverse" id="addImage">Add image</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</form>
@endsection


<script type="text/javascript">
document.addEventListener("DOMContentLoaded", function(event) {
var blob;

  $('#file').change(function() {
    if(this.files && this.files[0]) {

      var fileReader = new FileReader();

      fileReader.addEventListener("load", function(e) {
        //you can use base64 to preview file
        console.log('Base64:', e.target.result);
        blob = e.target.result
      });

      fileReader.readAsDataURL( this.files[0] );
    }
  });

  $("#addImage").click(function(e){
    // var formData = new FormData();
    // var fileUploadInput = document.getElementById('file');
    // formData.append("file", fileUploadInput.files[0]);

    $.ajax({
      type:'POST',
      url:"{{ route('image-store') }}",
      data:{blob: blob, _token: "{{ csrf_token() }}",},
      success:function(data){
        alert(data.success);
        // $('.data-table').DataTable().ajax.reload();
      }
    });
  });

});


</script>
