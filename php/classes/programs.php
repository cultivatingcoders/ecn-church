<?php

/**
 * Class User for sites program base
 *
 * This class handles programs
 *
 * @author Dana Yazzie redcloudsaboveus01@gmail.com
 */


require_once ("dateCheck.php");

class Programs implements JsonSerializable {

    /**
     * id for this program; this is the primary key
     * @var int $programsId
     **/
    private $programsId;

    /**
     * access programs id to identify program groups
     * @var int for $missionsId
     **/
    private $missionsId;

    /**
     * datetime sets date for programs
     * @datetime for programs $date
     */
    private $progDate;

    /**
     * descriptions of programs
     * @var string for $description
     */
    private $description;

    /**
     * locations of programs
     * @var string for $location;
     */
    private $location;

    /**
     * names of the programs
     * @var string for $programName;
     */
    private $programName;

    /**
     * sets the time for the program
     * @var DateTime for program $time;
     */
    private $progTime;

    public function __construct($newProgramsId, $newMissionsId, $newDate, $newDescription,
                                $newLocation, $newProgramName,$newTime)
    {
        try {
            $this->setProgramsId($newProgramsId);
            $this->setMissionsId($newMissionsId);
            $this->setProgDate($newDate);
            $this->setDescription($newDescription);
            $this->setLocation($newLocation);
            $this->setProgramName($newProgramName);
            $this->setProgTime($newTime);
        } catch (InvalidArgumentException $invalidArgument) {
            //rethrow the exception to the caller
            throw(new InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
        } catch (RangeException $range) {
            //rethrow the exception to the caller
            throw (new RangeException($range->getMessage(), 0, $range));
        } catch (Exception $exception) {
            //rethrow generic exception
            throw(new Exception($exception->getMessage(), 0, $exception));
        }
    }

    /**
     * accessor method for programsId
     *
     *@return int value of unique programsId
     **/
    public function getProgramsId() {
        return ($this->programsId);
    }

    /**
     * mutator method for the programsId
     *
     * @param int $newProgramsId unique value to represent a program
     * @throws InvalidArgumentException for invalid content
     **/
    public function setProgramsId($newProgramsId) {
        //base case: if the programsID is null,
        //this is a new program without a mySQL assigned id (yet)
        if($newProgramsId === null) {
            $this->programsId = null;
            return;
        }
        //verify the Program is valid
        $newProgramsId = filter_var($newProgramsId, FILTER_VALIDATE_INT);
        if(empty($newProgramsId) === true) {
            throw (new InvalidArgumentException ("programsId invalid"));
        }
        $this->programsId = $newProgramsId;
    }

    /**
     * accessor method for access level of identifying programs (missionsId)
     *
     * @return mixed
     **/
    public function getMissionsId() {
        return ($this->missionsId);
    }

    /**
     * mutator method for access level missionsId
     *
     * @param $newMissionsId int
     * @throws InvalidArgumentException if access level is invalid
     **/
    public function setMissionsId($newMissionsId) {
        //verify access level is integer
        $newMissionsId = filter_var($newMissionsId, FILTER_VALIDATE_INT);
        if(empty($newMissionsId) === true) {
            throw new InvalidArgumentException ("Missions Id Invalid");
        }
        $this->missionsId = $newMissionsId;
    }


    /**
     * accessor method for date of programs
     *
     * @return string date for programs
     **/
    public function getProgDate() {
        return ($this->progDate);
    }

    /**
     * mutator method for ProgDate
     * @param mixed DateTime|string $newProgDate
     * @throws InvalidArgumentException
     * @throws RangeException
     * @throws Exception
     */
    public function setProgDate($newProgDate) {

        try {
            $newProgDate = validateDate($newProgDate);

        } catch(InvalidArgumentException $invalidArgument) {
            throw(new InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
        } catch(RangeException $range) {
            throw(new RangeException($range->getMessage(), 0, $range));
        } catch(Exception $exception) {
            throw(new Exception($exception->getMessage(), 0, $exception));
        }


        $this->progDate = $newProgDate;
    }


    /**
     * accessor method for description of programs
     *
     * @return string of description for programs
     */
    public function getDescription() {
        return ($this->description);
    }

    /**
     * mutator method for description of programs
     *
     * @param $newDescription string
     * @throws InvalidArgumentException if new description is empty
     **/
    public function setDescription($newDescription) {

        $newDescription = filter_var ($newDescription, FILTER_SANITIZE_STRING);

        if($newDescription === false) {
            throw (new InvalidArgumentException("New description is insecure or empty"));
        }
        $this->description = $newDescription;
    }

    /**
     * accessor method for location
     *
     * @return string of locations for programs
     **/
    public function getLocation() {
        return ($this->location);
    }

    /**
     * mutator method for locations
     *
     * @param string $newLocation of locations
     */
    public function setLocation($newLocation) {

        $newLocation = filter_var ($newLocation, FILTER_SANITIZE_STRING);

        if($newLocation === false) {
            throw( new InvalidArgumentException("New Location is insecure or empty"));
        }
        $this->location = $newLocation;
    }

    /**
     * accessor method for programName
     *
     * @return string for programName
     **/
    public function getProgramName() {
        return ($this->programName);
    }

    /**
     * mutator for programName
     *
     * @param string $newProgramName for programs
     * @throws InvalidArgumentException if program name invalid
     */
    public function setProgramName($newProgramName) {

        //verify program name is valid
        $newProgramName = filter_var($newProgramName, FILTER_SANITIZE_STRING);

        if($newProgramName === false) {
            throw new InvalidArgumentException("program name invalid");
        }
        if(strlen($newProgramName) > 32) {
            throw (new RangeException ("Program Name content to large"));
        }
        $this->programName = $newProgramName;
    }

    /**
     * accessor method for progTime
     *
     * @return string of progTime for programs
     */
    public function getProgTime() {
        return ($this->progTime);
    }

    /**
     * mutator for progTime
     *
     * @param $newProgTime int
     * @throws InvalidArgumentException if time is invalid
     */
    public function setProgTime($newProgTime)  {
        $newProgTime = filter_var ($newProgTime, FILTER_SANITIZE_STRING);

        if($newProgTime === false) {
            throw( new InvalidArgumentException("New progTime is insecure or empty"));
        }
        $this->progTime = $newProgTime;
    }

    /**
     * Inserts Program into MYSQL
     *
     * Inserts this programsId in intervals
     * @param PDO $pdo connection to
     **/
    public function insert(PDO $pdo) {
        //make sure program doesn't already exist
        if($this->programsId !== null) {
        throw (new PDOException("existing program"));
        }
        //create query template
        $query = "INSERT INTO programs (missionsId, progDate, description, location, programName, progTime)
          			VALUES (:missionsId, :progDate, :description, :location, :programName, :progTime)";
        $statement = $pdo->prepare($query);

		 $pDate = $this->progDate->format("Y-m-d");

        // bind the variables to the place holders in the template
        $parameters = array("missionsId" => $this->missionsId, "progDate" => $pDate, "description" => $this->description,
			  							"location" => $this->location, "programName" => $this->programName, "progTime" => $this->progTime);
        $statement->execute($parameters);

        //update null programsId with what mySQL just gave us
        $this->programsId = intval($pdo->lastInsertId());

}

    /**
     * Deletes Programs from mySQl
     *
     * Delete PDO to delete programsId
     * @param PDO $pdo
     **/
    public function delete(PDO & $pdo) {
        //enforce the programs is not null
        if($this->programsId ===null) {
            throw(new PDOException("unable to delete program that does not exist"));
        }
        //create query template
        $query = "DELETE FROM programs WHERE programsId = :programsId";
        $statement = $pdo->prepare($query);
        //bind the member variables to the place holder in the template
        $parameters = array("programsId" => $this->programsId);
        $statement->execute($parameters);

        }

    /**
     * updates Programs in mySQL
     *
     * Update PDO to update programs class
     * @param PDO $pdo pointer to PDO connection, by reference
     **/
    public function update(PDO $pdo) {

        // create query template
        $query = "UPDATE programs SET programsId = :programsId, missionsId = :missionsId, progDate = :progDate, 
          description = :description, location = :location, programName = :programName, 
          progTime = :progTime  WHERE programsId = :programsId";
        $statement = $pdo->prepare($query);

        $pDate = $this->progDate->format("Y-m-d");

        // bind the member variables
        $parameters = array("programsId" => $this->programsId, "missionsId" => $this->missionsId,
            "progDate" => $pDate, "description" => $this->description, "location" => $this->location,
            "programName" => $this->programName, "progTime" => $this->progTime);
        $statement->execute($parameters);
    }

    /**
     * Get programs by programsId
     *
     * @param PDO $pdo pointer to PDO connection, by reference
     * @param int $programsId for unique programs
     * @return mixed|programs
     **/
    public static function getProgramsByProgramsId(PDO $pdo, $programsId) {
        // sanitize the programsId before searching
        $programsId = filter_var($programsId, FILTER_VALIDATE_INT);
        if($programsId === false) {
            throw(new PDOException("programs Id is not an integer"));
        }
        if($programsId <= 0) {
            throw(new PDOException("programs Id is not positive"));
        }
        // create query template
        $query = "SELECT programsId, missionsId, progDate, description, location, programName, progTime FROM programs WHERE programsId = :programsId";
        $statement = $pdo->prepare($query);
        // bind the programs id to the place holder in the template
        $parameters = array("programsId" => $programsId);
        $statement->execute($parameters);
        // grab the programs from mySQL
        try {
            $program = null;
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $row = $statement->fetch();
            if($row !== false) {
                $program = new Programs ($row["programsId"], $row["missionsId"], $row["progDate"],
                    $row["description"], $row["location"], $row["programName"], $row["progTime"]);
            }
        } catch(Exception $exception) {
            // if the row couldn't be converted, rethrow it
            throw(new PDOException($exception->getMessage(), 0, $exception));
        }
        return ($program);
    }

    /**
     * Get programs by missionsId
     *
     * @param PDO $pdo pointer to PDO connection, by reference
     * @param int $missionsId for unique programs
     * @return mixed|missions
     **/
    public static function getProgramsByMissionsId(PDO $pdo, $missionsId) {
        // sanitize the missionsId before searching
        $missionsId = filter_var($missionsId, FILTER_VALIDATE_INT);
        if($missionsId === false) {
            throw(new PDOException("missions Id is not an integer"));
        }
        if($missionsId <= 0) {
            throw(new PDOException("missions Id is not positive"));
        }
        // create query template
        $query = "SELECT programsId, missionsId, progDate, description, location, programName, progTime FROM programs WHERE missionsId = :missionsId";
        $statement = $pdo->prepare($query);
        // bind the missions id to the place holder in the template
        $parameters = array("missionsId" => $missionsId);
        $statement->execute($parameters);

        //call the function to build an array of the values
        $programs = null;
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $programs = new SplFixedArray($statement->rowCount());
        while(($row = $statement->fetch()) !== false) {
            try {
                if($row !== false) {
                    $program = new Programs($row["programsId"], $row["missionsId"], $row["progDate"], $row["description"], $row["location"], $row["programName"], $row["progTime"]);
                    $programs[$programs->key()] = $program;
                    $programs->next();
                }
            } catch(Exception $exception) {

                throw(new PDOException($exception->getMessage(), 0, $exception));
            }
        }

        return $programs;
    }

    public static function getAllPrograms(PDO $pdo) {
        //create the query template
        $query = "SELECT programsId, missionsId, progDate, description, location, programName, progTime FROM programs";
        $statement = $pdo->prepare($query);
        // execute
        $statement->execute();
        //call the function to build an array of the values
        $programs = null;
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $programs = new SplFixedArray($statement->rowCount());
        while(($row = $statement->fetch()) !== false) {
            try {
                if($row !== false) {
                    $program = new Programs($row["programsId"], $row["missionsId"], $row["progDate"], $row["description"], $row["location"], $row["programName"], $row["progTime"]);
                    $programs[$programs->key()] = $program;
                    $programs->next();
                }
            } catch(Exception $exception) {

                throw(new PDOException($exception->getMessage(), 0, $exception));
            }
        }

        return $programs;
    }
    public function JsonSerialize() {
        $fields = get_object_vars($this);
        unset ($fields["salt"]);
        unset ($fields["hash"]);
        return ($fields);
    }

} //end class


