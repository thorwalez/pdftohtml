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

namespace ThorWalez\WaybillCreator\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GoodsTableRow extends AbstractType
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
            ->add('goodsDescription', TextType::class, ['required' => false, 'attr' => ['class' => 'form-control']])
            ->add('goodsPiece', TextType::class, ['required' => false, 'attr' => ['class' => 'form-control goodsPiece', 'onInput' => 'calculatorPiece()' ]])
            ->add('goodsWeight', TextType::class, ['required' => false, 'attr' => ['class' => 'form-control goodsWeight', 'onInput' => 'calculatorWeight()']])
            ->add('dimensions', GoodsDimension::class);


        parent::buildForm($builder, $options);
    }
}