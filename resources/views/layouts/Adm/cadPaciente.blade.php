@section('title','Cadastrar Paciente')
@extends('web.app')
@extends('layouts.Adm.import')
@section('main')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Usuarios</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('Adm.home')}}">Home</a></li>
          <li class="breadcrumb-item active">Usuarios</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Cadastro de Usuario</h5>
              <form class="row g-3 needs-validation" action="{{route('store.Paciente')}}" method="POST">
                @csrf
                <div class="col-12">
                  <label for="yourName" class="form-label">Informe o nome</label>
                  <input type="text" name="name" class="form-control" id="yourName" required>
                  <div class="invalid-feedback">Por favor! Informe seu nome</div>
                </div>

                <div class="col-12">
                  <label for="yourEmail" class="form-label">Informe o E-mail</label>
                  <input type="email" name="email" class="form-control" id="yourEmail" required>
                  <div class="invalid-feedback">Informe um e-mail valido!</div>
                </div>

                <div class="col-12">
                  <label for="yourPassword" class="form-label">Palavra Passe</label>
                  <input type="password" name="password" class="form-control" id="yourPassword" required minlength="8" maxlength="20">
                  <div class="invalid-feedback">A palavra passe teve ter 8 caracteres no minimo!</div>
                </div>

                <div class="col-12">
                  <label class="col-sm-6 col-form-label">Tipo de Usuario</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="estato">
                      <option selected></option>
                      <option value="Paciente">Paciente</option>
                      <option value="Doutor">Doutor</option>
                      <option value="Administrador">Administrador</option>
                    </select>
                  </div>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary w-100" type="submit">Criar Conta</button>
                </div>
              </form>
            </div>
          </div>

        </div>

        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Lista dos Usuarios</h5>
              
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Estato</th>
                    <th scope="col">Operações</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($usuarios as $usuario)
                    <tr>
                      <th scope="row">{{$usuario->id}}</th>
                      <th scope="row">{{$usuario->name}}</th>
                      <th scope="row">{{$usuario->email}}</th>
                      <th scope="row">{{$usuario->estato}}</th>
                      <th class="d-flex">
                        <a type="button" class="btn btn-primary" data-bs-toggle="modal" href="#basicModal{{$usuario->id}}">Editar<i class="icon_plus_alt2 me-2"></i></a>
                        
                        <!-- Modal Editar -->
                        <div class="card">
                          <div class="card-body">
                            <div class="modal fade" id="basicModal{{$usuario->id}}" tabindex="-1">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">Editar Usuario</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                    <form class="row g-3 needs-validation" action="{{route('user.update',['id'=>$usuario->id])}}" method="POST">
                                      @csrf
                                      @method('PUT')
                                      <div class="col-12">
                                        <label for="yourName" class="form-label">Informe o nome</label>
                                        <input type="text" name="name" class="form-control" id="yourName" required value="{{$usuario->name}}">
                                        <div class="invalid-feedback">Por favor! Informe seu nome</div>
                                      </div>
                      
                                      <div class="col-12">
                                        <label for="yourEmail" class="form-label">Informe o E-mail</label>
                                        <input type="email" name="email" class="form-control" id="yourEmail" required value="{{$usuario->email}}">
                                        <div class="invalid-feedback">Informe um e-mail valido!</div>
                                      </div>
                      
                                      <div class="col-12">
                                        <label for="yourPassword" class="form-label">Palavra Passe</label>
                                        <input type="password" name="password" class="form-control" id="yourPassword" required minlength="8" value="{{$usuario->password}}">
                                        <div class="invalid-feedback">A palavra passe teve ter 8 caracteres no minimo!</div>
                                      </div>

                                      <div class="col-12">
                                        <label class="col-sm-6 col-form-label">Tipo de Usuario</label>
                                        <div class="col-sm-10">
                                          <select class="form-select" aria-label="Default select example" name="estato">
                                            <option value="{{$usuario->estato}}">{{$usuario->estato}}</option>
                                            <option value="Paciente">Paciente</option>
                                            <option value="Doctor">Doctor</option>
                                            <option value="Administrador">Administrador</option>
                                          </select>
                                        </div>
                                      </div>
                                      <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Salvar</button>
                                      </div>
                                    </form>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                                  </div>
                                </div>
                              </div>
                            </div><!-- End Basic Modal-->
                          </div>
                        </div>
                        <!-- Fim Modal Editar -->
                        <form action="{{route('user.delete',['id'=>$usuario->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar<i class="icon_close_alt2"></i></button>
                        </form>
                      </th>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows 18302303510001 jose silva saparola -->

            </div>
          </div>
        </div>
    </section>

  </main><!-- End #main -->
@endsection