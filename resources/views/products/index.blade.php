@extends('layout.main_layout')

@section('extraCss')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/pages/data-table/css/buttons.dataTables.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="page-header card">
  <div class="row align-items-end">
    @include('products.partials.pageTitle')
    @include('products.partials.beadcrumbs')
  </div>
</div>
<div class="pcoded-inner-content">
  <div class="main-body">
    <div class="page-wrapper">
      <div class="page-body">
        <div class="card">
          <div class="card-header">
            <h5>Produits</h5>
            <a href="#" class="importproductsAction">Importer</a>
            <a href="#!"><button type="button" style="float: right" class="btn btn-primary newProductAction" name="button">Nouveau produit</button></a>

          </div>
          <div class="card-block">
            <div class="dt-responsive table-responsive">
              <table id="usersTable" class="table table-striped table-bordered nowrap">
                <thead>
                  <tr>
                    <th>Désignaton</th>
                    <th>Catégorie</th>
                    <th>Prix unitaire</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($products as $index => $product)
                    <tr>
                      <td>{{ $product->name }}</td>
                      <td>{{ $product->category() }}</td>
                      <td>{{ number_format($product->unit_price, 2) }} DA</td>
                      <td></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade right" id="NewProductsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-full-height modal-right" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title w-100" id="myModalLabel">Crée un nouveau produit</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <p>

      </p>
      <form action="{{ route('admin.products.create') }}" class="productsImportForm" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Nom: </label>
          <div class="col-sm-10">
            <input type="text" name="ProductName" required class="form-control">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Catégorie: </label>
          <div class="col-sm-10">
            <select class="form-control" name="productCategory">
              <option value="food">Nourriture</option>
              <option value="maintenance">Maintenace</option>
              <option value="supplies">Provisions</option>
              <option value="other">Autre</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Prix unitaire: </label>
          <div class="col-sm-10">
            <input type="text" name="ProductUnitPrice" required class="form-control">
          </div>
        </div>
        <button type="submit" class="btn btn-info">Importer</button>
      </form>
    </ul>
  </div>
</div>
</div>
</div>

<div class="modal fade right" id="ImportProductsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-full-height modal-right" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title w-100" id="myModalLabel">Importation des produits</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <p>
        Cette option va vous permettre d'importer une liste des produits depuis un fichier Excel / CSV
      </p>
      <form action="{{ route('admin.products.import') }}" class="productsImportForm" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Fichier: </label>
          <div class="col-sm-10">
            <input type="file" name="ProductsFileInput" required class="form-control">
          </div>
        </div>
        <button type="submit" class="btn btn-info">Importer</button>
      </form>
    </ul>
  </div>
</div>
</div>
</div>
@endsection

@section('extraJs')
<script src="{{ asset('frontend/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('frontend/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('frontend/assets/pages/data-table/js/data-table-custom.js') }}"></script>
<script src="{{ asset('frontend/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('frontend/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('frontend/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
@endsection
