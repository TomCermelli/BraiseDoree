<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;



use App\Entity\User; /*on appel User vu que c'est lui le concerné*/
use App\Form\RegistrationType; /* On a besoin de la RegistrationType pour le relier à User*/

class SecurityController extends AbstractController
{
    /**
     * @Route("/inscription", name="security_registration")
     */
    public function registration(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder) {
      /*ObjectManager pour enregistrer l'utilisateur en base*/
      /*L'encoder est ce qui va permettre de crypter le mot de passe afin d'ajouter une couche de sécurité*/
      $user = new User();
      $form = $this->createForm(RegistrationType::class, $user);/*crée un form selon RegistrationType relier à User*/

      $form->handleRequest($request);

      if($form->isSubmitted() && $form->isValid()) { /*On passera les données uniquement si le formulaire est valide*/
        $hash = $encoder->encodePassword($user, $user->getPassword());
        /*On passe l'User à l'encoder ,étant donné que dans le fichier security.yaml on a déja déterminer quelle algorithm utiliser,
         nous n'avons pas besoin de lui envoyer le type de cryptage. On envoie ensuite ce que l'ont veut encoder, ici le mot de passe de l'user*/
        $user->setPassword($hash);

        $manager->persist($user); /*On prépare les données*/
        $manager->flush(); /*On envoie les données*/

        return $this->redirectToRoute('security_login');
      }
      return $this->render ('security/registration.html.twig' , [
        'form' =>$form->createView()
      ]);
    }

    /**
     * @Route("/connexion", name="security_login")
     */
    public function login(){
        return $this->render('security/login.html.twig');

    }

    /**
     * @Route("/deconnexion", name="security_logout")
     */
    public function logout() {

    }

}
