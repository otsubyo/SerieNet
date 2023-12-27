# SERIE NET

---

<img  style="margin: 0 10px 0;" alt="" src="./ressources/images/sn_logo.png">

## Description
**SERIE NET** est une application web permettant de rechercher des séries TV des années 90

# Sommaire

* **[Sommaire](#sommaire)**
* **[Informations](#informations)**
* **[Fonctionnalités](#fonctionnalités)**
* **[Auteurs](#auteurs)**
* **[Crédits](#crédits)**


## Informations

* **Version :** 1.5.0
* **Dernière mise à jour :** 20/10/2021
* **Langages utilisés :**
  * HTML5
  * CSS3
  * JavaScript
  * PHP
  * SQL
  * JSON
* **Base de données :** MySQL
* **Serveur :** Apache
* **API FLASK:** [serieNet API](https://github.com/Maxiwere45/seriesNet)

### Fonctionnent en interne
  
<img  style="float:inherit; margin: 0 10px 0;" alt="" src="./ressources/images/API.png">


Lorsque l'utilisateur effectue une recherche, l'application PHP envoie une requête
au serveur Flask qui va effectuer une recherhe avec l'algorithme TF-IDF sur les données vectorisées [SOUS-TITRES]. 
Le serveur Flask va ensuite renvoyer les résultats en JSON à l'application PHP qui va effectuer une recherche 
dans la base de données MySQL pour récupérer les informations des séries TV et les afficher à l'utilisateur.

## Fonctionnalités

* **Recherche de séries TV**

<img alt="" src="./ressources/images/recherche.png">

### **Affichage des informations de la série**

<img alt="" src="./ressources/images/serie.png">

### **Mise en favoris des séries**

<img alt="" src="./ressources/images/favoris.png">

### **Affichage des séries similaires**

<img alt="" src="./ressources/images/similaires.png">

### **Affichage des séries populaires**

<img alt="" src="./ressources/images/populaires.png">

### **Affichage des séries les mieux notées** `En cours de développement`

### **Recommendation de séries**

<img alt="" src="./ressources/images/recommendation.png">


## Auteurs

* **Anrifou Amdjad** _alias_ [@Maxiwere45](https://github.com/Maxiwere45)
* **PREMI CARL** _alias_ [@otsubyo](https://github.com/otsubyo)

* Professeurs encadrants :
  * **M. BROISIN JULIEN** _alias_ [@bretonJulien](https://www.linkedin.com/in/jln-brtn/)
  * **M. BRETON JULIEN** _alias_ [@broisinJulien](https://www.linkedin.com/in/jbroisin/)

## Crédits

Ce projet a été réalisé dans le cadre d'un projet scolaire à l'[IUT PAUL SABATIER de Toulouse](https://iut.univ-tlse3.fr/) pour l'année 2023-2024 dans le
parcour [Administration, gestion et exploitation des bases de données](https://iut.univ-tlse3.fr/but-informatique-parcours-administration-gestion-et-exploitation-des-donnees-toulouse) (AGED).