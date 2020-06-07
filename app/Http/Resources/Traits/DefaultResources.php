<?php 

namespace App\Http\Resources\Traits;

trait DefaultResources
{
    public function toArray($request) 
    {

        return [
            array_merge($this->setData(), [
                'data' => [
                    'type' => '{table}',
                    'attributes' => array_merge(parent::toArray($request), $this->setAttributes()),
                ],
            ]),
            'links' => [
                'self' => url($this->getPath()),
            ],
        ];
    }


    protected function setAttributes()
    {
        return [
            //
        ];
    }

    protected function setData()
    {
        return [
            //
        ];
    }
}