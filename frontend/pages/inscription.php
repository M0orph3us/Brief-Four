<?php
session_start();
require '../../backend/csrf-token/csrfRegister.php';
require './includes/header.php';
$csrfRegister = csrfVolunteersForm();
?>
<main>
    <h1>Formulaire d'inscription</h1>
    <div class="titleUnderline"></div>
    <div class="containerFormCompletionIndicator">
        <div class="formCompletionIndicator1"></div>
        <div class="formCompletionIndicator2"></div>
        <div class="formCompletionIndicator3"></div>
    </div>
    <div class="containerForm">
        <form class="registerForm" action="../../backend/controller/signUpVolunteers.php" method="post">

            <div class="formPart1">
                <h2>Informations personnelles</h2>
                <label for="firstName">Prénom</label>
                <input type="text" id="firstName" name="firstName" required>

                <label for="lastName">Nom</label>
                <input type="text" id="lastName" name="lastName" required>

                <label for="age">Nom</label>
                <input type="number" id="age" name="age" required>

                <label for="sex">Sexe</label>
                <select name="sex" id="sex" required>
                    <option value="femme">Femme</option>
                    <option value="homme">Homme</option>
                    <option value="secret">Secret</option>
                </select>

                <label for="tel">Téléphone</label>
                <input type="tel" id="tel" name="phone" required>

                <label for="email">Email</label>
                <input type="text" id="email" name="email" required>
            </div>

            <div class="formPart2">
                <h2>Disponibilités</h2>
                <label for="region">Région</label>
                <select name="region" id="region" required>
                    <option value="ar">Auvergne-Rhône-Alpes</option>
                    <option value="bf">Bourgogne-Franche-Comté</option>
                    <option value="br">Bretagne</option>
                    <option value="cv">Centre-Val de Loire</option>
                    <option value="cr">Corse</option>
                    <option value="ge">Grand Est</option>
                    <option value="hf">Hauts-de-France</option>
                    <option value="if">Île-de-France</option>
                    <option value="nm">Normandie</option>
                    <option value="na">Nouvelle-Aquitaine</option>
                    <option value="oc">Occitanie</option>
                    <option value="pl">Pays de la Loire</option>
                    <option value="pa">Provence-Alpes-Côte d'Azur</option>
                </select>

                <label for="dateAvailability">Disponibilité jour</label>
                <select name="dateAvailability" id="dateAvailability" required>
                    <option value="semaine">Semaine</option>
                    <option value="weekEnd">Week-end</option>
                </select>

                <label for="hourAvailability">Disponibilité horaire</label>
                <select name="hourAvailability" id="hourAvailability" required>
                    <option value="matin">Matin</option>
                    <option value="apresMidi">Après-midi</option>
                    <option value="soir">Soir</option>
                    <option value="nuit">Nuit</option>
                </select>

                <label for="privilegedWork">Poste privilégié</label>
                <select name="privilegedWork" id="privilegedWork">
                    <option value="securite">Sécurité</option>
                    <option value="bar">Bar</option>
                    <option value="technique">Technique</option>
                    <option value="animation">Animation</option>
                </select>
            </div>

            <div class="formPart3">
                <h2>Expression libre</h2>
                <label for="freeExpression">Exprimez-vous</label>
                <input type="textarea" id="freeExpression" name="freeExpression" required>
            </div>
            <input type="submit" class="submit" value="Soumettre">
        </form>
    </div>
</main>
<?php
require './includes/footer.php';
