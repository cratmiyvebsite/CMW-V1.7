<?php
class CompteAdmin
{
    public function __construct($bdd, $pseudo, $mdp, $email)
    {	
		$mot_de_passe = password_hash($mdp, PASSWORD_DEFAULT);
		$req = $bdd->prepare('INSERT INTO cmw_users (id, pseudo, mdp, email, anciennete, newsletter, rang, tokens, age, skype, resettoken, ip, CleUnique, ValidationMail) VALUES (NULL, :pseudo, :mdp, :email, :date, 0, 1, 0, 0, "", 0, 0, 0, 1)');
		$req->execute(Array (
			'pseudo' => $pseudo,
			'mdp' => $mot_de_passe,
			'email' => $email,
			'date' => time() 
		));
	}		
}
?>
