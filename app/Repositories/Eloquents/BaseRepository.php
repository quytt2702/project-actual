<?php

namespace App\Repositories\Eloquents;

use Prettus\Repository\Eloquent\BaseRepository as Repository;

abstract class BaseRepository extends Repository
{
    abstract public function slaveModel();

    protected function getSlaveModel()
    {
        return app($this->slaveModel());
    }

    public function create(array $attributes)
    {
        $instance = parent::create($attributes);

        $this->getSlaveModel()->create($attributes);

        return $instance;
    }

    public function update(array $attributes, $id)
    {
        $instance = parent::update($attributes, $id);

        $slaveModel = $this->getSlaveModel();
        $slaveModel->find($id);
        $slaveModel->update($attributes);

        return $instance;
    }
}
