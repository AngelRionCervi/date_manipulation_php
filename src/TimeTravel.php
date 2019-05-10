<?php 

class TimeTravel { 

    public $start;
    public $end;

    function __construct($start, $end) {
        $this->start = $start;
        $this->end = $end;
    }
    
    function getTravelInfo(): string
    { 
        if($this->start < $this->end){
        	$interval = $this->start->diff($this->end);
        	return $interval->format('Il y a %Y années %m mois %d jours %H heures %i minutes %s seconds');
        }else{
        	return 'start date comes after end date';
        }
    } 

    function findDate(int $interval): string
    {	
    	if($interval > 0){
    		$newDate = $this->start->add(new DateInterval("PT".$interval."S"));
    	}
    	else{
    		$interval*=-1;
    		$newDate = $this->start->sub(new DateInterval("PT".$interval."S"));
    	}
    	return $newDate->format('d-m-Y');
    }

    function backToFutureStepByStep(int $step): array
    {
    	$start = $this->start;
    	$end = $this->end;

    	$dateArray = [];
    	$interval = new DateInterval("PT".$step."S");
    	$daterange = new DatePeriod($start, $interval ,$end);

		foreach($daterange as $date){
    		$dateArray[] = $date->format("m d Y A h:i");
		}

		return $dateArray;
    }

} 