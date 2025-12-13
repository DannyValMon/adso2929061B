// ===============================
//  TYPES & INTERFACES
// ===============================
interface Attack {
    name: string;
    power: number;
    accuracy: number; // 0–100
}

class Pokemon {
    name: string;
    maxHp: number;
    hp: number;
    attacks: Attack[];

    constructor(name: string, hp: number, attacks: Attack[]) {
        this.name = name;
        this.maxHp = hp;
        this.hp = hp;
        this.attacks = attacks;
    }

    isAlive(): boolean {
        return this.hp > 0;
    }

    useAttack(target: Pokemon, attack: Attack): string {
        const hitChance = Math.random() * 100;
        if (hitChance > attack.accuracy) {
            return `${this.name} intentó usar ${attack.name}, pero falló.`;
        }

        target.hp = Math.max(0, target.hp - attack.power);

        return `${this.name} usó ${attack.name} y causó ${attack.power} de daño.`;
    }
}

// ===============================
//  COMBATE
// ===============================
class Battle {
    player: Pokemon;
    enemy: Pokemon;
    logEl: HTMLElement;
    btn: HTMLButtonElement;
    playerHpBar: HTMLDivElement;
    enemyHpBar: HTMLDivElement;

    constructor(player: Pokemon, enemy: Pokemon) {
        this.player = player;
        this.enemy = enemy;

        this.logEl = document.getElementById("log")!;
        this.btn = document.getElementById("fightBtn") as HTMLButtonElement;

        this.playerHpBar = document.getElementById("player-hp-bar") as HTMLDivElement;
        this.enemyHpBar = document.getElementById("enemy-hp-bar") as HTMLDivElement;

        this.btn.addEventListener("click", () => this.turn());
        this.updateBars();
    }

    log(msg: string) {
        this.logEl.innerHTML += `<p>${msg}</p>`;
        this.logEl.scrollTop = this.logEl.scrollHeight;
    }

    updateBars() {
        const playerPct = (this.player.hp / this.player.maxHp) * 100;
        const enemyPct = (this.enemy.hp / this.enemy.maxHp) * 100;

        this.playerHpBar.style.width = `${playerPct}%`;
        this.enemyHpBar.style.width = `${enemyPct}%`;
    }

    turn() {
        if (!this.player.isAlive() || !this.enemy.isAlive()) {
            return;
        }

        // PLAYER TURN
        const playerAttack = this.randomAttack(this.player);
        this.log(this.player.useAttack(this.enemy, playerAttack));

        this.updateBars();

        if (!this.enemy.isAlive()) {
            this.log(`<b>${this.enemy.name} ha sido derrotado.</b>`);
            this.btn.disabled = true;
            return;
        }

        // ENEMY TURN
        const enemyAttack = this.randomAttack(this.enemy);
        this.log(this.enemy.useAttack(this.player, enemyAttack));

        this.updateBars();

        if (!this.player.isAlive()) {
            this.log(`<b>${this.player.name} ha sido derrotado.</b>`);
            this.btn.disabled = true;
        }
    }

    randomAttack(pokemon: Pokemon): Attack {
        return pokemon.attacks[Math.floor(Math.random() * pokemon.attacks.length)];
    }
}

// ===============================
//  INSTANCIAS
// ===============================
const pikachu = new Pokemon("Pikachu", 120, [
    { name: "Impactrueno", power: 18, accuracy: 95 },
    { name: "Rayo", power: 35, accuracy: 85 },
    { name: "Voltio Cruel", power: 40, accuracy: 75 },
    { name: "Ataque Rápido", power: 20, accuracy: 100 }
]);

const bulbasaur = new Pokemon("Bulbasaur", 150, [
    { name: "Latigo Cepa", power: 22, accuracy: 95 },
    { name: "Hoja Afilada", power: 30, accuracy: 85 },
    { name: "Bomba Germen", power: 40, accuracy: 75 },
    { name: "Placaje", power: 18, accuracy: 100 }
]);

new Battle(pikachu, bulbasaur);