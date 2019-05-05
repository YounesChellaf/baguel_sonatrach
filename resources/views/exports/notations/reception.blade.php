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
      <td width="40%"><div class="rectangle"><p>{{ $doc->productNature() }}</p></div></td>
    </tr>
    <tr>
      <td width="50%">N° Facture ou BL</td>
      <td width="2%">:</td>
      <td width="40%"><div class="rectangle"><p>{{ $doc->originDocument() }}</p></div></td>
    </tr>
    @foreach($doc->scoresDisplay() as $index => $score)
    <tr>
      <td width="50%">{{ $score['criteria_name'] }}</td>
      <td width="2%">:</td>
      <td width="40%">
        <div class="yes">
          <span class="spanTxt">OUI</span> <div class="rect"> <img width="20" src="{{ $score['criteria_decision'] == 'yes' ? asset('frontend/assets/images/notations/checked.png') : '' }}" alt=""> </div>
        </div>
        <div class="no">
          <span class="spanTxt">NON</span> <div class="rect"><img width="20" src="{{ $score['criteria_decision'] == 'no' ? asset('frontend/assets/images/notations/unchecked.png') : '' }}" alt=""></div>
        </div>
      </td>
    </tr>
    @endforeach
  </table>
  <table class="commentsTable">
    <tr>
      <td id="commentTD">Commentaires</td>
    </tr>
    <tr>
      <td class="comments"> {{ $doc->comments }}</td>
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
