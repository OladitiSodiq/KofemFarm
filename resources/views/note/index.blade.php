@extends('layout')

@section('content')




<div class="row">
    <div class="col-md-8 mt-3 mt-md-0">
        <p class="heading-1">View Farm Notes</p>
        <p class="">Browse and manage your categories, including their names and descriptions. Use the action buttons to edit or delete category details as needed for efficient organization and management.</p>
    </div>
    <div class="col-md-4 d-flex align-items-center justify-content-end mt-3 mt-md-0">
        <a href="{{route('note.create')}}" class="btn bg-success text-white p-2 px-4">
            Add Farm Note<i class="fa-regular fa-add ps-2"></i>
        </a>
    </div>
</div>
<div class="mt-4 table-responsive">
    <table class="table table-hover" id="example">
        <thead class="table-dark">
            <tr>
          
                <th class="py-3">Farm Name</th>
                <th class="py-3">Farm Notes</th>
                <th class="py-3">Date Added</th>
                <th class="py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($farm_notes as $farm_note)
            <tr>
         
                <td class="py-3">{{$farm_note->farm2?->name}}</td>
                <td class="py-3 w-50">

                    {!! $farm_note->notes !!}
                </td>
                <td class="py-3">{{ $farm_note->created_at }}</td>
                
                <td class="py-3">
                    <a href="{{route('note.edit', $farm_note)}}" class="pe-lg-3 p-2 me-lg-2 text-white bg-primary d-inline-block mb-3  text-center"><i class="fa-regular fa-edit px-2"></i>Edit</a>
                    <form method="post" action="{{route('note.destroy',$farm_note)}}">
                        @csrf
                        @method('delete')
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger">
                            <i class="fas fa-trash"></i>delete</button>
                    </form>
                </td>
            </tr>
            @endforeach

            
        </tbody>
    </table>
       
        
</div>

@endsection
