@extends('adminlte::page')

@section('title', 'Dashboard')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel JS ASYNC</title>
@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<div class="container">
  <h4>Filtros dependientes</h4>
  
  <form class="row gx-3 gy-2 align-items-center">
      <div class="col-sm-3">

          <label class="visually-hidden" for="specificSizeSelect">Preference</label>
          <select class="form-select" id="specificSizeSelect">
            <option selected>Proveedor...</option>
              @foreach ($providers as $item)
              <option value="{{$item->id}}">{{$item->name}}</option>
              @endforeach
          </select>
        </div>
      <div class="col-sm-3">
          <label class="visually-hidden" for="specificSizeSelect">Preference</label>
          <select class="form-select" id="categories">
            <option selected disabled>Categoria...</option>
              @foreach ($categories as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
              @endforeach
          </select>
        </div>
      <div class="col-sm-3">
        <label class="visually-hidden" for="specificSizeSelect">Preference</label>
        <select class="form-select" id="products">
          <option selected>Producto...</option>

        </select>
      </div>
      <div class="col-auto" id="stock">
        
        
      </div>
      
    </form>
    <br>
    <div class="container">
      <table class="table" id="TblProducts">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Producto</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Stock</th>
          </tr>
        </thead>
        <tbody>
    
        </tbody>
      </table>
    </div>
    <br>
    <div class="container">
      <br>
      <h4>All Products</h4>
      <table class="table" id="TblAllProducts">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Producto</th>
            <th scope="col">Stock</th>
            <th scope="col">Categoria</th>
          </tr>
        </thead>
        <tbody>

          @foreach ($products as $item)
          <tr>
            <th scope="row">{{$contador++}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->stock}}</td>
            <td>{{$item['categories']['name']}}</td>
          </tr>                  
            @endforeach
    
        </tbody>
      </table>
    </div>
</div> 
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
    
@stop

@section('js')
    <script src="{{asset('js/HomePages/homePages.js')}}"></script> 
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
    <script>
    $(document).ready( function () {
    $('#TblAllProducts').DataTable();
      });
      $(document).ready( function () {
    $('#TblProducts').DataTable();
});
</script>
@stop

