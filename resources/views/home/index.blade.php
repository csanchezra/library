@extends('layouts.plantilla')
@section('title','Home')
@section('content')



  <!DOCTYPE html>
  <html lang="en">
  <head>

    {{-- <link type="text/css" href="{{asset('static/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{asset('static/bootstrap/css/bootstrap-responsive.min.css') }}" rel="stylesheet">
    <link type="text/css" href="{{asset('static/css/theme.css') }}" rel="stylesheet">
    <link type="text/css" href="{{asset('static/images/icons/css/font-awesome.css') }}" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'> --}}

    {{-- <script src="{{asset('static/scripts/underscore-min.js') }}" type="text/javascript"></script>
    <script src="{{asset('static/custom/js/script.common.js') }}" type="text/javascript"></script> --}}
  </head>



  <script type="text/template" id="alert_box">

  </script>

  @section('content')
    <div class="content center">
      <div class="btn-controls">
        <div class="btn-box-row row-fluid">
          <button class="btn-box big span4 homepage-form-box" id="findbookbox">
            <i class="icon-list" ></i>
            <b>Find Book</b>
          </button>

          <button class="btn-box big span4 homepage-form-box" id="findissuebox">
            <i class="icon-book"></i>
            <b>Find Issue Book </b>
          </button>

          <button class="btn-box big span4 homepage-form-box" id="findstudentbox">
            <i class="icon-user"></i>
            <b>Find Student</b>
          </button>
        </div>

        <div class="content">
          <div class="module" style="display: none;">
            <div class="module-body">
              <form class="form-horizontal row-fluid" id="findbookform">
                <div class="control-group">
                  <label class="control-label">Name or author<br>of the book</label>
                  <div class="controls">
                    <div class="span9">
                      <textarea class="span12" rows="2"></textarea>
                    </div>
                    <div class="span3">
                      <a class="btn homepage-form-submit " style="background-color:  #00cc00; color:#fff"><i class="icon-search"></i> Search</a>
                    </div>
                  </div>
                </div>
              </form>
              <hr>
              <table class="table table-striped table-bordered table-condensed" style="display: none;">
                <thead>
                  <tr>
                    <th>Book ID</th>
                    <th>Book Title</th>
                    <th>Author</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody id="book-results"></tbody>
              </table>
            </div>
          </div>

          <div class="module" style="display: none;">
            <div class="module-body">
              <form class="form-horizontal row-fluid" id="findissueform">
                <div class="control-group">
                  <label class="control-label">Enter Book ID</label>
                  <div class="controls">
                    <input type="number" placeholder="" class="span9">
                    <a class="btn homepage-form-submit" style="background-color:  #00cc00; color:#fff"><i class="icon-search"></i> Search</a>
                  </div>
                </div>
              </form>
            </div>
            <div class="module-body" id="module-body-results"></div>
          </div>

          <div class="module" style="display: none;">
            <div class="module-body">
              <form class="form-horizontal row-fluid" id="findstudentform">
                <div class="control-group">
                  <label class="control-label">Enter Student ID</label>
                  <div class="controls">
                    <input type="text" placeholder="" class="span9">
                    <a class="btn homepage-form-submit" style="background-color:  #00cc00; color:#fff"><i class="icon-search"></i> Search</a>
                  </div>
                </div>
              </form>
            </div>
            <div class="module-body" id="module-body-results"></div>
          </div>
        </div>
      </div>
    </div>
  @endsection
