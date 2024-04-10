const canvas = document.querySelector('canvas');
const c = canvas.getContext('2d');
let playerisJumping = false
let enemyisJumping = false
let isSpacePressed = false
let isArrowDownPressed = false

function refreshPage() {
    location.reload();
}



let msPrev = window.performance.now()
const fps = 60
const msPerFrame = 1000 / fps
const audioArray = ['./sfx/ShigeruHurt1.wav', './sfx/ShigeruHurt2.wav'];

const audioArray1 = ['./sfx/YoshitoHurt1.wav', './sfx/YoshitoHurt2.wav'];

function playRandomAudio() {
  const audioIndex = Math.floor(Math.random() * audioArray.length);
  const enemyHit = new Audio(audioArray[audioIndex]);
  enemyHit.play();
}  

function playRandomAudio1() {
    const audioIndex = Math.floor(Math.random() * audioArray1.length);
    const playerHit = new Audio(audioArray1[audioIndex]);
    playerHit.play();
}  



// var ShigeruDeath = new Audio('./sfx/Shigeru1.wav');

// function enemyDeath() {
//     ShigeruDeath.play();
//     ShigeruDeath.currentTime = 0;
//     ShigeruDeath.pause();

// }





canvas.width = 1024
canvas.height = 576

c.fillRect(0, 0, canvas.width, canvas.height) 

const gravity = 0.85


const backgrounds = [
    './sprites/Background.png',
    './sprites/Background1.png',
    './sprites/Background2.png',
    './sprites/Background3.png',
    './sprites/Background4.png'
];  

const randomBackground = backgrounds[Math.floor(Math.random() * backgrounds.length)];

const background = new Sprite({
    position: {
        x: 0,
        y: 0
    },
    imageSrc: randomBackground
});


const title1 = new Sprite({
    position: {
        x: 0,
        y: 5
    },
    imageSrc: './sprites/titles/YoshitoEN.png',
    scale: 0.2
})  

const title2 = new Sprite({
    position: {
        x: 690,
        y: 5
    },
    imageSrc: './sprites/titles/ShigeruEN.png',
    scale: 0.2
})   


const GoldenFrame = new Sprite({
    position: {
        x: 0,
        y: 0
    },
    imageSrc: './sprites/titles/Frame.png',
    scale: 1
})  







const player = new Fighter({

    position: {
        x: 150,
        y: 400

    },
    velocity: {
        x: 0,
        y: 0

    },
    offset: {
        x: 0,
        y: 0,
    }, 
    imageSrc: './sprites/fighter1/Idle.png',
    framesMax: 10,
    scale: 1.25,
    offset: {
        x:200,
        y:180
    }, 
    sprites: {
        idle: {
            imageSrc: './sprites/fighter1/Idle.png',
            framesMax: 10,
        }, 
        run: {
            imageSrc: './sprites/fighter1/Walking.png',
            framesMax: 10,

        },
        backward: {
            imageSrc: './sprites/fighter1/Walking1.png',
            framesMax: 10,
        },
        jump: {
            imageSrc: './sprites/fighter1/Idle.png',
            framesMax: 10,
        }, 
        attack: {
            imageSrc: './sprites/fighter1/Kick1.png',
            framesMax: 10, 
        },
        takeHit: {
            imageSrc: './sprites/fighter1/Hurt.png',
            framesMax: 10, 
        },
        death: {
            imageSrc: './sprites/fighter1/Death.png',
            framesMax: 10, 
        },
    },
    attackBox: {
        offset: {
            x: 80,
            y: -20
        },
        width: 105,
        height: 50
    } 
})  

player.draw() 

const enemy = new Fighter({
    position: {
        x: 790,
        y: 400

    },
    velocity: {
        x: 0,
        y: 0

    }, 
    offset: {
        x: -50,
        y: 0,
    },
    imageSrc: './sprites/fighter2/Idle.png',
    framesMax: 10,
    scale: 1.25 ,
    offset: {
        x:215,
        y:180
    }, 
    sprites: {
        idle: {
            imageSrc: './sprites/fighter2/Idle.png',
            framesMax: 10,
        }, 
        run: {
            imageSrc: './sprites/fighter2/Walking.png',
            framesMax: 10,

        },
        backward: {
            imageSrc: './sprites/fighter2/Walking1.png',
            framesMax: 10,
        },
        jump: {
            imageSrc: './sprites/fighter2/Idle.png',
            framesMax: 10,
        }, 
        attack: {
            imageSrc: './sprites/fighter2/Kick1.png',
            framesMax: 10,
        }, 
        takeHit: {
            imageSrc: './sprites/fighter2/Hurt.png',
            framesMax: 10, 
        },
        death: {
            imageSrc: './sprites/fighter2/Death.png',
            framesMax: 10, 
        },
    },
    attackBox: {
        offset: {
            x: -100,
            y: -20
        },
        width: 105,
        height: 50
    }
})  

enemy.draw()

console.log(player) 

const keys = {
    a: {
        pressed: false
    }, 
    d: {
        pressed: false
    }, 
    ArrowRight: {
        pressed: false
    }, 
    ArrowLeft: {
        pressed: false
    }
}  


decreaseTimer()

let frames = 0
function animate() {
    window.requestAnimationFrame(animate)
    const msNow = window.performance.now()
    const msPassed = msNow - msPrev
  
    if (msPassed < msPerFrame) return
  
    msPrev = msNow

    c.fillStyle = 'black'
    c.fillRect(0, 0, canvas.width, canvas.height)
    background.update()
    player.update()
    enemy.update()
    GoldenFrame.update()
    title1.update()
    title2.update()
    console.log('go') 

    player.velocity.x = 0
    enemy.velocity.x = 0 

    if (keys.a.pressed && player.lastKey === 'a') {
        player.velocity.x = -4
        player.switchSprite('backward')
    } else if (keys.d.pressed && player.lastKey === 'd') {
        player.velocity.x = 4
        player.switchSprite('run')
    } else {
        player.switchSprite('idle')
    }
    
    if (player.velocity.y < 0) {
        player.switchSprite('jump')
    }   else if (player.velocity.y > 0) {
        player.switchSprite('jump')
    } 


    
    if (keys.ArrowLeft.pressed && enemy.lastKey === 'ArrowLeft') {
        enemy.velocity.x = -4
        enemy.switchSprite('run')
    } else if (keys.ArrowRight.pressed && enemy.lastKey === 'ArrowRight') {
        enemy.velocity.x = 4
        enemy.switchSprite('backward')
    } else {
        enemy.switchSprite('idle')
    } 

    if (enemy.velocity.y < 0) {
        enemy.switchSprite('jump')
    }   else if (enemy.velocity.y > 0) {
        enemy.switchSprite('jump')
    }
 
    if (rectangularCollision({
        rectangle1: player,
        rectangle2: enemy
    }) && 
        player.isAttacking && player.framesCurrent === 5
    ) {
        enemy.takeHit()
        playRandomAudio()
        player.isAttacking = false 
        
        document.querySelector('#enemyHealth').style.width = enemy.health + '%'
        console.log('player attack successful')
    }



    if (player.isAttacking && player.framesCurrent === 5) {
        player.isAttacking = false
    }

    if (rectangularCollision({
        rectangle1: enemy,
        rectangle2: player
    }) && 
        enemy.isAttacking && enemy.framesCurrent === 5
    ) {
        player.takeHit()
        playRandomAudio1()
        enemy.isAttacking = false 
        document.querySelector('#playerHealth').style.width = player.health + '%'
        console.log('enemy attack successful')
    } 

    
    if (enemy.isAttacking && enemy.framesCurrent === 5) {
        enemy.isAttacking = false
    }

    if (enemy.health <= 0 || player.health <= 0) {
        determineWinner({player, enemy, timerId})
    }
} 

setInterval(() => {
    console.log(frames)
}
)

animate() 

window.addEventListener('keydown', function(event) {


    if (!player.dead) {
    switch (event.key) {
        case 'd':
           keys.d.pressed = true
           player.lastKey = 'd'
            break
        case 'a':
            keys.a.pressed = true 
            player.lastKey = 'a'
            break 
        case 'w':
            if(!playerisJumping) {
                playerisJumping = true;
                player.velocity.y = -20
                setTimeout(function() {playerisJumping = false;},1250)
            }
            break   
        case ' ':
            document.addEventListener('keydown', function(event) {
                if (event.code === 'Space' && !isSpacePressed) {
                    isSpacePressed = true;
                    player.isAttacking = true;
                    player.attack()
                    setTimeout(() => {
                        isSpacePressed = false;
                        player.isAttacking = false;
                    }, 1000);
                }
            });
            



            player.image = player.sprites.attack.image 
            break  
    }
}

    if(!enemy.dead) {
    switch(event.key) {
        case 'ArrowRight':
            keys.ArrowRight.pressed = true
            enemy.lastKey = 'ArrowRight'
            break
        case 'ArrowLeft':
            keys.ArrowLeft.pressed = true 
            enemy.lastKey = 'ArrowLeft'
            break 
        case 'ArrowUp':
            if(!enemyisJumping) {
                enemyisJumping = true;
                enemy.velocity.y = -20
                setTimeout(function() {enemyisJumping = false;},1250)
            }
            break   
        case 'ArrowDown':
            document.addEventListener('keydown', function(event) {
                if (event.code === 'ArrowDown' && !isArrowDownPressed) {
                    isArrowDownPressed = true;
                    enemy.isAttacking = true;
                    enemy.attack()
                    setTimeout(() => {
                        isArrowDownPressed = false;
                        enemy.isAttacking = false;
                    }, 
                    1000);
                }
            });
            
            enemy.image = enemy.sprites.attack.image
            break
    
    }
}
}) 

window.addEventListener('keyup', (event) => { 
    switch (event.key) {
        case 'd':
            keys.d.pressed = false
            break
        case 'a':
            keys.a.pressed = false
            break
    } 

    switch (event.key) {
        case 'ArrowRight':
            keys.ArrowRight.pressed = false
            break
        case 'ArrowLeft':
            keys.ArrowLeft.pressed = false
            break
    }
})  



