<?php
/*
Template Name: Formulaire de contact
*/

// S'il y des donn�es de post�es
if ($_SERVER['REQUEST_METHOD']=='POST') {
    // Code PHP pour traiter l'envoi de l'email

    $nombreErreur = 0; // Variable qui compte le nombre d'erreur
    // D�finit toutes les erreurs possibles
    if (!isset($_POST['email'])) { // Si la variable "email" du formulaire n'existe pas (il y a un probl�me)
        $nombreErreur++; // On incr�mente la variable qui compte les erreurs
        $erreur1 = '<p>Il y a un probl�me avec la variable "email".</p>';
    } else { // Sinon, cela signifie que la variable existe (c'est normal)
        if (empty($_POST['email'])) { // Si la variable est vide
            $nombreErreur++; // On incr�mente la variable qui compte les erreurs
            $erreur2 = '<p>Vous avez oubli� de donner votre email.</p>';
        } else {
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $nombreErreur++; // On incr�mente la variable qui compte les erreurs
                $erreur3 = '<p>Cet email ne ressemble pas un email.</p>';
            }
        }
    }

    if (!isset($_POST['message'])) {
        $nombreErreur++;
        $erreur4 = '<p>Il y a un probl�me avec la variable "message".</p>';
    } else {
        if (empty($_POST['message'])) {
            $nombreErreur++;
            $erreur5 = '<p>Vous avez oubli� de donner un message.</p>';
        }
    }    // (3) Ici, il sera possible d'ajouter plus tard un code pour v�rifier un captcha anti-spam.

    if ($nombreErreur==0) { // S'il n'y a pas d'erreur
        // (1) Code PHP pour traiter l'envoi de l'email

        // R�cup�ration des variables et s�curisation des donn�es
        $nom = htmlentities($_POST['nom']); // htmlentities() convertit des caract�res "sp�ciaux" en �quivalent HTML
        $email = htmlentities($_POST['email']);
        $message = htmlentities($_POST['message']);

        // Variables concernant l'emails
        $destinataire = 'heridelkarl.lespellesusees@gmail.com'; // Adresse email du webmaster (� personnaliser)
        $sujet = 'Vous avez re�u un message depuis votre site lespellesusees.fr'; // Titre de l'email
        $contenu = '<html><head><title>Message depuis lespellesusees.fr</title></head><body>';
        $contenu .= '<span>Bonjour, vous avez re�u un message depuis lespellesusees.fr</span>';
        $contenu .= '</br><span><strong>Nom</strong>: ' . $nom . '</span>';
        $contenu .= '</br><span><strong>Email</strong>: ' . $email . '</span>';
        $contenu .= '</br><span><strong>Message</strong>: ' . $message . '</span>';
        $contenu .= '</br></body></html>'; // Contenu du message de l'email (en XHTML)

        // Pour envoyer un email HTML, l'en-t�te Content-type doit �tre d�fini
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Envoyer l'email
        mail($destinataire, $sujet, $contenu, $headers); // Fonction principale qui envoi l'email
        echo '<h2>Votre message a bien &eacute;t&eacute; envoy&eacute;!</h2>'; // Afficher un message pour indiquer que le message a �t� envoy�
        // (2) Fin du code pour traiter l'envoi de l'email

    } else { // S'il y a un moins une erreur
        echo '<div style="border:1px solid #ff0000; padding:5px;">';
        echo '<p style="color:#ff0000;">D�sol�, il y a eu ' . $nombreErreur . ' erreur(s). Voici le d�tail des erreurs:</p>';
        if (isset($erreur1)) echo '<p>' . $erreur1 . '</p>';
        if (isset($erreur2)) echo '<p>' . $erreur2 . '</p>';
        if (isset($erreur3)) echo '<p>' . $erreur3 . '</p>';
        if (isset($erreur4)) echo '<p>' . $erreur4 . '</p>';
        if (isset($erreur5)) echo '<p>' . $erreur5 . '</p>';
        // (4) Ici, il sera possible d'ajouter un code d'erreur suppl�mentaire si un captcha anti-spam est erron�.
        echo '</div>';
    }
}

?>