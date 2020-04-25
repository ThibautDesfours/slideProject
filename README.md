# slideProject : Marjorie MEUNIER et Thibaut DESFOURS

# Techonologies :
  Symfony 5, PHP 7.4, Bootstrap 4, Jquery 3.4.1, Jcrop
  
# Pour tester le projet :
  - Activer l'extension "fileinfo" dans votre php.ini si ce n'est pas déjà fait => Ajouter la ligne "extension=php_fileinfo.dll"
  - Dans le projet faire un "composer require symfony/web-server-bundle --dev" ou un "composer require symfony/web-server-bundle --dev ^4.4.2" si testé avec synfony 5
  - Dans le projet faire un "composer require vich/uploader-bundle"
  - Créer la base de données "slideproject" dans un phpmyadmin à l'aide du script présent dans le répertoire "public/database"
  
# Fonctionnalités disponibles :
  - A partir de la route /picturesGalery : 
      - consultation des images
      - ajout des images à l'aide du + bleu
      - suppression des images en cliquant dessus    
  - A partir de la route /slide :
      - consultation des différents slides
      - visualisation des slides en cliquant dessus
      - création de slide en cliquant sur le + bleu
      - suppression des slides avec l'icone corbeille sur l'écran de visualisation
      
 # Fonctionnalités à venir :
   - A partir de la route /slide:
      - amélioration du système pour la création de l'effet Ken Burns lors la création d'une slide (différenciation des deux zones)
      - amélioration / correction de l'effet Ken Burns lors de la visualisation des slides
   - Amélioration du css
   


