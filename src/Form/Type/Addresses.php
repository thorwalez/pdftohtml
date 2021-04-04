<?php


namespace ThorWalez\PdfToHtml\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class Addresses
 * @package ThorWalez\PdfToHtml\Form\Type
 */
class Addresses extends AbstractType
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
            ->add('firstname', TextType::class, ['required' => false, 'attr' => ['class' => 'form-control']])
            ->add('name', TextType::class, ['required' => false, 'attr' => ['class' => 'form-control']])
            ->add('street', TextType::class, ['required' => false, 'attr' => ['class' => 'form-control']])
            ->add('housenumber', TextType::class, ['required' => false, 'attr' => ['class' => 'form-control']])
            ->add('postalcode', TextType::class, ['required' => false, 'attr' => ['class' => 'form-control']])
            ->add('city', TextType::class, ['required' => false, 'attr' => ['class' => 'form-control']])
            ->add('state', TextType::class, ['required' => false, 'attr' => ['class' => 'form-control']])
            ->add('country', TextType::class, ['required' => false, 'attr' => ['class' => 'form-control']])
            ->add('contactperson', TextType::class, ['required' => false, 'attr' => ['class' => 'form-control']])
            ->add('phonenumber', TextType::class, ['required' => false, 'attr' => ['class' => 'form-control']]);


        parent::buildForm($builder, $options);
    }
}