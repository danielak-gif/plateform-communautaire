# Documentation Détaillée : Diagrammes et Dictionnaire des Données

## Table des matières
1. [Diagramme de Cas d'Utilisation](#diagramme-de-cas-dutilisation)
2. [Diagramme de Classes](#diagramme-de-classes)
3. [Dictionnaire des Données](#dictionnaire-des-données)

---

## Diagramme de Cas d'Utilisation

### C'est quoi ?
Un diagramme de cas d'utilisation est une représentation visuelle qui montre **qui utilise quoi dans ton application** et **quelles actions ils peuvent faire**.

Imagine ton application comme un restaurant :
- **Les acteurs** = Les clients, les serveurs, le chef
- **Les cas d'utilisation** = Commander un plat, payer, préparer la cuisine

### Pourquoi c'est important ?
- C'est la première étape avant de coder
- Ça montre la vue d'ensemble de l'application
- Ça aide à comprendre ce que chaque utilisateur peut faire
- C'est un moyen de communiquer avec les clients/professeurs sans parler technique

### Comment le construire ?

#### Étape 1 : Identifier les acteurs (les utilisateurs)
Les acteurs sont les **personnes ou systèmes** qui interagissent avec ton application.

**Pour la Plateforme Communautaire, les acteurs sont :**
- **Admin** : L'administrateur qui gère les comptes et approuve les profils
- **Utilisateur Authentifié** : Une personne connectée qui peut voir les profils et soumettre sa candidature
- **Visiteur** : Une personne qui visite le site sans se connecter (peut voir les annonces et la page Projet 8)

#### Étape 2 : Identifier les cas d'utilisation (les actions)
Les cas d'utilisation sont les **actions que les acteurs font** dans l'application.

**Pour la Plateforme Communautaire :**

**Visiteur (pas connecté) peut :**
- Voir la page d'accueil
- Consulter les annonces publiées
- Consulter la page Projet 8 avec les membres
- Voir les documents du projet (diagrammes, dictionnaire)
- S'inscrire
- Se connecter

**Utilisateur Authentifié (connecté) peut :**
- Voir son profil personnel
- Éditer son profil
- Consulter l'annuaire des membres
- Soumettre son profil à l'annuaire (avec photo)
- Voir son statut d'approbation (En attente, Approuvé, Rejeté)
- Se déconnecter
- Réinitialiser son mot de passe

**Admin peut :**
- Faire tout ce que l'utilisateur fait
- Approuver les profils soumis
- Rejeter les profils
- Supprimer des profils
- Exporter les données en Excel ou PDF
- Publier des annonces
- Supprimer des annonces

#### Étape 3 : Créer le diagramme

**Format simple (en texte) :**
```
┌─────────────────────────────────────────────────────────────┐
│           PLATEFORME COMMUNAUTAIRE                          │
├─────────────────────────────────────────────────────────────┤
│                                                             │
│  ┌──────────┐      ┌──────────────────────┐               │
│  │ Visiteur │      │  Utilisateur         │               │
│  │ (Pas     │      │  Authentifié         │               │
│  │connexion)│      │                      │               │
│  └────┬─────┘      └──────┬───────────────┘               │
│       │                   │                                │
│       └─ Voir annonces    ├─ Voir annuaire                │
│       │                   ├─ Éditer profil                │
│       ├─ S'inscrire       ├─ Soumettre profil             │
│       │                   ├─ Consulter statut             │
│       ├─ Se connecter     └─ Se déconnecter               │
│       │                                                   │
│       └─ Voir Projet 8                                    │
│                                                             │
│  ┌──────────────────────┐                                 │
│  │ Admin                │                                  │
│  └────┬─────────────────┘                                 │
│       │                                                    │
│       ├─ Approuver profils                                │
│       ├─ Rejeter profils                                  │
│       ├─ Supprimer profils                                │
│       ├─ Exporter en Excel                                │
│       ├─ Exporter en PDF                                  │
│       ├─ Créer annonces                                   │
│       └─ Supprimer annonces                               │
│                                                             │
└─────────────────────────────────────────────────────────────┘
```

**En UML standard (à faire avec un outil comme Lucidchart, Draw.io ou PlantUML) :**
- Acteurs = Petits bonhommes (stick figures)
- Cas d'utilisation = Petits ovales/ellipses
- Lignes = Associations entre acteurs et cas d'utilisation
- Boîte englobante = Le système (l'application)

### Outils pour créer le diagramme :
- **Draw.io** (gratuit, web) : draw.io
- **Lucidchart** (gratuit avec limite) : lucidchart.com
- **PlantUML** (code/texte) : plantuml.com
- **StarUML** (logiciel) : staruml.io

---

## Diagramme de Classes

### C'est quoi ?
Un diagramme de classes est une **représentation de la structure de ton code**.
Il montre :
- **Les classes** (les modèles de données)
- **Leurs propriétés** (attributs/variables)
- **Leurs actions** (méthodes/fonctions)
- **Comment elles se connectent** (relations)

Imagine un jeu vidéo :
- **Classe Personnage** : a une vie, un nom, une force → peut attaquer, se défendre, mourir
- **Classe Arme** : a une puissance, un type → peut faire dégâts
- Un personnage **possède** une arme (relation)

### Pourquoi c'est important ?
- C'est le plan technique de ton application
- Ça montre comment les données sont organisées
- Ça aide les développeurs à comprendre la structure
- C'est facile à vérifier et à modifier avant de coder

### Comment le construire ?

#### Étape 1 : Lister les classes principales
Dans ta Plateforme Communautaire, les classes sont :

**1. Classe User (Utilisateur)**
- Propriétés :
  - `id` : identifiant unique
  - `name` : nom de l'utilisateur
  - `email` : adresse email
  - `password` : mot de passe hashé
  - `is_admin` : booléen (true si admin, false sinon)
  - `created_at` : date de création
  - `updated_at` : date de modification

- Méthodes :
  - `create()` : créer un utilisateur
  - `update()` : modifier un utilisateur
  - `delete()` : supprimer un utilisateur
  - `hasProfile()` : vérifier s'il a un profil

**2. Classe Profile (Profil Communauté)**
- Propriétés :
  - `id` : identifiant unique
  - `user_id` : lien vers User (clé étrangère)
  - `bio` : biographie/description
  - `photo_path` : chemin de la photo
  - `website` : lien personnel
  - `status` : état (pending, approved, rejected)
  - `created_at` : date de création
  - `updated_at` : date de modification

- Méthodes :
  - `create()` : créer un profil
  - `getUser()` : récupérer l'utilisateur lié
  - `approve()` : approuver le profil
  - `reject()` : rejeter le profil

**3. Classe Annonce**
- Propriétés :
  - `id` : identifiant unique
  - `title` : titre de l'annonce
  - `content` : contenu de l'annonce
  - `created_by` : ID de l'admin qui a créé
  - `created_at` : date de création
  - `updated_at` : date de modification

- Méthodes :
  - `create()` : créer une annonce
  - `update()` : modifier une annonce
  - `delete()` : supprimer une annonce
  - `getAuthor()` : récupérer l'admin auteur

#### Étape 2 : Représenter les relations

**Relations de ta Plateforme :**

1. **User ← → Profile** (relation 1-à-1)
   - Un User a UN Profile
   - Un Profile appartient à UN User

2. **User ← → Annonce** (relation 1-à-plusieurs)
   - Un User (Admin) a créé PLUSIEURS Annonces
   - Une Annonce est créée par UN User (Admin)

#### Étape 3 : Format du diagramme de classes

**En texte simple :**
```
┌──────────────────────┐
│      User            │
├──────────────────────┤
│ - id: Integer        │
│ - name: String       │
│ - email: String      │
│ - password: String   │
│ - is_admin: Boolean  │
│ - created_at: Date   │
│ - updated_at: Date   │
├──────────────────────┤
│ + create()           │
│ + update()           │
│ + delete()           │
│ + hasProfile()       │
└──────────────────────┘
         │
         │ owns (1-to-1)
         ▼
┌──────────────────────┐
│     Profile          │
├──────────────────────┤
│ - id: Integer        │
│ - user_id: Integer   │◄─── Foreign Key
│ - bio: Text          │
│ - photo_path: String │
│ - website: String    │
│ - status: Enum       │
│ - created_at: Date   │
│ - updated_at: Date   │
├──────────────────────┤
│ + create()           │
│ + getUser()          │
│ + approve()          │
│ + reject()           │
└──────────────────────┘
```

**En UML standard (avec un outil) :**
- Chaque classe = Rectangle divisé en 3 sections :
  - Haut : Nom de la classe
  - Milieu : Attributs (propriétés) avec types
  - Bas : Méthodes (actions)
- Relations = Flèches/lignes entre classes

### Outils pour créer le diagramme :
- **Draw.io**
- **Lucidchart**
- **StarUML**
- **Visual Studio Code** avec extensions PlantUML
- **PlantUML** (code textuel)

---

## Dictionnaire des Données

### C'est quoi ?
Le dictionnaire des données est une **liste détaillée de TOUS les champs** de ta base de données.

Pour chaque champ, tu documentes :
- Son nom
- Son type de donnée
- Sa description
- Si c'est obligatoire ou non
- S'il a des contraintes (longueur max, valeurs autorisées, etc.)

Imagine une fiche d'inscription :
- **Nom** : texte, obligatoire, max 100 caractères
- **Email** : texte, obligatoire, doit être un email valide
- **Age** : nombre, facultatif, entre 1 et 150

### Pourquoi c'est important ?
- Garantit la cohérence des données
- Aide à éviter les erreurs de saisie
- Documente le projet pour les futurs développeurs
- Facilite la maintenance

### Comment le créer ?

#### Tableau complet du Dictionnaire des Données

**Table: users**

| Champ | Type | Nullable | Contraintes | Description |
|-------|------|----------|-------------|-------------|
| id | Integer | Non | PRIMARY KEY, AUTO_INCREMENT | Identifiant unique auto-généré |
| name | String(255) | Non | - | Nom complet de l'utilisateur |
| email | String(255) | Non | UNIQUE | Adresse email unique |
| password | String(255) | Non | - | Mot de passe hashé (jamais en clair) |
| email_verified_at | Timestamp | Oui | - | Date de vérification d'email |
| is_admin | Boolean | Non | DEFAULT: false | 1 = admin, 0 = utilisateur normal |
| remember_token | String(100) | Oui | - | Token pour "Se souvenir de moi" |
| created_at | Timestamp | Non | DEFAULT: NOW() | Date de création du compte |
| updated_at | Timestamp | Non | DEFAULT: NOW() | Date de dernière modification |

**Table: profiles**

| Champ | Type | Nullable | Contraintes | Description |
|-------|------|----------|-------------|-------------|
| id | Integer | Non | PRIMARY KEY, AUTO_INCREMENT | Identifiant unique auto-généré |
| user_id | Integer | Non | FOREIGN KEY (users.id) | Lien vers l'utilisateur |
| bio | Text | Oui | Max 1000 caractères | Biographie/description personnelle |
| photo_path | String(255) | Oui | - | Chemin vers la photo de profil |
| website | String(255) | Oui | - | Lien vers le site personnel |
| status | Enum | Non | pending, approved, rejected | État d'approbation du profil |
| created_at | Timestamp | Non | DEFAULT: NOW() | Date de création du profil |
| updated_at | Timestamp | Non | DEFAULT: NOW() | Date de dernière modification |

**Table: annonces**

| Champ | Type | Nullable | Contraintes | Description |
|-------|------|----------|-------------|-------------|
| id | Integer | Non | PRIMARY KEY, AUTO_INCREMENT | Identifiant unique auto-généré |
| title | String(255) | Non | Max 255 caractères | Titre de l'annonce |
| content | Text | Non | - | Contenu/description de l'annonce |
| created_by | Integer | Non | FOREIGN KEY (users.id) | Admin qui a créé l'annonce |
| created_at | Timestamp | Non | DEFAULT: NOW() | Date de création |
| updated_at | Timestamp | Non | DEFAULT: NOW() | Date de dernière modification |

#### Explications détaillées

**Types de données :**
- **Integer** : Nombre entier (1, 42, -5)
- **String(255)** : Texte limité à 255 caractères
- **Text** : Texte sans limite de taille
- **Boolean** : Vrai/Faux (1/0)
- **Timestamp** : Date et heure
- **Enum** : Liste de valeurs prédéfinies

**Contraintes importantes :**
- **PRIMARY KEY** : Identifie de manière unique chaque ligne
- **FOREIGN KEY** : Lie deux tables ensemble
- **UNIQUE** : La valeur ne peut pas se répéter
- **NOT NULL** : Le champ est obligatoire
- **DEFAULT** : Valeur par défaut si non fournie
- **AUTO_INCREMENT** : La base de données génère automatiquement le numéro

**Nullable :**
- **Non** = Obligatoire (ne peut pas être vide)
- **Oui** = Facultatif (peut être vide)

#### Exemple réel dans ta base de données

**Pour la table users :**
```
users
├── id = 1
│   ├── name = "AKONDE Daniel"
│   ├── email = "daniel@example.com"
│   ├── password = "$2y$12$..." (hashé, pas lisible)
│   ├── is_admin = 1 (car c'est un admin)
│   ├── created_at = 2026-05-23 10:30:45
│   └── updated_at = 2026-05-24 15:20:10
│
└── id = 2
    ├── name = "Joanel ANATO"
    ├── email = "joanel@example.com"
    ├── password = "$2y$12$..." (hashé)
    ├── is_admin = 0 (utilisateur normal)
    ├── created_at = 2026-05-24 12:15:30
    └── updated_at = 2026-05-24 12:15:30
```

**Pour la table profiles (liée à users) :**
```
profiles
├── id = 1
│   ├── user_id = 2 (lié à Joanel)
│   ├── bio = "Développeur passionné par le web"
│   ├── photo_path = "storage/app/public/profiles/joanel.jpg"
│   ├── website = "https://joanel.example.com"
│   ├── status = "approved" (approuvé par un admin)
│   ├── created_at = 2026-05-24 13:00:00
│   └── updated_at = 2026-05-25 10:30:00
```

---

## Résumé et bonnes pratiques

### Pour le Diagramme de Cas d'Utilisation :
✓ Identifier tous les acteurs (visiteur, user, admin)
✓ Lister les actions que chaque acteur peut faire
✓ Montrer clairement les limites du système
✓ Garder simple et lisible

### Pour le Diagramme de Classes :
✓ Créer une classe pour chaque table importante
✓ Lister tous les attributs avec types
✓ Documenter les relations (1-à-1, 1-à-plusieurs)
✓ Inclure les méthodes principales

### Pour le Dictionnaire des Données :
✓ Créer un tableau pour chaque table
✓ Spécifier le type exact de chaque champ
✓ Documenter les contraintes et limitations
✓ Expliquer le rôle de chaque champ

### Ordre recommandé pour créer la documentation :
1. **Diagramme de Cas d'Utilisation** (vue utilisateur)
2. **Dictionnaire des Données** (structure des données)
3. **Diagramme de Classes** (vue technique)

Cet ordre va du plus simple au plus technique, ce qui facilite la compréhension globale du projet.

---

**Généré pour la Plateforme Communautaire - Projet 8**
