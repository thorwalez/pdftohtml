<?php


namespace ThorWalez\PdfToHtml\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GoodsTable extends AbstractType
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
            ->add('firstRow', GoodsTableRow::class)
            ->add('secondRow', GoodsTableRow::class)
            ->add('thirdRow', GoodsTableRow::class)
            ->add('fourthRow', GoodsTableRow::class)
            ->add('fifthRow', GoodsTableRow::class)
            ->add('totalPiece', TextType::class, ['required' => false, 'attr' => ['class' => 'form-control totalPiece']])
            ->add('totalWeight', TextType::class, ['required' => false, 'attr' => ['class' => 'form-control totalWeight']])
         ;



        parent::buildForm($builder, $options);
    }
}