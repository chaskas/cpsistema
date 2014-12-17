<?php
/**
 * Created by PhpStorm.
 * User: Cristian
 * Date: 14-12-2014
 * Time: 4:41
 */
/**
 * This model behavior builds a date range search condition.
 */
class EDateRangeSearchBehavior extends CActiveRecordBehavior
{

    /**
     * @param the default 'from' date when nothing is entered.
     */
    public $dateFromDefault = '1900-01-01 00:00:00';

    /**
     * @param the default 'to' date when nothing is entered.
     */
    public $dateToDefault = '2099-12-31 00:00:00';



    /**
     * Transforms an input (IHM) formated date
     * into an output (DB) formated date
     * @param string $date fecha sin formato
     * @param string $hora Hora de fehca
     * @return $string $newDateString
     */
    private function formatDate($date, $hora) {

        $dateString = str_replace('/', '-', $date)." ".$hora;
        $newDateString =  date("Y-m-d H:i:s", strtotime($dateString)); ;

        return $newDateString;


    }




    /*
     * Date range search criteria
     * public $attribute name of the date attribute
     * public $value value of the date attribute
     * @return instance of CDbCriteria for the model's search() method
     */
    public function dateRangeSearchCriteria($attribute, $string)
    {
        // Create a new db criteria instance
        $criteria = new CDbCriteria;

        $value = explode(" - ",$string);

        // Check if attribute value is an array
        if (is_array($value))
        {
            // Check if either key in the array has a value
            if (!empty($value[0]) || !empty($value[1]))
            {

                // Set the date 'from' variable to the first value in the array
                $dateFrom = $this->formatDate($value[0], "00:00:00");

                if (empty($dateFrom))
                {
                    // Set the 'from' date to the default
                    $dateFrom = $this->dateFromDefault;
                }

                // Set the date 'to' variable to the second value in the array
                $dateTo = $this->formatDate($value[1], "23:59:59");

                if (empty($dateTo))
                {
                    // Set the 'to' date to the default
                    $dateTo = $this->dateToDefault;
                }

                // Check if the 'from' date is greater than the 'to' date
                if ($dateFrom > $dateTo)
                {
                    // Swap the dates around
                    list($dateFrom, $dateTo) = array($dateTo, $dateFrom);
                }

                // Add a BETWEEN condition to the search criteria
                $criteria->addBetweenCondition($attribute, $dateFrom, $dateTo);
            }
            else
            {
                // The value array is empty so set it to an empty string
                $valuestring = '';

                // Add a compare condition to the search criteria
                $criteria->compare($attribute, $valuestring, true);
            }
        }
        else
        {
            // Add a standard compare condition to the search criteria
            $criteria->compare($attribute, $valuestring, true);
        }

        // Return the search criteria to merge with the model's search() method
        return $criteria;
    }

}