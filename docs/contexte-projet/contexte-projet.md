---
layout: default
chapitre: contexte-projet
order: 3
---


# Contexte du projet

<!-- note -->

Le projet consiste en le développement d'un système CRUD pour gérer les entités Projets et Tâches avec Laravel, incluant des fonctionnalités d'autorisation. L'objectif principal est de permettre aux développeurs d'acquérir les compétences nécessaires à l'utilisation efficace de ce framework PHP populaire.

<!-- new slide -->


## 2TUP

![Méthode 2TUP](/prototype/contexte-projet/images/2tup.png){:width="900px"}*figure: Méthode 2TUP*


<!-- note -->


2TUP est un processus de développement logiciel qui implémente le Processus Unifié.

Il commence par une étude préliminaire qui consiste essentiellement :

- Identifier les acteurs qui vont interagir avec le système à construire
- cahier des charges 
- modéliser le contexte

Le processus s'articule ensuite autour de 3 phases essentielles :

- une branche technique
- une branche fonctionnelle
- une phase de réalisation

**Branche fonctionnelle** qui consiste en la modélisation et le maquettage pour clarifier les besoins fonctionnels.

**Branche Technique** qui recense toutes les contraintes à respecter pour réaliser le système Elle définit ensuite les composants nécessaires à la construction de l’architecture technique.

**La phase de réalisation** consiste à réunir les deux branches, permettant de mener une conception applicative et enfin la livraison d'une solution adaptée aux besoins. Arrive par la suite l’étape de codage et enfin l’étape de recette, qui consiste à valider les fonctions du système développé.

<!-- new slide -->



# Branche technique

<!-- note -->

La branche technique fait référence à la partie du projet qui est axée sur les aspects techniques et de développement. Cette branche englobe les activités liées à la conception, la programmation, et la mise en œuvre des fonctionnalités et des composants du projet. Elle implique généralement l'utilisation d'outils de développement, la gestion des versions du code source, et la collaboration entre les développeurs. La branche technique joue un rôle essentiel dans la création d'un produit final de haute qualité, en veillant à ce que les spécifications techniques soient respectées et que les fonctionnalités soient correctement implémentées.


<!-- new slide -->


## Analyse technique

![Analyse-technique](/prototype/contexte-projet/images/analyse-technique.png){:width="80%"}*figure: Analyse technique*


<!-- note -->

Pour le développement de le prototype, ont va utiliser de différentes technologies, notamment : 

- PHP: est un langage de script côté serveur.
    - Rôle : Gérer la logique métier de l'application, traiter les requêtes et générer des pages dynamiques.

- MySQL :  est une base de données relationnelle.
   - Rôle : Stocker et gérer les données de l'application.

- Laravel:  est un framework PHP.
   - Rôle : Faciliter le développement en fournissant une structure MVC, des outils de migration de base de données, etc.

- AdminLTE: est un thème d'administration basé sur Bootstrap.
    - Rôle: Offrir une interface utilisateur moderne et réactive pour la gestion de l'application.

<!-- new slide -->

## Prototype

![prototype](./images/prototype.png){:width="500px"}*figure: prototype*

<!-- note -->

Dans cette partie, nous créons un prototype, en utilisant le pattern repository pour gérer les données. Nous ajoutons le support multilingue pour l'interface utilisateur, renforçons la sécurité avec l'authentification, et suivons des bonnes pratiques de déploiement pour une application prête à être utilisée en production.

<!-- new slide -->


