<?php

class client
{
    private $connection;

    private $id;
    private $user_name;
    private $password;
    private $name;
    private $surname;
    private $date_of_birth;
    private $mail;
    private $phone_number;
    private $address_id;

    private $address;
    //private $phone_number;
    private $city;

    private $reserved_place_id;

    public function __construct($db)
    {
        $this->connection = $db;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function Create_profile()
    {

        if ($this->Is_there_user_name()) {
            return array('status' => 'user name exists');
        }
        // $this->user_name = htmlspecialchars(strip_tags($this->user_name));
        // $this->password = htmlspecialchars(strip_tags($this->password));
        try {
            $query0 = "INSERT INTO address(id, address, phone_number, city) VALUES (NULL,'$this->address','$this->phone_number','$this->city')";
            $query_solution0 = $this->connection->prepare($query0);
            $query_solution0->execute();
            $this->address_id = $this->connection->lastInsertId();

            $query = "INSERT INTO client(id, name, surname, date_of_birth, mail,  phone_number, address_id, user_name, password) VALUES (NULL,'$this->name','$this->surname','$this->date_of_birth','$this->mail','$this->phone_number',$this->address_id,'$this->user_name','$this->password')";

            $query_solution1 = $this->connection->prepare($query);
            $query_solution1->execute();
        } catch (PDOException $e) {
            return array('status' => $e->getMessage());
        }

        return array('status' => 'created');
    }

    public function Log_in()
    {

        $query = "SELECT id FROM `admin` WHERE user_name = '$this->user_name' AND password = '$this->password';";
        $query_solution1 = $this->connection->prepare($query);
        $query_solution1->execute();

        $array = $query_solution1->fetchAll(PDO::FETCH_ASSOC);

        if (count($array) > 0) {
            session_start();
            $_SESSION['admin'] = $array[0]['id'];
            return array(
                'user' => 'admin',
                'id' => $array[0]['id']
            );
        } else {
            $query = "SELECT id,password FROM client WHERE user_name = '$this->user_name'";
            $query_solution1 = $this->connection->prepare($query);
            $query_solution1->execute();

            $array = $query_solution1->fetchAll(PDO::FETCH_ASSOC);
            if (count($array) > 0) {
                $hash = $array[0]['password'];
                //provera sifre sa hashom..
                if (password_verify($this->password, $hash)) {
                    session_start();
                    $query = "INSERT INTO log values(null,(SELECT id FROM client WHERE user_name = '$this->user_name'),CURRENT_TIMESTAMP)";
                    $query_solution1 = $this->connection->prepare($query);
                    $query_solution1->execute();
                    $_SESSION['user'] = $array[0]['id'];
                    return array(
                        'user' => 'user',
                        'id' => $array[0]['id']
                    );
                } else {
                    return array(
                        'user' => 'no',
                        'id' => 'no'
                    );
                }
            } else {
                return array(
                    'user' => 'no',
                    'id' => 'no'
                );
            }
        }
    }

    private function Is_there_user_name()
    {
        $query = " SELECT * FROM client WHERE user_name = '$this->user_name' ";
        $query_solution1 = $this->connection->prepare($query);
        $query_solution1->execute();
        if ($query_solution1->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function Get_client_information()
    {
        $query = "SELECT client.name, client.surname, client.date_of_birth, client.mail, client.phone_number, client.user_name, client.points , address.address, address.city
        FROM client
        INNER JOIN address ON address.id = client.address_id 
        WHERE client.id = $this->id";

        $query_solution1 = $this->connection->prepare($query);
        $query_solution1->execute();

        $array = $query_solution1->fetchAll(PDO::FETCH_ASSOC);

        return $array;
    }

    public function Get_client_reservations()
    {
        $query = "SELECT reserved_place.id, movie.name as movie_name,movie.id as movie_id, reserved_place.row_seat, reserved_place.number_seat , projection.projection_date, hall.name , cinema.name as cinema
        FROM reserved_place
        INNER JOIN reservation ON reservation.id = reserved_place.reservation_id
        INNER JOIN client ON client.id = reservation.client_id
        INNER JOIN projection ON projection.id = reservation.projection_id
        INNER JOIN movie ON movie.id = projection.movie_id
        INNER JOIN hall ON hall.id = projection.hall_id
        INNER JOIN cinema ON cinema.id = hall.cinema_id
        WHERE client.id = $this->id AND projection.projection_date > NOW()";

        $query_solution1 = $this->connection->prepare($query);
        $query_solution1->execute();

        $array = $query_solution1->fetchAll(PDO::FETCH_ASSOC);

        return $array;
    }

    public function Delete_client_reservation()
    {
        try {
            $query = "DELETE FROM reserved_place WHERE id=$this->reserved_place_id";
            $query_solution1 = $this->connection->prepare($query);
            $query_solution1->execute();

            return array('status' => 'deleted');
        } catch (PDOException $e) {
            return array('status' => $e);
        }
    }

    public function Change_user()
    {
        try {
            $query = "UPDATE client,address SET client.name='$this->name',client.surname='$this->surname',client.date_of_birth='$this->date_of_birth',client.mail='$this->mail',client.phone_number='$this->phone_number',client.user_name='$this->user_name',client.password='$this->password', address.address='$this->address', address.city = '$this->city' WHERE client.address_id = address.id AND client.id = $this->id";

            $query_solution1 = $this->connection->prepare($query);
            $query_solution1->execute();
        } catch (PDOException $e) {
            return array('status' => $e->getMessage());
        }

        return array('status' => 'changed');
    }
}
