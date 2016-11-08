<?php
/**
 * Created by PhpStorm.
 * User: gez
 * Date: 28.09.2016
 * Time: 13:26
 */

/*
-----------------
Language: GERMAN
-----------------
*/
$lang = array();

$lang['WELCOME_TITLE'] = 'Willkommen';

/* #################### inscription ####################  */
$lang['MANAGEINSCRIPTION_NO_PARTICIPANT'] = 'Es sind keine Teilnehmer angemeldet!';
$lang['MANAGEINSCRIPTION_NO_ACCS'] = 'Es sind keine Accounts angemeldet!';

/* #################### showhike ####################  */
$lang['SHOWHIKE_AVAILABLE_PLACES_ERROR'] = 'Die Anzahl möglicher Teilnehmer muss grösser als die bereits gebuchten Teilnehmer sein!';
$lang['SHOWHIKE_ACCOUNT_ALREADY_INSCRIPTION'] = 'Sie müssen an der Tour selber Teilnehmen!';
$lang['SHOWHIKE_ACCOUNT_ALREADY_RATED'] = 'Sie haben bereits eine Bewertung abgegeben!';
$lang['SHOWHIKE_ACCOUNT_ALREADY_INSCRIPTED'] = 'Sie dürfen sich nicht mehrmals für eine Tour einschreiben!';
$lang['SHOWHIKE_INSCRIPTION_NO_SPACE'] = 'Keine freien Plätze verfügbar!';
$lang['SHOWHIKE_INSCRIPTION_NO_SPACE_PART'] = 'Sie haben zu viele Teilnehmer angemeldet - zu wenig freie Plätze sind verfügbar!';
$lang['SHOWHIKE_INSCRIPTION_BOOKED_OUT'] = 'Diese Tour ist ausgebucht!';
$lang['SHOWHIKE_INSCRIPTION_CANCELED'] = 'Die Tour wurde storniert!';

/* #################### mail confirmation ####################  */
/* confirm */
$lang['CONFIRMATION_MAIL_CLICK_LINK'] = 'KLICKEN SIE HIER UM IHR KONTO ZU BESTÄTIGEN!';
$lang['CONFIRMATION_MAIL_SUBJECT'] = 'Bestätigungsmail';
$lang['CONFIRMATION_MAIL_BODY'] = 'Drücken Sie auf den folgenedn Link um Ihr Account zu aktivieren.';

/* #################### resetpw ####################  */
/* resetpw */
$lang['RESETPW_TITLE'] = 'Ändern Sie Ihr Passwort';
$lang['RESETPW_ENTER'] = 'GEBEN SIE IHR PASSWORT EIN';
$lang['RESETPW_ENTER_CONFIRM'] = 'BESTÄTIGEN SIE IHR PASSWORT';
$lang['RESETPW_ERROR'] = 'Die Passwörter stimmen nicht überein!';
$lang['RESETPW_BUTTON_CHANGE'] = 'Passwort ändern';
$lang['RESETPW_SUCCESS'] = 'Das Passwort wurde erfolgreich geändert.';
$lang['RESETPW_FAILED'] = 'Die Passwörter stimmen nicht überein!';
$lang['RESETPW_WEAK'] = 'Das neue Passwort ist zu schwach! (Tipp: Nutzen Sie mind. 8 Zeichen davon Gross- u. Kleinbuchstaben, eine Zahl u. ein Sonderzeichen)';

/* #################### contact ####################  */
/* contact */
$lang['CONTACT_SUBJECT'] = 'MITTEILUNG';
$lang['CONTACT_SENDMAIL_BUTTON'] = 'Senden';
$lang['CONTACT_OPENING_HOURS'] = 'Öffnungszeiten';
$lang['CONTACT_OPENING_TIME'] = 'Montage-Freitag von 8h00 bis 12h00 und von 14h00 bis 17h00';
$lang['CONTACT_ASSOCIATION_NAME'] = 'Vereinigung Walliser Wanderwege';
$lang['CONTACT_SUCCESSFUL'] = 'Die Anfrage wurde erfolgreich verschickt.';
/* errors */
$lang['CONTACT_ERROR_CAPTCHA_ERROR'] = 'Das Captcha wurde nicht selektiert.';
$lang['CONTACT_ERROR_INPUTS'] = 'Es wurden nicht alle Pflichtfelder ausgefüllt!';



/* #################### forgotpw ####################  */
/* forgot pw page */
$lang['FORGOTPW_TAG'] = 'Passwort vergessen?';
$lang['FORGOTPW_ENTER'] = 'Geben Sie Ihre Email Addresse ein';
$lang['FORGOTPW_SEND'] = 'Senden';
$lang['FORGOTPW_EXISTS'] = 'Wir haben Ihnen eine Email an die eingegebene Addresse versand.';
$lang['FORGOTPW_NOT_EXISTS'] = 'Diese Email existiert nicht.';

/* mail */
$lang['FORGOTPW_MAIL_CLICK_LINK'] = 'KLICKEN SIE HIER!';
$lang['FORGOTPW_MAIL_SUBJECT'] = 'Neues Passwort erstellen';
$lang['FORGOTPW_MAIL_BODY_P1'] = '
                                <html>
                                    <body>       
                                        <p>
                                            Sehr geehrter Kunde/in
                                        </p>
                                        <p>
                                            Sie haben Ihr Passwort vergessen? Kein Problem!
                                        </p>
                                                                      
';

$lang['FORGOTPW_MAIL_BODY_P2'] = '
                                        <p>
                                            Mit einem Klick auf den untenstehenden Link gelangen Sie zu Ihrem Konto, wo Sie ein neues Passwort eintragen können.
                                        </p>
                                        <p>
                                            Sollten andere Probleme beim Prozess auftreten, nehmen Sie bitte Kontakt mit uns auf, wir helfen Ihnen gerne weiter.
                                        </p>
                                         <br>
                                        <p>
                                            Freundliche Grüsse
                                        </p>
                                        <p>
                                            Valrando<br>
                                            Vereinigung Walliser Wanderwege<br>
                                            Pré-Fleuri 6<br>
                                            Postfach 23<br>
                                            CH - 1951 Sitten
                                        </p>
                                    </body>
                                </html>
';

/* #################### header ####################  */
/* Menu */
$lang['MENU_NEWS'] = 'Home';
$lang['MENU_TOUR'] = 'Wanderungen';
$lang['MENU_ABOUT'] = '&Uuml;ber Uns';
$lang['MENU_CONTACT'] = 'Kontakt';
$lang['MENU_PROFIL'] = 'Mein Profil';
$lang['MENU_INSCRIPTION'] = 'Meine Anmeldungen';
$lang['MENU_HIKEMGMT'] = 'Tourverwaltung';
$lang['MENU_ACCMGMT'] = 'Benutzerverwaltung';
$lang['MENU_INSCRIPTIONMGMT']  = 'Anmeldungen';

/* #################### footer ####################  */
$lang['FOOTER_FOLLOW'] = 'Folge uns';
$lang['FOOTER_EMAIL_UPDATES'] = 'Email Aktualisierungen';
$lang['FOOTER_CONTACT_US'] = 'Kontaktiere uns';

/* #################### about us ####################  */
$lang['ABOUT_TAG'] = 'ÜBER UNS';
$lang['ABOUT_NAME'] = 'Name:';
$lang['ABOUT_NAME_FULL'] = 'SAC ist die Abkürzung des Schweizer Alpen Club';
$lang['ABOUT_FOUNDATION'] = 'Gründung:';
$lang['ABOUT_BASED'] = 'Sitz:';
$lang['ABOUT_BASED_SION'] = ' Sitten';
$lang['ABOUT_UMBRELLA_GROUP'] = 'Dachorganisation:';
$lang['ABOUT_CH_HIKS'] = 'Schweizer Wanderwege';
$lang['ABOUT_CERTIFICATION'] = 'Zertifizierung:';
$lang['ABOUT_OPERATIONS'] = 'Tätigkeitsbereich:';
$lang['ABOUT_OPERATIONS_DESC'] = 'Organisation von über 50 geführten Wanderungen, Wander-Weekends und -wochen, Winter- und Schneeschuhwanderungen ';
$lang['ABOUT_QUANTITY_MEMBERS'] = 'Anzahl Mitglieder:';
$lang['ABOUT_MEMBER_CONTRIBUTION'] = 'Mitgliederbeitrag:';
$lang['ABOUT_MEMBER_CONTRIBUTION_DESC'] = 'Einzelpersonen und Familien CHF 50.- Gemeinden und Tourismusorganisationen CHF 100.-';
$lang['ABOUT_MEMBER_ADVANTAGE'] = 'Vorteile der Mitglieder:';
$lang['ABOUT_MEMBER_ADVANTAGE_1'] = 'Teilnahme an Wanderungen ohne Aufpreis (CHF 5.-)';
$lang['ABOUT_MEMBER_ADVANTAGE_2'] = 'Berechtigt die Teilnahme an den mehrtägigen Wanderungen und Wanderwochen';
$lang['ABOUT_MEMBER_ADVANTAGE_3'] = '1 Wanderkartei mit jährlich mehr als 50 neuen Wandervorschlägen';
$lang['ABOUT_MEMBER_ADVANTAGE_4'] = '6 mal pro Jahr die Zeitschrift, "Wanderland Schweiz"';
$lang['ABOUT_MEMBER_ADVANTAGE_5'] = 'Preisreduktion auf allen Karten der Schweizerischen Landestopographie sowie auf zahlreichen Wanderkarten unseres Kantons';
$lang['ABOUT_CONSTITUTION'] = 'Statuten:';
$lang['ABOUT_CONSTITUTION_DESC'] = 'Statuten können hier heruntergeladen werden';

/* #################### register ####################  */
$lang['REGISTER_TITLE'] = 'PERSÖHNLICHE INFORMATIONEN';
$lang['REGISTER_FNAME'] = 'Vorname';
$lang['REGISTER_LNAME'] = 'Nachname';
$lang['REGISTER_EMAIL'] = 'E-Mail Adresse';
$lang['REGISTER_ADDRESS'] = 'Adresse';
$lang['REGISTER_LOCATION'] = 'Ort';
$lang['REGISTER_COUNTRY'] = 'Land';
$lang['REGISTER_PLZ'] = 'PLZ';
$lang['REGISTER_PHONE'] = 'Telefon';
$lang['REGISTER_LANG'] = 'Kontaktsprache';
$lang['REGISTER_ABO'] = 'Abonnement';
$lang['REGISTER_TITLE_2'] = 'LOGIN INFORMATIONEN';
$lang['REGISTER_PWD'] = 'Passwort';
$lang['REGISTER_PWD_2'] = 'Passwort Bestätigung';
$lang['REGISTER_SUBMIT'] = 'Registrieren';
$lang['REGISTER_FORGOT_PW'] = 'Passwort vergessen?';

/* #################### register errors ####################  */
$lang['REGISTER_ERROR_1'] = 'Bitte füllen Sie alle Felder aus!';
$lang['REGISTER_ERROR_2'] = 'Bitte geben Sie eine gültige E-Mail Adresse ein!';
$lang['REGISTER_ERROR_3'] = 'Diese E-Mail Adresse wird bereits verwendet! Haben Sie ihr ';
$lang['REGISTER_ERROR_4'] = 'Passwörter sind nicht identisch!';
$lang['REGISTER_ERROR_5'] = 'Passwörter sind zu schwach';
$lang['REGISTER_ERROR_6'] = 'Bitte geben Sie einen gültigen Vornamen ein!';
$lang['REGISTER_ERROR_7'] = 'Bitte geben Sie einen gültigen Nachnamen ein!';
$lang['REGISTER_ERROR_8'] = 'Bot! GEH WEG!';

/* #################### login errors ####################  */
$lang['LOGIN_ERROR_1'] = 'Anmeldedaten sind nicht korrekt!';

/* #################### global errors ####################  */
$lang['ERROR_X'] = 'Ein unerwarterer Fehler ist aufgetreten! Bitte versuchen Sie es erneut!';
$lang['NO_RESULTS'] = 'Keine Ergebnisse gefunden, die ihrer Auswahl entsprechen';

/* #################### header ####################  */
$lang['HEADER_REGISTER'] = 'Registrieren';
$lang['HEADER_LOGIN'] = 'Login';
$lang['HEADER_LOGOUT'] = 'Logout';
$lang['HEADER_LOGGED'] = 'Willkommen';

/* #################### Home ######################*/
$lang['HOME_HIKE'] = 'Wanderungen';
$lang['HOME_ADVANTAGE'] = 'Ihre Vorteile';
$lang['HOME_HIKE_DESC'] = 'Wir bieten Ihnen verschiedene Wanderungen an. Von Klettertouren bis Skitouren über mehrtägige geführte Wanderungen überall im Wallis.';
$lang['HOME_ADVANTAGE_DESC'] = 'Wir bieten Ihnen verschiedene Wanderungen mit Familie und Freunden an. Sie können bei uns Ideen für Wanderungen finden oder eine von uns geführte Wanderung buchen.';
$lang['HOME_RATING'] = 'Sehen Sie sich Bewertungen an';
$lang['HOME_RATING_DESC'] ='Auf unserer Seite können Sie die Wanderungen genauenstens ansehen und sich die Bewertungen unserer Community ansehen.';
$lang['HOME_BTN_MORE'] = 'Mehr';
$lang['HOME_VIDEO_TITLE'] = 'Wanderungen';
$lang['HOME_VIDEO_SUBTITLE'] = 'In der ganzen Schweiz';
$lang['HOME_VIDEO_DESC'] = "Entdecken Sie die Wunder der Natur. Mit einer geeigneten Ausrüstung und unseren Freundlichen Guides werden Sie sich bestimmt noch lange an diesen Tag erinnern. 
Ob alleine, mit Familie oder mit Freunden, nehmen Sie an unseren Wanderungen Teil!";

/* #################### Tour ######################*/
$lang['TOUR_TITLE'] = 'Wanderung';
$lang['TOUR_TOUR'] = 'Tour';
$lang['TOUR_INFO'] = 'Information';
$lang['TOUR_STATUS'] = 'Status';
$lang['TOUR_MEMBERS'] = 'Anzahl Einschreibungen';
$lang['TOUR_GA'] = 'GA';
$lang['TOUR_HT'] = 'Halb-Tax';
$lang['TOUR_NOTHING'] = 'Kein Abo';
$lang['TOUR_BTN'] = 'Anzeigen';

/* #################### HIKING ######################*/
$lang['HIKING_ALL'] = 'Alle';
$lang['HIKING_FAVORITES'] = 'Favoriten';
$lang['HIKING_DURATION'] = 'Dauer';
$lang['HIKING_TYPE'] = 'Art der Wanderung';
$lang['HIKING_REGION'] = 'Region';
$lang['HIKING_ALLREGIONS'] = 'Alle Regionen';
$lang['HIKING_OW'] = 'Oberwallis';
$lang['HIKING_MW'] = 'Mittelwallis';
$lang['HIKING_UW'] = 'Unterwallis';
$lang['HIKING_AK'] = 'Ausserkantonal';
$lang['HIKING_DIFF'] = 'Schwierigkeit';
$lang['HIKING_ALLDIFF'] = 'Alle Schwierigkeiten';
$lang['HIKING_CLOSE'] = 'Schliessen';
$lang['HIKING_FILTER'] = 'Filter';
$lang['HIKING_DATE'] = 'Datum';

/* #################### HIKESHOW/SHOWOFF ######################*/
$lang['HIKESHOW_TOUR'] = 'Wanderung';
$lang['HIKESHOW_DESC_DE'] = 'Beschreibung DE';
$lang['HIKESHOW_DESC_FR'] = 'Beschreibung FR';
$lang['HIKESHOW_DIFF'] = 'Schwierigkeit';
$lang['HIKESHOW_LOCATION'] = 'Ort der Abreise/Ankunft';
$lang['HIKESHOW_DATE'] = 'Datum der Abreise/Ankunft';
$lang['HIKESHOW_STATUS'] = 'Status';
$lang['HIKESHOW_PRICE'] = 'Preis pro Person';
$lang['HIKESHOW_PLACE'] = 'Freie Plätze';
$lang['HIKESHOW_ANMELDESCHLUSS'] = 'Anmeldeschluss';
$lang['HIKESHOW_INSCRIPTION'] = 'FÜR EINE TOUR EINSCHREIBEN';
$lang['HIKESHOW_JOIN'] = 'Nehme ich auch teil?';
$lang['HIKESHOW_FRIENDS'] = 'Meine Freunde:';
$lang['HIKESHOW_MORE_FRIENDS'] = 'Freund hinzufügen';
$lang['HIKESHOW_SAVE'] = 'Speichern';
$lang['HIKESHOW_RATING'] = 'BEWERTUNGEN';
$lang['HIKESHOW_RATING_PUBLIC'] = 'Bewertung veröffentlichen';

/* #################### SHOWUSER ######################*/
$lang['SHOWUSER_WELCOME'] = 'Welcome';
$lang['SHOWUSER_EMAIL'] = 'Email';
$lang['SHOWUSER_FNAME'] = 'Vorname';
$lang['SHOWUSER_NNAME'] = 'Nachname';
$lang['SHOWUSER_ADDRESS'] = 'Adresse';
$lang['SHOWUSER_LOC'] = 'Ort';
$lang['SHOWUSER_ZIP'] = 'PLZ';
$lang['SHOWUSER_PHONE'] = 'Telefonnummer';
$lang['SHOWUSER_LANG'] = 'Sprache';
$lang['SHOWUSER_COUNTRY'] = 'Land';
$lang['SHOWUSER_CHANGEPW'] = 'Passwort ändern';
$lang['SHOWUSER_EDIT'] = 'Bearbeiten';
$lang['SHOWUSER_SAVE'] = 'Speichern';

/* #################### THANK ######################*/
$lang['THANK_TITLE']='Vielen Dank für die Registrierung';
$lang['THANK_TEXT'] ='Sie erhalten in Kürze eine Bestätigungsemail.';
$lang['THANK_BTN'] ='Weiter';

/* #################### LOGIN ######################*/
$lang['LOGIN_TITLE'] = 'NEUE REGISTRIERUNG';
$lang['LOGIN_DESC'] = 'Durch die Registrierung auf unserer Seite erhalten sie die Möglichkeit, unsere geführten Wanderungen zu buchen.';
$lang['LOGIN_REG'] = 'Registrierte Kunden';
$lang['LOGIN_REG_DESC'] = 'Wenn Sie einen Account haben, loggen Sie sich bitte ein';
$lang['LOGIN_MAIL'] = 'Email';
$lang['LOGIN_PW'] = 'Passwort';
$lang['LOGIN_PW_FORGOT'] = 'Passwort vergessen';
$lang['LOGIN_STAY'] = 'Angemeldet bleiben';
$lang['LOGIN_CREATEACC'] = 'Neuen Account erstellen';

/* #################### SHOWINSCRIPTION ######################*/
$lang['SHOWINSCRIPTION_TITLE'] ='EINSCHREIBUNGEN ANZEIGEN';

/* #################### SHOWHIKE ######################*/
$lang['SHOWHIKEADMIN_TITLE'] = 'TOUR INFORMATIONEN';
$lang['SHOWHIKEADMIN_TITLE2'] = 'TOUR MANAGEMENT';
$lang['SHOWHIKEADMIN_TITLE3'] ='ACCOUNT MANAGEMENT';
$lang['SHOWHIKEADMIN_TOUR'] = 'TOUR';
$lang['SHOWHIKEADMIN_DIFF'] = 'Schwierigkeit';
$lang['SHOWHIKEADMIN_SUBTITLE'] = 'Subtitle';
$lang['SHOWHIKEADMIN_DURATION'] = 'Dauer';
$lang['SHOWHIKEADMIN_ZIPDEP'] = 'PLZ Abfahrt';
$lang['SHOWHIKEADMIN_LOCDEP'] = 'Abfahrtsort';
$lang['SHOWHIKEADMIN_ZIPARR'] = 'PLZ Ankunft';
$lang['SHOWHIKEADMIN_LOCARR'] = 'Ankunftsort';
$lang['SHOWHIKEADMIN_PRICE'] = 'Preis';
$lang['SHOWHIKEADMIN_DESCDE'] = 'Beschreibung Deutsch';
$lang['SHOWHIKEADMIN_DESCFR'] = 'Beschreibung Franzoesisch';
$lang['SHOWHIKEADMIN_STARTDATE'] = 'Startdatum';
$lang['SHOWHIKEADMIN_ENDDATE'] = 'Enddatum';
$lang['SHOWHIKEADMIN_DEPTIME'] = 'Abfahrtszeit (z.B. 08:00)';
$lang['SHOWHIKEADMIN_ARRTIME'] = 'Ankunftszeit (z.B. 14:00)';
$lang['SHOWHIKEADMIN_ERRORTIME'] = 'Invalides Zeitformat';
$lang['SHOWHIKEADMIN_STATUS'] = 'Status';
$lang['SHOWHIKEADMIN_TRANSPORT'] = 'Transport';
$lang['SHOWHIKEADMIN_TYPE'] = 'Tour Typ';
$lang['SHOWHIKEADMIN_TYPE_DESC'] = 'Wählen Sie mindestens eines aus.';
$lang['SHOWHIKEADMIN_IMG'] = 'Bild (max: 0.5 MB)';
$lang['SHOWHIKEADMIN_IMGERROR'] = 'File-Grösse darf nicht 0.5 MB überschreiten';
$lang['SHOWHIKEADMIN_EXPDATE'] = 'Auslaufdatum';
$lang['SHOWHIKEADMIN_AVPLACE'] = 'Freie Plätze';
$lang['SHOWHIKEADMIN_NOTES'] = 'Notizen für Guide';

/* #################### SHOWADMIN ######################*/
$lang['SHOWADMIN_TITLE'] = 'Willkommen';
$lang['SHOWADMIN_EMAIL'] = 'Email';
$lang['SHOWADMIN_FN'] = 'Vorname';
$lang['SHOWADMIN_LN'] = 'Name';
$lang['SHOWADMIN_ADDRESS'] = 'Adresse';
$lang['SHOWADMIN_LOC'] = 'Ort';
$lang['SHOWADMIN_ZIP'] = 'PLZ';
$lang['SHOWADMIN_PHONE'] = 'Telefonnummer';
$lang['SHOWADMIN_LANG'] = 'Sprache';
$lang['SHOWADMIN_COUNTRY'] = 'Land';
$lang['SHOWADMIN_SAVE'] = 'Speichern';
$lang['SHOWADMIN_EDIT'] = 'Bearbeiten';
$lang['SHOWADMIN_CHANGEPW'] = 'Passwort ändern';
$lang['SHOWADMIN_ABO'] = 'Abo';
$lang['SHOWADMIN_ACTIVE'] = 'Aktiv';
$lang['SHOWADMIN_LASTLOGIN'] = 'Letztes Login';
$lang['SHOWADMIN_RUNLEVEL'] = 'Berechtigungslevel';
$lang['SHOWADMIN_DELETE'] = 'Löschen';
$lang['SHOWADMIN_CANCEL'] = 'Abbrechen';

/* #################### MANAGEINSCRIPTIONS ######################*/
$lang['MANAGEINSCRIPTION_TITLE']='EINSCHREIBUNGEN VERWALTEN';
?>