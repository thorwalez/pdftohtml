<?php


namespace ThorWalez\PdfToHtml\Form\Type;


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
            ->add('goodsDescription', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('goodsPiece', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('goodsWeight', TextType::class, ['attr' => ['class' => 'form-control']])
            ->add('dimensions', GoodsDimension::class);


        parent::buildForm($builder, $options);
    }
}