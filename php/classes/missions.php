<?php

/** 
 * Class Missions for sites Missions base
 *
 *This class handles missions
 *
 *@author Gerlene Gordy gerlenejgordy1996@gmail.com
 **/
class Missions implements JsonSerializable
{
    /**
     * id for this missions; this is the primary key
     * @var int $missionsId
     **/
    private $missionsId;
    /**
     *address line 1 for this missions
     * @var string for $address1
     **/
    private $address1;
    /**
     *address line 2 for this missions
     * @var string for $address2
     **/
    private $address2;
    /**
     * city for this missions
     * @var string for $city
     **/
    private $city;
    /**
     * email for the missions
     * @var string for $email
     **/
    private $email;
    /**
     * images of missions
     * @var string for $images
     */
    private $images;
    /**
     * name of missions
     * @var string for $name
     */
    private $name;
    /**
     * phone number of missions
     * @var string for $phone
     **/
    private $phone;
    /**
     * person in charge for missions
     * @var string for $pic
     **/
    private $pic;
    /**
     * service times for this missions
     * @var string for $serviceTime
     **/
    private $serviceTime;
    /**
     * state for this missions
     * @var string for $state
     **/
    private $state;
    /**
     * zip for this missions
     * @var string for $zip
     **/
    private $zip;


    /**
     * Missions Constructor.
     *
     * @param $newMissionsId
     * @param $newAddress1
     * @param $newAddress2
     * @param $newCity
     * @param $newEmail
     * @param $newImages
     * @param $newName
     * @param $newPhone
     * @param $newPic
     * @param $newServiceTime
     * @param $newState
     * @param $newZip
     * @throws RangeException
     * @throws InvalidArgumentException
     * @throws Exception
     **/
public function __construct($newMissionsId, $newAddress1, $newAddress2, $newCity, $newEmail, $newImages, $newName, $newPhone,
$newPic, $newServiceTime, $newState, $newZip)
{
try {

    $this->setMissionsId($newMissionsId);
    $this->setAddress1($newAddress1);
    $this->setAddress2($newAddress2);
    $this->setCity($newCity);
    $this->setEmail($newEmail);
    $this->setImages($newImages);
    $this->setName($newName);
    $this->setPhone($newPhone);
    $this->setPic($newPic);
    $this->setServiceTime($newServiceTime);
    $this->setState($newState);
    $this->setZip($newZip);


        } catch
        (InvalidArgumentException $invalidArgument) {
            //rethrow the exception to the caller
            throw(new InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));

        }   catch (RangeException $range) {
            // rethrow the exception to the caller
            throw (new RangeException($range->getMessage(), 0, $range));

        }   catch (Exception $exception) {
            // rethrow generic exception
            throw(new Exception($exception->getMessage(), 0, $exception));
        }
        }


        /**
         * accessor method for MissionsId
         *
         * @return int value of unique MissionsId
         **/
        public function getMissionsId() {
             return ($this->missionsId);
        }

        /**
         * mutator method for the missionsId
         *
         * @param int $newMissionsId unique value to represent a mission $newMissionsId
         * @throws InvalidArgumentException for invalid content
         **/
            public function setMissionsId($newMissionsId) {
        //base case: if the missionsId is null,
        //this is a new missions without a mySQL assigned id (yet)
        if ($newMissionsId === null) {
            $this->missionsId = null;
            return;
        }
        //verify the missions is valid
        $newMissionsId = filter_var($newMissionsId, FILTER_VALIDATE_INT);
        if (empty($newMissionsId) === true) {
            throw (new InvalidArgumentException ("missionsId invalid"));
        }
        $this->missionsId = $newMissionsId;
            }


    
        /**
         * accessor method for address line 1
         *
         * @return string for address line 1
         **/
        public function getAddress1()
        {
            return ($this->address1);
        }

        /**
         * Mutator method for Address Line 1
         * @throws RangeException
         * @param string $newAddress1 missions address1 $newAddress1
         */
        public function setAddress1($newAddress1) {

            $newAddress1 = filter_var($newAddress1, FILTER_SANITIZE_STRING);

            if ( $newAddress1 === false) {
                throw (new InvalidArgumentException("New Address 1 is invalid"));
            }

            if (strlen($newAddress1) > 76) {
                throw (new RangeException ("Address1 content too large"));
            }
            $this->address1 = $newAddress1;
        }

            /**
             * accessor method for address line 2
             *
             * @return string for address line 2
             **/
            public function getAddress2()
            {
                return ($this->address2);

            }


            /**
             * Mutator method for Address Line 2
             *
             * @param string  missions address2 $newAddress2
             */
            public function setAddress2($newAddress2) {

                $newAddress2 = filter_var($newAddress2, FILTER_SANITIZE_STRING);

                if ( $newAddress2 === false) {
                    throw (new InvalidArgumentException("New Address 2 is invalid"));
                }

                if (strlen($newAddress2) > 76) {
                    throw (new RangeException ("Address2 content too large"));
                }
                $this->address2 = $newAddress2;
            }


            /**
             * accessor method for city
             *
             * @return string for city
             **/
            public function getCity()
            {
                return ($this->city);

            }

            /**
             * Mutator method for city
             * @throws RangeException
             * @param string missions city $newCity
             */
            public function setCity($newCity) {
                $newCity = filter_var($newCity, FILTER_SANITIZE_STRING);

                if ( $newCity === false) {
                    throw (new InvalidArgumentException("New City is Invalid"));
                }

                if (strlen($newCity) > 16) {
                    throw (new RangeException ("City content too large"));
                }
                $this->city = $newCity;
            }

            /**
             * accessor method for email
             *
             *@return string of email for user
             **/
            public function getEmail() {
                return ($this->email);
            }
            /**
             * mutator method for Email
             *
             *@param string $newEmail of users' email $newEmail
             * @throws InvalidArgumentException if email does not pass sanitize
             * @throws RangeException if email is longer than 64 characters
             **/
            public function setEmail($newEmail) {
                //verify email is valid
                $newEmail = filter_var($newEmail, FILTER_SANITIZE_EMAIL);

                if ($newEmail === false) {
                    throw new InvalidArgumentException ("user email is invalid");
                }

                if(strlen($newEmail) > 64) {
                    throw(new RangeException ("Email content too large"));
                }

                $this->email = $newEmail;
            }


            /**accessor method for Images
             *
             * @return string for Images
             * **/
            public function getImages() {
                return ($this->images);
            }

            /**
             * Mutator for images sanitation
             *
             * @param string $newImages for images
             * @throws RangeException
             **/
            Public function setImages($newImages) {
                //verify pic is valid
                $newImages = filter_var($newImages, FILTER_SANITIZE_STRING);
                if (empty($newImages) === true) {
                    throw new InvalidArgumentException("Images invalid");
                }
                if(strlen($newImages) > 32) {
                    throw (new RangeException("Images too large"));
                }
                $this->images = $newImages;
            }


            /**accessor method for Name
             *
             * @return string for Name
             * **/
            public function getName() {
                return ($this->name);
            }

            /**
             * Mutator for name sanitation
             *
             * @param string $newName for name
             * @throws RangeException
             **/
            Public function setName($newName) {
                //verify pic is valid
                $newName = filter_var($newName, FILTER_SANITIZE_STRING);
                if (empty($newName) === true) {
                    throw new InvalidArgumentException("Name invalid");
                }
                if(strlen($newName) > 32) {
                    throw (new RangeException("Name too large"));
                }
                $this->name = $newName;
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


            /**accessor method for Person In Charge
             *
             * @return string for Person In Charge
             * **/
            public function getPic() {
                return ($this->pic);
            }

            /**
             * Mutator for Person in Charge sanitation
             *
             * @param string $newPic for person in Charge
             * @throws RangeException
             **/
            Public function setPic($newPic) {
                //verify pic is valid
                $newPic = filter_var($newPic, FILTER_SANITIZE_STRING);
                if (empty($newPic) === true) {
                    throw new InvalidArgumentException("Person In Charge invalid");
                }
                if(strlen($newPic) > 32) {
                    throw (new RangeException("Person In Charge too large"));
                }
                $this->pic = $newPic;
            }


            /**
             * accessor method for Service Time
             *
             * @return string for Service time
             **/
            public function serviceTime()
            {
                return ($this->serviceTime);

            }


            /**
             * Mutator method for Service Time
             *
             * @param string $newServiceTime
             * @throws RangeException
             */
            public function setServiceTime($newServiceTime) {

                $newServiceTime = filter_var($newServiceTime, FILTER_SANITIZE_STRING);

                if ( $newServiceTime === false) {
                    throw (new InvalidArgumentException("New Service Time is invalid"));
                }

                if (strlen($newServiceTime) > 32) {
                    throw (new RangeException ("Service Time content too large"));
                }

                $this->serviceTime = $newServiceTime;
            }


            /**
             * accessor method for State
             *
             * @return string for State
             **/
            public function getState()
            {
                return ($this->state);

            }

            /**
             * Mutator method for State
             *
             * @param string $newState for $newState
             */
            public function setState($newState) {

                $newState = filter_var($newState, FILTER_SANITIZE_STRING);

                if ( $newState === false) {
                    throw (new InvalidArgumentException("New State is invalid"));
                }

                if (strlen($newState) > 2) {
                    throw (new RangeException ("State content too large"));
                }

                $this->state = $newState;
            }


            /**
             * accessor method for Zip Code
             *
             * @return string for Zip code
             **/
            public function zip()
            {
                return ($this->zip);

            }

            /**
             * Mutator method for Zip Code
             *
             * @param string  missions zip code
             */
            public function setZip($newZip) {

                $newZip = filter_var($newZip, FILTER_SANITIZE_STRING);

                if ( $newZip === false) {
                    throw (new InvalidArgumentException("New Zip is invalid"));
                }


                if (strlen($newZip) > 32) {
                    throw (new RangeException ("Zip content too large"));
                }
                $this->zip = $newZip;
            }


                public function JsonSerialize() {
                    $fields = get_object_vars($this);
                    return ($fields);
                }

            /**
             * Inserts missions into mySQL
             *
             * Inserts this missionsId into mySQL in intervals
             * @param PDO $pdo connection to
             **/
            public function insert(PDO &$pdo) {
                // make sure missions doesn't already exist
                if($this->missionsId !== null) {
                    throw (new PDOException("existing missions"));
                }
                //create query template
                $query
                    = "INSERT INTO missions(address1, address2, city, email, images, name, phone, pic, serviceTime, state, zip)
                VALUES (:address1, :address2, :city, :email, :images, :name, :phone, :pic, :serviceTime, :state, :zip)";
                $statement = $pdo->prepare($query);

                // bind the variables to the place holders in the template
                $parameters = array("address1" => $this->address1, "address2" => $this->address2, "city" => $this->city,
                "email" => $this->email, "images" =>$this->images, "name" =>$this->name,
                    "phone" => $this->phone, "pic" => $this->pic,
                    "serviceTime" => $this->serviceTime, "state" => $this->state, "zip" => $this->zip);
                $statement->execute($parameters);

                //update null missionsId with what mySQL just gave us
                $this->missionsId = intval($pdo->lastInsertId());
            }

            /**
             * Deletes missions from mySQL
             *
             * Delete PDO to delete missionsId
             * @param PDO $pdo
             **/
            public function delete(PDO &$pdo) {
                // enforce the missions is not null
                if($this->missionsId === null) {
                    throw(new PDOException("unable to delete a missions that does not exist"));
                }

                //create query template
                $query = "DELETE FROM missions WHERE missionsId = :missionsId";
                $statement = $pdo->prepare($query);

                //bind the member variables to the place holder in the template
                $parameters = array("missionsId" => $this->missionsId);
                $statement->execute($parameters);
            }

            /**
             * updates Missions in mySQL
             *
             * Update PDO to update missions class
             * @param PDO $pdo pointer to PDO connection, by reference
             **/
            public function update(PDO $pdo) {

                //create query template
                $query = "UPDATE missions SET address1 = :address1, address2 = :address2, city = :city, email = :email,
                images = :images, name = :name, phone = :phone, pic = :pic, serviceTime = :serviceTime, state = :state, zip = :zip WHERE  missionsId = :missionsId";
                $statement = $pdo->prepare($query);


                // bind the member variables
                $parameters = array("address1" => $this->address1, "address2" => $this->address2, "city" => $this->city, "email" => $this->email,
                        "missionsId" => $this->missionsId, "images" => $this->images, "name" =>$this->name, "phone" => $this->phone, "pic" => $this->pic,
                        "serviceTime" => $this->serviceTime, "state" => $this->state, "zip" =>$this->zip);
                $statement->execute($parameters);
            }

            /**
             * Get mission by missionsId integer
             *
             * @param PDO $pdo pointer to PDO connection, by reference
             * @param int $missionsId for unique missionId $missionId
             * @return mixed|Missions
             **/
            public static function getMissionsByMissionsId(PDO $pdo, $missionsId) {
                // sanitize the missionsId before searching
                $missionsId = filter_var($missionsId, FILTER_VALIDATE_INT);
                if($missionsId === false) {
                    throw(new PDOException("missions id is not an integer"));
                }
                if($missionsId <= 0) {
                    throw(new PDOException("missions id is not positive"));
                }

                // create query template
                $query = "SELECT missionsId, address1, address2, city, email, images, name, phone, pic, serviceTime, 
                        state, zip FROM missions WHERE missionsId = :missionsId";
                $statement = $pdo->prepare($query);

                // bind the mission id to the place holder in the template
                $parameters = array("missionsId" => $missionsId);
                $statement->execute($parameters);

                // grab the user from mySQL
                try {
                    $mission = null;
                    $statement->setFetchMode(PDO::FETCH_ASSOC);
                    $row = $statement->fetch();
                    if($row !== false) {
                        $mission = new Missions ($row["missionsId"], $row["address1"], $row["address2"], $row["city"], $row["email"],
                            $row["images"], $row["name"], $row["phone"], $row["pic"],  $row["serviceTime"],
                            $row["state"], $row["zip"]);
        
                    }
                } catch(Exception $exception) {
                
                    // if the row couldn't be converted, rethrow it
                    throw(new PDOException($exception->getMessage(), 0, $exception));
                }
                return ($mission);
            }
        
        
            /**
             * get user by email
             *
             * @param PDO $pdo pointer to PDO connection, by reference
             * @param mixed $email info for $missions
             * @return null|Missions
             **/
            public static function getMissionsByEmail(PDO &$pdo, $email) {

                // sanitize the email before searching
                $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                if($email === false) {
                    throw(new PDOException("email is insecure or empty"));
                }
                // create query template
                $query = "SELECT missionsId, address1, address2, city, email, images, name, phone, pic, serviceTime, state, zip
                FROM missions WHERE email = :email";

                $statement = $pdo->prepare($query);

                // bind the missions id to the place holder in the template
                $parameters = array("email" => $email);
                $statement->execute($parameters);

                // grab the missions from mySQL
                try {
                    $mission = null;
                    $statement->setFetchMode(PDO::FETCH_ASSOC);
                    $row = $statement->fetch();
                    if($row !== false) {
                        $mission = new Missions ($row["missionsId"], $row["address1"], $row["address2"], $row["city"], $row["email"],
                            $row["images"], $row["name"], $row["phone"], $row["pic"], $row["serviceTime"], $row["state"], $row["zip"]);
                    }
                } catch(Exception $exception) {
                    // if the row couldn't be converted, rethrow it
                    throw(new PDOException($exception->getMessage(), 0, $exception));
                }
                return ($mission);
            }

            /**
             * Get all Missions
             *
             * @param PDO $pdo pointer to PDO connection, by reference
             * @return mixed|Missions
             **/
            public static function getAllMissions(PDO &$pdo) {

                // create query template
               $query = "SELECT missionsId, address1, address2, city, email, images, name, phone, pic, serviceTime, state, zip
                    FROM missions";
                $statement = $pdo->prepare($query);

                //execute
                $statement->execute();

                //call the function to build an array of the values
                $missions = null;
                $statement->setFetchMode(PDO::FETCH_ASSOC);
                $missions = new SplFixedArray($statement->rowCount());

                while(($row = $statement->fetch()) !== false) {
                    try {
                        if($row !== false) {
                            $mission = new Missions ($row["missionsId"], $row["address1"], $row["address2"], $row["city"], $row["email"],
                                $row["images"], $row["name"], $row["phone"], $row["pic"], $row["serviceTime"], $row["state"], $row["zip"]);
                                $missions[$missions->key()] = $mission;
                                $missions->next();
                        }
                    }   catch(Exception $exception) {
                        throw(new PDOException($exception->getMessage(), 0, $exception));
                    }
                }
                return $missions;


            }


        }