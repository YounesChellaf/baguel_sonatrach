@extends('exports.notations.layout')
@section('report')
<div class="docHeader">
  <div class="rightSide">
    <span class="docRef">{{ $doc->ref }}</span>
  </div>
  <div class="leftSide">
    <img src="{{ asset('frontend/assets/images/sonatrach.png') }}" alt="">
    <div class="companyInfos">
      <h5>Activité Exploration Production</h5>
      <h5>Division Production</h5>
      <h5>Direction Régionale de</h5>
      <h5>Division Intendance</h5>
      <h5>Date du </h5>
    </div>
  </div>
  <div class="docTitle">
    <h3>Réception marchandises</h3>
  </div>
</div>
<div class="docBody">
  <table class="receptionBody">
    <tr>
      <td width="50%">Nature de Produit</td>
      <td width="2%">:</td>
      <td width="40%"><div class="rectangle"><p></p></div></td>
    </tr>
    <tr>
      <td width="50%">N° Facture ou BL</td>
      <td width="2%">:</td>
      <td width="40%"><div class="rectangle"></div></td>
    </tr>
    @foreach($doc->scoresDisplay() as $index => $score)
    <tr>
      <td width="50%">{{ $score['criteria_name'] }}</td>
      <td width="2%">:</td>
      <td width="40%"><span>{{ $score['criteria_note'] }} /10</span> </td>
    </tr>
    @endforeach
  </table>
  <table class="commentsTable">
    <tr>
      <td id="commentTD">Commentaires</td>
    </tr>
    <tr>
      <td class="comments"></td>
    </tr>
  </table>
</div>

<div class="docFooter">
  <div class="leftSigner">
    <h6>Responsable ou vétérinaire SH</h6>
  </div>
  <div class="rightSigner">
    <h6>Vérétinaire ou responsable HSE prestataire</h6>
  </div>
</div>
@endsection
