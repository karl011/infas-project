@can('admin')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Acteurs et droits</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-success py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('operateurs.index') }}">Operateurs</a>
                <a class="collapse-item" href="{{ route('fonctions.index') }}">Fonctions</a>
                <a class="collapse-item" href="{{ route('assignations.index') }}">Assignations</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true"
            aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Paramètres</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-success py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('exercices.index') }}">Exercices</a>
                <a class="collapse-item" href="{{ route('antennes.index') }}">Antennes</a>
                <a class="collapse-item" href="{{ route('formations.index') }}">Formations</a>
                <a class="collapse-item" href="{{ route('sections.index') }}">Sections</a>
                <a class="collapse-item" href="{{ route('filieres.index') }}">Filières</a>
                <a class="collapse-item" href="{{ route('types.index') }}">Les types</a>
                <a class="collapse-item" href="{{ route('banques.index') }}">Banques</a>
            </div>
        </div>
    </li>
@endcan
<!-- Debut de la secction de lobservateur -->
@can('observateur')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseObservateur"
            aria-expanded="true" aria-controls="collapseObservateur">
            <i class="fas fa-fw fa-cog"></i>
            <span>Les statistiques</span>
        </a>
        <div id="collapseObservateur" class="collapse" aria-labelledby="headingObservateur"
            data-parent="#accordionSidebar">
            <div class="bg-success py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('stats.index') }}">Statistiques finales</a>
            </div>
        </div>
    </li>
@endcan
<!-- Fin observateur -->
@can('agent-saisie')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEtudiants" aria-expanded="true"
            aria-controls="collapseEtudiants">
            <i class="fas fa-fw fa-user-graduate"></i>
            <span>Etudiants</span>
        </a>
        <div id="collapseEtudiants" class="collapse" aria-labelledby="headingEtudiants"
            data-parent="#accordionSidebar">
            <div class="bg-success py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('etudiants.create') }}">Nouvel Etudiant</a>
                <a class="collapse-item" href="{{ route('etudiants.index') }}">Liste Etudiants</a>
                <a class="collapse-item" href="{{ route('students.create') }}">Importer</a>
            </div>
        </div>
    </li>
@endcan

@canany(['agent-saisie', 'chef-comptable', 'agent-comptable'])
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInscriptions"
            aria-expanded="true" aria-controls="collapseInscriptions">
            <i class="fas fa-fw fa-user-plus"></i>
            <span>Inscriptions</span>
        </a>
        <div id="collapseInscriptions" class="collapse" aria-labelledby="headingInscriptions"
            data-parent="#accordionSidebar">
            <div class="bg-success py-2 collapse-inner rounded">
                @can('agent-saisie')
                    <a class="collapse-item" href="{{ route('inscriptions.create') }}">Nouvelle Inscription</a>
                    <a class="collapse-item" href="{{ route('inscriptions.index') }}">Etudiants Inscrit</a>
                    <a class="collapse-item" href="{{ route('stats.consultation') }}">Les statuts des étudiants</a>
                    <a class="collapse-item" href="{{ route('inscriptions.situation') }}">Etats de Synthèse</a>
                @endcan
                @canany(['chef-comptable', 'agent-comptable'])
                    <a class="collapse-item" href="{{ route('inscriptions.validation') }}">Inscriptions</a>
                @endcanany
                @can('agent-comptable')
                    <a class="collapse-item" href="{{ route('inscriptions.situation') }}">Etats de Synthèse</a>
                @endcan
            </div>
        </div>
    </li>
@endcanany
<!-- Bourses -->
@canany(['chef-comptable', 'agent-comptable'])
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBourses" aria-expanded="true"
            aria-controls="collapseBourses">
            <i class="fas fa-fw fa-user-plus"></i>
            <span>Bourses</span>
        </a>
        <div id="collapseBourses" class="collapse" aria-labelledby="headingBourses" data-parent="#accordionSidebar">
            <div class="bg-success py-2 collapse-inner rounded">
                @canany(['chef-comptable', 'agent-comptable'])
                    <a class="collapse-item" href="{{ route('bourses.validation') }}">Bourses</a>
                @endcanany
                @can('agent-comptable')
                    {{-- <a class="collapse-item" href="{{ route('bourses.situation') }}">Etats de Synthèse</a> --}}
                @endcan
            </div>
        </div>
    </li>
@endcanany
<!-- Fin de bourses -->

<!-- RECOUVREMENTS -->
@canany(['chef-comptable', 'agent-comptable'])
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRecouvrements"
            aria-expanded="true" aria-controls="collapseRecouvrements">
            <i class="fas fa-fw fa-user-plus"></i>
            <span>Recettes</span>
        </a>
        <div id="collapseRecouvrements" class="collapse" aria-labelledby="headingRecouvrements"
            data-parent="#accordionSidebar">
            <div class="bg-success py-2 collapse-inner rounded">
                @canany(['chef-comptable', 'agent-comptable'])
                    <a class="collapse-item" href="{{ route('recouvrements.validation') }}">Recouvrements</a>
                    <a class="collapse-item" href="{{ route('scolarites.validation') }}">Scolarités</a>
                @endcanany
                @can('agent-comptable')
                    {{-- <a class="collapse-item" href="{{ route('recouvrements.situation') }}">Etats de Synthèse</a> --}}
                @endcan
            </div>
        </div>
    </li>
@endcanany
<!-- Fin de RECOUVREMENTS -->

<!-- REGLEMENTS -->
@canany(['chef-comptable', 'agent-comptable'])
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReglements" aria-expanded="true"
            aria-controls="collapseReglements">
            <i class="fas fa-fw fa-user-plus"></i>
            <span>Dépenses</span>
        </a>
        <div id="collapseReglements" class="collapse" aria-labelledby="headingReglements"
            data-parent="#accordionSidebar">
            <div class="bg-success py-2 collapse-inner rounded">
                @canany(['chef-comptable', 'agent-comptable'])
                    <a class="collapse-item" href="{{ route('reglements.validation') }}">Reglements</a>
                @endcanany
                @can('agent-comptable')
                    {{-- <a class="collapse-item" href="{{ route('reglements.situation') }}">Etats de Synthèse</a> --}}
                @endcan
            </div>
        </div>
    </li>
@endcanany
<!-- Fin de REGLEMENTS -->
<!-- La section de saisie de scolarité uniquement que lagent de saisie de la scolarité -->
@can('agent-saisie')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseScolarites" aria-expanded="true"
            aria-controls="collapseScolarites">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Scolarité</span>
        </a>
        <div id="collapseScolarites" class="collapse" aria-labelledby="headingScolarites"
            data-parent="#accordionSidebar">
            <div class="bg-success py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('scolarites.index') }}">Scolarités</a>
            </div>
        </div>
    </li>
@endcan
<!-- Fin de la section -->

<!--  Lasection de siaie de vacations uniquement que par lagent de saisie -->
@can('agent-saisie')
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVacataires" aria-expanded="true"
            aria-controls="collapseVacataires">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Vacataires</span>
        </a>
        <div id="collapseVacataires" class="collapse" aria-labelledby="headingVacataires"
            data-parent="#accordionSidebar">
            <div class="bg-success py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('vacataires.create') }}">Nouveau Vacataire</a>
                <a class="collapse-item" href="{{ route('vacataires.index') }}">Liste des Vacataires</a>
            </div>
        </div>
    </li>
@endcan
<!-- Fin de la section -->


@canany(['agent-saisie', 'chef-comptable', 'agent-comptable'])
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVacations" aria-expanded="true"
            aria-controls="collapseVacations">
            <i class="fas fa-money-bill"></i>
            <span>Vacations</span>
        </a>
        <div id="collapseVacations" class="collapse" aria-labelledby="headingVacations"
            data-parent="#accordionSidebar">
            <div class="bg-success py-2 collapse-inner rounded">
                @can('agent-saisie')
                    <a class="collapse-item" href="{{ route('vacations.create') }}">Nouvelle Vacation</a>
                    <a class="collapse-item" href="{{ route('vacations.index') }}">Vacations réalisées</a>
                @endcan
                @canany(['chef-comptable', 'agent-comptable'])
                    <a class="collapse-item" href="{{ route('vacations.validation') }}">Vacations</a>
                @endcanany
                @can('agent-comptable')
                    {{-- <a class="collapse-item" href="route('vacations.validation')">Etats de Synthèse</a> --}}
                @endcan
            </div>
        </div>
    </li>
@endcanany

<!-- Les données vues par tous les utilisateurs de la plate-forme -->
@canany(['agent-saisie'])
    <!-- Nav Item - Dépenses Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDepenses" aria-expanded="true"
            aria-controls="collapseDepenses">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Recettes</span>
        </a>
        <div id="collapseDepenses" class="collapse" aria-labelledby="headingDepenses" data-parent="#accordionSidebar">
            <div class="bg-success py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('recouvrements.create') }}">Recouvrements</a>
                <a class="collapse-item" href="{{ route('recouvrements.index') }}">Liste des recouvrements</a>
                <a class="collapse-item" href="{{ route('recologs.index') }}">Recolog</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Recettes Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRecettes" aria-expanded="true"
            aria-controls="collapseRecettes">
            <i class="fas fa-fw fa-dollar-sign"></i>
            <span>Dépenses</span>
        </a>
        <div id="collapseRecettes" class="collapse" aria-labelledby="headingRecettes" data-parent="#accordionSidebar">
            <div class="bg-success py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('bourses.index') }}">Bourses </a>
                <a class="collapse-item" href="{{ route('reglements.create') }}">Règlements</a>
                <a class="collapse-item" href="{{ route('reglements.index') }}">Liste des règlements</a>
                <a class="collapse-item" href="{{ route('reglelogs.index') }}">Reglelog</a>
                <a class="collapse-item" href="{{ route('fournisseurs.create') }}">Fournisseur</a>
                <a class="collapse-item" href="{{ route('fournisseurs.index') }}">Liste de fournisseur</a>
            </div>
        </div>
    </li>
@endcanany


<!-- Les nouvelles tables -->

@canany(['agent-saisie', 'chef-comptable', 'agent-comptable'])
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBordereaux"
            aria-expanded="true" aria-controls="collapseBordereaux">
            <i class="fas fa-money-bill"></i>
            <span>Bordéreaux</span>
        </a>
        <div id="collapseBordereaux" class="collapse" aria-labelledby="headingBordereaux"
            data-parent="#accordionSidebar">
            <div class="bg-success py-2 collapse-inner rounded">
                @can('agent-saisie')
                    <a class="collapse-item" href="{{ route('bordereaux.create') }}">Nouveau bordéreau</a>
                    <a class="collapse-item" href="{{ route('bordereaux.index') }}">Liste des bordréreaux</a>
                @endcan
                @canany(['chef-comptable', 'agent-comptable'])
                    <a class="collapse-item" href="{{ route('bordereaux.validation') }}">Validation de bordereaux</a>
                @endcanany
                @can('agent-comptable')
                    {{-- <a class="collapse-item" href="{{ route('bordereaux.validation') }}">Etats de Synthèse bordéreau</a> --}}
                @endcan
            </div>
        </div>
    </li>
@endcanany

@canany(['agent-saisie', 'chef-comptable', 'agent-comptable'])
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRec" aria-expanded="true"
            aria-controls="collapseRec">
            <i class="fas fa-money-bill"></i>
            <span>Recettes propores</span>
        </a>
        <div id="collapseRec" class="collapse" aria-labelledby="headingRec" data-parent="#accordionSidebar">
            <div class="bg-success py-2 collapse-inner rounded">
                @can('agent-saisie')
                    <a class="collapse-item" href="{{ route('recettes.create') }}">Nouvelle recette</a>
                    <a class="collapse-item" href="{{ route('recettes.index') }}">Liste des recettes</a>
                    <a class="collapse-item" href="{{ route('detailrecettes.index') }}">Liste des DREC</a>
                @endcan
                @canany(['chef-comptable', 'agent-comptable'])
                    <a class="collapse-item" href="{{ route('recettes.validation') }}">Validation de recette</a>
                @endcanany
                @can('agent-comptable')
                    {{-- <a class="collapse-item" href="{{ route('recettes.validation') }}">Etats de Synthèse recette</a> --}}
                @endcan
            </div>
        </div>
    </li>
@endcanany

@canany(['agent-saisie', 'chef-comptable', 'agent-comptable'])
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePaiements" aria-expanded="true"
            aria-controls="collapsePaiements">
            <i class="fas fa-money-bill"></i>
            <span>Paiements</span>
        </a>
        <div id="collapsePaiements" class="collapse" aria-labelledby="headingPaiements"
            data-parent="#accordionSidebar">
            <div class="bg-success py-2 collapse-inner rounded">
                @can('agent-saisie')
                    <a class="collapse-item" href="{{ route('paiements.create') }}">Nouveau paiement</a>
                    <a class="collapse-item" href="{{ route('paiements.index') }}">Liste des paiements</a>
                    <a class="collapse-item" href="{{ route('detailops.index') }}">Liste détails des OP</a>
                    <a class="collapse-item" href="{{ route('etubanques.create') }}">Affectation E-B</a>
                @endcan
                @canany(['chef-comptable', 'agent-comptable'])
                    <a class="collapse-item" href="{{ route('paiements.validation') }}">Validation de paiement</a>
                @endcanany
                @can('agent-comptable')
                    {{-- <a class="collapse-item" href="{{ route('paiements.validation') }}">Etats de Synthèse paiement</a> --}}
                @endcan
            </div>
        </div>
    </li>
@endcanany
