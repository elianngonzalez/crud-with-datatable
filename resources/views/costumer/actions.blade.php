
    {{-- <a class="btn btn-sm btn-primary " href="{{ route('costumers.show',$id) }}"><i class="fa fa-fw fa-eye"></i> Show</a> --}}
    <form method="POST" style="display: inline-block;" action="{{ route('costumers.destroy',$id) }}">
        <button type="button" onClick='Modal({{$id}})' class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            show
        </button>
        <a class="btn btn-sm btn-success" href="{{ route('costumers.edit',$id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>    
        @method('DELETE')
        @csrf
        {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" value="DELETE" name="_method"> --}}
        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-fw fa-trash"></i> Delete
        </button>
    </form>