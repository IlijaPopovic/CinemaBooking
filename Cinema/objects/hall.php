<?php

class hall
{
    private $id;
    private $hall_id;
    private $name;
    private $number_seat;
    private $number_rows;
    private $number_vip_rows;
    private $hall_picture;
    private $screen_size;

    private $technology_id;
    private $cinema_id;

    private $technology_name;
    private $technology_price;
    private $technology_discount;

    private $address_id;
    private $address;
    private $phone_number;
    private $city;

    private $cinema_name;
    private $cinema_image;
    private $about_cinema;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function Get_halls_for_cinema()
    {
        $query = "SELECT hall.id, hall.name,hall.screen_size,hall.number_seats, hall.number_rows, hall.number_vip_rows, hall.hall_picture , technology.name as technology
        FROM hall
        INNER JOIN technology ON technology.id = hall.technology_id
        INNER JOIN cinema ON cinema.id = hall.cinema_id
        where cinema.id = $this->cinema_id 
        ORDER BY hall.name";

        $query_solution1 = $this->connection->prepare($query);
        $query_solution1->execute();

        $array = $query_solution1->fetchAll(PDO::FETCH_ASSOC);

        return $array;
    }

    public function Get_cinemas()
    {
        $query = "SELECT cinema.id, cinema.name , cinema.cinema_picture, address.address, address.city, address.phone_number
        FROM cinema
        INNER JOIN address ON address.id = cinema.address_id";

        $query_solution1 = $this->connection->prepare($query);
        $query_solution1->execute();

        $array = $query_solution1->fetchAll(PDO::FETCH_ASSOC);

        return $array;
    }

    public function Get_prices()
    {
        $query = "SELECT technology.id, technology.name, technology.price, technology.discount
        FROM technology";

        $query_solution1 = $this->connection->prepare($query);
        $query_solution1->execute();

        $array = $query_solution1->fetchAll(PDO::FETCH_ASSOC);

        return $array;
    }

    public function Insert_hall()
    {
        try {
            $query = "INSERT INTO hall(id, name, number_seats, number_rows, cinema_id, technology_id, number_vip_rows, hall_picture, screen_size) VALUES (NULL,'$this->name',$this->number_seat,$this->number_rows,$this->cinema_id,$this->technology_id,$this->number_vip_rows,'$this->hall_picture', $this->screen_size)";

            $query_solution1 = $this->connection->prepare($query);
            $query_solution1->execute();
        } catch (PDOException $e) {
            return array('status' => $e->getMessage());
        }

        return array('status' => 'inserted');
    }

    public function Insert_technology()
    {
        try {
            $query = "INSERT INTO technology(id, name, price, discount) VALUES (NULL,'$this->technology_name',$this->technology_price,$this->technology_discount);";

            $query_solution1 = $this->connection->prepare($query);
            $query_solution1->execute();
        } catch (PDOException $e) {
            return array('status' => $e->getMessage());
        }

        return array('status' => 'inserted');
    }

    public function Insert_cinema()
    {
        try {
            $query0 = "INSERT INTO address(id, address, phone_number, city) VALUES (NULL,'$this->address','$this->phone_number','$this->city')";
            $query_solution0 = $this->connection->prepare($query0);
            $query_solution0->execute();
            $this->address_id = $this->connection->lastInsertId();

            $query = "INSERT INTO cinema(id, name, address_id, cinema_picture, about_cinema) VALUES (NULL,'$this->cinema_name',$this->address_id,'$this->cinema_image','$this->about_cinema')";

            $query_solution1 = $this->connection->prepare($query);
            $query_solution1->execute();
        } catch (PDOException $e) {
            return array('status' => $e->getMessage());
        }

        return array('status' => 'inserted');
    }

    public function Get_all_cinemas_and_technologies()
    {
        $query1 = "SELECT cinema.id,cinema.name as cinema FROM cinema";
        $query_solution1 = $this->connection->prepare($query1);
        $query_solution1->execute();
        $array1 = $query_solution1->fetchAll(PDO::FETCH_ASSOC);

        $query2 = "SELECT technology.id,technology.name as technology FROM `technology`";
        $resenjequerya2 = $this->connection->prepare($query2);
        $resenjequerya2->execute();
        $array2 = $resenjequerya2->fetchAll(PDO::FETCH_ASSOC);

        $array3 = array();
        $array3[] = $array1;
        $array3[] = $array2;
        return $array3;
    }

    public function Get_cinema()
    {
        $query = "SELECT cinema.id,cinema.name,cinema.cinema_picture,cinema.about_cinema,address.city,address.address,address.phone_number FROM cinema,address
            WHERE cinema.address_id = address.id AND cinema.id = $this->cinema_id";

        $query_solution1 = $this->connection->prepare($query);
        $query_solution1->execute();

        $array = $query_solution1->fetchAll(PDO::FETCH_ASSOC);

        return $array;
    }

    private function Is_there_projection_in_hall()
    {
        $query = "SELECT projection.id FROM projection,hall WHERE projection.hall_id = hall.id AND hall.id = $this->hall_id AND projection.projection_date > NOW()";

        $query_solution1 = $this->connection->prepare($query);
        $query_solution1->execute();

        $array = $query_solution1->fetchAll(PDO::FETCH_ASSOC);

        if (empty($array)) {
            return true;
        } else {
            return false;
        }
    }

    public function Delete_hall()
    {
        if ($this->Is_there_projection_in_hall()) {
            try {
                $query = "DELETE FROM hall WHERE hall.id = $this->hall_id";

                $query_solution1 = $this->connection->prepare($query);
                $query_solution1->execute();
            } catch (PDOException $e) {
                return array('status' => $e->getMessage());
            }

            return array('status' => 'deleted');
        } else {
            return array('status' => 'in_use');
        }
    }

    public function Delete_technology()
    {
        if ($this->Is_technology_in_use()) {
            try {
                $query = "DELETE FROM technology WHERE technology.id = $this->technology_id";

                $query_solution1 = $this->connection->prepare($query);
                $query_solution1->execute();
            } catch (PDOException $e) {
                return array('status' => $e->getMessage());
            }

            return array('status' => 'deleted');
        } else {
            return array('status' => 'in_use');
        }
    }

    private function Is_technology_in_use()
    {
        $query = "SELECT hall.id FROM hall,technology WHERE hall.technology_id = technology.id AND technology.id = $this->technology_id";

        $query_solution1 = $this->connection->prepare($query);
        $query_solution1->execute();

        $array = $query_solution1->fetchAll(PDO::FETCH_ASSOC);

        if (empty($array)) {
            return true;
        } else {
            return false;
        }
    }

    public function Change_cinema()
    {
        try {
            $query0 = "UPDATE address,cinema SET address='$this->address', phone_number='$this->phone_number', city='$this->city' WHERE cinema.address_id = address.id AND cinema.id = $this->cinema_id";
            $query_solution0 = $this->connection->prepare($query0);
            $query_solution0->execute();

            $query = "UPDATE cinema SET name='$this->cinema_name',cinema_picture='$this->cinema_image',about_cinema='$this->about_cinema' WHERE cinema.id = $this->cinema_id";

            $query_solution1 = $this->connection->prepare($query);
            $query_solution1->execute();
        } catch (PDOException $e) {
            return array('status' => $e->getMessage());
        }

        return array('status' => 'changed');
    }

    public function Get_hall()
    {
        $query = "SELECT  name, number_seats, number_rows, number_vip_rows, hall_picture, screen_size, technology_id, cinema_id FROM hall WHERE hall.id = $this->hall_id";

        $query_solution1 = $this->connection->prepare($query);
        $query_solution1->execute();

        $array = $query_solution1->fetchAll(PDO::FETCH_ASSOC);

        return $array;
    }

    public function Change_hall() // OVDE BI TREBALA BITI GRESKA
    {
        try {
            $query = "UPDATE hall SET name='$this->name', number_seats=$this->number_seat, number_rows=$this->number_rows, cinema_id=$this->cinema_id, technology_id=$this->technology_id, number_vip_rows=$this->number_vip_rows, hall_picture='$this->hall_picture', screen_size=$this->screen_size WHERE hall.id = $this->hall_id";

            $query_solution1 = $this->connection->prepare($query);
            $query_solution1->execute();
        } catch (PDOException $e) {
            return array('status' => $e->getMessage());
        }

        return array('status' => 'changed');
    }

    private function Is_there_hall_in_cinema()
    {
        $query = "SELECT hall.id FROM cinema,hall WHERE cinema.id = hall.cinema_id AND cinema_id = $this->cinema_id";

        $query_solution1 = $this->connection->prepare($query);
        $query_solution1->execute();

        $array = $query_solution1->fetchAll(PDO::FETCH_ASSOC);

        if (empty($array)) {
            return true;
        } else {
            return false;
        }
    }

    public function Delete_cinema()
    {
        if ($this->Is_there_hall_in_cinema()) {
            try {
                $query = "DELETE FROM cinema WHERE cinema.id = $this->cinema_id";

                $query_solution1 = $this->connection->prepare($query);
                $query_solution1->execute();
            } catch (PDOException $e) {
                return array('status' => $e->getMessage());
            }
            return array('status' => 'deleted');
        } else {
            return array('status' => 'in_use');
        }
    }
}
