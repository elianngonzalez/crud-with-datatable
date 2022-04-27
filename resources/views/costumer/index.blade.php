@extends('layouts.app')

@section('template_title')
    Costumer
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Costumer') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('costumers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table">
                                <thead >
                                    <tr>
                                        <th>No</th>
                                        
										<th>Name</th>
										<th>Email</th>
									
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
                                    @foreach ($costumers as $costumer)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $costumer->name }}</td>
											<td>{{ $costumer->email }}</td>
											<td>{{ $costumer->phone }}</td>
											<td>{{ $costumer->address }}</td>

                                            <td>
                                                <form action="{{ route('costumers.destroy',$costumer->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('costumers.show',$costumer->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('costumers.edit',$costumer->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody> --}}
                            </table>
            </div>
        </div>
    </div>

    <!--scripts datatable-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                'serverSide': true,
                'ajax': 'api/costumers',
                'columns': [
                        { data: 'id' },
                        { data: 'name' },
                        { data: 'email' },
                        {data:  'boton'},
                    ]});
        } );
    </script>
@endsection
