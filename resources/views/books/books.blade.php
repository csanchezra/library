@extends('layouts.plantilla')
@section('title','Waitng students')


@section('content')
  <div class="content center">

    <h1>ALL BOOKS</h1>
    {{-- @csrf --}}
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Description</th>
                <th>Category</th>
                <th>Total</th>
                <th>Available</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

  </div>



@endsection


  <script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function(event) {

      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('books') }}",
          columns: [
              {data: 'book_id', name: 'book_id', orderable: true, searchable: true},
              {data: 'title', name: 'title', orderable: true, searchable: true},
              {data: 'author', name: 'author', orderable: true, searchable: true},
              {data: 'description', name: 'description', orderable: true, searchable: true},
              {data: 'category', name: 'category', orderable: true, searchable: false},
              {data: 'total_books', name: 'total_books', orderable: true, searchable: true},
              {data: 'available', name: 'available', orderable: true, searchable: true},
          ],
  				language: {
  	                    url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
  	                },
      });

    });


  </script>
