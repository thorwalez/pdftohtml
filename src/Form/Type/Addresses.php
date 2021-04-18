<?php
/**
 * Copyright (c) 2021.
 * Created By
 * @author Mike Hartl
 * @copyright 2021  Mike Hartl All rights reserved
 * @license  The source code of this document is proprietary work, and is licensed for distribution or use.
 * @created 4.03.2021
 * @version 0.0.0
 */

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
            ->add('firstname', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('name', TextType::class, ['attr' => ['class' => 'form-control']])
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