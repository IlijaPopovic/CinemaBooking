<?php

class movie
{
    private $connection;

    private $id;
    private $poster;
    private $name;
    private $description;
    private $length;
    private $beginning;
    private $language;
    private $trailer_youtube;
    private $genre;
    private $actors;

    private $comment_id;
    private $comment;
    private $grade;
    private $client;

    private $projection_id;
    private $movie_id;
    private $projection_date;
    private $hall_id;

    private $reservation_date;
    private $place_array;

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

    public function Get_movie_by_id()
    {
        $query = "SELECT movie.id, movie.name,ROUND(AVG(comment.grade), 1) as average_grade,movie.language, movie.length, movie.description , movie.trailer_youtube, movie.poster , movie.beginning,movie.genre
 , movie.actors from movie LEFT JOIN comment ON movie.id = comment.movie_id where movie.id = $this->id;";

        $query_solution1 = $this->connection->prepare($query);
        $query_solution1->execute();

        $array = $query_solution1->fetchAll(PDO::FETCH_ASSOC);

        return $array;
    }

    public function Get_movies_for_repertoire()
    {
        $query = "SELECT movie.id, movie.name,movie.language,movie.length, movie.description, movie.trailer_youtube , movie.poster , movie.genre
 , movie.actors, movie.beginning
        FROM movie 
        JOIN projection ON movie.id = projection.movie_id
        WHERE projection.projection_date > NOW()
        AND movie.beginning < CURRENT_DATE()
        GROUP BY movie.id";

        $query_solution1 = $this->connection->prepare($query);
        $query_solution1->execute();

        $array = $query_solution1->fetchAll(PDO::FETCH_ASSOC);

        return $array;
    }

    public function Get_movies_for_coming_soon()
    {
        $query = "SELECT movie.id,movie.name,movie.language,movie.length, movie.description, movie.trailer_youtube , movie.poster , movie.genre
 , movie.actors , movie.beginning
        FROM movie 
        WHERE movie.beginning > CURRENT_DATE()";

        $query_solution1 = $this->connection->prepare($query);
        $query_solution1->execute();

        $array = $query_solution1->fetchAll(PDO::FETCH_ASSOC);

        return $array;
    }

    public function Get_repertoire_for_movie()
    {
        $query = "SELECT projection.id as projection_id, projection.projection_date, hall.name, technology.name as tehnology_name, cinema.name
        FROM projection
        INNER JOIN hall ON projection.hall_id = hall.id
        INNER JOIN technology ON hall.technology_id = technology.id
        INNER JOIN cinema ON cinema.id = hall.cinema_id
        INNER JOIN movie ON projection.movie_id = movie.id
        WHERE projection.projection_date > CURRENT_DATE() 
        AND movie.id = $this->id
        ORDER BY projection.projection_date";

        $query_solution1 = $this->connection->prepare($query);
        $query_solution1->execute();

        $array = $query_solution1->fetchAll(PDO::FETCH_ASSOC);

        return $array;
    }

    public function Get_comments_for_movie()
    {
        $query = "SELECT comment.id, comment.content, comment.grade, client.name, client.surname
        FROM comment
        INNER JOIN client ON client.id = comment.client_id
        INNER JOIN movie ON movie.id = comment.movie_id
        where movie.id = $this->id";

        $query_solution1 = $this->connection->prepare($query);
        $query_solution1->execute();

        $array = $query_solution1->fetchAll(PDO::FETCH_ASSOC);

        return $array;
    }

    public function Delete_users_comments()
    {
        try {
            $query = "DELETE FROM comment WHERE client_id = $this->client AND movie_id=$this->id";

            $query_solution1 = $this->connection->prepare($query);

            $query_solution1->execute();

            return array('status' => 'deleted');
        } catch (PDOException $e) {
            return array('status' => $e);
        }
    }

    public function Comment()
    {
        try {
            if (!$this->did_user_comment()) {
                $query = "INSERT INTO comment (content, grade, movie_id, client_id) VALUES('$this->comment',$this->grade,$this->id,$this->client)";
                $query_solution1 = $this->connection->prepare($query);

                $query_solution1->execute();
                return array('status' => 'inserted');
            } else {
                return array('status' => 'there_is_a_comment');
            }
        } catch (PDOException $e) {
            return array('status' => $e->getMessage());
        }
    }

    private function did_user_comment()
    {
        $query = "SELECT client_id FROM comment WHERE client_id=$this->client AND movie_id=$this->id";
        $query_solution1 = $this->connection->prepare($query);

        $query_solution1->execute();

        if (count($query_solution1->fetchAll(PDO::FETCH_ASSOC)) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function Insert_movie()
    {
        try {
            $query = "INSERT INTO `movie` (`id`, `name`, `language`, `length`, `description`, `trailer_youtube`, `poster`, `beginning`, `genre`, `actors`) VALUES (NULL, '$this->name', '$this->language', '$this->length', '$this->description', '$this->trailer_youtube', '$this->poster', '$this->beginning', '$this->genre
            ', '$this->actors');";

            $query_solution1 = $this->connection->prepare($query);
            $query_solution1->execute();
        } catch (PDOException $e) {
            return array('status' => $e->getMessage());
        }

        return array('status' => 'inserted');
    }

    public function Insert_projection()
    {
        try {
            $query = "INSERT INTO projection(id, movie_id, projection_date, hall_id) VALUES (NULL,$this->movie_id,'$this->projection_date',$this->hall_id)";

            $query_solution1 = $this->connection->prepare($query);
            $query_solution1->execute();
        } catch (PDOException $e) {
            return array('status' => $e->getMessage());
        }

        return array('status' => 'inserted');
    }

    public function Get_all_halls_and_movies()
    {
        $query1 = "SELECT movie.id,movie.name FROM movie";
        $query_solution1 = $this->connection->prepare($query1);
        $query_solution1->execute();
        $array1 = $query_solution1->fetchAll(PDO::FETCH_ASSOC);

        $query2 = "SELECT hall.id,hall.name,cinema.name as cinema FROM hall,cinema
            WHERE hall.cinema_id = cinema.id ORDER BY cinema.name";
        $resenjequerya2 = $this->connection->prepare($query2);
        $resenjequerya2->execute();
        $array2 = $resenjequerya2->fetchAll(PDO::FETCH_ASSOC);

        $array3 = array();
        $array3[] = $array1;
        $array3[] = $array2;
        return $array3;
    }

    public function Delete_comment()
    {
        try {
            $query = "DELETE FROM comment WHERE comment.id = $this->comment_id";

            $query_solution1 = $this->connection->prepare($query);
            $query_solution1->execute();
        } catch (PDOException $e) {
            return array('status' => $e->getMessage());
        }

        return array('status' => 'deleted');
    }

    public function Delete_projection()
    {
        try {
            $query = "DELETE FROM projection WHERE projection.id = $this->projection_id";

            $query_solution1 = $this->connection->prepare($query);
            $query_solution1->execute();
        } catch (PDOException $e) {
            return array('status' => $e->getMessage());
        }

        return array('status' => 'deleted');
    }

    public function Change_movie()
    {
        try {
            $query = "UPDATE movie SET name = '$this->name', language = '$this->language', length = '$this->length', description = '$this->description', trailer_youtube = '$this->trailer_youtube', poster = '$this->poster', beginning = '$this->beginning', genre
     = '$this->genre
    ', actors = '$this->actors' WHERE movie.id = $this->movie_id";

            $query_solution1 = $this->connection->prepare($query);
            $query_solution1->execute();
        } catch (PDOException $e) {
            return array('status' => $e->getMessage());
        }

        return array('status' => 'changed');
    }

    public function Get_information_about_reservation()
    {
        $query = "SELECT projection.projection_date,movie.name as movie, hall.name,hall.number_seats, hall.number_rows, hall.number_vip_rows , cinema.name as cinema , technology.price ,technology.name as technology
        FROM projection
        INNER JOIN movie ON projection.movie_id = movie.id
        INNER JOIN hall ON projection.hall_id = hall.id
        INNER JOIN cinema ON hall.cinema_id = cinema.id
        INNER JOIN technology ON hall.technology_id = technology.id
        WHERE projection.id = $this->projection_id";

        $query_solution1 = $this->connection->prepare($query);
        $query_solution1->execute();

        $array = $query_solution1->fetchAll(PDO::FETCH_ASSOC);

        return $array;
    }

    public function Get_reserved_places_projection()
    {
        $query = "SELECT reserved_place.number_seat, reserved_place.row_seat
            FROM reservation
            INNER JOIN projection ON reservation.projection_id = projection.id
            INNER JOIN reserved_place ON reserved_place.reservation_id = reservation.id
            AND projection.id = $this->projection_id";

        $query_solution1 = $this->connection->prepare($query);
        $query_solution1->execute();

        $array = $query_solution1->fetchAll(PDO::FETCH_ASSOC);

        return $array;
    }

    public function Insert_reservation()
    {
        try {
            $query = "INSERT INTO reservation(projection_id, client_id, reservation_date) VALUES ($this->projection_id,$this->client_id,'$this->reservation_date')";

            $query_solution1 = $this->connection->prepare($query);
            $query_solution1->execute();
            $reservation_id = $this->connection->lastInsertId();

            $seats = "";

            foreach ($this->place_array as $value) {
                $cut = explode("/", $value);
                $row = $cut[0];
                $seat = $cut[1];

                $seats .= "(NULL, '$seat', '$row', $reservation_id),";
            }
            $seats = substr($seats, 0, -1);
            $query0 = "INSERT INTO reserved_place (id, number_seat, row_seat, reservation_id) VALUES $seats";

            $resenjequerya0 = $this->connection->prepare($query0);
            $resenjequerya0->execute();
        } catch (PDOException $e) {
            return array('status' => $e->getMessage());
        }

        return array('status' => 'reserved');
    }

    public function Delete_movie()
    {
        try {
            $query = "DELETE FROM movie WHERE movie.id = $this->movie_id; 
                        DELETE FROM comment WHERE comment.movie_id = $this->movie_id;";
            $query_solution1 = $this->connection->prepare($query);
            $query_solution1->execute();
        } catch (PDOException $e) {
            return array('status' => $e->getMessage());
        }
        return array('status' => 'deleted');
    }
}
