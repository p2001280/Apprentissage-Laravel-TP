
# Apprentissage-Laravel-TP

## Introduction

**Apprentissage-Laravel-TP** est un projet pour apprendre Laravel à travers des exercices pratiques.

## Prérequis

- PHP >= 7.3
- Composer
- Node.js & npm
- MySQL ou autre SGBD compatible

## Installation

1. Clonez le dépôt :
   ```bash
   git clone https://github.com/p2001280/Apprentissage-Laravel-TP.git
   cd Apprentissage-Laravel-TP
   ```

2. Installez les dépendances :
   ```bash
   composer install
   npm install
   ```

3. Configurez l'environnement :
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Configurez la base de données dans `.env`.

5. Exécutez les migrations :
   ```bash
   php artisan migrate
   ```

6. Lancez le serveur :
   ```bash
   php artisan serve
   ```

## Utilisation

Le projet couvre :
- Routage
- Contrôleurs
- Vues (Blade)
- Modèles (Eloquent ORM)
- Migrations
- Authentification
- Middleware
