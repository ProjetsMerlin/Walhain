# Walhain

Thème wordpress minimal explorant la fonction register_block_type() sans Javascript mais uniquement en php, ce qui est possible depuis Wordpress 7.0

## Ce thème contient

- Une page 404 de base
- un dossiers assets lié au thème avec le contenu statique et la structure suivante : fonts, img, js, style [css/scss]
- le fichier functions.php reliant les fichiers backend du thème, ses assets, et incluant une série de configuration minimum
- Un dossier include allégeant le fichier functions.php en incluant le code backend du thème
- index.php étant la page d'aterrissage par défaut, avec un exemple de structure
- Ce fichier d'explication
- Un exemple de structure d'une page / article seul via le fichier singular.php
- Le fichier style.Css contenant la carte d'identité du thème
- Un dossier template-parts contenant les sections répétées du thème
- Les fichiers de début et de fin de code avec header & footer.php. Header.php contenant déjà les balsies dynamiques et le footer, fermant la nalise html.
- Et tous les autre fichiers propre au bon affichage du thèmedans le dashboard (screenshot.jpg & favicon.png)

## structure

404.php ✔️
assets
    fonts ✔️
    img ✔️
    js ✔️
    style ✔️
        css ✔️
        scss ✔️
favicon.png  ✔️
footer.php  ✔️
functions.php  ✔️
header.php ✔️
include ✔️
index.php ✔️
README.md ✔️
screenshot.jpg ✔️
singular.php ✔️
style.css ✔️
template-parts ✔️
    content-header ✔️
    content-footer ✔️

## commandes utiles

wp config create --dbname="walhain" --dbuser="root" --dbpass="root" --locale="localhost" --dbprefix="walhain_"
wp db create
wp core install --url=<http://localhost/walhain> --title=walhain --admin_user=merlin --admin_password=1234 --admin_email=<info@lintermediaire.be>
wp option update blogname "walhain"
wp option update blogdescription "lorem"
wp theme delete twentytwenty twentytwentytwo twentytwentythree twentytwentyfour
wp plugin delete akismet hello
wp plugin install block-bad-queries really-simple-ssl antispam-bee
wp plugin install classic-editor --activate
wp rewrite structure "%postname%"
del /f wp-config-sample.php
del /f license.txt
del /f readme.html
