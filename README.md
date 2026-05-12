# 🎮 Site de Cantin — Laravel

## Stack
- Laravel 11 + Breeze (auth)
- Tailwind CSS v3
- MySQL/PostgreSQL
- Font Awesome 6

## Installation rapide

```bash
# 1. Cloner / décompresser le projet
cd cantin-site

# 2. Dépendances PHP
composer install

# 3. Dépendances JS
npm install && npm run build

# 4. Configuration
cp .env.example .env
php artisan key:generate

# 5. Base de données (éditer .env avec tes identifiants DB)
php artisan migrate --seed

# 6. Storage public
php artisan storage:link

# 7. Lancer
php artisan serve
```

## Accès Admin
- URL : `/admin`
- Email : `admin@cantin.fr`
- Mot de passe : `changeme!` ← **À CHANGER immédiatement !**

## Middleware role
Enregistre `CheckRole` dans `bootstrap/app.php` :
```php
->withMiddleware(function (Middleware $middleware) {
    $middleware->alias(['role' => \App\Http\Middleware\CheckRole::class]);
})
```

## Structure DB
| Table | Rôle |
|---|---|
| `users` | Auth + colonne `role` (user/admin) |
| `site_settings` | Tous les paramètres du site (clé/valeur) |
| `sections` | Blocs de contenu texte/HTML modifiables |
| `setup_items` | Équipements setup avec image et prix |
| `social_links` | Réseaux sociaux (navbar, footer) |

## Personnalisation
Tous les contenus texte, liens, et paramètres sont modifiables depuis `/admin`
sans toucher au code. Le seul moment où tu touches au code c'est pour
ajouter de nouvelles fonctionnalités.
