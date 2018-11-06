<?php
namespace App\Form;

use App\Entity\Usuario;
use App\Entity\Sucursal;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('perfil',ChoiceType::class,[
                'choices' => array(
                    'Friend' => 'administrador',
                    'Empleado' => 'empleado',
                    'Usuario' => 'usuario',
                )
            ])
            ->add('menu_almacen',CheckboxType::class)
            ->add('menu_compra',CheckboxType::class)
            ->add('menu_venta',CheckboxType::class)
            ->add('manu_mantenimiento',CheckboxType::class)
            ->add('menu_seguridad',CheckboxType::class)
            ->add('menu_consulta_compra',CheckboxType::class)
            ->add('menu_consulta_venta',CheckboxType::class)
            ->add('menu_admin',CheckboxType::class)

            //  ->add('empleado',EntityType::class,[
            //      // looks for choices from this entity
            //      'class' => Sucursal::class,

            //      // uses the User.username property as the visible option string
            //     //  'choice_label' => 'empleado',
            //  ])
            // ->add('sucursal')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Usuario::class,
        ]);
    }
}