<aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered bg-white  ">
    <div class="navbar-vertical-container">
      <div class="navbar-vertical-footer-offset">
        <!-- Logo -->

        <a class="navbar-brand" href="#" aria-label="test">
          <img class="navbar-brand-logo" src="assets/img/logo/lg.png" alt="Logo" data-hs-theme-appearance="default">
          <img class="navbar-brand-logo" src="assets/img/logo/lg.png" alt="Logo" data-hs-theme-appearance="dark">
          <img class="navbar-brand-logo-mini" src="assets/img/logo/lg.png" alt="Logo" data-hs-theme-appearance="default">
          <img class="navbar-brand-logo-mini" src="assets/img/logo/lg.png" alt="Logo" data-hs-theme-appearance="dark">
        </a>

        <!-- End Logo -->

        <!-- Navbar Vertical Toggle -->
        <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-aside-toggler">
          <i class="bi-arrow-bar-left navbar-toggler-short-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Collapse"></i>
          <i class="bi-arrow-bar-right navbar-toggler-full-align" data-bs-template='<div class="tooltip d-none d-md-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' data-bs-toggle="tooltip" data-bs-placement="right" title="Expand"></i>
        </button>

        <!-- End Navbar Vertical Toggle -->

        <!-- Content -->
        <div class="navbar-vertical-content">
          <div id="navbarVerticalMenu" class="nav nav-pills nav-vertical card-navbar-nav">
            <!-- Collapse -->
            <div class="nav-item">
              <a class="nav-link" href="dashboard">
                <i class="bi-house-door nav-icon"></i>
                <span class="nav-link-title">Dashboard</span>
              </a>


            </div>
            <!-- End Collapse -->

            <span class="dropdown-header mt-4">Patients</span>
            <small class="bi-three-dots nav-subtitle-replacer"></small>

            <!-- Collapse -->
            <div class="navbar-nav nav-compact">

            </div>
            <div id="navbarVerticalMenuPagesMenu">
              <!-- Collapse -->
              <div class="nav-item">
                <a class="nav-link dropdown-toggle " href="#navbarVerticalMenuPagesUsersMenu" role="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalMenuPagesUsersMenu" aria-expanded="false" aria-controls="navbarVerticalMenuPagesUsersMenu">
                  <i class="bi-people nav-icon"></i>
                  <span class="nav-link-title">Patients</span>
                </a>

                <div id="navbarVerticalMenuPagesUsersMenu" class="nav-collapse collapse " data-bs-parent="#navbarVerticalMenuPagesMenu">
                  <a class="nav-link " href="patients">Nos patients</a>
                  <a class="nav-link " href="#">Abonnees</a>
                  <a class="nav-link " href="#">Non Abonnees</a>
                </div>
                
              </div>
              <div class="nav-item">
                <a class="nav-link dropdown-toggle " href="#navbarRec" role="button" data-bs-toggle="collapse" data-bs-target="#navbarRec" aria-expanded="false" aria-controls="navbarVerticalMenuPagesUsersMenu">
                  <i class="bi-book nav-icon"></i>
                  <span class="nav-link-title">Triage</span>
                </a>

                <div id="navbarRec" class="nav-collapse collapse " data-bs-parent="#navbarRec">
                  <a class="nav-link " href="triage">Nouveau</a>
                  <a class="nav-link " href="rapport_triage">Rapport</a>
                  <a class="nav-link " href="plaintes">Plaintes</a>
                  
                </div>
                
              </div>
              <div class="nav-item">
                <a class="nav-link dropdown-toggle " href="#navbarCons" role="button" data-bs-toggle="collapse" data-bs-target="#navbarCons" aria-expanded="false" aria-controls="navbarVerticalMenuPagesUsersMenu">
                  <i class="bi-stickies nav-icon"></i>
                  <span class="nav-link-title">Consultation</span>
                </a>

                <div id="navbarCons" class="nav-collapse collapse " data-bs-parent="#navbarCons">
                  <a class="nav-link " href="consultations">Nouvelle</a>
                  <a class="nav-link " href="resultat">Resultat</a>
                  <a class="nav-link " href="rapport_consult">Rapport</a>
                  
                  
                </div>
                
              </div>
              <div class="nav-item">
                <a class="nav-link dropdown-toggle " href="#navbarLab" role="button" data-bs-toggle="collapse" data-bs-target="#navbarLab" aria-expanded="false" aria-controls="navbarVerticalMenuPagesUsersMenu">
                  <i class="bi-book nav-icon"></i>
                  <span class="nav-link-title">Laboratoire</span>
                </a>

                <div id="navbarLab" class="nav-collapse collapse " data-bs-parent="#navbarLab">
                  <a class="nav-link " href="labos">Nouveau cas</a>
                  <a class="nav-link " href="rapport_labo">Rapport</a>
                  <a class="nav-link " href="examen_labo">Liste des examens</a>
                  
                  
                </div>
                
              </div>
              <div class="nav-item">
                <a class="nav-link dropdown-toggle " href="#navbarP" role="button" data-bs-toggle="collapse" data-bs-target="#navbarP" aria-expanded="false" aria-controls="navbarVerticalMenuPagesUsersMenu">
                  <i class="bi-book nav-icon"></i>
                  <span class="nav-link-title">Pharmacie</span>
                </a>

                <div id="navbarP" class="nav-collapse collapse " data-bs-parent="#navbarP">
                <a class="nav-link " href="ordonnance">Ordonnances</a>
                  <a class="nav-link " href="medicament">Medicaments</a>
                  
                  
                  
                </div>
                
              </div>
              <div class="nav-item">
                <a class="nav-link dropdown-toggle " href="#navbarFin" role="button" data-bs-toggle="collapse" data-bs-target="#navbarFin" aria-expanded="false" aria-controls="navbarVerticalMenuPagesUsersMenu">
                  <i class="bi-cash nav-icon"></i>
                  <span class="nav-link-title">Finances</span>
                </a>

                <div id="navbarFin" class="nav-collapse collapse" data-bs-parent="#navbarFin">
                <a class="nav-link " href="facturation">Facturation</a>
                  <a class="nav-link " href="medicament">Rapports</a>
                  
                  
                  
                </div>
                
              </div>
              <div class="nav-item">
                <a class="nav-link dropdown-toggle " href="#navbarRh" role="button" data-bs-toggle="collapse" data-bs-target="#navbarRh" aria-expanded="false" aria-controls="navbarVerticalMenuPagesUsersMenu">
                  <i class="bi-person nav-icon"></i>
                  <span class="nav-link-title">RH</span>
                </a>

                <div id="navbarRh" class="nav-collapse collapse" data-bs-parent="#navbarRh">
                <a class="nav-link " href="personnel">Personnels</a>
                  <a class="nav-link " href="access">Access</a>
                  <a class="nav-link " href="departement">Departement</a>
                  
                  
                  
                </div>
                
              </div>
              <!-- End Collapse -->



            </div>
            <!-- End Collapse -->




          </div>

        </div>
        <!-- End Content -->

        <!-- Footer -->
        <div class="navbar-vertical-footer">
          <ul class="navbar-vertical-footer-list">
            <li class="navbar-vertical-footer-list-item">
              <!-- Style Switcher -->
              <div class="dropdown dropup">
                <button type="button" class="btn btn-ghost-secondary btn-icon rounded-circle" id="selectThemeDropdown" data-bs-toggle="dropdown" aria-expanded="false" data-bs-dropdown-animation>

                </button>

                <div class="dropdown-menu navbar-dropdown-menu navbar-dropdown-menu-borderless" aria-labelledby="selectThemeDropdown">
                  <a class="dropdown-item" href="#" data-icon="bi-moon-stars" data-value="auto">
                    <i class="bi-moon-stars me-2"></i>
                    <span class="text-truncate" title="Auto (system default)">Auto (system default)</span>
                  </a>
                  <a class="dropdown-item" href="#" data-icon="bi-brightness-high" data-value="default">
                    <i class="bi-brightness-high me-2"></i>
                    <span class="text-truncate" title="Default (light mode)">Default (light mode)</span>
                  </a>
                  <a class="dropdown-item active" href="#" data-icon="bi-moon" data-value="dark">
                    <i class="bi-moon me-2"></i>
                    <span class="text-truncate" title="Dark">Dark</span>
                  </a>
                </div>
              </div>

              <!-- End Style Switcher -->
            </li>

            
           
          </ul>
        </div>
        <!-- End Footer -->
      </div>
    </div>
  </aside>