<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use AppBundle\Entity\Question;

class QuestionType extends AbstractType
{

    private $groups;

    function __construct(array $groups)
    {
        $this->groups = $groups;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $groups = $this->groups;

        foreach($groups as $group){
            if($group->getType() == "radioBox"){
                $questions  = $group->getQuestions();
                foreach($questions as $question){
                    $radioChoices[] = $question->getText();
                }
                $builder->add($group->getId(), HiddenType::class);
                $builder->add($group->getName(), ChoiceType::class, array(
                    'choices' => $radioChoices,
                    'multiple' => false,
                    'expanded' => true,
                ));
            }elseif($group->getType() == "selectionBox"){
                $questions  = $group->getQuestions();
                foreach($questions as $question){
                    $selectionChoices[] = $question->getText();
                }
                $builder->add($group->getId(), HiddenType::class);
                $builder->add($group->getName(), ChoiceType::class, array(
                    'choices' => $selectionChoices,
                    'multiple' => true,
                    'expanded' => false,
                ));
            }elseif($group->getType() == "checkBox"){
                $questions  = $group->getQuestions();
                foreach($questions as $question){
                    $checkChoices[] = $question->getText();
                }
                $builder->add($group->getId(), HiddenType::class);
                $builder->add($group->getName(), ChoiceType::class, array(
                    'choices' => $checkChoices,
                    'multiple' => true,
                    'expanded' => true,
                ));
            }elseif($group->getType() == "text"){
                $builder->add($group->getId(), HiddenType::class);
                $builder->add($group->getName(), TextType::class);
            }elseif($group->getType() == "textArea"){
                $builder->add($group->getId(), HiddenType::class);
                $builder->add($group->getName(), TextareaType::class);
            }elseif($group->getType() == "slider"){
                $builder->add($group->getId(), HiddenType::class);
                $builder->add($group->getName(), RangeType::class, array(
                    'attr' => array(
                        'min' => 0,
                        'max' => 100
                    )
                ));
            }
        }
    }


}

