<div class="card-block">
  <input type="hidden" name="docRef" value="{{ $notation->ref }}">
  <input type="hidden" name="docId" value="{{ $notation->id }}">
  <a href="{{ route('admin.notations.export', [$notation->ref, 'pdf']) }}"><button class="btn btn-info waves-effect waves-light printControl"><i class="fas fa-file-pdf"></i> Imprimer</button></a>
  <button class="btn btn-primary waves-effect waves-light informeSupplier">Informer le prestataire</button>
  @if($notation->status != 'approved')
  <button class="btn btn-success waves-effect waves-light validateControl">Valider</button>
  @endif
  <button class="btn btn-warning waves-effect waves-light reportProblem">Signaler un problème</button>

  @if($notation->status != 'rejected')
  <button class="btn btn-danger waves-effect waves-light rejectControl">Rejeter</button>
  @endif
</div>
