"use strict";
var Pokemon = /** @class */ (function () {
    function Pokemon(name, hp, attacks) {
        this.name = name;
        this.maxHp = hp;
        this.hp = hp;
        this.attacks = attacks;
    }
    Pokemon.prototype.isAlive = function () {
        return this.hp > 0;
    };
    Pokemon.prototype.useAttack = function (target, attack) {
        var hitChance = Math.random() * 100;
        if (hitChance > attack.accuracy) {
            return this.name + " intent\u00F3 usar " + attack.name + ", pero fall\u00F3.";
        }
        target.hp = Math.max(0, target.hp - attack.power);
        return this.name + " us\u00F3 " + attack.name + " y caus\u00F3 " + attack.power + " de da\u00F1o.";
    };
    return Pokemon;
}());
var Battle = /** @class */ (function () {
    function Battle(player, enemy) {
        var _this = this;
        this.player = player;
        this.enemy = enemy;
        this.logEl = document.getElementById("log");
        this.btn = document.getElementById("fightBtn");
        this.playerHpBar = document.getElementById("player-hp-bar");
        this.enemyHpBar = document.getElementById("enemy-hp-bar");
        this.btn.addEventListener("click", function () { return _this.turn(); });
        this.updateBars();
    }
    Battle.prototype.log = function (msg) {
        this.logEl.innerHTML += "<p>" + msg + "</p>";
        this.logEl.scrollTop = this.logEl.scrollHeight;
    };
    Battle.prototype.updateBars = function () {
        var playerPct = (this.player.hp / this.player.maxHp) * 100;
        var enemyPct = (this.enemy.hp / this.enemy.maxHp) * 100;
        this.playerHpBar.style.width = playerPct + "%";
        this.enemyHpBar.style.width = enemyPct + "%";
    };
    Battle.prototype.turn = function () {
        if (!this.player.isAlive() || !this.enemy.isAlive()) {
            return;
        }
        var playerAttack = this.randomAttack(this.player);
        this.log(this.player.useAttack(this.enemy, playerAttack));
        this.updateBars();
        if (!this.enemy.isAlive()) {
            this.log("<b>" + this.enemy.name + " ha sido derrotado.</b>");
            this.btn.disabled = true;
            return;
        }
        var enemyAttack = this.randomAttack(this.enemy);
        this.log(this.enemy.useAttack(this.player, enemyAttack));
        this.updateBars();
        if (!this.player.isAlive()) {
            this.log("<b>" + this.player.name + " ha sido derrotado.</b>");
            this.btn.disabled = true;
        }
    };
    Battle.prototype.randomAttack = function (pokemon) {
        return pokemon.attacks[Math.floor(Math.random() * pokemon.attacks.length)];
    };
    return Battle;
}());
var pikachu = new Pokemon("Pikachu", 120, [
    { name: "Impactrueno", power: 18, accuracy: 95 },
    { name: "Rayo", power: 35, accuracy: 85 },
    { name: "Voltio Cruel", power: 40, accuracy: 75 },
    { name: "Ataque Rápido", power: 20, accuracy: 100 }
]);
var bulbasaur = new Pokemon("Bulbasaur", 150, [
    { name: "Latigo Cepa", power: 22, accuracy: 95 },
    { name: "Hoja Afilada", power: 30, accuracy: 85 },
    { name: "Bomba Germen", power: 40, accuracy: 75 },
    { name: "Placaje", power: 18, accuracy: 100 }
]);
new Battle(pikachu, bulbasaur);