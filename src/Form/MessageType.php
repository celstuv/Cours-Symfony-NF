<?php

namespace App\Form;

use App\Entity\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MessageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('sender', TextType::class, [
                'label' => 'Mon nom',
                'label_attr' => [
                    'for' => 'nameSender',
                    'class' => ''
                ],
                'attr' => [
                    'id' => 'nameSender',
                    'class' => 'form-control mb-4',
                ]
            ])
            ->add('receiver', TextType::class, [
                'label' => ' Destinataire',
                'label_attr' => [
                    'for' => 'nameReceiver',
                    'class' => ''
                ],
                'attr' => [
                    'id' => 'nameReceiver',
                    'class' => 'form-control mb-4'
                ]
            ])
            ->add('body', TextareaType::class,
            ['label' => ' Votre message',
                'label_attr' => [
                    'for' => 'form7'
                ],
                'attr' => [
                    'class' => 'md-textarea form-control',
                    'id' => 'form7'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer le message',
                'attr' => [
                    'class' => 'btn btn-info btn-block my-4'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Message::class,
        ]);
    }
}
