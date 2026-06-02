<?php
session_start();
require_once ROOT."/model/userModel.php";

// ─── FORMULAIRE D'INSCRIPTION ─────────────────────────────────
$registerForm = function(){
    loadView("auth/register", [], "log");
};

// ─── TRAITEMENT INSCRIPTION ──────────────────────────────────
$register = function(){
    $errors = [];
    
    // Validation des champs
    if(empty($_POST['nom'])){
        $errors['nom'] = "Le nom est requis";
    }
    
    if(empty($_POST['prenom'])){
        $errors['prenom'] = "Le prénom est requis";
    }
    
    if(empty($_POST['email'])){
        $errors['email'] = "L'email est requis";
    } elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errors['email'] = "Email invalide";
    } elseif(emailExiste($_POST['email'])){
        $errors['email'] = "Cet email est déjà utilisé";
    }
    
    if(empty($_POST['password'])){
        $errors['password'] = "Le mot de passe est requis";
    } elseif(strlen($_POST['password']) < 6){
        $errors['password'] = "Le mot de passe doit contenir au moins 6 caractères";
    }
    
    if($_POST['password'] !== $_POST['confirm_password']){
        $errors['confirm_password'] = "Les mots de passe ne correspondent pas";
    }
    
    if(empty($errors)){
        // Insérer l'utilisateur avec mot de passe en clair
        createUser(
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['password'],  // Mot de passe en clair
            $_POST['role'] ?? 'user'
        );
        
        $success = "Inscription réussie ! Vous pouvez maintenant vous connecter.";
        loadView("auth/login", [
            "success" => $success
        ], "log");
    } else {
        loadView("auth/register", [
            "errors" => $errors,
            "nom" => $_POST['nom'] ?? '',
            "prenom" => $_POST['prenom'] ?? '',
            "email" => $_POST['email'] ?? ''
        ], "log");
    }
};

// ─── FORMULAIRE DE CONNEXION ─────────────────────────────────
$loginForm = function(){
    loadView("auth/login", [], "log");
};

// ─── TRAITEMENT CONNEXION ────────────────────────────────────
$login = function(){
    $errors = [];
    
    if(empty($_POST['email'])){
        $errors['email'] = "L'email est requis";
    }
    
    if(empty($_POST['password'])){
        $errors['password'] = "Le mot de passe est requis";
    }
    
    if(empty($errors)){
        $user = getUserByEmail($_POST['email']);
        
        // Comparaison directe (pas de hashage)
        if($user && $user['password'] == $_POST['password']){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_nom'] = $user['nom'];
            $_SESSION['user_prenom'] = $user['prenom'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_role'] = $user['role'];
            
            redirectTo("dashboard", "index");
        } else {
            $error = "Email ou mot de passe incorrect";
            loadView("auth/login", [
                "error" => $error,
                "email" => $_POST['email']
            ], "log");
        }
    } else {
        loadView("auth/login", [
            "errors" => $errors,
            "email" => $_POST['email']
        ], "log");
    }
};

// ─── DÉCONNEXION ────────────────────────────────────────────
$logout = function(){
    session_destroy();
    redirectTo("auth", "login");
};

// ─── ROUTER DES ACTIONS ─────────────────────────────────────
$actions = [
    //"registerForm" => $registerForm,
    //"register"     => $register,
    //"loginForm"    => $loginForm,
    "login"        => $login,
    "logout"       => $logout
];

$action = $_REQUEST["action"] ?? "loginForm";

if(array_key_exists($action, $actions)){
    $actions[$action]();
} else {
    echo "Page introuvable";
    exit();
}
?>