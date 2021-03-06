@extends('adminlte::page')
@section('title', 'Book List')
@section('content_header')
    <h1 class="m-0 text-dark">Book List</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{route('books.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>
                    <a href="/chart" class="btn btn-primary mb-2">
                        Chart
                    </a>
                    <a href="/generate-pdf" class="btn btn-primary mb-2">
                        Print PDF
                    </a>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>No</th>
                            <th>Tipe</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $key => $bookss)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$bookss->name}}</td>
                                <td>{{$bookss->no}}</td>
                                <td>{{$bookss->booktype}}</td>
                                <td>
                                    <a href="{{route('books.edit', $bookss)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <!-- <a href="{{route('books.destroy', $bookss)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs"> -->
                                    <a href="{{route('books.destroy', $bookss)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop
@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });
        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush