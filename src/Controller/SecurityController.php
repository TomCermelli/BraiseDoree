<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;



use App\Entity\User; /* On appel User vu que c'est lui le concerné*/
use App\Form\RegistrationType; /* On a besoin de la RegistrationType pour le relier à User*/

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_registration")
     */

    public function registration(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder) { /* Cette fonction sert pour l'inscription*/
      /* ObjectManager pour enregistrer l'utilisateur en base*/
      /* L'encoder est ce qui va permettre de crypter le mot de passe afin d'ajouter une couche de sécurité*/
      $user = new User(); /* On crée un nouvel utilisateur */
      $form = $this->createForm(RegistrationType::class, $user);/* Crée un formulaire selon RegistrationType relier à l'objet User appellé sous la variable $user*/

      $form->handleRequest($request);

      if($form->isSubmitted() && $form->isValid()) { /*On passera les données uniquement si le formulaire est valide*/
        $hash = $encoder->encodePassword($user, $user->getPassword());
        /*On passe l'User à l'encoder, étant donné que dans le fichier security.yaml on a déja déterminé quelle algorithm utiliser,
         nous n'avons pas besoin de lui envoyer le type de cryptage. On envoie ensuite ce que l'ont veut encoder, ici le mot de passe de l'User*/
        $user->setPassword($hash);
        $roles=array('ROLE_USER');
        $user->setRoles($roles); /* Avant d'envoyer toutes les données en base, on met le role par défaut de l'utilisateur (ROLE_USER) */

        $manager->persist($user); /* On prépare les données*/
        $manager->flush(); /* On envoie les données à la base*/

        $this->addFlash('succes', 'Votre compte à bien été enregistré.'); /* Si tout se passe bien un message est affiché à l'utilsateur*/

        return $this->redirectToRoute('security_login');/* Une fois que toute les données sont envoyées à la base, nous redirigeons l'utilisateur sur la page de connexion*/
      }
      return $this->render ('security/registration.html.twig' , [
        'form' =>$form->createView()
      ]);
    }

    /**
     * @Route("/connexion", name="security_login")
     */
    public function login(Request $request, AuthenticationUtils $authenticationUtils){

        $error = $authenticationUtils->getLastAuthenticationError();/*on récupère une erreur si le formulaire soumis est invalide (mauvais identifiant ou mot de passe)*/
        $lastUsername = $authenticationUtils->getLastUsername();/*le dernier nom entré par l'utilisateur (notre identifiant est ici l'email)*/


        return $this->render('security/login.html.twig' , [
          'last_username' => $lastUsername,
          'error' => $error
        ]);
    }

    /**
     * @Route("/deconnexion", name="security_logout")
     */
    public function logout() {

    }

}
