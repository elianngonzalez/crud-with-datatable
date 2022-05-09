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
                        <div class="alert alert-success" id='alerta'>
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table">
                                <thead >
                                    <tr>
                                        <th>N°</th>
										<th>Name</th>
										<th>Email</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
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
                        { data:  'btn'},
                    ],
                

                })});


        async function Modal(id) {
            const response = await fetch(`api/costumer/${id}`);
            const data = await response.json();
            console.log(data);
            $('#exampleModalLabel').html(data.name);
            $('#exampleModal .modal-body').html(`<p>${data.name}</p>`);
            $('#exampleModal .modal-body').append(`<p>${data.email}</p>`);
            $('#exampleModal .modal-body').append(`<p>${data.phone}</p>`);
            $('#exampleModal').modal('show');

        }

        async function Delete(id) {
            const response = await fetch(`api/costumer/${id}`, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json'
                }
            });
            const data = await response.json();
            console.log(data);
            $('alerta').html(data);
        }



    </script>
@endsection
