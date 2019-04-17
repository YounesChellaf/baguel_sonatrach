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
              <i class="feather icon-box"></i>
            </span>
            <span class="pcoded-mtext">Administration</span>
          </a>
          <ul class="pcoded-submenu">
            <li class="">
              <a href="/admin/direction" class="waves-effect waves-dark">
                <span class="pcoded-mtext">Divisions</span>
              </a>
            </li>
            <li class="">
              <a href="/admin/departement" class="waves-effect waves-dark">
                <span class="pcoded-mtext">Services</span>
              </a>
            </li>
            <li class="">
              <a href="/admin/bloc" class="waves-effect waves-dark">
                <span class="pcoded-mtext">Bloc</span>
              </a>
            </li>
            <li class="">
              <a href="/admin/office" class="waves-effect waves-dark">
                <span class="pcoded-mtext">Bureaux</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="pcoded-hasmenu">
          <a href="javascript:void(0)" class="waves-effect waves-dark">
            <span class="pcoded-micon">
              <i class="feather icon-box"></i>
            </span>
            <span class="pcoded-mtext">Hébergement</span>
          </a>
          <ul class="pcoded-submenu">
            <li class="">
              <a href="#!" class="waves-effect waves-dark">
                <span class="pcoded-mtext">Chambres</span>
              </a>
            </li>
            <li class="">
              <a href="#!" class="waves-effect waves-dark">
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
          </ul>
        </li>
        <li class="pcoded-hasmenu">
          <a href="javascript:void(0)" class="waves-effect waves-dark">
            <span class="pcoded-micon">
              <i class="feather icon-gitlab"></i>
            </span>
            <span class="pcoded-mtext">Restauration</span>
          </a>
          <ul class="pcoded-submenu">
            <li class=" ">
              <a href="#!" class="waves-effect waves-dark">
                <span class="pcoded-mtext">Draggable</span>
              </a>
            </li>
          </li>
        </ul>
      </li>
      <li class="pcoded-hasmenu">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
          <span class="pcoded-micon">
            <i class="feather icon-package"></i>
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
            <a href="/admin/visiteur" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Visiteur</span>
            </a>
          </li>
          <li class=" ">
            <a href="/admin/visit" class="waves-effect waves-dark">
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
          <li class=" ">
            <a href="#!" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Notation des Fournisseurs</span>
            </a>
          </li>
          <li class=" ">
            <a href="#!" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Critères de notation</span>
            </a>
          </li>
        </ul>
      </li>
      <li class="pcoded-hasmenu">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
          <span class="pcoded-micon">
            <i class="feather icon-credit-card"></i>
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
    </ul>
    <div class="pcoded-navigation-label">Rapports</div>
    <ul class="pcoded-item pcoded-left-item">
      <li class="pcoded-hasmenu ">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
          <span class="pcoded-micon">
            <i class="feather icon-pie-chart"></i>
          </span>
          <span class="pcoded-mtext">Charts</span>
        </a>
        <ul class="pcoded-submenu">
          <li class="">
            <a href="#!" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Google Chart</span>
            </a>
          </li>
          <li class="">
            <a href="#!" class="waves-effect waves-dark">
              <span class="pcoded-mtext">ChartJs</span>
            </a>
          </li>
          <li class="">
            <a href="#!" class="waves-effect waves-dark">
              <span class="pcoded-mtext">List Chart</span>
            </a>
          </li>
          <li class="">
            <a href="#!" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Float Chart</span>
            </a>
          </li>
          <li class="">
            <a href="#!" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Knob chart</span>
            </a>
          </li>
          <li class="">
            <a href="#!" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Morris Chart</span>
            </a>
          </li>
          <li class="">
            <a href="#!" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Nvd3 Chart</span>
            </a>
          </li>
          <li class="">
            <a href="#!" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Peity Chart</span>
            </a>
          </li>
          <li class="">
            <a href="#!" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Radial Chart</span>
            </a>
          </li>
          <li class="">
            <a href="#!" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Rickshaw Chart</span>
            </a>
          </li>
          <li class="">
            <a href="#!" class="waves-effect waves-dark">
              <span class="pcoded-mtext">Sparkline Chart</span>
            </a>
          </li>
          <li class="">
            <a href="#!" class="waves-effect waves-dark">
              <span class="pcoded-mtext">C3 Chart</span>
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
            <a href="javascript:void(0)" class="waves-effect waves-dark">
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
