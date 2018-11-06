<?php
namespace App\Form;

use App\Entity\Articulo;
use App\Entity\Categoria;
use App\Entity\UnidadMedida;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ArticuloType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('descripcion')
            ->add('imagen')
            ->add('categoria',EntityType::class,[
                'class' => Categoria::class,

                // uses the User.username property as the visible option string
                'choice_label' => 'nombre',
            ])
            ->add('unidadMedida',EntityType::class,[
                'class' => UnidadMedida::class,

                // uses the User.username property as the visible option string
                'choice_label' => 'nombre',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Articulo::class,
        ]);
    }
}