@extends('layouts.plantilla')
@section('title','Waitng students')


@section('content')
  <div class="content center">

    <h1>STUDENTS WAITING FOR THEIR APPROVAL TO ACCESS LIBRARY</h1>
    {{-- @csrf --}}
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Last name</th>
                <th>Category</th>
                <th>email</th>
                <th>Date creation</th>
                <th width="100px"></th>
                <th width="100px"></th>
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
          ajax: "{{ route('students-waiting') }}",
          columns: [
              {data: 'first_name', name: 'first_name', orderable: true, searchable: true},
              {data: 'last_name', name: 'last_name', orderable: true, searchable: true},
              {data: 'category', name: 'category', orderable: true, searchable: true},
              {data: 'email_id', name: 'email_id', orderable: true, searchable: true},
              {data: 'created_at', name: 'created_at', orderable: true, searchable: true},
              {data: 'approve', name: 'approve'},
              {data: 'reject', name: 'reject'},
          ],
  				language: {
  	                    url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
  	                },
      });

    });

    let approve = (id) => {  // la llave abre una función multilínea

      $.ajax({
       type:'POST',
       url:"{{ route('ajaxRequestStatus.post') }}",
       data:{student_id: id,approved: 1, _token: "{{ csrf_token() }}",},
       success:function(data){
          alert(data.success);
          $('.data-table').DataTable().ajax.reload();
       }
    });
    };


    let reject = (id) => {  // la llave abre una función multilínea
      $.ajax({
       type:'POST',
       url:"{{ route('ajaxRequestStatus.post') }}",
       data:{student_id: id,rejected: 1, _token: "{{ csrf_token() }}",},
       success:function(data){
          alert(data.success);
          $('.data-table').DataTable().ajax.reload();
       }
    });
    };


  </script>
