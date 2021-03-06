<?php

namespace PoliceScanner\Model;

use PoliceScanner\Entity\Visa;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

class VisaSaveModel
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     * @Assert\NotBlank()
     */
    public $ownerId;

    /**
     * @var string
     * @Assert\DateTime(format="Y-m-d\TH:i:sP")
     * @Assert\NotBlank()
     */
    public $createTime;

    /**
     * @var string
     * @Assert\DateTime(format="Y-m-d\TH:i:sP")
     * @Assert\NotBlank()
     */
    public $expireTime;

    public static function fromEntity(Visa $visa): self
    {
        $model = new self();
        $model->id = $visa->getId();
        $model->ownerId = $visa->getOwner()->getId();
        $model->createTime = $visa->getCreateTime()->format(DATE_ATOM);
        $model->expireTime = $visa->getExpireTime()->format(DATE_ATOM);

        return $model;
    }

    public static function fromRequest(Request $request): self
    {
        $data = json_decode($request->getContent());

        $model = new self();
        $model->id = isset($data->id) ? $data->id : null;
        $model->ownerId = isset($data->ownerId) ? $data->ownerId : null;
        $model->createTime = isset($data->createTime) ? $data->createTime : null;
        $model->expireTime = isset($data->expireTime) ? $data->expireTime : null;

        return $model;
    }
}
