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
                                <button onclick="ModalView()">create ajx</button>
                              </div>
                        </div>
                    </div>
                    
                        <div id="alerta" ></div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table">
                                <div id="botones-tabla"></div>
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


      <!--modal form-->

<div class="modal fade" id="exampleModalform" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombreCostumer">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">email:</label>
            <input type="email" class="form-control" id="emailCostumer">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Telefono:</label>
            <input type="tel" class="form-control" id="numeroCostumer">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">direccion:</label>
            <input type="tel" class="form-control" id="addressCostumer">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>




    <!--modal form-->

<div class="modal fade" id="exampleModalclean" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="alerta-exito"></div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombreCostumerCreate">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">email:</label>
            <input type="email" class="form-control" id="emailCostumerCreate">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Telefono:</label>
            <input type="tel" class="form-control" id="numeroCostumerCreate">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">direccion:</label>
            <input type="tel" class="form-control" id="addressCostumerCreate">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="FormReset()" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" onclick="CreateCostumer()" class="btn btn-primary">create Costumer</button>
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
                'responsive': true,
                'order': [[0, 'desc']],
                'columns': [
                        { data: 'id' },
                        { data: 'name' },
                        { data: 'email' },
                        { data:  'btn'},
                    ],
                })});


        async function ModalForm(id) {
            const response = await fetch(`api/costumer/${id}`)
            const data = await response.json()
            console.log(data)
            $('#nombreCostumer').val(data.name)
            $('#emailCostumer').val(data.email)
            $('#numeroCostumer').val(data.phone)
            $('#addressCostumer').val(data.address)

            $('#exampleModalform').modal('show');
        }


       
        function ModalView(){

            $('#exampleModalclean').modal('show');

        }

       async function CreateCostumer(){
            
            var name = $('#nombreCostumerCreate').val();
            var email = $('#emailCostumerCreate').val();
            var numero = $('#numeroCostumerCreate').val();
            var direccion = $('#addressCostumerCreate').val();
            
            const data = {
                'name' : name ,
                'email' : email ,
                'phone' : numero ,
                'address' : direccion
            }

            console.log(data);

            const peticion = await fetch(`api/costumer/create`,{
                method: 'POST',
                headers: {
                    'Content-Type':'application/json',
                    'Accept' : 'application/json ',
                },
                body: JSON.stringify(data), 
            });
            const respuesta = await peticion.json();
            console.log(respuesta);
            if (!respuesta.error) {
                $('#table').DataTable().ajax.reload();
            $('#alerta-exito').html(`<div class="alert alert-success alert-dismissible fade show" role="alert">${respuesta.success}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>`);
            FormReset()
        
        }else{
         $('#table').DataTable().ajax.reload();
            $('#alerta-exito').html(`<div class="alert alert-warning alert-dismissible fade show" role="alert">error en algun campo
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>`);   
        }


            }


        function FormReset(){
            $('#nombreCostumerCreate').val('');
            $('#emailCostumerCreate').val('');
            $('#numeroCostumerCreate').val('');
            $('#addressCostumerCreate').val('');
        }


        //////---PUEDE QUE SEA INNESESARIA---/////////
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


     
        async function ModalEdit(id) {
            const response = await fetch(`api/costumer/edit/${id}`,{
                method: 'post',
                headers: {
                    'Content-Type':'application/json'
                }
            });
            const data = await response.json();
            console.log(data);

            $('#exampleModal').modal('show');

        }


        async function Delete(id) {
            const response = await fetch(`api/costumer/${id}`, {
                method: 'post',
                headers: {
                    'Content-Type': 'application/json'
                },

            });
            const data = await response.json();
            console.log(data);
            $('#table').DataTable().ajax.reload();
        }
 


    </script>
@endsection
