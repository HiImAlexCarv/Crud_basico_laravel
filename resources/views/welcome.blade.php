<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

    <h1 class="text-center p-3">crud primero</h1>

    @if (session("correcto"))
        <div class="alert alert-success">{{session("correcto")}}</div>
    @endif

    @if (session("error"))
        <div class="alert alert-danger">{{session("error")}}</div>
    @endif

    <script>
        var res=function(){
            var not=confirm("¿Estas seguro que quieres eliminar?");
            return not;
        }
    </script>


  <!-- Modal Agregar -->
  <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir datos</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route("create")}}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtnombre">

                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Ciudad</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" name="txtciudad">
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                  </div>
              </form>
        </div>

      </div>
    </div>
  </div>

<div class="p-5 table-responsive">
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addModal">Añadir Persona</button>

  <table class="table table-stripped table-bordered table-hover">
    <thead class="bg-primary text-white">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Nombre</th>
        <th scope="col">ciudad</th>
        <th></th>
        <th></th>

      </tr>
    </thead>
    <tbody class="table-group-divider">
        @foreach ($datos as $item )

            <th>{{$item->id}}</th>
            <td>{{$item->nombre}}</td>
            <td>{{$item->ciudad}}</td>
            <td>
                <a href="" data-bs-toggle="modal" data-bs-target="#editModal{{$item->id}}" class="btn btn-warning btn-sm">editar</a>
                <a href="{{route("delete",$item->id )}}" onclick="return res()" class="btn btn-warning btn-sm">Eliminar</a>
            </td>





  <!-- Modal Modificar -->
  <div class="modal fade" id="editModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar datos</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{route("update")}}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Id</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtid" value="{{$item->id}}" readonly>
                  </div>

                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Nombre</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtnombre" value="{{$item->nombre}}">
                </div>

                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">Ciudad</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="txtciudad" value="{{$item->ciudad}}">
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Modificar</button>
                  </div>
              </form>
        </div>

      </div>
    </div>
  </div>

          </tr>
        @endforeach


    </tbody>
  </table>
</div>


  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>
