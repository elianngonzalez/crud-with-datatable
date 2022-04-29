
<div>
<form class='btn-group' action="{{ route('costumers.destroy',$id) }}" method="POST">
    <a class="btn btn-sm btn-primary " href="{{ route('costumers.show',$id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
    <a class="btn btn-sm btn-success" href="{{ route('costumers.edit',$id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" onClick="return confirm('Are you sure you want to')"><i class="fa fa-fw fa-trash"></i> Delete</button>  
</form>
</div>