<?php
/**
 * Created by PhpStorm.
 * User: gez
 * Date: 28.09.2016
 * Time: 13:26
 */


/*
-----------------
Language: FRENCH
-----------------
*/

$lang = array();

$lang['WELCOME_TITLE'] = 'Bienvenue';

/* #################### inscription ####################  */
$lang['MANAGEINSCRIPTION_NO_PARTICIPANT'] = 'Il n\'y a pas les participants inscrits!';
$lang['MANAGEINSCRIPTION_NO_ACCS'] = 'Il n\'y a pas de comptes enregistrés!';

/* #################### showhike ####################  */
$lang['SHOWHIKE_AVAILABLE_PLACES_ERROR'] = 'Le nombre de participants possibles doit être plus grande que les abonnés déjà réservé!';
$lang['SHOWHIKE_ACCOUNT_ALREADY_INSCRIPTION'] = 'Vous devez à la visite elle-même participer!';
$lang['SHOWHIKE_ACCOUNT_ALREADY_RATED'] = 'Vous avez déjà écrit un commentaire!';
$lang['SHOWHIKE_ACCOUNT_ALREADY_INSCRIPTED'] = 'Vous ne pouvez pas être inscrire à plusieurs reprises pour un tour!';
$lang['SHOWHIKE_INSCRIPTION_NO_SPACE'] = 'Pas de parking disponible gratuitement!';
$lang['SHOWHIKE_INSCRIPTION_BOOKED_OUT'] = 'Ce circuit est complet!';
$lang['SHOWHIKE_INSCRIPTION_NO_SPACE_PART'] = 'Vous avez enregistré pour de nombreux participants - pas assez de places disponibles!';
$lang['SHOWHIKE_INSCRIPTION_CANCELED'] = 'La randonnée a été annulée!';

/* #################### mail confirmation ####################  */
/* confirm */
$lang['CONFIRMATION_MAIL_CLICK_LINK'] = 'CLIQUEZ ICI POUR VOTRE COMPTE POUR CONFIRMER!';
$lang['CONFIRMATION_MAIL_SUBJECT'] = 'Email de confirmation';
$lang['CONFIRMATION_MAIL_BODY'] = 'Appuyez sur pour activer ce lien à votre compte.';

/* #################### resetpw ####################  */
/* resetpw */
$lang['RESETPW_TITLE'] = 'Changez votre mot de passe';
$lang['RESETPW_ENTER'] = 'ECRIVEZ VOTRE MOT DE PASSE';
$lang['RESETPW_ENTER_CONFIRM'] = 'CONFIRMER VOTRE MOT DE PASSE';
$lang['RESETPW_ERROR'] = 'Les mots de passe ne correspondent pas!';
$lang['RESETPW_BUTTON_CHANGE'] = 'Changement mot de passe';
$lang['RESETPW_SUCCESS'] = 'Le mot de passe a été changé.';
$lang['RESETPW_FAILED'] = 'Les mots de passe ne correspondent pas!';
$lang['RESETPW_WEAK'] = 'Le nouveau mot de passe est trop faible! (Astuce: Utilisez 8 mots en les majuscules et les minuscules, un nombre et un caractère spécial)';

/* #################### contact ####################  */
/* contact */
$lang['CONTACT_SUBJECT'] = 'MESSAGE';
$lang['CONTACT_SENDMAIL_BUTTON'] = 'Envoyer';
$lang['CONTACT_OPENING_HOURS'] = 'Heures d\'ouverture';
$lang['CONTACT_OPENING_TIME'] = 'Lundi-Vendredi de 8h00 à 12h00 et de 14h00 à 17h00';
$lang['CONTACT_ASSOCIATION_NAME'] = 'Association Valaisanne de la Randonnée';
$lang['CONTACT_SUCCESSFUL'] = 'L\'enquête a été soumis avec succès.';
/* errors */
$lang['CONTACT_ERROR_CAPTCHA_ERROR'] = 'Le Captcha n\'a pas été sélectionné.';
$lang['CONTACT_ERROR_INPUTS'] = 'Il n\'y avait pas tous remplis obligatoirement!';


/* #################### forgotpw ####################  */
/* forgot pw page */
$lang['FORGOTPW_TAG'] = 'Vous avez oublié votre mot de passe?';
$lang['FORGOTPW_ENTER'] = 'Entrez votre adresse e-mail';
$lang['FORGOTPW_SEND'] = 'Envoyer';
$lang['FORGOTPW_EXISTS'] = 'Nous allons envoyer un courriel à l\'adresse indiquée.';
$lang['FORGOTPW_NOT_EXISTS'] = 'Cet e-mail n\'existe pas.';

/* mail */
$lang['FORGOTPW_MAIL_CLICK_LINK'] = 'CLIQUEZ ICI!';
$lang['FORGOTPW_MAIL_SUBJECT'] = 'Créer un nouveau mot de passe';
$lang['FORGOTPW_MAIL_BODY_P1'] = '
                                <html>
                                    <body>
                                        <p>
                                            Bonjour cher client
                                        </p>
                                        <p>
                                            Vous avez oublié votre mot de passe? Pas de problème!
                                        </p>
';

$lang['FORGOTPW_MAIL_BODY_P2'] = '
                                        <p>
                                            En cliquant sur le lien ci-dessus vous amène à votre compte, où vous pouvez entrer un nouveau mot de passe.
                                        </p>
                                        <p>
                                            Si d\'autres problèmes dans le processus se produisent, s\'il vous plaît contactez-nous, nous sommes là pour vous aider.
                                        </p>
                                        <br>
                                        <p>
                                            Salutations amicales
                                        </p>
                                        <p>
                                            Valrando<br>
                                            Association Valaisanne de la Randonnée<br>
                                            Pré-Fleuri 6<br>
                                            Case postale 23<br>
                                            CH - 1951 Sion
                                        </p>
                                    </body>
                                </html>
';
/* #################### header ####################  */
/* Menu */
$lang['MENU_NEWS'] = 'Nouvelles';
$lang['MENU_TOUR'] = 'Randonnée';
$lang['MENU_ABOUT'] = 'Nous';
$lang['MENU_CONTACT'] = 'Contact';
$lang['MENU_PROFIL'] = 'Mon profil';
$lang['MENU_INSCRIPTION'] = 'Mes inscriptions';
$lang['MENU_HIKEMGMT'] = 'Gestion tour';
$lang['MENU_ACCMGMT'] = 'Utilisateurs';
$lang['MENU_INSCRIPTIONMGMT']  = 'Inscriptions';

/* #################### footer ####################  */
$lang['FOOTER_FOLLOW'] = 'Suivez-nous';
$lang['FOOTER_EMAIL_UPDATES'] = 'Mises à jour';
$lang['FOOTER_CONTACT_US'] = 'Contactez nous';

/* #################### about us ####################  */
$lang['ABOUT_TAG'] = 'NOUS';
$lang['ABOUT_NAME'] = 'Nom:';
$lang['ABOUT_NAME_FULL'] = 'CAS est l’abréviation de Club Alpin Suisse';
$lang['ABOUT_FOUNDATION'] = 'Année de fondation:';
$lang['ABOUT_BASED'] = 'Siège central:';
$lang['ABOUT_BASED_SION'] = ' Sion';
$lang['ABOUT_UMBRELLA_GROUP'] = 'Association faîtière:';
$lang['ABOUT_CH_HIKS'] = 'Suisse Rando';
$lang['ABOUT_CERTIFICATION'] = 'Certification:';
$lang['ABOUT_OPERATIONS'] = 'Activités:';
$lang['ABOUT_OPERATIONS_DESC'] = 'Organisation de 50 randonnées guidées, Weekends et semaines de randonnée, randonnées en raquettes à neige Programme';
$lang['ABOUT_QUANTITY_MEMBERS'] = 'Nombre de membres:';
$lang['ABOUT_MEMBER_CONTRIBUTION'] = 'Cotisation:';
$lang['ABOUT_MEMBER_CONTRIBUTION_DESC'] = 'Individuel et famille CHF 50.- Sociétés collectives, communes et offices du tourisme CHF 100.- Formulaire d’adhésion';
$lang['ABOUT_MEMBER_ADVANTAGE'] = 'Avantages des membres:';
$lang['ABOUT_MEMBER_ADVANTAGE_1'] = 'Participation aux randonnées sans augmentation de prix (les non-membres paient CHF 5.- en plus)';
$lang['ABOUT_MEMBER_ADVANTAGE_2'] = 'Droit de participation aux séjours';
$lang['ABOUT_MEMBER_ADVANTAGE_3'] = 'Recevoir chaque année 1 cartothèque gratuite avec env. 50 propositions de randonnées.';
$lang['ABOUT_MEMBER_ADVANTAGE_4'] = 'Recevoir 6 fois par année le magazine Suisse Rando';
$lang['ABOUT_MEMBER_ADVANTAGE_5'] = 'Réductions de prix sur les cartes pédestres de notre canton et les cartes de l’Office fédéral de la topographie';
$lang['ABOUT_CONSTITUTION'] = 'Statuts:';
$lang['ABOUT_CONSTITUTION_DESC'] = 'Statuts peuvent être téléchargés ici';

/* #################### register ####################  */
$lang['REGISTER_TITLE'] = 'INFORMATIONS PERSONEL';
$lang['REGISTER_FNAME'] = 'Prénom';
$lang['REGISTER_LNAME'] = 'Nom';
$lang['REGISTER_EMAIL'] = 'E-Mail';
$lang['REGISTER_ADDRESS'] = 'Adresse';
$lang['REGISTER_LOCATION'] = 'Lieu';
$lang['REGISTER_COUNTRY'] = 'Pays';
$lang['REGISTER_PLZ'] = 'Code postal';
$lang['REGISTER_PHONE'] = 'Numeréro de téléphone';
$lang['REGISTER_LANG'] = 'Langue de communication';
$lang['REGISTER_ABO'] = 'Abonnement';
$lang['REGISTER_TITLE_2'] = 'INFORMATIONS LOGIN';
$lang['REGISTER_PWD'] = 'Mot de passe';
$lang['REGISTER_PWD_2'] = 'Confirmation du mot de passe';
$lang['REGISTER_SUBMIT'] = 'Registrieren';
$lang['REGISTER_FORGOT_PW'] = 'Mot de passe oublié?';

/* #################### register errors ####################  */
$lang['REGISTER_ERROR_1'] = 'S\'il vous plaît remplir tous les champs!';
$lang['REGISTER_ERROR_2'] = 'S\'il vous plaît entrer un e-mail valide!';
$lang['REGISTER_ERROR_3'] = 'Cet e-mail est déjà utilisé! Est-ce que vous avez ';
$lang['REGISTER_ERROR_4'] = 'Les mots de passe ne sont pas identiques!';
$lang['REGISTER_ERROR_5'] = 'Les mots de passe sont trop faibles';
$lang['REGISTER_ERROR_6'] = 'S\'il vous plaît entrer un prénom valide!';
$lang['REGISTER_ERROR_7'] = 'S\'il vous plaît entrer un nom valide!';
$lang['REGISTER_ERROR_8'] = 'Bot! Va-t\'en!!';


/* #################### global errors ####################  */
$lang['ERROR_X'] = 'Ein unerwarterer Fehler ist aufgetreten! Bitte versuchen Sie es erneut!';
$lang['NO_RESULTS'] = 'Aucun résultat correspondant à votre sélection';

/* #################### header ####################  */
$lang['HEADER_REGISTER'] = 'Enregistrer';
$lang['HEADER_LOGIN'] = 'Login';
$lang['HEADER_LOGOUT'] = 'Logout';
$lang['HEADER_LOGGED'] = 'Bienvenue';

/* #################### Home ######################*/
$lang['HOME_HIKE'] = 'Randonnée';
$lang['HOME_ADVANTAGE'] = 'vos avantages';
$lang['HOME_HIKE_DESC'] = "Nous vous proposons plusieurs promenades. De l'escalade au ski sur multiday promenades guidées dans tout le Valais.";
$lang['HOME_ADVANTAGE_DESC'] = 'Nous vous proposons plusieurs promenades en famille et entre amis. Avec nous, vous pouvez trouver des idées pour la randonnée pédestre ou une randonnée guidée de nous.';
$lang['HOME_RATING'] = 'Voir nos commentaires';
$lang['HOME_RATING_DESC'] ='Sur notre site vous pouvez voir les randonnées genauenstens et regarder les commentaires de notre communauté.';
$lang['HOME_BTN_MORE'] = 'Plus';
$lang['HOME_VIDEO_TITLE'] = 'Randonnée';
$lang['HOME_VIDEO_SUBTITLE'] = 'Dans toute la Suisse';
$lang['HOME_VIDEO_DESC'] = "Explorez les merveilles de la nature. Avec un équipement approprié et nos guides amicaux se souviendront sûrement ce jour depuis longtemps.
Que ce soit seul, en famille ou entre amis, prendre notre part de randonnée!";

/* #################### Tour ######################*/
$lang['TOUR_TITLE'] = 'Randonnée';
$lang['TOUR_TOUR'] = 'Tour';
$lang['TOUR_INFO'] = 'Information';
$lang['TOUR_STATUS'] = 'Status';
$lang['TOUR_MEMBERS'] = 'Nombre des inscriptions';
$lang['TOUR_GA'] = 'AG';
$lang['TOUR_HT'] = 'Demi-Taxe';
$lang['TOUR_NOTHING'] = "pas d'abo";
$lang['TOUR_BTN'] = 'Afficher';

/* #################### HIKING ######################*/
$lang['HIKING_ALL'] = 'Tous';
$lang['HIKING_FAVORITES'] = 'Favoris';
$lang['HIKING_DURATION'] = 'Durée';
$lang['HIKING_TYPE'] = 'Type de randonnée';
$lang['HIKING_REGION'] = 'Région';
$lang['HIKING_ALLREGIONS'] = 'Tous les Régions';
$lang['HIKING_OW'] = 'Haut-Valais';
$lang['HIKING_MW'] = 'Centre-Valais';
$lang['HIKING_UW'] = 'Bas-Valais';
$lang['HIKING_AK'] = 'Hors cantonal';
$lang['HIKING_DIFF'] = 'Difficulté';
$lang['HIKING_ALLDIFF'] = 'Tous les Difficulté';
$lang['HIKING_CLOSE'] = 'Fermer';
$lang['HIKING_FILTER'] = 'Filtre';
$lang['HIKING_DATE'] = 'Date';

/* #################### HIKESHOW/SHOWOFF ######################*/
$lang['HIKESHOW_TOUR'] = 'Randonnée';
$lang['HIKESHOW_DESC_DE'] = 'Description DE';
$lang['HIKESHOW_DESC_FR'] = 'Description FR';
$lang['HIKESHOW_DIFF'] = 'Difficulté';
$lang['HIKESHOW_LOCATION'] = 'Lieu de départ/arrivée';
$lang['HIKESHOW_DATE'] = 'Date de départ/arrivée';
$lang['HIKESHOW_STATUS'] = 'Status';
$lang['HIKESHOW_PRICE'] = 'Prix ​​par personne';
$lang['HIKESHOW_PLACE'] = 'Place libre';
$lang['HIKESHOW_ANMELDESCHLUSS'] = 'Date limite';
$lang['HIKESHOW_INSCRIPTION'] = "S'INSCRITE POUR UNE RANDONNÉE";
$lang['HIKESHOW_JOIN'] = 'Je participe aussi';
$lang['HIKESHOW_FRIENDS'] = 'Mes amis:';
$lang['HIKESHOW_MORE_FRIENDS'] = 'Ajouter un ami';
$lang['HIKESHOW_SAVE'] = 'Sauvegarder';
$lang['HIKESHOW_RATING'] = 'Évaluation';
$lang['HIKESHOW_RATING_PUBLIC'] = "Publier l'Évaluation";

/* #################### SHOWUSER ######################*/
$lang['SHOWUSER_WELCOME'] = 'Welcome';
$lang['SHOWUSER_EMAIL'] = 'Émail';
$lang['SHOWUSER_FNAME'] = 'Prénom';
$lang['SHOWUSER_NNAME'] = 'Nom';
$lang['SHOWUSER_ADDRESS'] = 'Adresse';
$lang['SHOWUSER_LOC'] = 'Lieu';
$lang['SHOWUSER_ZIP'] = 'Code postal';
$lang['SHOWUSER_PHONE'] = 'Numéro de téléphone';
$lang['SHOWUSER_LANG'] = 'Langue';
$lang['SHOWUSER_COUNTRY'] = 'Pays';
$lang['SHOWUSER_CHANGEPW'] = 'Change votre mot de passe';
$lang['SHOWUSER_EDIT'] = 'Éditer';
$lang['SHOWUSER_SAVE'] = 'Sauvegarder';

/* #################### THANK ######################*/
$lang['THANK_TITLE']='merci beaucoup pour vorte registration';
$lang['THANK_TEXT'] ='Vous obtenez mail de confirmation dans quelques minutes';
$lang['THANK_BTN'] ='Avancer';

/* #################### LOGIN ######################*/
$lang['LOGIN_TITLE'] = 'NOUVEL ENREGSITREMENT';
$lang['LOGIN_DESC'] = 'En vous inscrivant sur notre site, ils ont la possibilité de réserver nos randonnées guidées.';
$lang['LOGIN_REG'] = 'Client enregistré';
$lang['LOGIN_REG_DESC'] = 'Ii elles ont un compte, connectez-vous';
$lang['LOGIN_MAIL'] = 'Émail';
$lang['LOGIN_PW'] = 'Mot de passe';
$lang['LOGIN_PW_FORGOT'] = 'oublier votre mot de passe';
$lang['LOGIN_STAY'] = 'Séjour enregsitre';
$lang['LOGIN_CREATEACC'] = 'Créer un nouveau compte';

/* #################### SHOWINSCRIPTION ######################*/
$lang['SHOWINSCRIPTION_TITLE'] ="AFFICHER L'INSCRIPTIONS";

/* #################### SHOWHIKE ######################*/
$lang['SHOWHIKEADMIN_TITLE'] = 'TOUR INFORMATION';
$lang['SHOWHIKEADMIN_TITLE2'] = 'TOUR MANAGEMENT';
$lang['SHOWHIKEADMIN_TITLE3'] ='ACCOUNT MANAGEMENT';
$lang['SHOWHIKEADMIN_TOUR'] = 'TOUR';
$lang['SHOWHIKEADMIN_DIFF'] = 'Difficulté';
$lang['SHOWHIKEADMIN_SUBTITLE'] = 'Sous-Titre';
$lang['SHOWHIKEADMIN_DURATION'] = 'Durée';
$lang['SHOWHIKEADMIN_ZIPDEP'] = 'Code postal depart';
$lang['SHOWHIKEADMIN_LOCDEP'] = 'lieu de départ';
$lang['SHOWHIKEADMIN_ZIPARR'] = 'Code postale arrivée';
$lang['SHOWHIKEADMIN_LOCARR'] = "lieu d'arrivée";
$lang['SHOWHIKEADMIN_PRICE'] = 'Prix';
$lang['SHOWHIKEADMIN_DESCDE'] = 'Description DE';
$lang['SHOWHIKEADMIN_DESCFR'] = 'Description FR';
$lang['SHOWHIKEADMIN_STARTDATE'] = 'date de début';
$lang['SHOWHIKEADMIN_ENDDATE'] = 'date de fin';
$lang['SHOWHIKEADMIN_DEPTIME'] = 'heure de départ';
$lang['SHOWHIKEADMIN_ARRTIME'] = "heure d'arrive";
$lang['SHOWHIKEADMIN_STATUS'] = 'Status';
$lang['SHOWHIKEADMIN_TRANSPORT'] = 'Transport';
$lang['SHOWHIKEADMIN_TYPE'] = 'Tour Typ';
$lang['SHOWHIKEADMIN_TYPE_DESC'] = 'choisir au moins une ';
$lang['SHOWHIKEADMIN_IMG'] = 'Image';
$lang['SHOWHIKEADMIN_EXPDATE'] = "Date d'Expiration";
$lang['SHOWHIKEADMIN_AVPLACE'] = 'Place libre';
$lang['SHOWHIKEADMIN_NOTES'] = 'Notes pour le guide';

/* #################### SHOWADMIN ######################*/
$lang['SHOWADMIN_TITLE'] = 'bienvenue';
$lang['SHOWADMIN_EMAIL'] = 'Émail';
$lang['SHOWADMIN_FN'] = 'Prénom';
$lang['SHOWADMIN_LN'] = 'Nom';
$lang['SHOWADMIN_ADDRESS'] = 'Adresse';
$lang['SHOWADMIN_LOC'] = 'Lieu';
$lang['SHOWADMIN_ZIP'] = 'Code postale';
$lang['SHOWADMIN_PHONE'] = 'Numéro de téléfon';
$lang['SHOWADMIN_LANG'] = 'Langue';
$lang['SHOWADMIN_COUNTRY'] = 'Pays';
$lang['SHOWADMIN_SAVE'] = 'Sauvegarder';
$lang['SHOWADMIN_EDIT'] = 'Éditer';
$lang['SHOWADMIN_CHANGEPW'] = 'changer mot de passe';
$lang['SHOWADMIN_ABO'] = 'Abo';
$lang['SHOWADMIN_ACTIVE'] = 'activement';
$lang['SHOWADMIN_LASTLOGIN'] = 'dernière connexion';
$lang['SHOWADMIN_RUNLEVEL'] = "niveau d'autorisation";
$lang['SHOWADMIN_DELETE'] = 'Effacer';
$lang['SHOWADMIN_CANCEL'] = 'Avorter';

/* #################### MANAGEINSCRIPTIONS ######################*/
$lang['MANAGEINSCRIPTION_TITLE']="GÉRER L'INSCRIPTIONS";


$lang['HOME_NEXT_EVENTS'] = 'Nos prochains tours';
$lang['MENU_SHOWHIKE'] = "ajouter a Randonnée"
?>