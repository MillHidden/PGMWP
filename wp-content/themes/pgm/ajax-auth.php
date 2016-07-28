
<form id="inscription" class="ajax-auth"  action="register" method="post">
    <h3>Déjà un compte? <a id="pop_login"  href="">Connexion</a></h3>
    <hr />
    <h1>Inscription</h1>
    <p class="status"></p>
    <?php wp_nonce_field('ajax-register-nonce', 'signonsecurity'); ?>         
    <label for="signonname">Username</label>
    <input id="signonname" type="text" name="signonname" >
    <label for="email">Email</label>
    <input id="email" type="text" name="email">
    <label for="signonpassword">Mot de passe</label>
    <input id="signonpassword" type="password" name="signonpassword" >
    <label for="password2">Confirmer le mot de passe</label>
    <input type="password" id="password2" name="password2">
    J'accepte le <a href="#">règlement</a> du site PureGameMedia <input type="checkbox" id="check" name="check" /> 
    <input class="submit_button" type="submit" value="Inscription">
    <a class="close" href="">(fermer)</a>    
</form>

<form id="connexion" class="ajax-auth"  action="login" method="post">
    <h3>Nouveau? <a id="pop_signup" href="">Inscription</a></h3>
    <hr />
    <h1>Connexion</h1>
    <p class="status"></p>  
    <?php wp_nonce_field('ajax-login-nonce', 'security'); ?>  
    <label for="username">Username</label>
    <input id="username" type="text" class="required" name="username">
    <label for="password">Mot de passe</label>
    <input id="password" type="password" class="required" name="password">
    <a class="text-link" href="<?php
        echo wp_lostpassword_url(); ?>">Mot de passe perdu?</a>
    <input class="submit_button" type="submit" value="Se connecter">
	<a class="close" href="">(fermer)</a>    
</form>
 
