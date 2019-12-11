<?php
/**
 * Created by PhpStorm.
 * User: 89340
 * Date: 2019/12/11
 * Time: 9:54
 */

namespace Tests\Unit\DesignPatterns\Builder\Builder;

use Tests\Unit\DesignPatterns\Builder\Parts\Engine;
use Tests\Unit\DesignPatterns\Builder\Parts\Wheel;
use Tests\Unit\DesignPatterns\Builder\Vehicle\Bike;

/**
 * BikeBuilder用于建造自行车
 */
class BikeBuilder implements BuilderInterface
{
    /**
     * @var Parts\Bike
     */
    protected $bike;

    /**
     * {@inheritdoc}
     */
    public function addDoors()
    {
    }

    /**
     * {@inheritdoc}
     */
    public function addEngine()
    {
        $this->bike->setPart('engine', new Engine());
    }

    /**
     * {@inheritdoc}
     */
    public function addWheel()
    {
        $this->bike->setPart('forwardWheel', new Wheel());
        $this->bike->setPart('rearWheel', new Wheel());
    }

    /**
     * {@inheritdoc}
     */
    public function createVehicle()
    {
        $this->bike = new Bike();
    }

    /**
     * {@inheritdoc}
     */
    public function getVehicle()
    {
        return $this->bike;
    }
}
