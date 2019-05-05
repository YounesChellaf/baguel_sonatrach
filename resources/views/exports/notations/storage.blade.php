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
    <h3>Controle Magasin et stockage</h3>
  </div>
</div>
<div class="docBody">
  <table class="receptionBody kitchenControl">
    <thead>
      <tr>
        <th>Désignation</th>
        <th>Conforme</th>
        <th>Non-Conforme</th>
      </tr>
    </thead>
    <tbody>
      @foreach($doc->scoresDisplay() as $index => $score)
      <tr>
        <td width="40%">{{ $score['criteria_name'] }}</td>
        <td width="30%">
          <img width="20" src="{{ $score['criteria_decision'] == 'yes' ? asset('frontend/assets/images/notations/checked.png') : '' }}" alt="">
        </td>
        <td width="30%">
          <img width="20" src="{{ $score['criteria_decision'] == 'no' ? asset('frontend/assets/images/notations/unchecked.png') : '' }}" alt="">
        </td>
      </tr>
      @endforeach
    </tbody>
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
    <h6>Le responsable SH</h6>
  </div>
  <div class="rightSigner">
    <h6>Vétérinaire SH</h6>
  </div>
</div>
@endsection
