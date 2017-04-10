<?php
/**
 * Class Members for sites members base
 *
 * This class handles members
 *
 * @author Aarick Lameman LamemanAarick@gmail.com
 */
class Members implements JsonSerializable
{
    /**
     * id for this members; this is the primary key
     * @var int $membersId (PK)
     **/
    private $membersId;
    /**
     * missionsId to identify members groups
     * @var int for $missionsId(FK)
     **/
    private $missionsId;
    /**
     * allows activation of a new members account
     * @var string for activation
     **/
    private $activation;
    /**
     * email for the members
     * @var string for $email
     **/
    private $email;
    /**
     * first name of the members
     * @var string for $firstName
     **/
    private $firstName;
    /**
     * hash of password w/ salt
     * @var string for password hash
     **/
    private $hash;
    /**
     * last name of the members
     * @var string for $lastName
     **/
    private $lastName;
    /**
     * phone number of members
     * @var int $phone
     **/
    private $phone;
    /**
     * position of the members
     * @var string $position
     **/
    private $position;
    /**
     * zip code for each member
     * @var string for $zip
     **/
    private $zip;
    /**
     * state that members live in
     * @var string for $state
     **/
    private $state;
    /**
     * city that members live in
     * @var string for $city
     **/
    private $city;
    /**
     * address1 of the members
     * @var string for $address1
     **/
    private $address1;
    /**
     * address2 of the members
     * @var string for $address2
     **/
    private $address2;
    /**
     * gender of the members
     * @var string for $gender
     **/
    private $gender;
    /**
     * dob of the members
     * @var string for $dob
     **/
    private $dob;
    /**
     * salt of password w/ hash
     * @var string $salt for password salt
     **/
    private $salt;


    /**
     * Members constructor.
     * @param $newMembersId
     * @param $newMissionsId
     * @param $newActivation
     * @param $newEmail
     * @param $newFirstName
     * @param $newHash
     * @param $newLastName
     * @param $newPhone
     * @param $newPosition
     * @param $newZip
     * @param $newState
     * @param $newCity
     * @param $newAddress1
     * @param $newAddress2
     * @param $newGender
     * @param $newDob
     * @param $newSalt
     * @throws RangeException
     * @throws InvalidArgumentException
     * @throws Exception
     *
     **/
    public function __construct($newMembersId, $newMissionsId, $newActivation, $newEmail, $newFirstName, $newHash, $newLastName,
                                $newPhone, $newPosition, $newZip, $newState, $newCity, $newAddress1, $newAddress2, $newGender, $newDob, $newSalt)
    {
        try {
            $this->setMembersId($newMembersId);
            $this->setMissionsId($newMissionsId);
            $this->setActivation($newActivation);
            $this->setEmail($newEmail);
            $this->setFirstName($newFirstName);
            $this->setHash($newHash);
            $this->setLastName($newLastName);
            $this->setPhone($newPhone);
            $this->setPosition($newPosition);
            $this->setZip($newZip);
            $this->setState($newState);
            $this->setCity($newCity);
            $this->setAddress1($newAddress1);
            $this->setAddress2($newAddress2);
            $this->setGender($newGender);
            $this->setDob($newDob);
            $this->setSalt($newSalt);
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
     * accessor method for membersId
     *
     * @return int value of unique membersId
     **/
    public function getMemberId()
    {
        return ($this->membersId);
    }

    /**
     * mutator method for the membersId
     *
     * @param int $newMembersId unique value to represent a member $newMemberId
     * @throws InvalidArgumentException for invalid content
     **/
    public function setMembersId($newMembersId)
    {
        // base case: if the membersId is null,
        // this is a new members without a mySQL assigned id (yet)
        if ($newMembersId === null) {
            $this->membersId = null;
            return;
        }
        //verify the Members is valid
        $newMembersId = filter_var($newMembersId, FILTER_VALIDATE_INT);
        if (empty($newMembersId) === true) {
            throw (new InvalidArgumentException ("membersId invalid"));
        }
        $this->membersId = $newMembersId;
    }

    /**
     * accessor method for access level of user
     *
     * @return mixed
     **/
    public function getMissionsId()
    {
        return ($this->missionsId);
    }

    /**
     * Mutator method for missionsId
     *
     * @param int $newMissionsId
     * @throws InvalidArgumentException if missions is invalid
     **/
    public function setMissionsId($newMissionsId)
    {
        // verify missions is integer
        $newMissionsId = filter_var($newMissionsId, FILTER_VALIDATE_INT);
        if (empty($newMissionsId) === true) {
            throw new InvalidArgumentException ("Missions Invalid");
        }
        $this->missionsId = $newMissionsId;
    }

    /**
     * @return string
     **/
    public function getActivation()
    {
        return ($this->activation);
    }

    /**
     * @param $newActivation
     **/
    public function setActivation($newActivation)
    {
        if ($newActivation === null) {
            $this->activation = null;
            return;
        }
        // verify salt is exactly string of 16
        if ((ctype_xdigit($newActivation)) === false) {
            if (empty($newActivation) === true) {
                throw new InvalidArgumentException ("activation invalid");
            }
            if (strlen($newActivation) !== 16) {
                throw (new RangeException ("Activation not valid"));
            }
        }
        $this->activation = $newActivation;
    }

    /**
     * accessor method for email
     *
     * @return string of email for user
     **/
    public function getEmail()
    {
        return ($this->email);
    }

    /**
     * Mutator method for Email
     *
     * @param string $newEmail of users' email $newEmail
     * @throws InvalidArgumentException if email does not pass sanitization
     * @throws RangeException if email is longer than 64 characters
     **/
    public function setEmail($newEmail)
    {
        // verify email is valid
        $newEmail = filter_var($newEmail, FILTER_SANITIZE_EMAIL);
        if (empty($newEmail) === true) {
            throw new InvalidArgumentException ("user email invalid");
        }
        if (strlen($newEmail) > 64) {
            throw(new RangeException ("Email content too large"));
        }
        $this->email = $newEmail;
    }

    /**
     * accessor method for First Name
     *
     * @return string for first name
     **/
    public function getFirstName()
    {
        return ($this->firstName);
    }

    /**
     * Mutator method for First Name
     *
     * @param string $newFirstName for user first name $newFirstName
     */
    public function setFirstName($newFirstName)
    {
        // verify first name is valid
        $newFirstName = filter_var($newFirstName, FILTER_SANITIZE_STRING);
        if (empty($newFirstName) === true) {
            throw new InvalidArgumentException("first name invalid");
        }
        if (strlen($newFirstName) > 32) {
            throw (new RangeException ("First Name content too large"));
        }
        $this->firstName = $newFirstName;
    }

    /**
     * accessor method for Hash
     * @return string of users password Hash
     **/
    public function getHash()
    {
        return ($this->hash);
    }

    /**
     * Mutator for Hash -insure it is 128 length string
     *
     * @param string $newHash of users
     * @throws InvalidArgumentException if newHash is not valid int
     * @throws RangeException if newHash is not exactly 128 digits
     **/
    public function setHash($newHash)
    {
        // verify Hash is exactly string of 128
        if ((ctype_xdigit($newHash)) === false) {
            if (empty($newHash) === true) {
                throw new InvalidArgumentException ("hash invalid");
            }
            if (strlen($newHash) !== 128) {
                throw new RangeException ("hash not valid");
            }
        }
        $this->hash = $newHash;
    }

    /**
     * accessor method for Last Name
     *
     * @return string for last name
     **/
    public function getLastName()
    {
        return ($this->lastName);
    }

    /**
     * Mutator method for last name sanitation
     *
     * @param string $newLastName for member last name $newLastName
     **/
    public function setLastName($newLastName)
    {
        //verify last name is valid
        $newLastName = filter_var($newLastName, FILTER_SANITIZE_STRING);
        if (empty($newLastName) === true) {
            throw new InvalidArgumentException("last name invalid");
        }
        if (strlen($newLastName) > 32) {
            throw (new RangeException("Last Name content too large"));
        }
        $this->lastName = $newLastName;
    }

    /**
     * Accessor method for Phone Number
     *
     * @return int for phone number
     **/
    public function getPhone()
    {
        return ($this->phone);
    }
    /**
     * Mutator method for phone
     * @throws RangeException
     * @param string missions phone $newPhone
     */
    public function setPhone($newPhone) {
        $newPhone = filter_var($newPhone, FILTER_SANITIZE_STRING);

        if ( $newPhone === false) {
            throw (new InvalidArgumentException("New Phone is Invalid"));
        }

        if (strlen($newPhone) > 16) {
            throw (new RangeException ("Phone content too large"));
        }
        $this->phone = $newPhone;
    }

    /**
     * accessor method for Position
     *
     * @return string for position
     **/
    public function getPosition()
    {
        return ($this->position);
    }

    /**
     * Mutator method for Position
     *
     * @param string $newPosition for members position $newPosition
     */
    public function setPosition($newPosition)
    {
        // verify position is valid
        $newPosition = filter_var($newPosition, FILTER_SANITIZE_STRING);
        if (empty($newPosition) === true) {
            throw new InvalidArgumentException("position invalid");
        }
        if (strlen($newPosition) > 32) {
            throw (new RangeException ("Position content too large"));
        }
        $this->position = $newPosition;
    }
    /**
     * accessor method for Zip
     *
     * @return string for zip
     **/
    public function getZip()
    {
        return ($this->zip);
    }

    /**
     * Mutator method for Zip
     *
     * @param string $newZip for members zip code $newZip
     */
    public function setZip($newZip)
    {
        // verify zip is valid
        $newZip = filter_var($newZip, FILTER_SANITIZE_STRING);
        if (empty($newZip) === true) {
            throw new InvalidArgumentException("zip invalid");
        }
        if (strlen($newZip) > 32) {
            throw (new RangeException ("Zip content too large"));
        }
        $this->zip = $newZip;
    }

    /**
     * accessor method for State
     *
     * @return string for state
     **/
    public function getState()
    {
        return ($this->state);
    }

    /**
     * Mutator method for State
     *
     * @param string $newState for members state $newState
     */
    public function setState($newState)
    {
        // verify state is valid
        $newState = filter_var($newState, FILTER_SANITIZE_STRING);
        if (empty($newState) === true) {
            throw new InvalidArgumentException("state invalid");
        }
        if (strlen($newState) > 32) {
            throw (new RangeException ("State content too large"));
        }
        $this->state = $newState;
    }

    /**
     * accessor method for City
     *
     * @return string for position
     **/
    public function getCity()
    {
        return ($this->city);
    }

    /**
     * Mutator method for City
     *
     * @param string $newCity for members City $newCity
     */
    public function setCity($newCity)
    {
        // verify City is valid
        $newCity = filter_var($newCity, FILTER_SANITIZE_STRING);
        if (empty($newCity) === true) {
            throw new InvalidArgumentException("city invalid");
        }
        if (strlen($newCity) > 32) {
            throw (new RangeException ("City content too large"));
        }
        $this->city = $newCity;
    }

    /**
     * accessor method for Address1
     *
     * @return string for address1
     **/
    public function getAddress1()
    {
        return ($this->address1);
    }

    /**
     * Mutator method for Address1
     *
     * @param string $newAddress1 for members address1 $newAddress1
     */
    public function setAddress1($newAddress1)
    {
        // verify address1 is valid
        $newAddress1 = filter_var($newAddress1, FILTER_SANITIZE_STRING);
        if (empty($newAddress1) === true) {
            throw new InvalidArgumentException("address1 invalid");
        }
        if (strlen($newAddress1) > 32) {
            throw (new RangeException ("Address1 content too large"));
        }
        $this->address1 = $newAddress1;
    }

    /**
     * accessor method for Address2
     *
     * @return string for address2
     **/
    public function getAddress2()
    {
        return ($this->address2);
    }


    /**
     * Mutator method for Address2
     *
     * @param string $newAddress2 for members address2 $newAddress2
     */
    public function setAddress2($newAddress2)
    {
        // verify address2 is valid
        $newAddress2 = filter_var($newAddress2, FILTER_SANITIZE_STRING);
        if (empty($newAddress2) === true) {
            throw new InvalidArgumentException("address2 invalid");
        }
        if (strlen($newAddress2) > 32) {
            throw (new RangeException ("Address2 content too large"));
        }
        $this->address2 = $newAddress2;
    }

    /**
     * accessor method for Gender
     *
     * @return string for gender
     **/
    public function getGender()
    {
        return ($this->gender);
    }


    /**
     * Mutator method for Gender
     *
     * @param string $newGender for members gender $newGender
     */
    public function setGender($newGender)
    {
        // verify gender is valid
        $newGender = filter_var($newGender, FILTER_SANITIZE_STRING);
        if (empty($newGender) === true) {
            throw new InvalidArgumentException("gender invalid");
        }
        if (strlen($newGender) > 32) {
            throw (new RangeException ("Gender content too large"));
        }
        $this->gender = $newGender;
    }

    /**
     * accessor method for Dob
     *
     * @return string for dob
     **/
    public function getDob()
    {
        return ($this->dob);
    }


    /**
     * Mutator method for Dob
     *
     * @param string $newDob for members dob $newDob
     */
    public function setDob($newDob)
    {
        // verify dob is valid
        $newDob = filter_var($newDob, FILTER_SANITIZE_STRING);
        if (empty($newDob) === true) {
            throw new InvalidArgumentException("dob invalid");
        }
        if (strlen($newDob) > 32) {
            throw (new RangeException ("Dob content too large"));
        }
        $this->dob = $newDob;
    }


    /**
     * accessor method for Salt
     *
     * @return string of Salt for user password
     **/
    public function getSalt()
    {
        return ($this->salt);
    }


    /**
     * mutator method for Salt
     *
     * @param string $newSalt of users password salt $newSalt
     * @throw InvalidArgumentException if salt is not valid int
     * @throw RangeException if salt is not exactly 64 digits
     **/
    public function setSalt($newSalt)
    {
        // verify salt is exactly string of 64
        if ((ctype_xdigit($newSalt)) === false) {
            if (empty($newSalt) === true) {
                throw new InvalidArgumentException ("salt invalid");
            }
            if (strlen($newSalt) !== 64) {
                throw (new RangeException ("salt not valid"));
            }
        }
        $this->salt = $newSalt;
    }


    public function JsonSerialize()
    {
        $fields = get_object_vars($this);
        unset ($fields["salt"]);
        unset ($fields["hash"]);
        return ($fields);
    }


    /**
     * Inserts Members into mySQL
     *
     * Inserts this membersId into mySQL in intervals
     * @param PDO $pdo connection to
     **/
    public function insert(PDO &$pdo)
    {
        // make sure members doesn't already exist
        if ($this->membersId !== null) {
            throw (new PDOException("existing member"));
        }
        //create query template
        $query = "INSERT INTO members (missionsId, activation, email, firstName, hash, lastName, phone, position, zip, state, city, address1, address2, gender, dob, salt)
        VALUES (:missionsId, :activation, :email, :firstName, :hash, :lastName, :phone, :position, :zip, :state, :city, :address1, :address2, :gender, :dob, :salt)";
        $statement = $pdo->prepare($query);

        // bind the variables to the place holders in the template
        $parameters = array("missionsId" => $this->missionsId, "activation" => $this->activation, "email" => $this->email,
            "firstName" => $this->firstName, "hash" => $this->hash, "lastName" => $this->lastName, "phone" => $this->phone,
            "position" => $this->position, "zip" => $this->zip, "state" => $this->state, "city" => $this->city, "address1" => $this->address1,
            "address2" => $this->address2, "gender" => $this->gender, "dob" => $this->dob, "salt" => $this->salt);

        $statement->execute($parameters);

        //update null membersId with what mySQL just gave us
        $this->membersId = intval($pdo->lastInsertId());

    }


    /**
     * updates Members in mySQL
     *
     * Update PDO to update members class
     * @param PDO $pdo pointer to PDO connection, by reference
     **/
    public function update(PDO $pdo) {
        // create query template
        $query = "UPDATE members SET activation = :activation, 
          email = :email, firstName = :firstName, hash = :hash, lastName = :lastName, phone = :phone, 
          position = :position, zip = :zip, city = :city, state = :state, address1 = :address1, address2 = :address2,
           gender = :gender, dob = :dob, salt =:salt
          WHERE membersId = :membersId";
        $statement = $pdo->prepare($query);
        // bind the members variables
        $parameters = array("activation" => $this->activation, "email" => $this->email,
            "firstName" => $this->firstName, "hash" => $this->hash, "lastName" => $this->lastName, "phone" => $this->phone,
            "position" => $this->position, "zip" => $this->zip, "state" => $this->state, "city" => $this->city, "address1" => $this->address1,
            "address2" => $this->address2, "gender" => $this->gender, "dob" => $this->dob, "salt" => $this->salt,
            "membersId" => $this->membersId,);
        $statement->execute($parameters);
    }

    /**
     * Deletes Members from mySQL
     *
     * Delete PDO to delete membersId
     * @param PDO $pdo
     **/
    public function delete(PDO &$pdo) {
        // enforce the members is not null
        if($this->membersId === null) {
            throw(new PDOException("unable to delete a members that does not exist"));
        }
        //create query template
        $query = "DELETE FROM members WHERE membersId = :membersId";
        $statement = $pdo->prepare($query);
        //bind the member variables to the place holder in the template
        $parameters = array("membersId" => $this->membersId);
        $statement->execute($parameters);
    }

    /**
     * Get members by membersId integer
     *
     * @param PDO $pdo pointer to PDO connection, by reference
     * @param int $membersId for unique membersId $membersId
     * @return mixed|Members
     **/
    public static function getMembersByMembersId(PDO $pdo, $membersId) {
        // sanitize the membersId before searching
        $membersId = filter_var($membersId, FILTER_VALIDATE_INT);
        if($membersId === false) {
            throw(new PDOException("membersId is not an integer"));
        }
        if($membersId <= 0) {
            throw(new PDOException("membersId is not positive"));
        }

        // create query template
        $query = "SELECT membersId, missionsId, activation, email, firstName, hash, lastName, phone, position, zip, state, city, address1, address2, gender, dob, salt
                  FROM members WHERE membersId = :membersId";
        $statement = $pdo->prepare($query);
        // bind the members id to the place holder in the template
        $parameters = array("membersId" => $membersId);
        $statement->execute($parameters);

        // grab the members from mySQL
        try {
            $member = null;
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $row = $statement->fetch();
            if($row !== false) {
                $member = new Members ($row["membersId"], $row["missionsId"], $row["activation"], $row["email"], $row["firstName"], $row["hash"], $row["lastName"], $row["phone"], $row["position"], $row["zip"], $row["state"], $row["city"], $row["address1"], $row["address2"], $row["gender"], $row["dob"], $row["salt"]);
            }
        } catch(Exception $exception) {
            // if the row couldn't be converted, rethrow it
            throw(new PDOException($exception->getMessage(), 0, $exception));
        }
        return ($member);
    }

    /**
     * Get members by missionsId
     *
     * @param PDO $pdo pointer to PDO connection, by reference
     * @param int $missionsId for unique members
     * @return mixed|missions
     **/
    public static function getMembersByMissionsId(PDO $pdo, $missionsId) {
        // sanitize the missionsId before searching
        $missionsId = filter_var($missionsId, FILTER_VALIDATE_INT);
        if($missionsId === false) {
            throw(new PDOException("missions Id is not an integer"));
        }
        if($missionsId <= 0) {
            throw(new PDOException("missions Id is not positive"));
        }
        // create query template
        $query = "SELECT membersId, missionsId, activation, email, firstName, hash, lastName, phone, position, zip, state, city, address1, address2, gender, dob, salt 
                  FROM members WHERE missionsId = :missionsId";
        $statement = $pdo->prepare($query);
        // bind the missions id to the place holder in the template
        $parameters = array("missionsId" => $missionsId);
        $statement->execute($parameters);
        //call the function to build an array of the values
        $members = null;
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $members = new SplFixedArray($statement->rowCount());
        while(($row = $statement->fetch()) !== false) {
            try {
                if($row !== false) {
                    $member = new Members($row["membersId"], $row["missionsId"], $row["activation"], $row["email"], $row["firstName"], $row["hash"], $row["lastName"], $row["phone"], $row["position"], $row["zip"], $row["state"], $row["city"], $row["address1"], $row["address2"], $row["gender"], $row["dob"], $row["salt"]);
                    $members[$members->key()] = $member;
                    $members->next();
                }
            } catch(Exception $exception) {
                throw(new PDOException($exception->getMessage(), 0, $exception));
            }
        }
        return $members;
    }

    /**
     * Get all MembersId
     *
     * @param PDO $pdo pointer to PDO connection, by reference
     * @return mixed|Members
     **/
    public static function getAllMembers(PDO &$pdo) {


        //create the query template
        $query = "SELECT membersId, missionsId, activation, email, firstName, hash, lastName, phone, position, zip, state, city, address1, address2, gender, dob, salt 
                  FROM members";
        $statement = $pdo->prepare($query);

        // execute
        $statement->execute();


        //call the function to build an array of the values
        $members = null;
        $statement->setFetchMode(PDO::FETCH_ASSOC);

        $members = new SplFixedArray($statement->rowCount());
 
        while(($row = $statement->fetch()) !== false) {
            try {
                if($row !== false) {
                    $member = new Members ($row["membersId"], $row["missionsId"], $row["activation"], $row["email"], $row["firstName"], $row["hash"], $row["lastName"], $row["phone"], $row["position"], $row["zip"], $row["state"], $row["city"], $row["address1"], $row["address2"], $row["gender"], $row["dob"], $row["salt"]);
                    $members[$members->key()] = $member;
                    $members->next();
                }
            } catch(Exception $exception) {

                throw(new PDOException($exception->getMessage(), 0, $exception));
            }
        }

        return $members;
    }

} // end class