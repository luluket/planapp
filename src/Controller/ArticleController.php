<?php
    namespace App\Controller;

    use App\Entity\User;
    use App\Entity\Cpv;
    use App\Entity\Godina;
    use App\Entity\PlanNabave;

    use App\Repository\CpvRepository;
    use App\Repository\PlanNabaveRepository;

    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\NumberType;
    use Symfony\Component\Form\Extension\Core\Type\TextareaType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;
    use Symfony\Component\Form\Extension\Core\Type\DateType;
    use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
    use Symfony\Component\Form\Extension\Core\Type\IntegerType;
    use Symfony\Component\HttpFoundation\JSONResponse;







    class ArticleController extends Controller{
        

        /**
         * @Route("/deletePlanObject/{id}/{userId}/{yearId}",name="delete_planObject")
         * @Method({"DELETE"})  
         */
        public function deletePlanObject(Request $request, $id, $userId, $yearId){
            $planObject=$this->getDoctrine()->getRepository(PlanNabave::class)->find($id);
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($planObject);
            $entityManager->flush();

            $years=$this->getDoctrine()->getRepository(Godina::class)->findAll();
            foreach($years as $year){
                if($this->getDoctrine()->getRepository(PlanNabave::class)->findBy(['godina'=>$year->getId()])==NULL){
                    $entityManager=$this->getDoctrine()->getManager();
                    $entityManager->remove($year);
                    $entityManager->flush();
                }
            }
           
            $response = new Response();
            $response->send();

            return $this->redirectToRoute('show_plan',['user_id'=>$userId,'year_id'=>$yearId]);        
        }
    

        /**
         * @Route("/editPlanObject/{id}/{userId}/{yearId}",name="edit_planObject")
         * Method({"GET","POST"})
         */
        public function editPlanObject(Request $request, $id, $userId, $yearId){
            $planObject = new PlanNabave();
            $planObject = $this->getDoctrine()->getRepository(PlanNabave::class)->find($id);

            $form=$this->createFormBuilder($planObject)
            ->add('evidencijskiBroj',TextType::class, [
                'label'=>'Evidencijski broj nabave',
                'attr' =>['class' => 'form-control']
            ])
            ->add('cpv',ChoiceType::class, [
                'label'=>'Predmet nabave',
                'choices'=>[
                    ''=>$this->getDoctrine()->getRepository(Cpv::class)->findAll(),
                ],
                'choice_label'=>function(Cpv $cpv, $key, $value){
                     return ($cpv->getDescription());
        
                     },
                'choice_attr'=>function(Cpv $cpv, $key, $value){
                        return ['class'=>'cpv_'.$cpv->getId()];
           
                    },
                'attr'=>['class' => 'form-control choice-field']
            ])
            ->add('procijenjenaVrijednost',NumberType::class, [
                'attr' =>['class' => 'form-control']
            ])
            ->add('vrstaPostupka',ChoiceType::class, [
                'choices'=>[
                    'Postupak jednostavne nabave'=>'Postupak jednostavne nabave',
                    'Otvoreni postupak'=>'Otvoreni postupak',
                    'Ograničeni postupak'=>'Ograničeni postupak',
                    'Pregovarački postupak s prethodnom objavom'=>'Pregovarački postupak s prethodnom objavom',
                    'Pregovarački postupak bez prethodne objave'=>'Pregovarački postupak bez prethodne objave',
                    'Natjecateljski dijalog'=>'Natjecateljski dijalog',
                    'Postupak izuzet od primjene Zakona, Usluge iz dodatka II.B/II (obrana i sigurnost)'=>'Postupak izuzet od primjene Zakona, Usluge iz dodatka II.B/II (obrana i sigurnost)',
                    'Natjecateljski postupak uz pregovore'=>'Natjecateljski postupak uz pregovore',
                    'Partnerstvo za inovacije'=>'Partnerstvo za inovacije',
                    'Otvoreni natječaj'=>'Otvoreni natječaj',
                    'Ograničeni natječaj'=>'Ograničeni natječaj'
                ],
                'choice_attr'=>[
                    'Postupak jednostavne nabave',
                    'Otvoreni postupak',
                    'Ograničeni postupak',
                    'Pregovarački postupak s prethodnom objavom',
                    'Pregovarački postupak bez prethodne objave',
                    'Natjecateljski dijalog',
                    'Postupak izuzet od primjene Zakona, Usluge iz dodatka II.B/II (obrana i sigurnost)',
                    'Natjecateljski postupak uz pregovore',
                    'Partnerstvo za inovacije',
                    'Otvoreni natječaj',
                    'Ograničeni natječaj'

                ],
                'attr'=>['class'=>'form-control choice-field']
            ])
            ->add('posebniRezimNabave',ChoiceType::class, [
                'required'=>false,
                'choices'=>[
                    'Društvene i posebne usluge'=>'Društvene i posebne usluge',
                    'Postupak jednostavne nabave'=>'Postupak jednostavne nabave'
                ],
                'choice_attr'=>[
                    'Društvene i posebne usluge',
                    'Postupak jednostavne nabave'
                ],
                'attr'=>['class'=>'form-control']
            ])
            ->add('podijeljenNaGrupe',ChoiceType::class, [
                'choices'=>[
                    'Ne'=>'Ne',
                    'Da'=>'Da'
                ],
                'choice_attr'=>[
                    'Ne',
                    'Da'
                ],
                'attr'=>['class'=>'form-control choice-field']
            ])
            ->add('sporazum',ChoiceType::class, [
                'choices'=>[
                    'Ugovor'=>'Ugovor',
                    'Okvirni sporazum'=>'Okvirni sporazum',
                    'Narudžbenica'=>'Narudžbenica'
                ],
                'choice_attr'=>[
                    'Ugovor',
                    'Okvirni sporazum',
                    'Narudžbenica'
                ],
                'attr'=>['class'=>'form-control choice-field']
            ])
            ->add('planiraniPocetak',TextType::class, [
                'label'=>'Planirani početak postupka',
                'attr'=>['class'=>'form-control']
            ])
            ->add('planiranoTrajanje',TextType::class, [
                'label'=>'Planirano trajanje ugovora ili okvirnog sporazuma',
                'attr'=>['class'=>'form-control']
            ])
            ->add('napomena',TextType::class, [
                'required'=>false,
                'attr'=>['class'=>'form-control']
            ])
            ->add('status',TextType::class, [
                'label'=>'Sljedeća faza/status',
                'data'=>'Objavljen',
                'empty_data' => 'Objavljen',
                'disabled'=>true,
                'attr'=>['class'=>'form-control']
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Izmijeni stavku',
                'attr' => ['class' => 'btn btn-primary mt-3']
            ])
            ->getForm();

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){
                
                $entityManager = $this->getDoctrine()->getManager();
                
                $entityManager->flush();

                return $this->redirectToRoute('show_plan',['user_id'=>$userId,'year_id'=>$yearId]);
            }

            return $this->render('articles/editPlanObject.html.twig', array(
                'form' => $form->createView()
            ));

        }
        
        /**
         * @Route("/autorized/{userId}/{yearId}/{balance}",name="autorize_plan")
         */
        public function autorization($userId,$yearId,$balance){
            $plans=$this->getDoctrine()->getRepository(PlanNabave::class)->findBy([
                'user'=>$userId,
                'godina'=>$yearId
            ]);
            foreach($plans as $plan){
                $plan=$plan->setStatus('izvršen');
                $planManager=$this->getDoctrine()->getManager();
                $planManager->persist($plan);
                $planManager->flush();
            }
            $user=$this->getDoctrine()->getRepository(User::class)->find($userId);
            $userBalance=$user->getBalance();
            $balance=$userBalance-$balance;
            $user->setBalance($balance);
            $userManager = $this->getDoctrine()->getManager();
            $userManager->persist($user);
            $userManager->flush();

            return $this->redirectToRoute('executed_plans',['user_id'=>$userId,'year_id'=>$yearId]);
        }
        /**
         * @Route("/rejected/{userId}/{yearId}",name="reject_plan")
         * @Method({"DELETE"})
         */
        public function rejection(Request $request, $userId, $yearId){

            $this->denyAccessUnlessGranted('ROLE_ADMIN');

            $plans=$this->getDoctrine()->getRepository(PlanNabave::class)->findBy([
                'user'=>$userId,
                'godina'=>$yearId
            ]);

            foreach($plans as $plan){
                $planManager = $this->getDoctrine()->getManager();
                $planManager->remove($plan);
                $planManager->flush();
            }

            $years=$this->getDoctrine()->getRepository(Godina::class)->findAll();
            foreach($years as $year){
                if($this->getDoctrine()->getRepository(PlanNabave::class)->findBy(['godina'=>$year->getId()])==NULL){
                    $entityManager=$this->getDoctrine()->getManager();
                    $entityManager->remove($year);
                    $entityManager->flush();
                }
            }
            
            $response = new Response();
            $response->send();
            return $this->redirectToRoute("registar_ugovora");
            

        }
        /**
         * @Route("/plans",name="executed_plans")
         * @Method({"GET"})
         */
        public function plans(PlanNabaveRepository $totalExpenses, PlanNabaveRepository $annualExpenses, PlanNabaveRepository $status)
    
        {

            $years=$this->getDoctrine()->getRepository(Godina::class)->findAll();

            $users=$this->getDoctrine()->getRepository(User::class)->findBy([
                'function'=>['dekan','prodekan za nastavu','tajnica fakulteta']
            ]);
        
        
            return $this->render('articles/plans.html.twig', 
                [
                    'years'=>$years,
                    'users'=>$users,
                    'totalExpenses'=>$totalExpenses,
                    'annualExpenses'=>$annualExpenses,
                    'status'=>$status
                ]
            );
            
        }

        /**
         * @Route("/registarUgovora",name="registar_ugovora")
         */
        public function registarUgovora(PlanNabaveRepository $yearId,PlanNabaveRepository $totalExpenses, PlanNabaveRepository $annualExpenses, PlanNabaveRepository $status)
        {
            $this->denyAccessUnlessGranted('ROLE_ADMIN');
            $plans=$this->getDoctrine()->getRepository(PlanNabave::class)->findBy(
                ['status'=>'objavljen']
            );
            if($plans!=NULL)
            {
            //dohvacanje godina u kojima postoje objavljeni neautorizirani planovi
            $yearId=$yearId->findYear('objavljen');
            $year=$this->getDoctrine()->getRepository(Godina::class)->find($yearId);

            
            
            $users=[];
            foreach($plans as $plan){
                if(!in_array($plan->getUser(),$users,true))
                    array_push($users,$plan->getUser());
            }
            

            return $this->render('articles/registarUgovora.html.twig',[
                'status'=>$status,
                'plans'=>$plans,
                'year'=>$year,
                'users'=>$users,
                'totalExpenses'=>$totalExpenses,
                'annualExpenses'=>$annualExpenses,
                'noplan'=>1
                ]);
            }
            else{
                return $this->render('articles/registarUgovora.html.twig',['noplan'=>0]);
            }
        }

        /**
         * @Route("/showPlan/{user_id}/{year_id}",name="show_plan")
         */
        public function showPlan($user_id,$year_id,PlanNabaveRepository $expenses, PlanNabaveRepository $status)
        {
            $this->denyAccessUnlessGranted(['ROLE_ADMIN','ROLE_USER'],null,'Neovlašten pristup');
          

            $planObjects=$this->getDoctrine()->getRepository(PlanNabave::class)->findBy([
                
                'godina'=>$year_id,
                'user'=>$user_id
            ]);

            if($planObjects==NULL){
                
                return $this->render('articles/showPlan.html.twig',['planObjects'=>NULL]);
            }

            $expenses=$expenses->sumUserAnnualExpenses($user_id,$year_id);//izvrsavanje SQL upita kreiranom u PlanNabaveRepository.php
            $status=$status->readStatus($user_id,$year_id);

            foreach($planObjects as $planObject){
                $year=$planObject->getGodina();
                $user=$planObject->getUser();
                
            }
            
            return $this->render('articles/showPlan.html.twig',[
               'planObjects'=>$planObjects,
               'year'=>$year,
               'user'=>$user,
               'expenses'=>$expenses,
               'status'=>$status
            ]);
        }

        /**
         * @Route("/newPlan/{userId}",name="new_plan")
         * @Method({"GET","POST"})
         */

        public function newPlan(Request $request,$userId){
            $this->denyAccessUnlessGranted('ROLE_USER', null, 'Niste autorizirani kreirati plan nabave');

            $plan=new PlanNabave();

            $user=$this->getDoctrine()->getRepository(User::class)->find($userId);
            $nextYear=date("Y")+1;
            

            $plan->setUser($user);
            $form = $this->createFormBuilder($plan)
            ->add('evidencijskiBroj',TextType::class, [
                'label'=>'Evidencijski broj nabave',
                'attr' =>['class' => 'form-control']
            ])
            ->add('cpv',ChoiceType::class, [
                'label'=>'Predmet nabave',
                'choices'=>[
                    ''=>$this->getDoctrine()->getRepository(Cpv::class)->findAll(),
                ],
                'choice_label'=>function(Cpv $cpv, $key, $value){
                     return ($cpv->getDescription());
        
                     },
                'choice_attr'=>function(Cpv $cpv, $key, $value){
                        return ['class'=>'cpv_'.$cpv->getId()];
           
                    },
                'attr'=>['class' => 'form-control choice-field']
            ])
            ->add('procijenjenaVrijednost',NumberType::class, [
                'attr' =>['class' => 'form-control']
            ])
            ->add('vrstaPostupka',ChoiceType::class, [
                'choices'=>[
                    'Postupak jednostavne nabave'=>'Postupak jednostavne nabave',
                    'Otvoreni postupak'=>'Otvoreni postupak',
                    'Ograničeni postupak'=>'Ograničeni postupak',
                    'Pregovarački postupak s prethodnom objavom'=>'Pregovarački postupak s prethodnom objavom',
                    'Pregovarački postupak bez prethodne objave'=>'Pregovarački postupak bez prethodne objave',
                    'Natjecateljski dijalog'=>'Natjecateljski dijalog',
                    'Postupak izuzet od primjene Zakona, Usluge iz dodatka II.B/II (obrana i sigurnost)'=>'Postupak izuzet od primjene Zakona, Usluge iz dodatka II.B/II (obrana i sigurnost)',
                    'Natjecateljski postupak uz pregovore'=>'Natjecateljski postupak uz pregovore',
                    'Partnerstvo za inovacije'=>'Partnerstvo za inovacije',
                    'Otvoreni natječaj'=>'Otvoreni natječaj',
                    'Ograničeni natječaj'=>'Ograničeni natječaj'
                ],
                'choice_attr'=>[
                    'Postupak jednostavne nabave',
                    'Otvoreni postupak',
                    'Ograničeni postupak',
                    'Pregovarački postupak s prethodnom objavom',
                    'Pregovarački postupak bez prethodne objave',
                    'Natjecateljski dijalog',
                    'Postupak izuzet od primjene Zakona, Usluge iz dodatka II.B/II (obrana i sigurnost)',
                    'Natjecateljski postupak uz pregovore',
                    'Partnerstvo za inovacije',
                    'Otvoreni natječaj',
                    'Ograničeni natječaj'

                ],
                'attr'=>['class'=>'form-control choice-field']
            ])
            ->add('posebniRezimNabave',ChoiceType::class, [
                'required'=>false,
                'choices'=>[
                    'Društvene i posebne usluge'=>'Društvene i posebne usluge',
                    'Postupak jednostavne nabave'=>'Postupak jednostavne nabave'
                ],
                'choice_attr'=>[
                    'Društvene i posebne usluge',
                    'Postupak jednostavne nabave'
                ],
                'attr'=>['class'=>'form-control']
            ])
            ->add('podijeljenNaGrupe',ChoiceType::class, [
                'choices'=>[
                    'Ne'=>'Ne',
                    'Da'=>'Da'
                ],
                'choice_attr'=>[
                    'Ne',
                    'Da'
                ],
                'attr'=>['class'=>'form-control choice-field']
            ])
            ->add('sporazum',ChoiceType::class, [
                'choices'=>[
                    'Ugovor'=>'Ugovor',
                    'Okvirni sporazum'=>'Okvirni sporazum',
                    'Narudžbenica'=>'Narudžbenica'
                ],
                'choice_attr'=>[
                    'Ugovor',
                    'Okvirni sporazum',
                    'Narudžbenica'
                ],
                'attr'=>['class'=>'form-control choice-field']
            ])
            ->add('planiraniPocetak',TextType::class, [
                'label'=>'Planirani početak postupka',
                'attr'=>['class'=>'form-control']
            ])
            ->add('planiranoTrajanje',TextType::class, [
                'label'=>'Planirano trajanje ugovora ili okvirnog sporazuma',
                'attr'=>['class'=>'form-control']
            ])
            ->add('napomena',TextType::class, [
                'required'=>false,
                'attr'=>['class'=>'form-control']
            ])
            ->add('status',TextType::class, [
                'label'=>'Sljedeća faza/status',
                'data'=>'Objavljen',
                'empty_data' => 'Objavljen',
                'disabled'=>true,
                'attr'=>['class'=>'form-control']
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Dodaj stavku',
                'attr' => ['class' => 'btn btn-primary mt-3']
            ])
            ->getForm();
            $plan->setStatus('objavljen');
            
                

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){
                    //potrebno je odrediti postoji li godina za koju se stvara plan nabave u tablici 'Godina'
                    $years=$this->getDoctrine()->getRepository(Godina::class)->findAll();
                    $flag=0;
                    foreach($years as $year){
                        if($nextYear==$year->getKalendarskaGodina()){
                            $flag++;
                        }
                
                    }
                    if($flag==0){ //ako ne postoji, ubaci
                        $godina=new Godina();
                        $godina->setKalendarskaGodina($nextYear);
                        $entityManager = $this->getDoctrine()->getManager();
                        $entityManager->persist($godina);
                        $entityManager->flush();
                        $plan->setGodina($godina);
                    }
                    else{ //ako postoji, preskoci ubacivanje
                        $yearExist=$this->getDoctrine()->getRepository(Godina::class)->findOneBy(['kalendarskaGodina'=>$nextYear]);

                        //ako je već autoriziran plan nabave za sljedecu godinu, javi grešku prilikom generiranja novog plana
                        if($this->getDoctrine()->getRepository(PlanNabave::class)->findBy(
                            ['user'=>$userId,
                            'godina'=>$yearExist->getId(),
                            'status'=>'izvršen'])==true) {
                            
                            throw $this->createNotFoundException('Vaš plan nabave za narednu godinu je autoriziran i nije moguće objaviti novi');
                        }
                        
                        $plan->setGodina($yearExist);
                    }

                $plan = $form->getData();

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($plan);
                $entityManager->flush();

                return $this->redirectToRoute('new_plan',['userId' => $userId]);
            }

            return $this->render('articles/newPlan.html.twig', array(
                'form' => $form->createView()
            ));



        }

        /**
         * @Route("/products",name="products_list")
         * @Method{{"GET"}}
         */
        public function products(CpvRepository $cpvs){
            //$cpvs=$this->getDoctrine()->getRepository(Cpv::class)->findAll();
            $cpvs=$cpvs->orderByCode();
            return $this->render('articles/products.html.twig',array('cpvs'=>$cpvs));
        }

        /**
         * @Route("/products/{id}",name="cpv_show")
         */
        public function showCpv($id){
            $cpv = $this->getDoctrine()->getRepository(Cpv::class)->find($id);

            return $this->render('articles/showCpv.html.twig',array('cpv'=>$cpv));
        }

        /**
         * @Route("/products/editCpv/{id}",name="edit_cpv")
         * Method({"GET","POST"})
         */
        public function editCpv(Request $request, $id){
            $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Niste autorizirani uređivati stavke nabave');
            $cpv = new Cpv();
            $cpv = $this->getDoctrine()->getRepository(Cpv::class)->find($id);


            $form = $this->createFormBuilder($cpv)
            ->add('code',TextType::Class, [
                'label' => 'CPV',
                'attr' =>['class' => 'form-control']
            ])
            ->add('description',TextType::class, [
                'label'=> 'Predmet nabave',
                'attr' => ['class' => 'form-control']
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Ažuriraj',
                'attr' => ['class' => 'btn btn-primary mt-3']
            ])
            ->getForm();

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->flush();

                return $this->redirectToRoute('products_list');
            }

            return $this->render('articles/editCpv.html.twig', array(
                'form' => $form->createView()
            ));


        }

        /**
         * @Route("/product/newCpv",name="new_cpv")
         * @METHOD({"GET","POST"})
         */

        public function newCpv(Request $request){
            $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Niste autorizirani dodavati novi predmet nabave');

            $cpv= new Cpv();

            $form = $this->createFormBuilder($cpv)
            ->add('code',TextType::Class,[
                'label'=> 'CPV',
                'attr' =>['class' => 'form-control']
            ])
            ->add('description',TextType::class, [
                'label'=>'Predmet nabave',
                'attr' => ['class' => 'form-control']
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Dodaj',
                'attr' => ['class' => 'btn btn-primary mt-3']
            ])
            ->getForm();

            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){
                $cpv = $form->getData();

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($cpv);
                $entityManager->flush();

                return $this->redirectToRoute('products_list');
            }

            return $this->render('articles/newCpv.html.twig', array(
                'form' => $form->createView()
            ));

        }
        

         /**
         * @Route("/products/deleteCpv/{id}")
         * @Method({"DELETE"})
         */
        public function deleteCpv(Request $request, $id){
            $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');


            $cpv = $this->getDoctrine()->getRepository(Cpv::class)->find($id);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cpv);
            $entityManager->flush();            

            $response = new Response();
            $response->send();
        }

        /**
         * @Route("/profile",name="profile_page")
         * @Method({"GET"})
         */
        public function profile(PlanNabaveRepository $totalExpenses){
            $users=$this->getDoctrine()->getRepository(User::class)->findAll();
            $years=$this->getDoctrine()->getRepository(Godina::class)->findAll();
            $response=NULL;
            return $this->render('articles/profile.html.twig',[
                'users'=>$users,
                'years'=>$years,
                'response'=>$response,
                'totalExpenses'=>$totalExpenses
                ]);
        }

        /**
         * @Route("/",name="homepage")
         * @Method({"GET"})
         */
        public function homepage(PlanNabaveRepository $totalExpenses){
            $users=$this->getDoctrine()->getRepository(User::class)->findAll();
            $years=$this->getDoctrine()->getRepository(Godina::class)->findAll();
            $response=NULL;
            return $this->render('articles/profile.html.twig',[
                'users'=>$users,
                'years'=>$years,
                'response'=>NULL,
                'totalExpenses'=>$totalExpenses
                ]);
        }
       


        ///**
        //* @Route("/article/save")
        //*/
        //public function save(){
        //   $entityManager = $this->getDoctrine()->getManager();

        //    $article = new Article();
        //    $article->setTitle('Article two');
        //    $article->setBody('this is the body for article two');

        //    $entityManager->persist($article);

        //    $entityManager->flush();

        //    return new Response('Saves an article with the id of '.$article->getId());
        //}
    }