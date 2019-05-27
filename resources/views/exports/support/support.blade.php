@extends('exports.notations.layout')
@section('report')
    <div class="docHeader">
        <div class="rightSide">
            <span class="docRef">D-12.2</span>
        </div>
        <div class="leftSide">
            <img src="{{ asset('frontend/assets/images/sonatrach.png') }}" alt="">
            <div class="companyInfos">
                <h5>Activité Exploration Production</h5>
                <h5>Division Production</h5>
                <h5>Direction Régionale de ..</h5>
                <h5>Division Intendance ..</h5>
                <h5>Date du ../../20..</h5>
            </div>
        </div>
        <div class="docTitle">
            <h3>DEMANDE DE PRISE EN CHARGE</h3>
        </div>
    </div>
    <div class="leftSide">
        <h5>Nom de l'organisme á prendre en charge :</h5>
        <h5>Motif :</h5>
        <h5>Nombre de personnes :</h5>
    </div>
    <div class="docBody">
        <table class="receptionBody kitchenControl">
            <thead>
            <tr>
                <th>Nom & prenom</th>
                <th>Fonction</th>
                <th>Observation</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <table class="commentsTable">
            <tr>
                <td id="commentTD">Commentaires</td>
            </tr>
            <tr>
                <td class="comments"> {{ $data->remark }}</td>
            </tr>
        </table>
    </div>

    <div class="docFooter">
        <div class="leftSigner">
            <h5>Le demandeur</h5>
        </div>
        <div class="rightSigner">
            <h5>Le Chef Division .......... Le Chef Division Intendence</h5>
        </div>
    </div>
@endsection
