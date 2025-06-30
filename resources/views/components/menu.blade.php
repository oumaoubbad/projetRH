<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item">
      <a href="/" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>Accueil</p>
      </a>
    </li>

    @if(auth()->user()->role)
      <li class="nav-item has-treeview">

        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>Vue globale</p>
            </a>
          </li>
        </ul>
      </li>

      <li class="nav-item">
        <a href="/profile" class="nav-link">
          <i class="nav-icon fas fa-user"></i>
          <p>Profil</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/user" class="nav-link">
          <i class="nav-icon fas fa-users"></i>
          <p>Utilisateurs</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/fonctions" class="nav-link">
          <i class="nav-icon fas fa-briefcase"></i>
          <p>Fonctions</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/employes" class="nav-link">
          <i class="nav-icon fas fa-user-tie"></i>
          <p>Employés</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/reservations" class="nav-link">
          <i class="nav-icon fas fa-calendar-alt"></i>
          <p>Réservations</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/conges" class="nav-link">
          <i class="nav-icon fas fa-plane-departure"></i>
          <p>Congés</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/autorisations" class="nav-link">
          <i class="nav-icon fas fa-file-signature"></i>
          <p>Autorisations</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/calendar/index" class="nav-link">
          <i class="nav-icon fas fa-calendar"></i>
          <p>Calendrier</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/holidays/index" class="nav-link">
          <i class="nav-icon fas fa-umbrella-beach"></i>
          <p>Vacances</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/staines" class="nav-link">
          <i class="nav-icon fas fa-tasks"></i>
          <p>Tâches</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/factures" class="nav-link">
          <i class="nav-icon fas fa-file-invoice"></i>
          <p>Factures</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/atts" class="nav-link">
          <i class="nav-icon fas fa-file-alt"></i>
          <p>Attestations</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/manageattendance" class="nav-link">
          <i class="nav-icon fas fa-user-check"></i>
          <p>Présences</p>
        </a>
      </li>

    @else
      <li class="nav-item">
        <a href="/profile" class="nav-link">
          <i class="nav-icon fas fa-user"></i>
          <p>Profil</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/reservations" class="nav-link">
          <i class="nav-icon fas fa-calendar-check"></i>
          <p>Mes Réservations</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/conges" class="nav-link">
          <i class="nav-icon fas fa-plane-departure"></i>
          <p>Mes Congés</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/autorisations" class="nav-link">
          <i class="nav-icon fas fa-file-signature"></i>
          <p>Mes Autorisations</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/myattendance" class="nav-link">
          <i class="nav-icon fas fa-user-check"></i>
          <p>Mes Présences</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/holidays/index" class="nav-link">
          <i class="nav-icon fas fa-umbrella-beach"></i>
          <p>Vacances</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/staines" class="nav-link">
          <i class="nav-icon fas fa-tasks"></i>
          <p>Mes Tâches</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/factures" class="nav-link">
          <i class="nav-icon fas fa-file-invoice"></i>
          <p>Mes Factures</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="/atts" class="nav-link">
          <i class="nav-icon fas fa-file-alt"></i>
          <p>Mes Attestations</p>
        </a>
      </li>
    @endif

  </ul>
</nav>
