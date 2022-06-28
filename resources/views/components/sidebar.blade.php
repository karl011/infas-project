<!--
    Ce fichier rédigé permet d'avoir une vue générale sur le tableau de bord et ses éléments constitutifs y
    compris la page d'affichage des données enregistrées et qui sont récupérées depuis celle-ci.
-->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-start bg-danger" href="{{ route('home') }}">
        <!--<div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>-->
        <div class="sidebar-brand-text">INFAS-COMPTA <sub>v1.0.1</sub></div>
    </a>
    <br>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tableau de bord</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface et outillage
    </div>
    <!-- La balise x-menu inclus les éléments de la liste du tableau de bord.-->
    <x-menu />

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="{{ asset('img/infas_logo.png') }}" alt="Logo INFAS">
        <p class="text-center mb-2"><strong>INFAS</strong> est une application de gestion budgetaire mise à la disposition de l'INFAS...</p>
        <a class="btn btn-success btn-sm" href="https://infas.ci/">Visitez le site</a>
    </div>
</ul>