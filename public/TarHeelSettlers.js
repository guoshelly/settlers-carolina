
$(document).ready(function() {
    // Global variables
    var cardStack = [
        "knight", "knight", "knight", "knight", "knight",
        "knight", "knight", "knight", "knight", "knight",
        "knight", "knight", "knight", "knight",
        "old well", "the pit", "davis library", "sitterson", "bell tower",
        "road building", "road building",
        "monopoly", "monopoly", "volunteered for medical research",
        "volunteered for medical research"
    ]
    var randomizedCardStack=[];

    (function() {
        for (var i = 0; i <25; i++) {
            var item = cardStack[Math.floor(Math.random()*cardStack.length)];
            randomizedCardStack[i]=item;
            cardStack.splice(cardStack.indexOf(item), 1);
        }
    }());

    /* Randomly draws a development card */
    function drawDevelopmentCard() {
        var item = randomizedCardStack.shift();
        switch (item) {
            case "knight":
                $("#cardOut").append("<div class = 'cards folt'> <img src = 'images/folt.gif'/></div>");
                break;
            case "old well":
                $("#cardOut").append("<div class = 'cards well'> <img src = 'images/well.gif'/></div>");
                break;
            case "the pit":
                $("#cardOut").append("<div class = 'cards pit'> <img src = 'images/pit.gif'/></div>");
                break;
            case "davis library":
                $("#cardOut").append("<div class = 'cards davis'> <img src = 'images/davis.gif'/></div>");
                break;
            case "sitterson":
                $("#cardOut").append("<div class = 'cards sitterson'> <img src = 'images/sitterson.gif'/></div>");
                break;
            case "bell tower":
                $("#cardOut").append("<div class = 'cards bell'> <img src = 'images/bell.gif'/></div>");
                break;
            case "road building":
                $("#cardOut").append("<div class = 'cards roadBuilding'> <img src = 'images/roadBuilding.gif'/></div>");
                break;
            case "monopoly":
                $("#cardOut").append("<div class = 'cards monopoly'> <img src = 'images/monopoly.gif'/></div>");
                break;
            case "volunteered for medical research":
                $("#cardOut").append("<div class = 'cards volunteer'> <img src = 'images/volunteer.gif'/></div>");
                break;
        }
    }

    for (var i = 0; i < 25; i++) {
        drawDevelopmentCard();
    }
});