<?php

namespace App\Controller;

use App\Entity\Consultation;
use App\Entity\Document;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Patient;
use Doctrine\Common\Persistence\ObjectManager ;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CabinetController extends AbstractController
{
    /**
     * @Route("/cabinet", name="cabinet")
     */
    public function index()
    {
        return $this->render('cabinet/index.html.twig', [
            'controller_name' => 'CabinetController',
        ]);
    }

     /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('cabinet/home.html.twig');
    }

    
    /**
     * @Route("/connexion", name="connexion_show")
     */
	public function login()
    {
        return $this->render('cabinet/login.html.twig');

    }

	/**
     * @Route("/deconnexion", name="deconnexion_show" )
     */
    public function logout(){}
	
	/**
     * @Route("/patient", name="patient")
     */
	 public function patient()
    {
        return $this->render('cabinet/profil.html.twig');

    }
    
    
	/**
     * @Route("/registration", name="registration")
	 * @Route("/registration/{id}/modifier", name="modifier")
	
     */
	 public function registration( Patient $newP = null,Request $request, EntityManagerInterface $manager)
    {
		if(!$newP){
		$newP = new Patient();
		}
		
		$form = $this->createFormBuilder($newP)
					 ->add('firstname', TextareaType::class, [
                         'attr' => [
                            'placeholder' => 'Entrer votre prénom'
                            ]
                     ])
                     ->add('lastname', TextareaType::class, [
                        'attr' => [
                           'placeholder' => 'Entrer votre nom'
                           ]
                    ])
                     ->add('pwd', PasswordType::class, [
                        'attr' => [
                           'placeholder' => 'Créer un mot de passe'
                           ]
                    ])
					 ->add('Email', TextareaType::class, [
                        'attr' => [
                           'placeholder' => 'Entrer votre Email'
                           ]
                    ]) 
					 ->add('genre',ChoiceType::class, [
                        'choices' => ['Homme' => 'h',
                                      'Femme' => 'f',
                                      'Non Binaire' => 'n']
                    ])
					 ->add('age', TextareaType::class, [
                        'attr' => [
                           'placeholder' => 'Entrer votre age'
                           ]
                    ])
					 ->getForm();
					 
        $form->handleRequest($request);
		if($form->isSubmitted() && $form->isValid())
		{
			$manager->persist($newP);
			$manager->flush();
			return $this->redirectToRoute('patient',['id' => $newP->getId()]);
		}
        return $this->render('cabinet/registration.html.twig',[
							'form' => $form->createView(),
							'editMode' => $newP->getId() !==null
							]);

    }

    	/**
     * @Route("/newConsultation", name="newConsultation")
     */
	  public function newConsultation( Consultation $newConsultation = null,Request $request, EntityManagerInterface $manager)
      {
          if(!$newConsultation){
          $newConsultation = new consultation();
          }
          
          $form = $this->createFormBuilder($newConsultation)
                       ->add('date_consultation'  )
                       ->add('heure_consultation')
                  
                       ->getForm();
                       
          $form->handleRequest($request);
          if($form->isSubmitted() && $form->isValid())
          {
              $manager->persist($newConsultation);
              $manager->flush();
              return $this->redirectToRoute('consultation',['id' => $newConsultation->getId()]);
          }
          return $this->render('cabinet/consultation.html.twig',[
                              'formc' => $form->createView(),
                              'editMode' => $newConsultation->getId() !==null
                              ]);
  
      }

}
