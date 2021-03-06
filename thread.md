__Le 21 juin 2020__

# Fait: #

- Mise en place du rendu
- Creation de la bdd
- Création des entitées ```Game``` et ```Support``` avec une Relations ManyToMany
- Réalisation d'un premier formulaire d'ajout de jeu vidéo


## A faire : ##

- Traitement du formulaire pour enregistrement en BDD
- Traitement du formulaire pour enregistrement de fichier de type image
- Styliser le formulaire d'ajout d'un jeu vidéo 
- Création d'une entité categorie 
- Modification de l'entité ```Game``` pour la liée a ```Category```
- Création des users (Entité , Formulaire ,Gestion de droits, Voter et Authentification)

------------------------------------------------------------------------
__Le 26 juin 2020__

# Fait #
 - Traitement de l'upload d'image depuis un formulaire
 - Traitement du formulaire d'ajout de jeu vidéo (enregistrement en BDD)
 - Modification du rendu du formulaire d'ajout de jeu vidéo
  

## A faire ##

- Création d'une entité categorie 
- Modification de l'entité ```Game``` pour la liée a ```Category```
- Création des users (Entité , Formulaire ,Gestion de droits, Voter et Authentification)
  
  -------------------------------------------------------------------------------

__Le 27 juin 2020__

# Fait #
- Résolution d'un conflit lors de la fusion de la branch ```addGame ``` sur master
- Création d'une entité ```Category``` 
- Relation entre ```Category``` et  ```Game``` en ManyToMany
- Modification du ```GameType``` afin d'ajouter les catégories. 
- Affichage de(s) catégorie(s) dans la template show (détails d'un jeu vidéo)
- Réalisation d'un service de slug qui return le slug d'une string donnée en paramètre
- Réalisation d'un crud complet sur ```Category``` 
- Mise en place d'un formulaire d'ajout et de modification pour ```Category``` 
- Utilisation du slug sur la route ```category_show``` 
- Affichage des message Flashes dans la template base.html.twig


## A faire ##

- Création des users (Entité , Formulaire ,Gestion de droits, Voter et Authentification)
- Utiliser SwiftMailer pour l'authentification
- Mise ne place de test unitaire et fonctionnel
- Mettre en place un appel a une Api en JS pour récuperer les infos d'un jeu (RAWG -> voir doc)
- Création d'une entité ```Editor ```  
- Création d'une entité ```Develloper ```  
- Mise a jour de ```Game``` en inserant une date de creation


__le 28 juin 2020__

# Fait #

- Modification du rendu des formulaire


## A faire ##

  - Création des users (Entité , Formulaire ,Gestion de droits, Voter et Authentification)
- Utiliser SwiftMailer pour l'authentification
- Mise ne place de test unitaire et fonctionnel
- Mettre en place un appel a une Api en JS pour récuperer les infos d'un jeu (RAWG -> voir doc)
- Création d'une entité ```Editor ```  
- Création d'une entité ```Develloper ```  
- Mise a jour de ```Game``` en inserant une date de creation
- Création de customs query pour la navigation par support en home
  
  
 __le 31 juillet 2020__

# Fait #

- Reprise du projet après l'apothèose!
- Mise en place de la navigation par onglet de console en home page
- Réalisation de l'édition d'un jeu grace à un lien sur la page de détails d'un jeu

## a faire ##

 
- Mise en place de l'inscription/authentification.
- Modification du comportement de la home page en fonction de l'authentification.
- Réalisation d'un footer.

 __le 01 Aout 2020__  

# Fait #

- Mise en place de contraintes sur l'entité Game
- Création d'une entity User avec la sécurité ( make:user )
- Création du formulaire de connection 
- création du formulaire d'inscription
- mis en place de la necessité d'etre inscrit et connecter pour accéder au site

## a faire ##
- Afficher les jeux de l'utilisateur seulement si il lui appartiennent  ( nouvelle relation entre les jeux et le users (un utilisateur peut avoir plusieur jeux et un jeu peut avoir plusieur utilisateur donc probablement many to many sauf si besoin d'information au centre))



__le 03 Aout 2020__  

# Fait #

- Mise ne place de l'affichage des jeux seulement si ceux-ci ont était déclaré comme joué pour un utilisateur.
- Création d'un aside informatif qui s'affiche lors que l'utilisateur est connecté.

## a faire ##

- Mettre en place la sécurité ( Pour l'instant un utilisateur peut accéder a n'importe quel jeu par l'url) par des voter !!!
- Gros travail de css sur le login est registration
- Mettre en place un double champ pour la confirmation du mot de passe lors de l'inscription

__le 04 Aout 2020__

# Fait #

- Configuration du voter pour l'entité Game
- Suppression de la possibilité de supprimer/éditer un catégorie.
- Résolution d'un souci qui faisait que l'on pouvait voir l'intégralité des jeux en bdd sur la page des catégories. (Création d'une custom query afin que seul les jeux de l'utilisateur connecté s'affichent)
- Mise en place du double champ pour l'inscription au niveau du mot de passe.

## a faire ##

- Réalisation de la page de profil.


- Mettre en place un système qui n'enregistre pas un nouveau jeu a chaque ajout de jeu.
- /!\/!\/!\/!\/!\ Modifier la relation entre Game et User  dans une branche séparée pour essayer la relations OneToMany/!\/!\/!\/!\/!\/!\/!\
- /!\/!\/!\/!\/!\ Un Jeux peut avoir plusieurs user et un user est relier a Un et un seul Jeu /!\/!\/!\/!\/!\


__le 05 Aout 2020__

# Fait #

- Réalisation de la page ou l'utilisateur peut consulter son compte et modifié ou supprimer ses informations personnel
- Création dde la page de contact avec le système de mailing (swiftMailer)
- Création de la page de présentation du dev.

## a faire ##

- Cration de test unitaire et fonctionnel.