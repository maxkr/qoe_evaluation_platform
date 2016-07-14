<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvaluationContentResultType extends AbstractType
{

    private $result;

    function __construct($result)
    {
        $this->result = $result;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $result = $this->result;

        foreach($result as $key => $value){
            $builder->add($key, HiddenType::class);
        }

    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getName()
    {
        return 'app_bundle_evaluation_content_result_type';
    }
}
