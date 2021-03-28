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
            ->add('firstname', TextType::class, ['attr' => ['class' => 'form-control', 'autofocus' => true]])
            ->add('name', TextType::class, ['attr' => ['class' => 'form-control', 'autofocus' => true]])
            ->add('street', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('housenumber', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('postalcode', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('city', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('state', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('country', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('contactperson', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('phonenumber', TextType::class, ['attr' => ['class' => 'form-control']]);


        parent::buildForm($builder, $options);
    }
}