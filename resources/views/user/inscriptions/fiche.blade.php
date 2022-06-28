<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fiche d'inscription</title>
    <style>
        #entourage {
            border: 1px dashed;
            padding: 40px;
        }

        img {
            width:10%;
            height:10%;
        }
        #bloc-2 {
            /* border: 1px solid; */
            border-collapse: collapse;
            width: 100%;
            display: inline-block;
            padding-left: 15px;
            padding-top: 15px;
        }
        #bloc-2 p {
            flex-direction: column;
            margin-left: 65%;
        }
        h3{
            text-justify: auto;
            text-align: center;
            text-decoration: underline;

        }
        #donnees{
            font-size: 1.2em;
        }
        /* #centrer{
            padding-block-start: 25px;
            padding-left: 45px;
        } */
        div#avatar {
        background-image: url(avatar-p.png);
        background-repeat: no-repeat;
        width:10%;
        height:10%;
        padding: 0;
        }
    </style>
</head>

<body>
    <div id="entourage">
        <div>
            <h3>Reçu d'inscription de l'année académique 2021-2022</h3>
        </div>
        <div class="row">
            <div>
                <div id="bloc-2">
                    <div>
                        <img src="/images/logo-INFAS.png" alt="Logo infas"  id="avatar">
                    </div>
                    <div>
                        <p>République de Côte d'Ivoire</p>
                        <p>Année académique 2021-2022</p>
                    </div>
                </div>
            </div>
            <hr>
            <div id="centrer">
                <div id="donnees">
                    @foreach ($inscriptions as $inscription)
                        <p>MATRICULE : <span>{{ $inscription->etudiant->matricule_etd }}</span></p>
                        <p>NOM : <span style="text-transform: uppercase">{{ $inscription->etudiant->nom }}</span></p>
                        <p>PRENOMS : <span style="text-transform: uppercase">{{ $inscription->etudiant->prenoms }}</span></p>
                        <p>CONTACT : <span>{{ $inscription->etudiant->phone }}</span></p>
                        <p>FILIERE : <span>{{ $inscription->filiere->fil_lib }}</span></p>
                        <p>NIVEAU D'ETUDE : <span>{{ $inscription->niveau_etud }}</span></p>
                        <p>MONTANT D'INSCRIPTION : <span>{{ $inscription->mont_insc }}</span></p>
                        <p>MONTANT DE SCOLARITE : <span>{{ $inscription->mont_scol }}</span></p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>
</html>
