<?php
/**
 * Class Bulletin
 *
 * This class handles bulletins posted to site
 *
 * @author name email
 **/

require_once ("dateCheck.php");

class Bulletin implements JsonSerializable {
    /**
     *id for a bulletin this is primary key
     * @var int $bulletinId
     */
    private $bulletinId;
    /**
     * id for a member this is a foreign key
     * @var int $membersId
     */
    private $membersId;
    /**
     * attaches key for user posting bulletin
     * @var int $missionsId foreign key for $missionsId
     */
    private $missionsId;
    /**
     * describes a bulletins category
     * @var string for category description of the bulletin
     */
    private $category;
    /**
     * the actual message content posted to the bulletin
     * @var string content of the bulletin message itself text only
     */
    private $message;
    /**
     * describes a timeStamp
     * @var string for timeStamp of the bulletin
     */
    private $timeStamp;
    /**
     * Bulletin constructor.
     * @param $newBulletinId
     * @param $newMembersId
     * @param $newMissionsId
     * @param $newCategory
     * @param $newMessage
     * @param $newTimeStamp
     * @throws InvalidArgumentException
     * @throws RangeException
     * @throws Exception
     */
    public function __construct($newBulletinId, $newMembersId, $newMissionsId, $newCategory, $newMessage, $newTimeStamp)
    {
        try {
            $this->setBulletinId($newBulletinId);
            $this->setMembersId($newMembersId);
            $this->setMissionsId($newMissionsId);
            $this->setCategory($newCategory);
            $this->setMessage($newMessage);
            $this->setTimeStamp($newTimeStamp);
        } catch (InvalidArgumentException $invalidArgument) {
            //rethrow the exception to the caller
            throw(new InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
        } catch (RangeException $range) {
            // rethrow the exception to the caller
            throw (new RangeException($range->getMessage(), 0, $range));
        } catch (Exception $exception) {
            // rethrow generic exception
            throw(new Exception($exception->getMessage(), 0, $exception));
        }
    }

    /**
     * accessor method for bulletinId
     *
     * @return int value of unique bulletinId
     **/
    public function getBulletinId()
    {
        return ($this->bulletinId);
    }
    /**
     * mutator method for the bulletinId
     *
     * @param int $newBulletinId unique value to represent a user $newBulletinId
     * @throws InvalidArgumentException for invalid content
     **/
    public function setBulletinId($newBulletinId)
    {
        // base case: if the bulletinId is null,
        // this is a new bulletin without a mySQL assigned id (yet)
        if ($newBulletinId === null) {
            $this->bulletinId = null;
            return;
        }
        //verify the User is valid
        $newBulletinId = filter_var($newBulletinId, FILTER_VALIDATE_INT);
        if (empty($newBulletinId) === true) {
            throw (new InvalidArgumentException ("bulletinId invalid"));
        }
        $this->bulletinId = $newBulletinId;
    }


    /**
     * accessor method for membersId
     *
     * @return int missionsId
     **/
    public function getMembersId() {
        return ($this->missionsId);
    }
    /**
     * Mutator method for membersId
     *
     * @param $newMembersId int
     * @throws InvalidArgumentException if membersId is invalid
     **/
    public function setMembersId($newMembersId) {
        // verify access level is integer
        $newMembersId = filter_var($newMembersId, FILTER_VALIDATE_INT);
        if(empty($newMembersId) === true) {
            throw new InvalidArgumentException ("Members Id Invalid");
        }
        $this->membersId = $newMembersId;
    }


    /**
     * accessor method for missionsId
     *
     * @return int missionsId
     **/
    public function getMissionsId() {
        return ($this->missionsId);
    }
    /**
     * Mutator method for missionsId
     *
     * @param $newMissionsId int
     * @throws InvalidArgumentException if missionsId is invalid
     **/
    public function setMissionsId($newMissionsId) {
        // verify access level is integer
        $newMissionsId = filter_var($newMissionsId, FILTER_VALIDATE_INT);
        if(empty($newMissionsId) === true) {
            throw new InvalidArgumentException ("Missions Id Invalid");
        }
        $this->missionsId = $newMissionsId;
    }

    /**
     * accessor method for category
     *
     * @return string of category
     **/
    public function getCategory()
    {
        return ($this->category);
    }
    /**
     * Mutator method for Category
     *
     * @param string bulletin category $newCategory
     */
    public function setCategory($newCategory)
    {
        // verify category is valid
        $newCategory = filter_var($newCategory, FILTER_SANITIZE_STRING);
        if (empty($newCategory) === true) {
            throw new InvalidArgumentException("category invalid");
        }
        if (strlen($newCategory) > 32) {
            throw (new RangeException ("Category name too large"));
        }
        $this->category = $newCategory;
    }

    /**
     * accessor method for message
     *
     * @return string of message
     **/
    public function getMessage()
    {
        return ($this->message);
    }
    /**
     * Mutator method for Message
     *
     * @param string bulletin category $newMessage
     */
    public function setMessage($newMessage)
    {
        // verify message is valid
        $newMessage = filter_var($newMessage, FILTER_SANITIZE_STRING);
        if (empty($newMessage) === true) {
            throw new InvalidArgumentException("message invalid");
        }
        $this->message = $newMessage;
    }
    public function JsonSterialize()
    {
        $fields = get_object_vars($this);
        return ($fields);
    }

    /**
     * accessor method for timestamp
     *
     * @return string of timestamp
     **/
    public function getTimeStamp()
    {
        return ($this->timeStamp);
    }
    /**
     * Mutator method for timestamp
     *
     * @param $newTimeStamp DateTime|string  (if string format Y-m-d)  for timeStamp category $newTimestamp
     */
    public function setTimeStamp($newTimeStamp)
    {
        // if $newTimeStamp is null the database will set the Date and Time
        if($newTimeStamp === null) {
            return;
        }

        try {
            $newTimeStamp = validateDate($newTimeStamp);
        } catch(\InvalidArgumentException $invalidArgument) {
            throw(new \InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
        } catch(\RangeException $range) {
            throw(new \RangeException($range->getMessage(), 0, $range));
        }

        $this->timeStamp = $newTimeStamp;
    }
    public function JsonSerialize()
    {
        $fields = get_object_vars($this);
        return ($fields);
    }

    /**
     * Inserts Bulletin into mySQL
     *
     * Inserts this bulletinId into mySQL in intervals
     * @param PDO $pdo connection to
     **/
    public function insert(PDO $pdo)
    {

        //create query template
        $query = "INSERT INTO bulletins (missionsId, membersId, category, message)
                        VALUES (:missionsId, :membersId, :category, :message)";
        $statement = $pdo->prepare($query);

        // bind the variables to the place holders in the template
        $parameters = array("missionsId" => $this->missionsId, "membersId" => $this->membersId, "category" => $this->category, "message" => $this->message);
        $statement->execute($parameters);

        //update null bulletinId with what mySQL just gave us
        $this->bulletinId = intval($pdo->lastInsertId());

        // get and set the time in this object
        $query = "SELECT timeStamp FROM bulletins WHERE bulletinId = :bulletinId";
        $statement = $pdo->prepare($query);
        $parameters = ["bulletinId" => $this->bulletinId];
        $statement->execute($parameters);
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $row = $statement->fetch();
        if($row !== false) {
            $ts = new DateTime($row["timeStamp"]);
            $this->setTimeStamp($ts->format("Y-m-d"));
        }

    }

    /**
     * Deletes Bulletin from mySQL
     *
     * Delete PDO to delete bulletinId
     * @param PDO $pdo
     **/
    public function delete(PDO &$pdo) {
        // enforce the bulletin is not null
        if($this->bulletinId === null) {
            throw(new PDOException("unable to delete a bulletin that does not exist"));
        }

        //create query template
        $query = "DELETE FROM bulletins WHERE bulletinId = :bulletinId";
        $statement = $pdo->prepare($query);

        //bind the member variables to the place holder in the template
        $parameters = array("bulletinId" => $this->bulletinId);
        $statement->execute($parameters);
    }

    /**
     * updates Message in mySQL
     *
     * Update PDO to update bulletin class
     * @param PDO $pdo pointer to PDO connection, by reference
     **/
    public function update(PDO $pdo) {
        // create query template
        $query = "UPDATE bulletins SET  category = :category, message = :message WHERE bulletinId = :bulletinId";
        $statement = $pdo->prepare($query);
        // bind the member variables
        $parameters = array ("category" => $this->category, "message" => $this->message, "bulletinId" => $this->bulletinId);
        $statement->execute($parameters);
    }

    /**
     * Get bulletin by bulletinId integer
     *
     * @param PDO $pdo pointer to PDO connection, by reference
     * @param int $bulletinId for unique bulletinId $bulletinId
     * @return mixed|Bulletin
     **/
    public static function getBulletinByBulletinId(PDO $pdo, $bulletinId) {

        // sanitize the bulletinId before searching
        $bulletinId = filter_var($bulletinId, FILTER_VALIDATE_INT);
        if($bulletinId === false) {
            throw(new PDOException("bulletin id is not an integer"));
        }

        if($bulletinId <= 0) {
            throw(new PDOException("bulletin id is not positive"));
        }

        // create query template
        $query = "SELECT bulletinId, membersId, missionsId, category, message, timeStamp FROM bulletins WHERE bulletinId = :bulletinId";
        $statement = $pdo->prepare($query);

        // bind the bulletin id to the place holder in the template
        $parameters = array("bulletinId" => $bulletinId);
        $statement->execute($parameters);

        // grab the bulletin from mySQL
        try {
            $bulletin = null;
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $row = $statement->fetch();
            if($row !== false) {
                $ts = new DateTime($row["timeStamp"]);
                $bulletin = new Bulletin ($row["bulletinId"], $row["membersId"], $row["missionsId"], $row["category"], $row["message"], $ts->format("Y-m-d"));
            }
        } catch(Exception $exception) {
            // if the row couldn't be converted, rethrow it
            throw(new PDOException($exception->getMessage(), 0, $exception));
        }

        return ($bulletin);
    }

    /**
     * get bulletin by category
     *
     * @param PDO $pdo pointer to PDO connection, by reference
     * @param string $category info for $bulletin
     * @return null|Bulletin
     **/
    public static function getBulletinByCategory(PDO $pdo, $category) {

        if($category === false) {
            throw(new PDOException("must have a category to retrieve bulletins"));
        }

        // create query template
        $query = "SELECT bulletinId, membersId, missionsId, category, message, timeStamp
                  FROM bulletins WHERE category = :category";
        $statement = $pdo->prepare($query);

        // bind the bulletinId to the place holder in the template
        $parameters = array("category" => $category);
        $statement->execute($parameters);
        $statement->setFetchMode(PDO::FETCH_ASSOC);

        $bulletins = new SplFixedArray($statement->rowCount());

        // grab the bulletins from mySQL
        while(($row = $statement->fetch()) !== false) {
            try {
                if ($row !== false) {
                    $ts = new DateTime($row["timeStamp"]);
                    $bulletin = new Bulletin ($row["bulletinId"], $row["membersId"], $row["missionsId"], $row["category"], $row["message"], $ts->format("Y-m-d"));
                    $bulletins[$bulletins->key()] = $bulletin;
                    $bulletins->next();
                }
            } catch (Exception $exception) {
                // if the row couldn't be converted, rethrow it
                throw(new PDOException($exception->getMessage(), 0, $exception));
            }
        }

        return ($bulletins);
    }
    /**
     * Get all Bulletins
     *
     * @param PDO $pdo pointer to PDO connection, by reference
     * @return mixed|Bulletin
     **/
    public static function getAllBulletins(PDO $pdo) {

        // create query template
        $query = "SELECT bulletinId, membersId, missionsId, category, message, timeStamp
                  FROM bulletins";
        $statement = $pdo->prepare($query);

        // bind the bulletinId to the place holder in the template
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);

        $bulletins = new SplFixedArray($statement->rowCount());

        // grab the bulletins from mySQL
        while(($row = $statement->fetch()) !== false) {
            try {
                if ($row !== false) {
                    $ts = new DateTime($row["timeStamp"]);
                    $bulletin = new Bulletin ($row["bulletinId"], $row["membersId"], $row["missionsId"], $row["category"], $row["message"], $ts->format("Y-m-d"));
                    $bulletins[$bulletins->key()] = $bulletin;
                    $bulletins->next();
                }
            } catch (Exception $exception) {
                // if the row couldn't be converted, rethrow it
                throw(new PDOException($exception->getMessage(), 0, $exception));
            }
        }

        return ($bulletins);
    }
}