<?php

namespace App\Search\Provider;

use App\Repository\OrganizationRepository;
use App\Search\Provider\ProviderInterface;
use App\Search\Transformer\ApiToOrganizationTransformer;

class OrganizationProvider implements ProviderInterface
{
    public function __construct(
        private readonly ApiToOrganizationTransformer $organizationTransformer,
        private readonly OrganizationRepository $repository,
    ) {}

    public function get(array $data): object
    {
        return $this->repository->findOneBy(['name' => $data['name']])
            ?? $this->organizationTransformer->transform($data);
    }

    public function getOrganizations(array $data): iterable
    {
        foreach ($data as $datum) {
            yield $this->get($datum);
        }
    }
}
