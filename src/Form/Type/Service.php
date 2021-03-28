<?php


namespace ThorWalez\PdfToHtml\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Service extends AbstractType
{
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => null,
            )
        );
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('special', DoupleCheckboxType::class, ['attr' => ['class' => 'form-control']])
            ->add('nine', DoupleCheckboxType::class, ['attr' => ['class' => 'form-control']])
            ->add('twelve', DoupleCheckboxType::class, ['attr' => ['class' => 'form-control']])
            ->add('global', DoupleCheckboxType::class, ['attr' => ['class' => 'form-control']])
            ->add('economy', CheckboxType::class, ['attr' => ['class' => 'form-control']]);


        parent::buildForm($builder, $options);
    }
}