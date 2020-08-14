<?php

namespace App;

use Jenssegers\Model\Model;
use Illuminate\Support\Facades\File;
use League\Csv\Writer;
use League\Csv\Reader;
use League\Csv\Statement;
use League\Csv\CannotInsertRecord;
use League\Csv\Exception;

class Company extends Model
{
    /**
     * Fillable attributes
     *
     * @var array
     */

    protected $fillable = [
        'CMGUnmaskedID',
        'CMGUnmaskedName',
        'ClientTier',
        'GCPStream',
        'GCPBusiness',
        'CMGGlobalBU',
        'CMGSegmentName',
        'GlobalControlPoint',
        'GCPGeography',
        'GlobalRelationshipManagerName',
        'REVENUE_FY14',
        'REVENUE_FY15',
        'Deposits_EOP_FY14',
        'Deposits_EOP_FY15x',
        'TotalLimits_EOP_FY14',
        'TotalLimits_EOP_FY15',
        'RWAFY14',
        'RWAFY15',
        'REV/RWA FY14',
        'REV/RWA FY15',
        'NPAT_AllocEq_FY14',
        'NPAT_AllocEq_FY15X',
        'Company_Avg_Activity_FY14',
        'Company_Avg_Activity_FY15',
        'ROE_FY14',
        'ROE_FY15'
    ];

    /**
     * Csv filename
     *
     * @var const
     */
    const FILENAME = "companies.csv";

    /**
     * Get storage path
     *
     * @return string
     */
    public static function getStoragePath(){
        return storage_path('app').'/'.self::FILENAME;
    }

    // /**
    //  * Save a new data and return the instance
    //  *
    //  * @param array $attributes
    //  * @return \App\Company|false
    //  */
    // public static function create(array $attributes = [])
    // {
    //     $instance = new static((array) $attributes);
    // }

    /**
     * Get total number of records in csv file
     *
     * @return int
     */
    public static function getTotal()
    {
        $total = 0;
        if(File::exists(self::getStoragePath())) {
            $reader = Reader::createFromPath(self::getStoragePath(), 'r');
            $reader->setHeaderOffset(0); //set the CSV header offset to 0

            $total =  count($reader); // return total number of records
            // unset to close the file resource
            unset($reader);
        }

        return $total;
        }

    /**
     * Get records from csv file.
     *
     * @param int $offset
     * @param int $limit
     * @return \App\Company[]
     */
    public static function getRecords($offset=0, $limit=null)
    {
        $company = [];
        if (File::exists(self::getStoragePath())) {
            $reader = Reader::createFromPath(self::getStoragePath(), 'r');
            $reader->setHeaderOffset(0); //set the CSV header offset to 0

        	if ($limit > 0) {
        		$stmt = (new Statement())
                ->offset($offset)
                ->limit($limit);

            	$result = $stmt->process($reader);

            	foreach ($result->getRecords() as $index => $record) {
    	            $instance = new static($record);
                    $instance->setAttribute('offset', $index);
    	            $company[] = $instance;
    	        }
        	} else {
        		foreach ($reader->getRecords() as $index => $record) {
    	            $instance = new static($record);
                    $instance->setAttribute('offset', $index);
    	            $company[] = $instance;
    	        }
        	}

        	// unset to close the file resource
            unset($reader);
        }
    	return $company;
    }

    /**
     * Get records from csv file.
     *
     * @param int $offset
     * @return \App\Company|false;
     */
    public static function getOne($offset)
    {
        if (File::exists(self::getStoragePath())) {
        	$reader = Reader::createFromPath(self::getStoragePath(), 'r');
            $reader->setHeaderOffset(0); // Set header offset always to 0

            // $offset is the nth offset of the record in csv file
            $stmt = (new Statement())
                ->offset($offset-1) // need to decrement 1 since we set header offset 0
                ->limit(1);

            // access the 0th record from the recordset (indexing starts at 0)
            $record = $stmt->process($reader)->fetchOne(0);

            // unset to close the file resource
            unset($reader);

            if (!empty($record)) {
            	$instance = new static($record);
                $instance->setAttribute('offset', $offset);
            	return $instance;
            } else {
            	return false;
            }
        } else {
            return false;
        }
    }
    }
