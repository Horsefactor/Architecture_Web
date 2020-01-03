<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Entity\Category;
use App\Form\SearchType;
use App\Form\AnnonceFormType;
use App\Repository\AnnonceRepository;
use App\Form\AddCategoryFormType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProjectController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
        return $this->render('project/index.html.twig', [
            'controller_name' => 'ProjectController'
        ]);
    }

    /**
     * @Route("/main/account", name="account")
     */
    public function account(Security $security)
    {
        if($security->getUser() !== null){
            return $this->render('project/account.html.twig');
        }

        return $this->redirectToRoute('security_login',[
            'redirectionMode' => true
        ]);;
        
    }

    /**
     * @Route("/main/Annonce", name="Annonce")
     */
    public function Annonce(Request $request)
    {
        $repo = $this->getDoctrine()->getRepository(Annonce::class);

        $annonces = $repo->findAll();

        return $this->render('project/Annonce.html.twig', [
            'controller_name' => 'ProjectController',
            'annonces' => $annonces
        ]);
    }
    
    /**
     * @Route("/main/my_posts", name="my_posts")
     */
    public function show_my_posts(Security $security)
    {
        $user = $security->getUser();
        $annonces = $user->getAnnonces();

        return $this->render('project/Annonce.html.twig', [
            'controller_name' => 'ProjectController',
            'annonces' => $annonces
        ]);
    }
    /**
     * @Route("/main/Search", name="search_posts")
     */
    public function showSearch(Request $request, AnnonceRepository $annonceRepository){
        $form = $this->createForm(SearchType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $criteria = $form->getData();
            $posts = $annonceRepository->findByCategory($criteria);

            return $this->render('project/Annonce.html.twig',[
                'annonces' => $posts
            ]);

        }

        return $this->render('project/search.html.twig',[
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/main/{id}/delete", name="delete_post")
     */
    public function delete_post(Annonce $annonce, Security $security){
        $manager=$this->getDoctrine()->getManager();
        $annonce = $manager->merge($annonce);
        $manager->remove($annonce);
        $manager->flush();

        return $this->show_my_posts($security);
    }
    /**
     * @Route("/main/delete_account", name="delete_account")
     */
    public function delete_account(Security $security){
        $user = $security->getUser();
        $manager=$this->getDoctrine()->getManager();
        $annonce = $manager->merge($user);
        $manager->remove($user);
        $manager->flush();

        return $this->redirectToRoute('home');
    }
    /**
     * @Route("/main/newCategory", name="new_category")
     * @Route("/main/{id}/editCat", name="cat_edit")
     */
    public function newCat(Category $category = null, Request $request, 
                            ObjectManager $manager){ 
        if(!$category){
            $category = new Category();
        }

        $form = $this->createForm(AddCategoryFormType::class, $category);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($category);
            $manager->flush();

            return $this->redirectToRoute('account');}

        return $this->render('project/newCategory.html.twig',[
            'form'=> $form->createView(),
            'editMode' => $category->getId() !== null
        ]);
    }
    /**
     * @Route("/main/newPost", name="new_post")
     * @Route("/main/{id}/edit", name="post_edit")
     */
    public function newPost(Annonce $annonce = null, Request $request, 
                            ObjectManager $manager, Security $security){ 
        if(!$annonce){
            $annonce = new Annonce();
        }

        $form = $this->createForm(AnnonceFormType::class, $annonce);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            if(!$annonce->getId()){
                $user = $security->getUser();

                $annonce->setCreatedAt(new \DateTime())
                        ->setUser($user);
            }

            $manager->persist($annonce);
            $manager->flush();

            return $this->redirectToRoute('account');}

        return $this->render('project/newPost.html.twig',[
            'form'=> $form->createView(),
            'editMode' => $annonce->getId() !== null
        ]);
    }
    /**
     * @Route("/main/{id}", name="showAnnonce")
     */
    public function show($id, Security $security){
        
        if($security->getUser()==null){
            return $this->redirectToRoute('security_login',[
                'redirectionMode' => $security->getUser() == null
            ]);}
        
        $repo = $this->getDoctrine()->getRepository(Annonce::class);
        $annonce =  $repo->find($id);

        return $this->render('project/show.html.twig',[
            'annonce' => $annonce
        ]);
    }
}