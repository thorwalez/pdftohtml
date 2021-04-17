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
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Main extends AbstractType
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
            ->add('customerNumber', TextType::class, ['required' => false, 'attr' => ['class' => 'form-control', 'autofocus' => true]])
            ->add('invoice', Invoice::class)
            ->add('customerInformation', TextType::class, ['required' => false, 'attr' => ['class' => 'form-control']])
            ->add('changeAddress', Addresses::class)
            ->add('receiverAddress', Addresses::class)
            ->add('deliveryAddress', Addresses::class)
            ->add('dangerousGoods', DangerousGoodsType::class)
            ->add('services', Service::class)
            ->add('options', Options::class)
            ->add('specialNotes', TextareaType::class, ['required' => false, 'attr' => ['class' => 'form-control']])
            ->add('goodsTable', GoodsTable::class)
            ->add('duty', DutyType::class)
            ->add('create', SubmitType::class, ['attr' => ['class' => 'btn btn-lg btn-primary','value'=>'create'], 'label' => 'Save and next Step' ]);


        parent::buildForm($builder, $options);
    }
}
