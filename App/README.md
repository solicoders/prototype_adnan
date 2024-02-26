# Initialisation de l'application

## Table des matières
- [Initialisation de l'application](#initialisation-de-lapplication)
  - [Table des matières](#table-des-matières)
    - [Travail à faire](#travail-à-faire)
    - [Critères de validation](#critères-de-validation)
    - [Les étapes de l'installation d'AdminLTE](#les-étapes-de-linstallation-dadminlte)

### Travail à faire

* Création d'un projet Laravel
* Installation d'AdminLTE
* Rédaction du fichier README
* Configuration de Laravel pour utiliser Vite

### Critères de validation

* Le projet Laravel est fonctionnel.
* AdminLTE est correctement installé et configuré.
* Le fichier README est clair et complet.
* Les fonctionnalités de base d AdminLTE sont implémentées.
* Le design est adapté aux besoins du projet.

### Les étapes de l'installation d'AdminLTE

**1. Installation des prérequis**

* Node.js
* NPM
* PHP 7.2.5 ou supérieur
* Un serveur web (Apache, Nginx, etc.)

**2. Création d'un projet Laravel**

```bash
composer create-project laravel/laravel mon-projet
```

**3. Installation d'AdminLTE**

```bash
npm install admin-lte@3.1.0 @fortawesome/fontawesome-free
```

**4. Publication des assets d'AdminLTE**

```bash
php artisan vendor:publish --provider="AdminLTE\AdminLTEServiceProvider"
```

**5. Importation des CSS et JavaScript d'AdminLTE**

Dans `public/css/app.css`, importer les CSS d'AdminLTE et Font Awesome :

```css
@import 'admin-lte/plugins/fontawesome-free/css/all.min.css';
@import 'admin-lte/dist/css/adminlte.min.css';
```

Dans `public/js/app.js`, importer le JavaScript d'AdminLTE :

```javascript
import 'admin-lte/dist/js/adminlte';
```

**6. Installer les dépendances et construire les assets**

```bash
npm install
npm run dev
```

**7. Configuration de Laravel pour utiliser Vite**

Ouvrez votre fichier de mise en page Laravel (par exemple, `resources/views/layouts/app.blade.php`) et incluez les assets Vite :

```html
@vite(['my-vite-project/src/main.js'])
```

Assurez-vous d'ajuster le chemin en fonction de la structure de votre projet.

**8. Lancer le serveur de développement Laravel**

Démarrez le serveur de développement Laravel pour prévisualiser votre application.

```bash
php artisan serve
```

**9. Configuration de la base de données**

Si nécessaire, configurez la connexion à la base de données dans le fichier `.env`.

**10. Utilisation d'AdminLTE**

Utilisez les templates et les composants d'AdminLTE dans vos vues Blade.

**11. Adaptation du design**

Modifier les variables CSS d'AdminLTE ou créer votre propre thème pour adapter le design aux besoins du projet.

**Présentation**
* Présentation : [Réalisation-package-starter]( https://docs.google.com/presentation/d/1A3YdTje6L41ELqJpGhJiJ-NSPIiZntfTNhm7ZwhkK0k/edit?usp=sharing)

**Ressources utiles**

* Documentation d'AdminLTE : [https://adminlte.io/docs/3.1/](https://adminlte.io/docs/3.1/)
* Tutoriels Laravel : [https://laracasts.com/](https://laracasts.com/)
* Forum de la communauté Laravel : [https://laracasts.com/discuss](https://laracasts.com/discuss)




