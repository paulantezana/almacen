<?php
namespace App\Form;

use App\Entity\Empleado;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class EmpleadoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('apellidos')
            ->add('nombres')
            ->add('tipo_documento')
            ->add('numero_documento')
            ->add('direccion')
            ->add('telefono')
            ->add('email',EmailType::class)
            ->add('fecha_nacimiento')
            ->add('foto')
            ->add('login')
            ->add('clave')
            ->add('estado',CheckboxType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Empleado::class,
        ]);
    }
}