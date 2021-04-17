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
                'require_due_date' => false,
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
            ->add('special', DoupleCheckboxType::class, ['required' => false, 'attr' => ['class' => 'form-control']])
            ->add('nine', DoupleCheckboxType::class, ['required' => false, 'attr' => ['class' => 'form-control']])
            ->add('twelve', DoupleCheckboxType::class, ['required' => false, 'attr' => ['class' => 'form-control']])
            ->add('global', DoupleCheckboxType::class, ['required' => false, 'attr' => ['class' => 'form-control']])
            ->add('economy', CheckboxType::class, ['required' => false, 'attr' => ['class' => 'form-control']]);


        parent::buildForm($builder, $options);
    }
}