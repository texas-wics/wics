var randomBodyParts = ["You are doing great work today. ", "You look great with all that confidence. ", "Look at you, coding queen! ", "Take some time to focus on yourself today. ", "You're killing it!"];
var randomAdjectives = ["You deserve it!", "Your hard work will definitely pay off!","Keep pushing!", "Spread happiness today!", "You got this!"];
var randomWords = ["👩‍💻", "📸", "🤝", "💃‍",
                  "💖", "😊", "🤩", "🌟‍",
                  "✨", "🤓", "🤠", "💁‍",
                  "🌻", "🌷", "🌞", "💻‍"];



//create a function to alert randomInsult
function compliment () {
//pick random sentence from array//
var sentence1 = randomBodyParts[Math.floor(Math.random() * 5)];

//pick random sentence from array//
var sentence2 = randomAdjectives[Math.floor(Math.random() * 5)];

//pick random emojis from array//
var emoji1 = randomWords[Math.floor(Math.random() * 16)];
var emoji2 = randomWords[Math.floor(Math.random() * 16)];
var emoji3 = randomWords[Math.floor(Math.random() * 16)];

//join all random variables into sentance//
var randomCompliment = (sentence1 + sentence2 + emoji1 + emoji2 + emoji3);
  alert(randomCompliment);
  //document.write(randomCompliment);//
}
