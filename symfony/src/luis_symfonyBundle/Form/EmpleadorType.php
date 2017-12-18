<?php

namespace luis_symfonyBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;

class EmpleadorType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre')
				->add('cedula')
				->add('sexo',ChoiceType::class,array('choices' => array('Masculino' => 'Masculino',
																'Femenino' => 'Femenino'),
											'placeholder' => 'Seleccione'))
				->add('telefono')
				->add('direccion')
				->add('fechanac')
				->add('empleadon')
				
				->add('save',SubmitType::class,array ('label'=>'Guardar Empleado'))
				->add('reset', ResetType::class, array(
								'attr' => array('class' => 'save')))
				;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'luis_symfonyBundle\Entity\Empleador'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'luis_symfonybundle_empleador';
    }


}
