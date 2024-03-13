<?php

require '../config/autoload.php';
require '../config/varDump.php';

if (
    isset($_POST['csrf-volunteers-form']) && $_POST['csrf-volunteers-form'] === $_SESSION['csrf-volunteers-form']
) {
    if (
        isset(
            $_POST["firstName"],
            $_POST["lastName"],
            $_POST["age"],
            $_POST["sex"],
            $_POST["phone"],
            $_POST["email"],
            $_POST["region"],
            $_POST["dateAvailability"],
            $_POST["hourAvailability"],
            $_POST["privilegedWork"],
            $_POST["freeExpression"]
        )
        && !empty($_POST["firstName"])
        && !empty($_POST["lastName"])
        && !empty($_POST["age"])
        && !empty($_POST["sex"])
        && !empty($_POST["phone"])
        && !empty($_POST["email"])
        && !empty($_POST["region"])
        && !empty($_POST["dateAvailability"])
        && !empty($_POST["hourAvailability"])
        && !empty($_POST["privilegedWork"])
        && !empty($_POST["freeExpression"])
        ) {

            $firstName = htmlspecialchars($_POST["firstName"]);
            $lastName = htmlspecialchars($_POST["lastName"]);
            $age = htmlspecialchars($_POST["age"]);
            $sex = htmlspecialchars($_POST["sex"]);
            $phone = htmlspecialchars($_POST["phone"]);
            $email = htmlspecialchars($_POST["email"]);
            $region = htmlspecialchars($_POST["region"]);
            $dateAvailability = htmlspecialchars($_POST["dateAvailability"]);
            $hourAvailability = htmlspecialchars($_POST["hourAvailability"]);
            $privilegiedWork = htmlspecialchars($_POST["privilegedWork"]);
            $freeExpression = htmlspecialchars($_POST["freeExpression"]);

            $arrayData = [];

            if (strlen($firstName) < 3 || strlen($firstName) > 30) {
                header("Location: ../../frontend/pages/inscription.php");
                exit;
            } else {
                $arrayData[] = $firstName;
            }

            if (strlen($lastName) < 3 || strlen($lastName) > 30) {
                header("Location: ../../frontend/pages/inscription.php");
                exit;
            } else {
                $arrayData[] = $lastName;
            }

            if (
                strlen($age) < 1 ||
                strlen($age) > 2 ||
                $age < 18 ||
                $age > 45
              ) {
                header("Location: ../../frontend/pages/inscription.php");
                exit;
              } else {
                $arrayData[] = $age;
              }

            if (
                $sex == "femme" ||
                $sex == "homme" ||
                $sex == "secret"
              ) {
                $arrayData[] = $sex;
              } else {
                header("Location: ../../frontend/pages/inscription.php");
                exit;
              }

              if (strlen($phone) === 10) {
                  $arrayData[] = $phone;
              } else {
                header("Location: ../../frontend/pages/inscription.php");
                exit;
              }

              if (strlen($email) < 5 || strlen($email) > 256) {
                header("Location: ../../frontend/pages/inscription.php");
                exit;
            } else {
                $arrayData[] = $email;
            }

            if (
                $region == "Auvergne-Rhone-Alpes" ||
                $region == "Bourgogne-Franche-Comte" ||
                $region == "Bretagne" ||
                $region == "Centre-Val de Loire" ||
                $region == "Corse" ||
                $region == "Grand Est" ||
                $region == "Hauts-de-France" ||
                $region == "Ile-de-France" ||
                $region == "Normandie" ||
                $region == "Nouvelle-Aquitaine" ||
                $region == "Occitanie" ||
                $region == "Pays de la Loire" ||
                $region == "Provence-Alpes-Cote d Azur"
              ) {
                $arrayData[] = $region;
              } else {
                header("Location: ../../frontend/pages/inscription.php");
                exit;
              }

              if ($dateAvailability == "semaine" 
                || $dateAvailability == "weekEnd") {
                    $arrayData[] = $dateAvailability;
            } else {
              header("Location: ../../frontend/pages/inscription.php");
                exit;
            }

            if (
                $hourAvailability == "matin" ||
                $hourAvailability == "apresMidi" ||
                $hourAvailability == "soir" ||
                $hourAvailability == "nuit"
              ) {
                $arrayData[] = $hourAvailability;
              } else {
                header("Location: ../../frontend/pages/inscription.php");
                exit;
              }

              if (
                $privilegiedWork == "securite" ||
                $privilegiedWork == "bar" ||
                $privilegiedWork == "technique" ||
                $privilegiedWork == "animation"
              ) {
                $arrayData[] = $privilegiedWork;
              } else {
                header("Location: ../../frontend/pages/inscription.php");
                exit;
              }

              if (strlen($freeExpression) < 30 || strlen($freeExpression) > 500) {
                header("Location: ../../frontend/pages/inscription.php");
                exit;
            } else {
                $arrayData[] = $freeExpression;
                $registerDate = date("d/m/y");
                $userCode = bin2hex(random_bytes(4));
                $arrayData[] = $registerDate;
                $arrayData[] = $userCode;
                $newUser = new Database('../database/users.csv');
                $newUser->writeUsers($arrayData);
                

                header('Location: ../../frontend/pages/registerSuccess.php?usercode=' . $userCode);
            }
         } else {
        echo "pas bon";
    }
} else {
    $_SESSION['csrf-volunteers-form'] = bin2hex(random_bytes(32));
    header("Location: ../../frontend/pages/404.php");
    exit();
}