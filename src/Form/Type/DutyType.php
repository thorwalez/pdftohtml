<?php


namespace ThorWalez\PdfToHtml\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DutyType extends AbstractType
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
            ->add('salesTaxIdNumber', TextType::class, ['required' => false, 'attr' => ['class' => 'form-control']])
            ->add('currency', TextType::class, ['required' => false, 'attr' => ['class' => 'form-control']])
            ->add('invoiceAmount', TextType::class, ['required' => false, 'attr' => ['class' => 'form-control']]);


        parent::buildForm($builder, $options);
    }
}