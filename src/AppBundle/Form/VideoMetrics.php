<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VideoMetrics extends AbstractType
{

    private $metrics;

    function __construct(array $metrics)
    {
        $this->metrics = $metrics;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $metrics = $this->metrics;

        foreach($metrics as $key => $metric){
            $builder->add($key, HiddenType::class, array(
                'data' => $metric
            ));
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getName()
    {
        return 'app_bundle_video_metrics';
    }
}
