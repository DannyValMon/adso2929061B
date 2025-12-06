<?php 
require_once __DIR__ . "/database.php";   //  ← ESTA LÍNEA ES LA QUE TE FALTA

class Model extends DataBase {
    protected $db;

    public function __construct(){
        $this->db = DataBase::connect();
    }

    // LISTAR TODOS LOS POKEMONS
    public function listPokemons(){
        $stmt = $this->db->query("SELECT * FROM pokemons");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // OBTENER UN SOLO POKEMON POR ID
    public function getPokemon($id){
        $sql = "SELECT * FROM pokemons WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ADICIONAR UN NUEVO POKEMON
    public function addPokemon($name, $type){
        $sql = "INSERT INTO pokemons (name, type, strength, stamina, speed, accuracy, trainer_id)
                VALUES (?, ?, 0, 0, 0, 0, 1)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$name, $type]);
    }

    // EDITAR/ACTUALIZAR POKEMON
    public function updatePokemon($id, $name, $type){
        $sql = "UPDATE pokemons SET name = ?, type = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$name, $type, $id]);
    }

    // ELIMINAR POKEMON
    public function deletePokemon($id){
        $sql = "DELETE FROM pokemons WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}
