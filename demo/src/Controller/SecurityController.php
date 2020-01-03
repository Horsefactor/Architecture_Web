<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends Controller
{
    /**
     * @Route("/security/registration", name="security_registration")
     * @Route("/main/{id}/edit_my_data", name="data_edit")
     */
    public function registration(User $user = null, Request $request, ObjectManager $manager,
                                UserPasswordEncoderInterface $encoder){
        if(!$user){
            $user = new User();
        }
        
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            
            $hash = $encoder->encodePassword($user, $user->getPassword());

            $user->setPassword($hash);

            $manager->persist($user);
            $manager->flush();

            return $this->redirectToRoute('security_login');
        }
        return $this->render('Security/registration.html.twig',[
            'form'=> $form->createView(),
            'editMode' => $user->getId() !== null
        ]);
    }
    /**
     * @Route("/security/login", name="security_login")
     */
    public function login(){
        return $this->render('Security/login.html.twig',[
            'redirectionMode' => false
        ]);
    }

    /**
     * @Route("/logout", name="security_logout")
     */

    public function logout(){}
}
