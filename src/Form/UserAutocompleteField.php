<?php

declare(strict_types=1);

namespace App\Form;

use App\Entity\User;
use Doctrine\DBAL\ParameterType;
use Doctrine\ORM\QueryBuilder;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\UX\Autocomplete\Form\AsEntityAutocompleteField;
use Symfony\UX\Autocomplete\Form\BaseEntityAutocompleteType;

#[AsEntityAutocompleteField]
final class UserAutocompleteField extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'autocomplete' => true,
            'class' => User::class,
            'choice_label' => static fn (User $user) => $user->getName(),
            'filter_query' => function (QueryBuilder $qb, string $query): void {
                $qb
                    ->andWhere('entity.name LIKE :query')
                    ->setParameter('query', "{$query}%", ParameterType::STRING)
                    ->addOrderBy('entity.id')
                ;
            },
        ]);
    }

    public function getParent(): ?string
    {
        return BaseEntityAutocompleteType::class;
    }
}
