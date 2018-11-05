<?php
namespace App\Form;

use App\Entity\Ingreso;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class IngresoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tipo_comprobanate')
            ->add('serie_comprobante')
            ->add('num_comprobante')
            ->add('fecha')
            ->add('impuesto')
            ->add('total')
            ->add('sucursal')
            ->add('usuario')
            ->add('persona')
            ->add('estado',CheckboxType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ingreso::class,
        ]);
    }
}