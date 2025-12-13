<?php

class Model
{
    public $db;

    public function __construct()
    {
        try {
            $this->db = new PDO(
                "mysql:host=localhost;dbname=pokeadso;charset=utf8",
                "root",
                ""
            );
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error DB: " . $e->getMessage());
        }
    }

    // =======================
    // POKEMONS
    // =======================

    public function listPokemons()
    {
        $sql = "SELECT * FROM pokemons";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addPokemon($name, $type, $strength, $stamina, $speed, $accuracy, $trainer_id)
    {
        $sql = "INSERT INTO pokemons 
                (name, type, strength, stamina, speed, accuracy, trainer_id)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            $name,
            $type,
            $strength,
            $stamina,
            $speed,
            $accuracy,
            $trainer_id
        ]);
    }

    public function getPokemon($id)
    {
        $sql = "SELECT * FROM pokemons WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updatePokemon(
        $id,
        $name,
        $type,
        $strength,
        $stamina,
        $speed,
        $accuracy,
        $trainer_id
    ) {
        $sql = "UPDATE pokemons 
                SET name = ?, type = ?, strength = ?, stamina = ?, speed = ?, accuracy = ?, trainer_id = ?
                WHERE id = ?";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $name,
            $type,
            $strength,
            $stamina,
            $speed,
            $accuracy,
            $trainer_id,
            $id
        ]);
    }

    public function deletePokemon($id)
    {
        $sql = "DELETE FROM pokemons WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }

    // =======================
    // TRAINERS
    // =======================

    public function listTrainers()
    {
        $sql = "SELECT * FROM trainers";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPokemonWithTrainer($id)
    {
        $sql = "SELECT pokemons.*, trainers.name AS trainer_name
                FROM pokemons
                LEFT JOIN trainers ON pokemons.trainer_id = trainers.id
                WHERE pokemons.id = ?";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
