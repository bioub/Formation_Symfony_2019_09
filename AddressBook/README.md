Exercices
=========

## Exercice 1 : Router

Créer un nouveau contrôleur `Societe` contenant 2 routes :

* `/societes/` qui pointe vers `indexAction` de `SocieteController`
* `/societes/{id}` qui pointe vers `showAction` de `SocieteController`

Vérifier que l'id soit un entier

Préfixer toutes les routes de Societes par une annotation

## Exercice 2 : Twig + Doctrine + Container

Societe aura un id, un nom et une ville (à minima)

Ajouter du contenu HTML avec du faux texte dans les fichiers `societe/index.html.twig` et `societe/show.html.twig`, faire des liens entre les 2

Créer une entité Societe avec les annotations Doctrine correspondantes

Utiliser les commandes doctrine pour générer la table et les getters/setters

Remplir la table avec phpMyAdmin

Créer un manager Societe et lui injecter ManagerRegistry comme dans ContactManager

Développer 2 méthodes getAll et getById
(éventuellement limiter getAll à 10 enregistrements)

Injecter le manager societe dans SocieteController

Développer les action, en appelant le manager et en transmettant les données aux vues

Reprendre les vues et remplacer le faux-texte par les données issues du controleur

## Exercice 3 : Formulaires

Ajouter un formulaire pour ajouter des sociétés

Créer l'action updateAction dans ContactController

* updateAction doit avoir un paramètre id (comme showAction)
* en utilisant le repository récupérer le contact à partir de l'id
* passer ce contact au formulaire via la méthode $contactForm->setData($contact)
* le reste est comme dans createAction...