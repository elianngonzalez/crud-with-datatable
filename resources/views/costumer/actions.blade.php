<meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <a class="btn btn-sm btn-primary " href="{{ route('costumers.show',$id) }}"><i class="fa fa-fw fa-eye"></i> Show</a> --}}
    <button type="button" onClick='Modal({{$id}})' class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Launch data
    </button>
    <button type="button" onClick='Delete({{$id}}); return confirm("estas seguro?")' class="btn btn-sm btn-danger" data-bs-toggle="" data-bs-target="#">delete ajax</button>
    <a class="btn btn-sm btn-success" href="{{ route('costumers.edit',$id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalform" onclick="ModalForm({{$id}})" data-bs-whatever="@mdo">Open modal for</button>

    <!--form action="{{ route('costumers.destroy',$id) }}" method="POST" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <input type="hidden" value="DELETE" name="_method">
        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
            <i class="fa fa-fw fa-trash"></i> Delete
        </button>
    </form -->

