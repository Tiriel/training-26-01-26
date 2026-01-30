<?php

namespace App\Story;

use App\Factory\ConferenceFactory;
use App\Factory\UserFactory;
use Zenstruck\Foundry\Attribute\AsFixture;
use Zenstruck\Foundry\Story;

#[AsFixture(name: 'main')]
final class AppStory extends Story
{
    public function build(): void
    {
        UserFactory::new()
            ->email('user@sensioevents.com')
            ->roles('ROLE_USER')
            ->create();
        UserFactory::new()
            ->email('website@sensioevents.com')
            ->roles('ROLE_WEBSITE')
            ->create();
        UserFactory::new()
            ->email('organizer@sensioevents.com')
            ->roles('ROLE_ORGANIZER')
            ->create();
        UserFactory::new()
            ->email('admin@sensioevents.com')
            ->roles('ROLE_ADMIN')
            ->create();
        ConferenceFactory::createMany(20);
    }
}
