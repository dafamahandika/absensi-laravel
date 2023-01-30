@extends('students.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>CRUD Absensi</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('students.create') }}"> Create</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p class="text-center">{{ $message }}</p>
        </div>
    @endif     
    @if ($message = Session::get('destroy'))
        <div class="alert alert-danger">
            <p class="text-center">{{ $message }}</p>
        </div>
    @endif     

    <table class="table table-bordered">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nis</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Rombel</th>
            <th class="text-center">Rayon</th>
            <th class="text-center">Keterangan</th>
            <th width="280px" class="text-center">Action</th>
        </tr>
        @foreach ($students as $student)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td class="text-center">{{ $student->nis }}</td>
            <td class="text-center">{{ $student->nama }}</td>
            <td class="text-center">{{ $student->rombel }}</td>
            <td class="text-center">{{ $student->rayon }}</td>
            <td class="text-center">{{ $student->ket}}</td>
            <td>
                <form action="{{ route('students.destroy',$student->id) }}" method="POST" class="text-center">
           
                    <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $students->links() !!}
        
@endsection