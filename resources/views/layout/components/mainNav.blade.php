<nav class="pcoded-navbar">
  <div class="nav-list">
    <div class="pcoded-inner-navbar main-menu">
      <div class="pcoded-navigation-label">Reporting</div>
      <ul class="pcoded-item pcoded-left-item">
        <li class="">
          <a href="{{ route('admin.index') }}" class="waves-effect waves-dark">
            <span class="pcoded-micon">
              <i class="feather icon-menu"></i>
            </span>
            <span class="pcoded-mtext">Tableau de bord</span>
          </a>
        </li>
      </ul>
      <div class="pcoded-navigation-label">Base de vie</div>
      <ul class="pcoded-item pcoded-left-item">
        <li class="pcoded-hasmenu">
          <a href="javascript:void(0)" class="waves-effect waves-dark">
            <span class="pcoded-micon">
              <i class="feather icon-home"></i>
            </span>
            <span class="pcoded-mtext">Administration</span>
          </a>
          <ul class="pcoded-submenu">
            <li class="">
              <a href="{{ route('divisions.index') }}" class="waves-effect waves-dark">
                <span class="pcoded-mtext">Divisions</span>
              </a>
            </li>
            <li class="">
              <a href="{{ route('services.index') }}" class="waves-effect waves-dark">
                <span class="pcoded-mtext">Services</span>
              </a>
            </li>
            <li class="">
              <a href="{{ route('bloc.index') }}" class="waves-effect waves-dark">
                <span class="pcoded-mtext">Bloc</span>
              </a>
            </li>
            <li class="">
              <a href="{{ route('office.index') }}" class="waves-effect waves-dark">
                <span class="pcoded-mtext">Bureaux</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="pcoded-hasmenu">
          <a href="javascript:void(0)" class="waves-effect waves-dark">
            <span class="pcoded-micon">
              <i class="fas fa-bed"></i>
            </span>
            <span class="pcoded-mtext">Hébergement</span>
          </a>
          <ul class="pcoded-submenu">
            <li class="">
              <a href="{{ route('room.index') }}" class="waves-effect waves-dark">
                <span class="pcoded-mtext">Chambres</span>
              </a>
            </li>
            <li class="">
              <a href="{{route('admin.reservation.index')}}" class="waves-effect waves-dark">
                <span class="pcoded-mtext">Réservations</span>
              </a>
            </li>
            <li class="">
              <a href="#!" class="waves-effect waves-dark">
                <span class="pcoded-mtext">Planning</span>
              </a>
            </li>
            <li class="">
              <a href="#!" class="waves-effect waves-dark">
                <span class="pcoded-mtext">Etat des chambres</span>
              </a>
            </li>
            <li class="">
              <a href="/admin/equipement" class="waves-effect waves-dark">
                <span class="pcoded-mtext">Equipement</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="pcoded-hasmenu">
          <a href="javascript:void(0)" class="waves-effect waves-dark">
            <span class="pcoded-micon">
              <i class="fas fa-utensils"></i>
            </span>
            <span class="pcoded-mtext">Restauration</span>
          </a>
          <ul class="pcoded-submenu">
            <li class=" ">
              <a href="#!" class="waves-effect waves-dark">
                <span class="pcoded-mtext">Hiérarchie</span>
              </a>
            </li>
            <li class=" ">
              <a href="#!" class="waves-effect waves-dark">
                <span class="pcoded-mtext">Repas</span>
              </a>
            </li>
          </li>
        </ul>
      </li>
      <li class="pcoded-hasmenu">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
          <span class="pcoded-micon">
            <i class="fas fa-exchange-alt"></i>
          </span>
          <span class="pcoded-mtext">Requêtes</span>
        </a>
        <ul class="pcoded-submenu">
          <li class=" ">
            <a href="#!" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Prise en charge</span>
            </a>
          </li>
          <li class=" ">
            <a href="#!" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Maintenance</span>
            </a>
          </li>
          <li class=" ">
            <a href="#!" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Réservation</span>
            </a>
          </li>
          <li class=" ">
            <a href="{{ route('admin.ExitPermissions.index') }}" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Bon de sortie</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="pcoded-hasmenu">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
          <span class="pcoded-micon">
            <i class="feather icon-package"></i>
          </span>
          <span class="pcoded-mtext">Visites</span>
        </a>
        <ul class="pcoded-submenu">
          <li class=" ">
            <a href="{{ route('admin.visits.index') }}" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Visites programmés</span>
            </a>
          </li>
          <li class=" ">
            <a href="#!" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Visites inopinées</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
    <div class="pcoded-navigation-label">Extra</div>
    <ul class="pcoded-item pcoded-left-item">
      <li class="pcoded-hasmenu">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
          <span class="pcoded-micon">
            <i class="feather icon-credit-card"></i>
          </span>
          <span class="pcoded-mtext">Fournisseurs</span>
        </a>
        <ul class="pcoded-submenu">
          <li class=" ">
            <a href="{{ route('admin.suppliers.index') }}" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Liste des Fournisseurs</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="pcoded-hasmenu">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
          <span class="pcoded-micon">
            <i class="fas fa-users"></i>
          </span>
          <span class="pcoded-mtext">Employées</span>
        </a>
        <ul class="pcoded-submenu">
          <li class=" ">
            <a href="{{ route('admin.employees.index') }}" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Liste des Employées</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="pcoded-hasmenu">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
          <span class="pcoded-micon">
            <i class="fas fa-check-circle"></i>
          </span>
          <span class="pcoded-mtext">Contrôls</span>
        </a>
        <ul class="pcoded-submenu">
          <li class=" ">
            <a href="{{ route('admin.notations.index') }}" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Notations</span>
            </a>
          </li>
          <li class=" ">
            <a href="{{ route('admin.notations.index.type', 'reception') }}" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Contrôl de livraison</span>
            </a>
          </li>
          <li class=" ">
            <a href="{{ route('admin.notations.index.type', 'kitchen') }}" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Contrôl de cuisine</span>
            </a>
          </li>
          <li class=" ">
            <a href="{{ route('admin.notations.index.type', 'restaurant') }}" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Contrôl de restaurant & foyer</span>
            </a>
          </li>
          <li class=" ">
            <a href="{{ route('admin.notations.index.type', 'storage') }}" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Contrôl de stockage & magasin</span>
            </a>
          </li>
          <li class=" ">
            <a href="{{ route('admin.notations.index.type', 'rooms') }}" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Contrôl des chambres</span>
            </a>
          </li>
          <li class=" ">
            <a href="{{ route('admin.notations.index.type', 'office') }}" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Contrôl des bureaux locaux</span>
            </a>
          </li>
          <li class=" ">
            <a href="{{ route('admin.notations.index.type', 'laundry') }}" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Contrôl blanchisserie</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="pcoded-hasmenu">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
          <span class="pcoded-micon">
            <i class="fas fa-boxes"></i>
          </span>
          <span class="pcoded-mtext">Produits</span>
        </a>
        <ul class="pcoded-submenu">
          <li class=" ">
            <a href="{{ route('admin.products.index') }}" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Gestion des produits</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="pcoded-hasmenu">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
          <span class="pcoded-micon">
            <i class="fas fa-tasks"></i>
          </span>
          <span class="pcoded-mtext">Projets</span>
        </a>
        <ul class="pcoded-submenu">
          <li class=" ">
            <a href="{{ route('admin.projects.index') }}" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Gestion des projets</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="pcoded-hasmenu">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
          <span class="pcoded-micon">
            <i class="fas fa-chart-bar"></i>
          </span>
          <span class="pcoded-mtext">Budget</span>
        </a>
        <ul class="pcoded-submenu">
          <li class=" ">
            <a href="{{ route('admin.budget.index') }}" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Gestion de budget</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
    <div class="pcoded-navigation-label">Rapports</div>
    <ul class="pcoded-item pcoded-left-item">
      <li class="pcoded-hasmenu ">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
          <span class="pcoded-micon">
            <i class="feather icon-pie-chart"></i>
          </span>
          <span class="pcoded-mtext">Restauration</span>
        </a>
        <ul class="pcoded-submenu">
          <li class="">
            <a href="#!" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Etat journalier des retas servis</span>
            </a>
          </li>
          <li class="">
            <a href="#!" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Etat des repas sevris restaurant cadres superieurs</span>
            </a>
          </li>
          <li class="">
            <a href="#!" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Etat des repas a emporter servis au différents sites</span>
            </a>
          </li>
          <li class="">
            <a href="#!" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Etat journalier du casse croute servis</span>
            </a>
          </li>
          <li class="">
            <a href="#!" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Attachement journalier prestation Restauration</span>
            </a>
          </li>
          <li class="">
            <a href="#!" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Attachement mensuel prestation restauration</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="pcoded-hasmenu ">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
          <span class="pcoded-micon">
            <i class="feather icon-map"></i>
          </span>
          <span class="pcoded-mtext">Maps</span>
        </a>
        <ul class="pcoded-submenu">
          <li class="">
            <a href="#!" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Google Maps</span>
            </a>
          </li>
          <li class="">
            <a href="#!" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Vector Maps</span>
            </a>
          </li>
          <li class="">
            <a href="#!" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Google Map Search API</span>
            </a>
          </li>
          <li class="">
            <a href="#!" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Location</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
    <div class="pcoded-navigation-label">Données de base</div>
    <ul class="pcoded-item pcoded-left-item">
      <li class="pcoded-hasmenu ">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
          <span class="pcoded-micon">
            <i class="feather icon-list"></i>
          </span>
          <span class="pcoded-mtext">Utilisateurs</span>
        </a>
        <ul class="pcoded-submenu">
          <li class="">
            <a href="{{ route('admin.users.index') }}" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Compte utilisateurs</span>
            </a>
          </li>
          <li class="">
            <a href="{{ route('admin.roles.index') }}" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Roles & Permissions</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>

    <div class="pcoded-navigation-label">Technique</div>
    <ul class="pcoded-item pcoded-left-item">
      <li class="">
        <a href="{{ route('admin.SystemConfig.index') }}" class="waves-effect waves-dark">
          <span class="pcoded-micon">
            <i class="feather icon-bookmark"></i>
          </span>
          <span class="pcoded-mtext">Paramètres du Système</span>
        </a>
      </li>
    </ul>

  </div>
</div>
</nav>
