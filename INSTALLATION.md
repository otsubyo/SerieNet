# Instruction pour l'installation de l'application web

<img src="./ressources/images/arrow.png" alt="serieNet" width="110"/>

## Sommaire

* **[Prérequis](#prérequis)**
* **[Installation](#installation)**
  * **[1. Télécharger le projet](#1-télécharger-le-projet)**
  * **[2. Créer la base de données](#2-créer-la-base-de-données)**
  * **[3. Configurer le serveur Apache](#3-configurer-le-serveur-apache)**
  * **[4. Configurer l'API FLASK](#4-configurer-lapi-flask)**
  * **[5. Lancer l'application](#5-lancer-lapplication)**
  

## Prérequis

* **Serveur web :** Apache
* **Base de données :** MySQL
* **Langages :** HTML5, CSS3, JavaScript, PHP, SQL, JSON
* **API FLASK:** [serieNet API](https://github.com/Maxiwere45/seriesNet)

## Installation

* Si vous avez en possesion la VM **serieNet.ova**, lisez plutôt le fichier README.md situé au bureau de la VM.

### 1. Télécharger le projet

* Télécharger le projet en cliquant sur le bouton vert **Code** puis **Download ZIP** ou en utilisant la commande suivante :

```bash
git clone [le lien du projet]
```

### 2. Créer la base de données

* Créer une base de données MySQL avec le nom **serie_net** et l'encodage **utf8mb4_unicode_ci**.
* Importer le fichier **serie_net.sql** dans la base de données contenu dans le dossier `ressources/sql_data_share`.
* Créer un utilisateur avec le nom `root` et le mot de passe `9dfe351b` et lui donner tous les privilèges sur la base de données **serie_net**.

### 3. Configurer le serveur Apache

* Copier le dossier **serieNet** dans le dossier `www` de votre serveur Apache.
* Activer le module **rewrite** d'Apache avec la commande suivante :

```bash
sudo a2enmod rewrite
```

* Créer un fichier de config **serieNet.conf** dans le dossier `sites-available` d'Apache avec la commande suivante :

```bash
sudo cp /ressources/serieNet.conf /etc/apache2/sites-available/serieNet.conf
```

* Activer le site **serieNet** avec la commande suivante :

```bash
sudo a2ensite serieNet
```

* Redémarrer le serveur Apache avec la commande suivante :

```bash
sudo service apache2 restart
```

### 4. Configurer l'API FLASK

* Télécharger le projet de l'API FLASK [serieNet API](https://github.com/Maxiwere45/seriesNet) et suivre les instructions d'installation et de lancement.

### 5. Lancer l'application

* Lancer l'application en allant sur l'adresse suivante : [http://localhost/view/html/login](http://localhost/view/html/login)
* Consulter le fichier **users.yml** dans le dossier `ressources/` pour avoir les identifiants des utilisateurs.
