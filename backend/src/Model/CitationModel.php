<?php

namespace PoliceScanner\Model;

use PoliceScanner\Entity\Citation;

class CitationModel
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var CitizenModel
     */
    public $citizen;

    /**
     * @var OffenseModel
     */
    public $offense;

    /**
     * @var string
     */
    public $issueTime;

    public static function fromEntity(Citation $citation): self
    {
        $model = new self();
        $model->id = $citation->getId();
        $model->citizen = CitizenModel::fromEntity($citation->getCitizen());
        $model->offense = OffenseModel::fromEntity($citation->getOffense());
        $model->issueTime = $citation->getIssueTime()->format(DATE_ATOM);

        return $model;
    }
}
