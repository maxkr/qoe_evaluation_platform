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

    private $questions;

    function __construct($questions)
    {
        $this->questions = $questions;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $questions = $this->questions;

        foreach($questions as $question){
            if($question->getType() == "radioBox"){
                $answers  = $question->getAnswers();
                foreach($answers as $answer){
                    $radioChoices[$answer->getText()] = $answer->getId();
                }
                if(!(empty($radioChoices))) {
                    $builder->add($question->getId(), HiddenType::class);
                    $builder->add($question->getName(), ChoiceType::class, array(
                        'choices'           => $radioChoices,
                        'multiple'          => false,
                        'expanded'          => true,
                        'choices_as_values' => true
                    ));
                }
            }elseif($question->getType() == "selectionBox"){
                $answers  = $question->getAnswers();
                foreach($answers as $answer){
                    $selectionChoices[$answer->getText()] = $answer->getId();
                }
                if(!(empty($selectionChoices))) {
                    $builder->add($question->getId(), HiddenType::class);
                    $builder->add($question->getName(), ChoiceType::class, array(
                        'choices'           => $selectionChoices,
                        'multiple'          => false,
                        'expanded'          => false,
                        'choices_as_values' => true,
                    ));
                }
            }elseif($question->getType() == "checkBox"){
                $answers  = $question->getAnswers();
                foreach($answers as $answer){
                    $checkChoices[$answer->getText()] = $answer->getId();
                }
                if(!(empty($checkChoices))){
                    $builder->add($question->getId(), HiddenType::class);
                    $builder->add($question->getName(), ChoiceType::class, array(
                        'choices'           => $checkChoices,
                        'multiple'          => true,
                        'expanded'          => true,
                        'choices_as_values' => true
                    ));
                }
            }elseif($question->getType() == "text"){
                $builder->add($question->getId(), HiddenType::class);
                $builder->add($question->getName(), TextType::class);
            }elseif($question->getType() == "textArea"){
                $builder->add($question->getId(), HiddenType::class);
                $builder->add($question->getName(), TextareaType::class);
            }elseif($question->getType() == "slider"){
                $answers  = $question->getAnswers();
                foreach($answers as $answer){
                    $minMax[$answer->getName()] = $answer->getText();
                }
                if(sizeof($minMax) == 2){
                    $builder->add($question->getId(), HiddenType::class);
                    $builder->add($question->getName(), RangeType::class, array(
                        'attr' => array(
                            "data-provide"      => "slider",
                            'data-slider-min'   => $minMax["sliderMin"],
                            'data-slider-max'   => $minMax["sliderMax"],
                            'data-slider-value' => $minMax["sliderMax"] / 2,
                            "style"             => "width:100%;"
                        )
                    ));
                }
            }
        }
    }


}

