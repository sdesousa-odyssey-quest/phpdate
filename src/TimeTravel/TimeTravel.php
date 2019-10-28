<?php

namespace App\TimeTravel;

class TimeTravel
{
    /**
     * @var \DateTime
     */
    private $start;
    /**
     * @var \DateTime
     */
    private $end;

    /**
     * @return \DateTime
     */
    public function getStart(): \DateTime
    {
        return $this->start;
    }

    /**
     * @param \DateTime $start
     */
    public function setStart(\DateTime $start): void
    {
        $this->start = $start;
    }

    /**
     * @return \DateTime
     */
    public function getEnd(): \DateTime
    {
        return $this->end;
    }

    /**
     * @param \DateTime $end
     */
    public function setEnd(\DateTime $end): void
    {
        $this->end = $end;
    }

    public function getTravelInfo(): string
    {
        $diff = $this->getEnd()->diff($this->getStart());
        return  $diff->format('Il y a %y années, %m mois, %d jours, %h heures, %i minutes et %s secondes entre les deux dates');
    }

    public function findDate(\DateInterval $interval): \DateTime
    {
        $back = clone $this->getStart();
        if ($interval->invert === 1) {
            return $back->add($interval);
        } elseif ($interval->invert === 0) {
            return $back->sub($interval);
        }
    }

    public function backToFutureStepByStep(\DatePeriod $period): array
    {
        $steps = [];
        foreach ($period as $date) {
            $steps[] = $date->format('M d Y A h\:i');
        }
        return $steps;
    }

}