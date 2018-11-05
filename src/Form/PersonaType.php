<?php
namespace App\Form;

use App\Entity\Articulo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class ArticuloType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('razon_social')
            ->add('tipo_documento')
            ->add('numero_documento')
            ->add('direccion')
            ->add('telefono')
            ->add('email', EmailType::class)
            ->add('representante')
            ->add('logo')
            ->add('estado',CheckboxType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Articulo::class,
        ]);
    }
}