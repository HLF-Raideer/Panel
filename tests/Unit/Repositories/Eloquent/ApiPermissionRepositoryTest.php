<?php
/**
 * Pterodactyl - Panel
 * Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com>.
 *
 * This software is licensed under the terms of the MIT license.
 * https://opensource.org/licenses/MIT
 */

namespace Tests\Unit\Repositories\Eloquent;

use Mockery as m;
use Tests\TestCase;
use Pterodactyl\Models\APIPermission;
use Illuminate\Database\Eloquent\Builder;
use Pterodactyl\Repositories\Eloquent\ApiPermissionRepository;

class ApiPermissionRepositoryTest extends TestCase
{
    /**
     * @var \Illuminate\Database\Eloquent\Builder
     */
    protected $builder;

    /**
     * @var \Pterodactyl\Repositories\Eloquent\ApiPermissionRepository
     */
    protected $repository;

    /**
     * Setup tests.
     */
    public function setUp()
    {
        parent::setUp();

        $this->builder = m::mock(Builder::class);
        $this->repository = m::mock(ApiPermissionRepository::class)->makePartial();

        $this->repository->shouldReceive('getBuilder')->withNoArgs()->andReturn($this->builder);
    }

    /**
     * Test that we are returning the correct model.
     */
    public function testCorrectModelIsAssigned()
    {
        $this->assertEquals(APIPermission::class, $this->repository->model());
    }
}
